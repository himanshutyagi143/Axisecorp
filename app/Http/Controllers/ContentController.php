<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;
use App\Tag;
use App\Models\Jobs;
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
use Illuminate\Support\Facades\Mail;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use App\Helpers\CommonHelper;

class ContentController extends Controller
{

    /*
     *
     *Method define for blogs
     *
    */

    public function blogs($slug = '')
    {

        $headerTitle = 0;
        $posttags = array();
        if ($slug) {
            $posts = Blog::leftjoin('user_details', 'blogs.created_by', '=', 'user_details.user_id')
                ->where('blogs.status', '=', 1)
                ->where('media_type', '=', 1)
                ->where('blogs.slug', '=', $slug)
                ->first();
            if (!$posts) {
                return view('new_frontend.blogs.blog-details')->with(['post_exits' => 0]);
            }
            $posts->image_name = substr($posts->image, 60);
            $posttags = DB::table('blog_tag')->leftjoin('tags', 'tags.id', '=', 'blog_tag.tag_id')->where('blog_id', $posts->blogs_id)->select('blog_tag.tag_id', 'tags.tagName')->get();
            $posts->tags = (object)$posttags;
            $posts->created_by = $posts->first_name??'' . ' ' . $posts->last_name??'';
            $is_slug = 1;
            $headerTitle = $posts->title;
            // $tags = Tag::all();
            $tags = $this->getAllTags(1);
            $recent = $this->getRecentPost(1);
        } else {
            $posts = Blog::leftjoin('user_details', 'blogs.created_by', '=', 'user_details.user_id')
                ->where('blogs.status', '=', 1)
                ->where('media_type', '=', 1)
                ->latest('blogs.created_at')->paginate(4);

            $is_slug = 2;
            foreach ($posts as $post) {
                $posttags = DB::table('blog_tag')->leftjoin('tags', 'tags.id', '=', 'blog_tag.tag_id')->where('blog_id', $post->blogs_id)->select('blog_tag.tag_id', 'tags.tagName')->get();
                $post->tags = (object)$posttags;
                $post->created_by = $post->first_name??'' . ' ' . $post->last_name??'';
                $post->image_name = substr($post->image, 60);
            }
            $tags = $this->getAllTags(1);
            $recent = $this->getRecentPost(1);
        }

        if ($is_slug == 1) {
            return view('new_frontend.blogs.blog-details')->with('posts', $posts)->with('is_slug', $is_slug)->with('tags', $tags)->with('recent', $recent)->with('headerTitle', $headerTitle)->with(['post_exits' => 1]);
        } else {
            return view('new_frontend.blogs.blog')->with('posts', $posts)->with('is_slug', $is_slug)->with('recent', $recent)->with('tags', $tags);
        }

    }

    function fetch_blog_data(Request $request)
    {

        if ($request->ajax()) {
            $searchtxt = $request->input('search')??null;
            $year = $request->input('year')??null;
            $month = $request->input('month')??null;
            if ($request->type == "blogs") {
                if ($year != null && $month != null) {
                    $posts = Blog::leftjoin('user_details', 'blogs.created_by', '=', 'user_details.user_id')
                        ->where('blogs.status', '=', 1)
                        ->where('media_type', '=', 1)
                        ->where('blogs.title', 'like', '%' . $searchtxt . '%')
                        ->whereYear('blogs.blog_date', '=', $year)
                        ->whereMonth('blogs.blog_date', '=', $month)
                        ->latest('blogs.blog_date')->paginate(4);
                } else {
                    $posts = Blog::leftjoin('user_details', 'blogs.created_by', '=', 'user_details.user_id')
                        ->where('blogs.status', '=', 1)
                        ->where('media_type', '=', 1)
                        ->where('blogs.title', 'like', '%' . $searchtxt . '%')
                        ->latest('blogs.blog_date')->paginate(4);
                }
                $is_slug = 2;
                foreach ($posts as $post) {
                    $posttags = DB::table('blog_tag')->leftjoin('tags', 'tags.id', '=', 'blog_tag.tag_id')->where('blog_id', $post->blogs_id)->select('blog_tag.tag_id', 'tags.tagName')->get();
                    $post->tags = (object)$posttags;
                    $post->created_by = $post->first_name??'' . ' ' . $post->last_name??'';
                    $post->image_name = substr($post->image, 60);
                }
            } elseif ($request->type == "tags") {
                $tagid = $request->tag;
                $tag = Tag::where('id', $tagid)->first();
                if ($year != null && $month != null) {
                    $posts = $tag->blogs()->where('media_type', '=', 1)->where('blogs.title', 'like', '%' . $searchtxt . '%')->whereYear('blog_date', '=', $year)->whereMonth('blog_date', '=', $month)->latest()->paginate(4);
                } else {
                    $posts = $tag->blogs()->where('media_type', '=', 1)->where('blogs.title', 'like', '%' . $searchtxt . '%')->latest()->paginate(4);
                }

                $is_slug = 2;
                $headerTitle = $tag->tagName;
                foreach ($posts as $post) {
                    $posttags = DB::table('blog_tag')->leftjoin('tags', 'tags.id', '=', 'blog_tag.tag_id')->where('blog_id', $post->blogs_id)->select('blog_tag.tag_id', 'tags.tagName')->get();
                    $post->tags = (object)$posttags;
                    $post->created_by = $post->first_name??'' . ' ' . $post->last_name??'';
                    $post->image_name = substr($post->image, 60);
                }
            }
            return view('new_frontend.blogs.blog_data', compact('posts', 'is_slug'));
        }
    }


    public function tagBlogs($tagid)
    {

        $headerTitle = 0;
        if ($tagid > 0) {
            $tag = Tag::where('id', $tagid)->first();
            if (!$tag) {
                return redirect()->back();
            }
            $tags = $this->getAllTags(1);
            $recent = $this->getRecentPost(1);
            $posts = $tag->blogs()->where('media_type', '=', 1)->latest()->paginate(4);
            $is_slug = 2;
            $headerTitle = $tag->tagName;
            foreach ($posts as $post) {
                $posttags = DB::table('blog_tag')->leftjoin('tags', 'tags.id', '=', 'blog_tag.tag_id')->where('blog_id', $post->blogs_id)->select('blog_tag.tag_id', 'tags.tagName')->get();
                $post->tags = (object)$posttags;
                $post->created_by = $post->first_name??'' . ' ' . $post->last_name??'';
                $post->image_name = substr($post->image, 60);
            }
        } else {
            return redirect('/blogs');
        }
        return view('new_frontend.blogs.blog')->with('posts', $posts)->with('is_slug', $is_slug)->with('tags', $tags)->with('recent', $recent);
    }

    //Latest News for Home Pages
    public function homePageLatestNews()
    {
        $data = Blog:: where('status', '=', 1)
            ->where('media_type', '=', 2)
            ->latest('blog_date')->limit(3)->get();
        foreach ($data as $post) {
            $post->blog_date = date('M d, Y', strtotime($post->blog_date));
            $post->content = str_limit(strip_tags($post->content), 80, '');
            $post->image_name = substr($post->image, 60);
        }
        return response()->json(['status' => 'Success', 'data' => $data]);
    }


    function getRecentPost($type = 1)
    {
        $recent = Blog::where('status', '=', 1)
            ->where('media_type', '=', $type)
            ->latest('blog_date')->limit(3)->get();
        foreach ($recent as $post) {
            $post->image_name = substr($post->image, 60);
        }
        return $recent;
    }

    function getAllTags($media_type = 1)
    {
        $tags = DB::table('blog_tag')->leftjoin('tags', 'tags.id', '=', 'blog_tag.tag_id')->join('blogs', 'blogs.blogs_id', '=', 'blog_tag.blog_id')->groupBy('tags.id')->where('blogs.media_type', '=', $media_type)->select('blog_tag.tag_id', 'tags.tagName', 'tags.id')->get();
        return $tags;
    }

    /*
     * News Section Starts Here
     *
    */

    public function news($slug = '')
    {
        $headerTitle = 0;
        $posttags = array();
        $getCategories = CommonHelper::getCategories();
        if ($slug) {
            $posts = Blog::leftjoin('user_details', 'blogs.created_by', '=', 'user_details.user_id')
                ->where('blogs.status', '=', 1)
                ->where('media_type', '=', 2)
                ->where('blogs.slug', '=', $slug)
                ->select('blogs.*', 'blogs.city as news_city', 'user_details.*')
                ->first();
            if (!$posts) {
                return view('new_frontend.news.news-details')->with(['post_exits' => 0]);
            }
            $posts->image_name = substr($posts->image, 60);
            $posttags = DB::table('blog_tag')->leftjoin('tags', 'tags.id', '=', 'blog_tag.tag_id')->where('blog_id', $posts->blogs_id)->select('blog_tag.tag_id', 'tags.tagName')->get();
            $posts->tags = (object)$posttags;
            $posts->created_by = $posts->first_name??'' . ' ' . $posts->last_name??'';
            $is_slug = 1;
            $headerTitle = $posts->title;
            // $tags = Tag::all();
            $tags = $this->getAllTags(2);
            $recent = $this->getRecentPost(2);
        } else {
            $posts = Blog::leftjoin('user_details', 'blogs.created_by', '=', 'user_details.user_id')
                ->where('blogs.status', '=', 1)
                ->where('media_type', '=', 2)
                ->select('blogs.*', 'blogs.city as news_city', 'user_details.*')
                ->latest('blogs.blog_date')->paginate(4);

            $is_slug = 2;
            foreach ($posts as $post) {
                $posttags = DB::table('blog_tag')->leftjoin('tags', 'tags.id', '=', 'blog_tag.tag_id')->where('blog_id', $post->blogs_id)->select('blog_tag.tag_id', 'tags.tagName')->get();
                $post->tags = (object)$posttags;
                $post->created_by = $post->first_name??'' . ' ' . $post->last_name??'';
                $post->image_name = substr($post->image, 60);
            }
            $tags = $this->getAllTags(2);
            $recent = $this->getRecentPost(2);
        }

        if ($is_slug == 1) {
            return view('new_frontend.news.news-details')->with('posts', $posts)->with('is_slug', $is_slug)->with('tags', $tags)->with('recent', $recent)->with('headerTitle', $headerTitle)->with(['post_exits' => 1]);
        } else {
            return view('new_frontend.news.news')->with('posts', $posts)->with('is_slug', $is_slug)->with('recent', $recent)->with('tags', $tags)->with('categories',$getCategories);
        }

    }

    function fetch_news_data(Request $request)
    {

        if ($request->ajax()) {
            $searchtxt = $request->input('search')??null;
            $year = $request->input('year')??null;
            $month = $request->input('month')??null;
            $category = $request->input('category')??null;
            if ($request->type == "news") {
                if ($year != null && $month != null) {

                    if($category != null){
                        $posts = Blog::leftjoin('user_details', 'blogs.created_by', '=', 'user_details.user_id')
                            ->leftjoin('blog_category', 'blogs.blogs_id', '=', 'blog_category.blog_id')
                            ->where('blogs.status', '=', 1)
                            ->where('media_type', '=', 2)
                            ->where('blogs.title', 'like', '%' . $searchtxt . '%')
                            ->where('blog_category.category_id', '=', $category)
                            ->whereYear('blogs.blog_date', '=', $year)
                            ->whereMonth('blogs.blog_date', '=', $month)
                            ->select('blogs.*', 'blogs.city as news_city', 'user_details.*', 'blog_category.category_id')
                            ->latest('blogs.blog_date')->paginate(4);
                    }else{
                        $posts = Blog::leftjoin('user_details', 'blogs.created_by', '=', 'user_details.user_id')
                            ->where('blogs.status', '=', 1)
                            ->where('media_type', '=', 2)
                            ->where('blogs.title', 'like', '%' . $searchtxt . '%')
                            ->whereYear('blogs.blog_date', '=', $year)
                            ->whereMonth('blogs.blog_date', '=', $month)
                            ->select('blogs.*', 'blogs.city as news_city', 'user_details.*')
                            ->latest('blogs.blog_date')->paginate(4);
                    }

                } else {
                    if($category != null){
                        $posts = Blog::leftjoin('user_details', 'blogs.created_by', '=', 'user_details.user_id')
                            ->leftjoin('blog_category', 'blogs.blogs_id', '=', 'blog_category.blog_id')
                            ->where('blogs.status', '=', 1)
                            ->where('media_type', '=', 2)
                            ->where('blogs.title', 'like', '%' . $searchtxt . '%')
                            ->where('blog_category.category_id', '=', $category)
                            ->select('blogs.*', 'blogs.city as news_city', 'user_details.*', 'blog_category.category_id')
                            ->latest('blogs.blog_date')->paginate(4);
                    }else{
                        $posts = Blog::leftjoin('user_details', 'blogs.created_by', '=', 'user_details.user_id')
                            ->where('blogs.status', '=', 1)
                            ->where('media_type', '=', 2)
                            ->where('blogs.title', 'like', '%' . $searchtxt . '%')
                            ->select('blogs.*', 'blogs.city as news_city', 'user_details.*')
                            ->latest('blogs.blog_date')->paginate(4);
                    }

                }
                $is_slug = 2;
                //dd($posts);
                foreach ($posts as $post) {
                    $posttags = DB::table('blog_tag')->leftjoin('tags', 'tags.id', '=', 'blog_tag.tag_id')->where('blog_id', $post->blogs_id)->select('blog_tag.tag_id', 'tags.tagName')->get();
                    $post->tags = (object)$posttags;
                    $post->created_by = $post->first_name??'' . ' ' . $post->last_name??'';
                    $post->image_name = substr($post->image, 60);
                }
            } elseif ($request->type == "tags") {
                $tagid = $request->tag;
                $tag = Tag::where('id', $tagid)->first();
                if ($year != null && $month != null) {
                    if($category != null){
                        $posts = $tag->blogs()
                            ->leftjoin('blog_category', 'blogs.blogs_id', '=', 'blog_category.blog_id')
                            ->where('media_type', '=', 2)
                            ->where('blogs.title', 'like', '%' . $searchtxt . '%')
                            ->whereYear('created_at', '=', $year)
                            ->whereMonth('created_at', '=', $month)
                            ->where('blog_category.category_id', '=', $category)
                            ->select('blogs.*', 'blogs.city as news_city', 'blog_category.category_id')
                            ->latest()->paginate(4);
                    }else{
                        $posts = $tag->blogs()->where('media_type', '=', 2)
                            ->where('blogs.title', 'like', '%' . $searchtxt . '%')
                            ->whereYear('created_at', '=', $year)
                            ->whereMonth('created_at', '=', $month)
                            ->select('blogs.*', 'blogs.city as news_city')
                            ->latest()->paginate(4);
                    }

                } else {
                    if($category != null){
                        $posts = $tag->blogs()
                            ->leftjoin('blog_category', 'blogs.blogs_id', '=', 'blog_category.blog_id')
                            ->where('media_type', '=', 2)
                            ->where('blogs.title', 'like', '%' . $searchtxt . '%')
                            ->where('blog_category.category_id', '=', $category)
                            ->select('blogs.*', 'blogs.city as news_city', 'blog_category.category_id')
                            ->latest()->paginate(4);
                    }else{
                        $posts = $tag->blogs()
                            ->where('media_type', '=', 2)
                            ->where('blogs.title', 'like', '%' . $searchtxt . '%')
                            ->select('blogs.*', 'blogs.city as news_city')
                            ->latest()->paginate(4);
                    }

                }

                $is_slug = 2;
                $headerTitle = $tag->tagName;
                //dd($posts);
                foreach ($posts as $post) {
                    $posttags = DB::table('blog_tag')->leftjoin('tags', 'tags.id', '=', 'blog_tag.tag_id')->where('blog_id', $post->blogs_id)->select('blog_tag.tag_id', 'tags.tagName')->get();
                    $post->tags = (object)$posttags;
                    $post->created_by = $post->first_name??'' . ' ' . $post->last_name??'';
                    $post->image_name = substr($post->image, 60);
                }
            }

            return view('new_frontend.news.news_data', compact('posts', 'is_slug'));
        }
    }


    public function tagNews($tagid)
    {

        $headerTitle = 0;
        if ($tagid > 0) {
            $tag = Tag::where('id', $tagid)->first();
            if (!$tag) {
                return redirect()->back();
            }
            $tags = $this->getAllTags(2);
            $recent = $this->getRecentPost(1);
            $posts = $tag->blogs()->where('media_type', '=', 2)->select('blogs.*', 'blogs.city as news_city')->latest()->paginate(4);
            $is_slug = 2;
            $headerTitle = $tag->tagName;
            foreach ($posts as $post) {
                $posttags = DB::table('blog_tag')->leftjoin('tags', 'tags.id', '=', 'blog_tag.tag_id')->where('blog_id', $post->blogs_id)->select('blog_tag.tag_id', 'tags.tagName')->get();
                $post->tags = (object)$posttags;
                $post->created_by = $post->first_name??'' . ' ' . $post->last_name??'';
                $post->image_name = substr($post->image, 60);
            }
        } else {
            return redirect('/news');
        }
        return view('new_frontend.news.news')->with('posts', $posts)->with('is_slug', $is_slug)->with('tags', $tags)->with('recent', $recent);
    }


    public function applyJob(request $request)
    {

        $file = $request->file('resume');
        $filename = rand(1, 999) . "_" . time() . "_" . $file->getClientOriginalName();
        $destinationPath = 'frontend/uploads/resumes';
        $response = $file->move($destinationPath, $filename);
        $resumepath = public_path('frontend/uploads/resumes/' . $filename);
        $jobsdata['name'] = $request->txtName;
        $jobsdata['email'] = $request->txtEmail;
        $jobsdata['phone'] = $request->txtPhone;
        $jobsdata['resume'] = $filename;
        $jobsdata['message'] = $request->txtName;
        $jobsdata['job_id'] = $request->job_id;
        $inserted = DB::table('apply_jobs')->insert($jobsdata);


        $toemailid = 'hr@innverse.com';
        $emailname = 'Human Resource (HR)';
        $subject = 'Received Job Apllication From: ' . $request->txtName;
        $from = 'info@eejak.com';
        $fromname = 'Job Application';
        $content = "<h3>From: $request->txtEmail</h3>";
        $content .= "<p>Name: $request->txtName</p>";
        $content .= "<p>Phone: $request->txtPhone</p>";
        $content .= "<p>Message: $request->message</p>";

        try {
            $mail = Mail::send([], [], function ($message) use ($toemailid, $emailname, $subject, $from, $fromname, $content, $resumepath) {
                $message->from($from, $fromname);
                $message->to($toemailid, $emailname);
                $message->bcc('abhishek.goyal@innverse.com', 'Abhishek Goyal');
                $message->subject($subject);
                $message->attach($resumepath);
                $message->setBody($content, 'text/html'); // for HTML rich messages
            });
            if ($mail) {
                $emailData = array();
                $emailData['send_to'] = $toemailid;
                $emailData['send_by'] = $from;
                $emailData['sender_id'] = 2;
                $emailData['subject'] = $subject;
                $emailData['body'] = $content;
                $emailData['send_date'] = date('Y-m-d');
                DB::table('send_mail')->insert($emailData);
            } else {
                \Session::flash('error-msg', 'Something went wrong.');
                return Redirect()->back();
            }
        } catch (Exception $e) {
            \Session::flash('error-msg', 'Something went wrong.');
            return Redirect()->back();
        }

        \Session::flash('success-msg', 'Thanks For Contacting us');
        return Redirect()->back();
    }

    function getArchive(Request $request)
    {
        $media_type = $request->input('media_type');
        $archives = Blog::where('status', '=', 1)->where('media_type', '=', $media_type)->select(DB::raw('count(*) as `counts`'), DB::raw("DATE_FORMAT(blog_date, '%M %Y') new_date"), DB::raw('YEAR(blog_date) year, MONTH(blog_date) month'))
            ->groupby('year', 'month')->latest('blog_date')
            ->get();

        return response()->json($archives);
    }

}
