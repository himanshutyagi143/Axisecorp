<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Tag;
use DB;
use Twitter;
use Config;
use Facebook\Facebook;
use Facebook\FacebookResponse;
use Facebook\Authentication\AccessToken;
use File;
use Input;
use Validator;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Mail;

class FrontendController extends FrontEndBaseController
{
    public function __construct()
    {

        parent::__construct();

    }

    public function show()
    {
        return view('frontend.index');
    }

    protected function getAccessToken(){
        try{
            $fb = DB::table('social_media')->where('name','facebook')->first();
            $graph_version = Config::get('services.facebook.DEFAULT_GRAPH_VERSION');
            $endpoint = "https://graph.facebook.com/$graph_version/oauth/access_token";
            $client = new \GuzzleHttp\Client();
            $client_id = Config::get('services.facebook.FACEBOOK_APP_ID');
            $client_secret = Config::get('services.facebook.FACEBOOK_APP_SECRET');
            $grant_type = 'fb_exchange_token';
            $fb_exchange_token = $fb->access_token;
            $response = $client->request('GET', $endpoint, ['query' => [
                'grant_type' => "$grant_type",
                'client_id' => "$client_id",
                'client_secret' => "$client_secret",
                'fb_exchange_token' => $fb_exchange_token
            ]]);
            $status = $response->getBody()->getContents();
            $jsonArray = json_decode($status);
            $token = $jsonArray->access_token;
            if(isset($fb)){
                DB::table('social_media')->where('name','facebook')->update(['access_token'=>$token]);
            }else{
                DB::table('social_media')->insert(['name'=>'facebook','access_token'=>$token]);
            }
            return $token;
        }catch(Exception $e){
            return false;
        }
    }

    protected function getTwitterFollowers(){
        try{
            $twitterFollowerCount = Twitter::getFollowersIds();
            $twitterFollowerCount = count($twitterFollowerCount->ids);
            DB::table('social_media')->where('name','twitter')->update(['likes'=>$twitterFollowerCount]);
            return $twitterFollowerCount;
        }catch(Exception $e){
            $twitterFollowerCount = DB::table('social_media')->where('name','twitter')->first()->likes??0;
        }
    }

    protected function getFacebookLikes(){
        try{
            $fb = DB::table('social_media')->where('name','facebook')->first();
            $token = '';
            if(isset($fb) && $fb->access_token){
                $token = $fb->access_token;
            }else{
                $facebookLikes = 0;
                return $facebookLikes;
            }
            $access_token = new AccessToken($token);
            $facebook = new Facebook();
            $access_token = $access_token->getValue();
            $friends = $facebook->get("/me/likes",$access_token);
            $facebookLikes = count($friends->getGraphEdge());
            DB::table('social_media')->where('name','facebook')->update(['likes'=>$facebookLikes]);
            return $facebookLikes;
        }catch(Exception $e){
            $fb = DB::table('social_media')->where('name','facebook')->first();
            if(isset($fb) && $fb->access_token){
                $token = $this->getAccessToken();
                try{
                $access_token = new AccessToken($token);
                $facebook = new Facebook();
                $access_token = $access_token->getValue();
                $friends = $facebook->get("/me/likes",$access_token);
                $facebookLikes = count($friends->getGraphEdge());
                DB::table('social_media')->where('name','facebook')->update(['likes'=>$facebookLikes]);
                return $facebookLikes;
                }catch(Exception $e){$facebookLikes = 0;return $facebookLikes;}
            }else{
                $facebookLikes = 0;
                return $facebookLikes;
            }
        }
    }

    public function blogs($slug=''){
        /*$twitterFollowerCount = $this->getTwitterFollowers();
        $facebookLikes = $this->getFacebookLikes();*/
        $headerTitle = 0;
		if($slug){
            $posts = Blog::where('status','=',1)
                           ->where('media_type','=',1)
                           ->where('slug','=',$slug)->first();
            $is_slug=1;
            $headerTitle = $posts->title;
	    } else{
			$posts = Blog::where('status','=',1)
                           ->where('media_type','=',1)
                           ->latest()->paginate(6);
               // dd($posts);            
			foreach($posts as $post){
			$user = DB::table('users')->join('user_details','user_details.user_id','=','users.id')
			->where('user_details.user_id','=',$post->created_by)
			->select('user_details.first_name','user_details.last_name')->first();
			$post->created_by = $user->first_name??''.' '.$user->last_name??'';
			}
			 $is_slug=2;
        }
        $tags = Tag::all();
        $categories = Category::where('status',1)->get();
        $recent = Blog::where('status','=',1)
                        ->where('media_type','=',1)
                        ->latest()->limit(6)->get();
        if($is_slug == 1)
        {

            return view('frontend.blog-details')->with('posts',$posts)->with('is_slug',$is_slug)->with('tags',$tags)->with('recent',$recent)->with('headerTitle',$headerTitle)->with('categories',$categories);
        }else
        {
            return view('frontend.blogs')->with('posts',$posts)->with('is_slug',$is_slug)->with('tags',$tags)->with('recent',$recent)->with('headerTitle',$headerTitle)->with('categories',$categories);
        }
        
    }

    public function categoryBlogs($slug){
        $twitterFollowerCount = $this->getTwitterFollowers();
        $facebookLikes = $this->getFacebookLikes();
        $headerTitle = 0;
		if($slug){
            $category = Category::where('categorySlug',$slug)->first();
            $posts = $category->blogs()->where('media_type','=',1)->latest()->paginate(6);
            $is_slug=2;
            $headerTitle = $category->categoryName;
        }else{
			return redirect('/blogs');
        }
        $tags = Tag::all();
        $categories = Category::where('status',1)->get();
        $recent = Blog::where('status','=',1)->where('media_type','=',1)->latest()->limit(6)->get();
        return view('frontend.blogs')->with('posts',$posts)->with('is_slug',$is_slug)->with('tags',$tags)->with('recent',$recent)->with('headerTitle',$headerTitle)->with('twitterFollowerCount',$twitterFollowerCount)->with('facebookLikes',$facebookLikes)->with('categories',$categories);
    }

    public function tagBlogs($slug){
        $twitterFollowerCount = $this->getTwitterFollowers();
        $facebookLikes = $this->getFacebookLikes();
        $headerTitle = 0;
		if($slug){
			$tag = Tag::where('tagName',$slug)->first();
            $posts = $tag->blogs()->where('media_type','=',1)->latest()->paginate(6);
            $is_slug=2;
            $headerTitle = $tag->tagName;
        }else{
            return redirect('/blogs');
        }
        $tags = Tag::all();
        $categories = Category::where('status',1)->get();
        $recent = Blog::where('status','=',1)->where('media_type','=',1)->latest()->limit(6)->get();
        return view('frontend.blogs')->with('posts',$posts)->with('is_slug',$is_slug)->with('tags',$tags)->with('recent',$recent)->with('headerTitle',$headerTitle)->with('twitterFollowerCount',$twitterFollowerCount)->with('facebookLikes',$facebookLikes)->with('categories',$categories);
    }

    public function blogsearch(Request $request){
        $twitterFollowerCount = $this->getTwitterFollowers();
        $facebookLikes = $this->getFacebookLikes();
        $headerTitle = 0;
        $is_slug = 2;

        $posts = Blog::where('status','=',1)->where('title','like','%'.$request->search.'%')->where('media_type','=',1)->latest()->paginate(6);
        $headerTitle = $request->search;
        foreach($posts as $post){
            $user = DB::table('users')->join('user_details','user_details.user_id','=','users.id')
            ->where('user_details.user_id','=',$post->created_by)
            ->select('user_details.first_name','user_details.last_name')->first();
            $post->created_by = $user->first_name??''.' '.$user->last_name??'';
        }
            
        $tags = Tag::all();
        $recent = Blog::where('status','=',1)->where('media_type','=',1)->latest()->limit(6)->get();
        $categories = Category::where('status',1)->get();
        return view('frontend.blogs')->with('posts',$posts)->with('is_slug',$is_slug)->with('tags',$tags)->with('recent',$recent)->with('headerTitle',$headerTitle)->with('twitterFollowerCount',$twitterFollowerCount)->with('facebookLikes',$facebookLikes)->with('categories',$categories);
    }

    public function tweet($id){
        $blog = Blog::where('blogs_id',$id)->where('media_type','=',1)->first();
        if(isset($blog)){
            $uploaded_media = Twitter::uploadMedia(['media' => file_get_contents($blog->image)]);
            $tweet = Twitter::postTweet(['status' => $blog->title.' - '.url("/blogs/$blog->slug"), 'media_ids' => $uploaded_media->media_id_string]);
        }
        return redirect()->back();
    }

    public function fbPost($id){
        $blog = Blog::where('blogs_id',$id)->where('media_type','=',1)->first();
        // $expires = time() + 60 * 60 * 2;
        $access_token = new AccessToken('EAAhx9dqdZCY0BAG5ZCFVVJuHoXXH6GBbcdm7eAWcoM0zAoftf93XE8HOSqkXLTsM9RceqHEz1mH5xHKetqQL4wZAdQbjx1nLvLvX8YEE6cLJsjZBwWRUki4tZArcYcVZBVoRBtkJX4XtczVgFCZA4ThDRkKuQ2STR0v0ZAvfdNfZCg1EVqSpc3VOb8hRBSVtLoL4eiALUZBz3zGsw6V19P0bGx');
        $access_token = $access_token->getValue();
        $facebook = new Facebook();
        $page = $facebook->get("/me",$access_token);
        $pageId = $page->getGraphUser()['id'];
        $linkData = [
            'link' => url("/blogs/$blog->slug"),
            'message' => $blog->title
           ];
        $response = $facebook->post("/$pageId/feed",$linkData,$access_token);
        return redirect()->back();
    }

    public function getVideoDetails_construction_dec20(){

        return view('frontend.videodetail')->with('video','construction_dec20');
    }

    public function getVideoDetails_construction_oct20(){

        return view('frontend.videodetail')->with('video','construction_oct20');
    }

    public function getVideoDetails_construction_july20(){

        return view('frontend.videodetail')->with('video','construction_july20');
    }

    public function getVideoDetails_construction_feb20(){

        return view('frontend.videodetail')->with('video','construction_feb20');
    }

    public function getVideoDetails_construction_jan20(){

        return view('frontend.videodetail')->with('video','construction_jan20');
    }

    public function getVideoDetails_construction_dec19(){

        return view('frontend.videodetail')->with('video','construction_dec19');
    }

    /* =============== NEWS SECTION METHOD ================= */
    /********* Method for fetching news ***************/
    public function news($slug=''){
        $twitterFollowerCount = $this->getTwitterFollowers();
        $facebookLikes = $this->getFacebookLikes();
        $headerTitle = 0;
        if($slug){
            $posts = Blog::where('status','=',1)
                           ->where('media_type','=',2)
                           ->where('slug','=',$slug)->first();
            $is_slug=1;
            //dd($posts);
            $headerTitle = $posts->title;
        } else{
            $posts = Blog::where('status','=',1)
                           ->where('media_type','=',2)
                           ->latest()->paginate(6);           
            foreach($posts as $post){
            $user = DB::table('users')->join('user_details','user_details.user_id','=','users.id')
            ->where('user_details.user_id','=',$post->created_by)
            ->select('user_details.first_name','user_details.last_name')->first();
            $post->created_by = $user->first_name??''.' '.$user->last_name??'';
            }
             $is_slug=2;
        }
        $tags = Tag::all();
        $categories = Category::where('status',1)->get();
        $recent = Blog::where('status','=',1)
                        ->where('media_type','=',2)
                        ->latest()->limit(6)->get();
        if($is_slug == 1)
        {

            return view('frontend.news.news-details')->with('posts',$posts)->with('is_slug',$is_slug)->with('tags',$tags)->with('recent',$recent)->with('headerTitle',$headerTitle)->with('twitterFollowerCount',$twitterFollowerCount)->with('facebookLikes',$facebookLikes)->with('categories',$categories);
        }else
        {
            return view('frontend.news.news')->with('posts',$posts)->with('is_slug',$is_slug)->with('tags',$tags)->with('recent',$recent)->with('headerTitle',$headerTitle)->with('twitterFollowerCount',$twitterFollowerCount)->with('facebookLikes',$facebookLikes)->with('categories',$categories);
        }
    }
    /********* End Method for fetching news ***************/

    /***************** Category for news ****************/

    public function categoryNews($slug){
        $twitterFollowerCount = $this->getTwitterFollowers();
        $facebookLikes = $this->getFacebookLikes();
        $headerTitle = 0;
        if($slug){
            $category = Category::where('categorySlug',$slug)->first();
            $posts = $category->blogs()->where('media_type','=',2)->latest()->paginate(6);
            $is_slug=2;
            $headerTitle = $category->categoryName;
        }else{
            return redirect('/news');
        }
        $tags = Tag::all();
        $categories = Category::where('status',1)->get();
        $recent = Blog::where('status','=',1)->where('media_type','=',2)->latest()->limit(6)->get();
        return view('frontend.news.news')->with('posts',$posts)->with('is_slug',$is_slug)->with('tags',$tags)->with('recent',$recent)->with('headerTitle',$headerTitle)->with('twitterFollowerCount',$twitterFollowerCount)->with('facebookLikes',$facebookLikes)->with('categories',$categories);
    }

     /***************** Tags for news ****************/
      public function tagNews($slug){
        $twitterFollowerCount = $this->getTwitterFollowers();
        $facebookLikes = $this->getFacebookLikes();
        $headerTitle = 0;
        if($slug){
            $tag = Tag::where('tagName',$slug)->first();
            $posts = $tag->blogs()->where('media_type','=',2)->latest()->paginate(6);
            $is_slug=2;
            $headerTitle = $tag->tagName;
        }else{
            return redirect('/news');
        }
        $tags = Tag::all();
        $categories = Category::where('status',1)->get();
        $recent = Blog::where('status','=',1)->where('media_type','=',2)->latest()->limit(6)->get();
        return view('frontend.news.news')->with('posts',$posts)->with('is_slug',$is_slug)->with('tags',$tags)->with('recent',$recent)->with('headerTitle',$headerTitle)->with('twitterFollowerCount',$twitterFollowerCount)->with('facebookLikes',$facebookLikes)->with('categories',$categories);
    }

    public function newsSearch(Request $request){
        $twitterFollowerCount = $this->getTwitterFollowers();
        $facebookLikes = $this->getFacebookLikes();
        $headerTitle = 0;
        $is_slug = 2;

        $posts = Blog::where('status','=',1)->where('title','like','%'.$request->search.'%')->where('media_type','=',2)->latest()->paginate(6);
        $headerTitle = $request->search;
        foreach($posts as $post){
            $user = DB::table('users')->join('user_details','user_details.user_id','=','users.id')
            ->where('user_details.user_id','=',$post->created_by)
            ->select('user_details.first_name','user_details.last_name')->first();
            $post->created_by = $user->first_name??''.' '.$user->last_name??'';
        }
            
        $tags = Tag::all();
        $recent = Blog::where('status','=',1)->where('media_type','=',2)->latest()->limit(6)->get();
        $categories = Category::where('status',1)->get();
        return view('frontend.news.news')->with('posts',$posts)->with('is_slug',$is_slug)->with('tags',$tags)->with('recent',$recent)->with('headerTitle',$headerTitle)->with('twitterFollowerCount',$twitterFollowerCount)->with('facebookLikes',$facebookLikes)->with('categories',$categories);
    }

    public function tweetNews($id){
        $blog = Blog::where('blogs_id',$id)->where('media_type','=',2)->first();
        if(isset($blog)){
            $uploaded_media = Twitter::uploadMedia(['media' => file_get_contents($blog->image)]);
            $tweet = Twitter::postTweet(['status' => $blog->title.' - '.url("/news/$blog->slug"), 'media_ids' => $uploaded_media->media_id_string]);
        }
        return redirect()->back();
    }

     public function fbPostNews($id){
        $blog = Blog::where('blogs_id',$id)->where('media_type','=',2)->first();
        // $expires = time() + 60 * 60 * 2;
        $access_token = new AccessToken('EAAhx9dqdZCY0BAG5ZCFVVJuHoXXH6GBbcdm7eAWcoM0zAoftf93XE8HOSqkXLTsM9RceqHEz1mH5xHKetqQL4wZAdQbjx1nLvLvX8YEE6cLJsjZBwWRUki4tZArcYcVZBVoRBtkJX4XtczVgFCZA4ThDRkKuQ2STR0v0ZAvfdNfZCg1EVqSpc3VOb8hRBSVtLoL4eiALUZBz3zGsw6V19P0bGx');
        $access_token = $access_token->getValue();
        $facebook = new Facebook();
        $page = $facebook->get("/me",$access_token);
        $pageId = $page->getGraphUser()['id'];
        $linkData = [
            'link' => url("/news/$blog->slug"),
            'message' => $blog->title
           ];
        $response = $facebook->post("/$pageId/feed",$linkData,$access_token);
        return redirect()->back();
    }


    public function sendLeadEmailToSelldo(Request $request)
    {
        $data['page_reference'] = trim(strip_tags($request->input('page_reference')));
        $data['is_verified'] = 0;
        $data['name'] =  trim(strip_tags($request->input('name')));
        $data['email'] =  trim(strip_tags($request->input('email')));
        $data['phone'] =  trim(strip_tags($request->input('phone')));
        $data['is_mail'] = strip_tags($request->input('is_mail'));

        /*checks for redirect route to thanku page based on pagereference*/
        /*Add Page_reference for lakecityplaza comes from emailer*/
        $check_page_reference = ['lakecityplazaemailer',
                                 'lakecityplaza_emailer_4_Jun_21',
                                ];
        if(in_array($data['page_reference'],$check_page_reference))
        {
            $data['message'] = 'Lead for lakecityplaza from emailer';
            $thank_route = 'thank-you-lakecityplaza';
        }else{
            $data['message'] = 'Lead data';
            $thank_route = 'thank-you';
        }

        /*send mail also if "is_mail" @param add to link*/
        if(isset($data['is_mail']) &&  trim(strip_tags($data['is_mail'])) == 1){
            $data['message'] = empty(strip_tags($request->input('message')))?'Lead from emailer':strip_tags($request->input('message'));
            $is_send = $this->sendLeadMail($data);
        }

        $sell_do = new ContactController();
        $is_send = $sell_do->sendDatatoSellDo($data);/*send lead to selldo*/    
       
        if($is_send)
        {
            return redirect()->route($thank_route);
        }
    }

    public function sendLeadMail($data){
        $toemailid = ['vivek.kapoor@dreamavenue.ae'];
	    //$toemailid = ['abhishek.goyal@innverse.com'];
        //$ccEmail = ['subashcc@mailinator.com','shivanicc@mailinator.com'];
        $ccEmail = [];
        $emailname = 'customer';
        $subject = 'New Leads Received : Axisecorp';
        $from = 'info@axisecorp.com';
        $fromname = 'Axis Ecorp';
        $content = "<h4>Hi Vivek,</h4>";
        $content .= "<h4>New Leads received</h4>";
        $content .= "<p><strong>Name    : </strong>".$data['name'].",</p>";
        $content .= "<p><strong>Email   : </strong>".$data['email'].",</p>";
        $content .= "<p><strong>Phone   : </strong>".$data['phone'].",</p>";
        $content .= "<p><strong>Message : </strong>".$data['message'].",</p><br /><br />";
        $content .= "<p>Regards,</p>";
        $content .= "<p>System Admin<p>";
 
        try{
            $mail = Mail::send([], [], function ($message) use ($toemailid, $emailname, $subject, $from, $fromname, $content,$ccEmail) {
                $message->from($from, $fromname);
                $message->to($toemailid, $emailname);
                $message->cc($ccEmail);
                $message->subject($subject);
                $message->setBody($content, 'text/html'); // for HTML rich messages
            });
            if($mail){
                $emailData = array();
                $emailData['send_to']   = $toemailid;
                $emailData['send_by']   = $from;
                $emailData['sender_id'] = 2;
                $emailData['subject']   = $subject;
                $emailData['body']      =  $content;
                $emailData['send_date'] = date('Y-m-d');
                DB::table('send_mail')->insert($emailData);
                // DB::table('contact_us')->insert(['name' =>  $data['name'],
                //                                  'phone' => $data['phone'],
                //                                  'email' => $data['email'],
                //                                  'subject' => $subject,
                //                                  'message' => $data['message'],
                //                                  'otp' => null,
                //                                  'page_reference'=> $data['page_reference']
                //                                 ]);
                return 1;
                
            }
        }catch(Exception $e){
            return Redirect()->back();
        }
    }
}

