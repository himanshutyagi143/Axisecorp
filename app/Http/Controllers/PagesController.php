<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\blogs;
use App\Models\news;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Input;
use Hash;
use Validator;
use App\Models\Company;

class PagesController extends Controller
{
    function home()
    {
        return view('index');
    }

    function about()
    {
        return view('aboutus.about');
    }

    function team()
    {
        return view('aboutus.team');
    }

    function vision()
    {
        return view('aboutus.vision');
    }

    function corporate()
    {
        return view('aboutus.corporate');
    }

    function career()
    {
        $jobs = Jobs::where('status', 1)->whereNull('deleted_at')
            ->latest()->get();
        return view('new_frontend.footer-links.career')->with('jobs', $jobs);
    }

    function contactus()
    {
        return view('new_frontend.contactus.contactus');
    }

    function disclaimer()
    {
        return view('new_frontend.footer-links.disclaimer');
    }

    function privacy()
    {
        return view('new_frontend.footer-links.privacy-policy');
    }

    function termsandcondition()
    {
        return view('new_frontend.footer-links.terms-and-condition');
    }

    function axisblues()
    {
        return view('new_frontend.projects.axisblues');
    }

    function yogvillas()
    {
        return view('new_frontend.projects.yogvillas');
    }

    function kncj()
    {
        return view('new_frontend.projects.kncj');
    }

    function lakecity()
    {
        return view('new_frontend.projects.lakecity');
    }

    function lakecityplaza()
    {
        return view('new_frontend.projects.lakecityplaza');
    }

    function kncz()
    {
        return view('new_frontend.projects.kncj');
    }

    function channelPartnerRegisterPage()
    {
        return view('new_frontend.channelpartner.register_page');
    }

    function storeChannelPartner(Request $request)
    {
        $customMessages = [
            'txtPhone.min' => 'Please enter a valid number.',
            'txtPhone.required' => 'Please enter mobile number',
        ];
        $data = $request->all();
        $validator = Validator::make($data, [
            'txtPhone' => 'required|min:10',
        ], $customMessages);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()]);
        } else {
            $otp = rand(10000, 99999);

            if ($request->page_reference == "channel_partner_register") {
                $is_exist = DB::table('company')->where('email',$request->txtEmail)->exists();
                if(!$is_exist) {
                    $contactDetails = Company::create([
                        'name' => $request->txtName,
                        'phone' => $request->txtPhone,
                        'email' => $request->txtEmail,
                        'company_name' => $request->txtFirm,
                        'officeaddress' => $request->txtOfficeAddress,
                        'city' => $request->txtCity,
                        'rera' => $request->txtRera,
                        'created_by' => 9,
                        'company_type_id' => 2
                    ]);

                    $contactDetails->otp = $otp;
                    $contactDetails->message = "Channel Partner Register";
                    $contactDetails->page_reference = $request->page_reference;

                    /* data send to selldo by selldo API */
                    $sell_do_lead_id = $this->sendDatatoSellDo($contactDetails);
                }else{
                    return response()->json(['status' => '2', 'message' => "Email already exists."]);
                }

            }
			
            return response(['status' => 1, 'msg' => 'You have successfully register with us!,Your unique code is: '.$sell_do_lead_id]);
        }
    }

    public function sendDatatoSellDo($data)
    {

        /************New code for selldo forms data*********/
        $form_data = DB::table('tbl_selldo_reference')->where('page_reference', $data['page_reference'])->first();

        $form_id = $form_data->form_id;
        $srd_id = $form_data->srd_id;

        /****** End new code ******/
        $is_verified = "No";

        if (isset($data['officeaddress']) && $data['officeaddress'] != '') {
            $txtOfficeAddress = $data['officeaddress'];
        } else {
            $txtOfficeAddress = "";
        }

        if (isset($data['rera']) && $data['rera'] != '') {
            $txtRera = $data['rera'];
        } else {
            $txtRera = "";
        }

        if (isset($data['city']) && $data['city'] != '') {
            $txtCity = $data['city'];
        } else {
            $txtCity = "";
        }

        $postdata = '{
          "form_id": "' . $form_id . '",
          "sell_do" : {
            "campaign" : {
              "srd" : "' . $srd_id . '",
              "campaign_id": ""
            },
            "form": {
                "address":{
                    "address1": "' . $txtOfficeAddress . '",
                    "address2": "' . $txtCity . '"
                },
                "lead": {
                    "name": "' . $data['name'] . '",
                    "email": "' . $data['email'] . '",
                    "phone": "' . $data['phone'] . '",
                    "project_id": "",
                    "campaign_id": "",
                    "sales":"",
                    "profile": {
                      "company": "' . $data['company_name'] . '"
                    }
                },
                "custom" : {
                    "c_one" : "c one",
                    "custom_email_verified": "' . $is_verified . '",
                    "custom_rera": "' . $txtRera . '"
                },
                "note" : {
                    "content" : "' . $data['message'] . '"
                }
            }
          },
          "api_key" : "9c50fe5de8e98ec2fe344d090c661417"
        }';

        $url = 'https://app.sell.do//api/leads/create.json';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $result = curl_exec($ch);
        curl_close($ch);
		$resultarr = json_decode($result,true);
		
		$sell_do_lead_id = $resultarr['sell_do_lead_id'];
		
        if ($result && ($data['page_reference'] == "channel_partner_register")) {

            Company::where('email', $data['email'])->update(['sell_do_response' => $result]);
			return $sell_do_lead_id;
        }
    }

    public function blogss(){
        // dd('hhh');
        $blogs = blogs::get();
       
        return view('blogs.blog_data', compact('blogs'));
    }

    public function blogs1(){
        // dd('hhh');
        $blogs = blogs::get();
       
        return view('blogs.amazing-facts-that-you-probably-didnt-know-about-sindhudurg', compact('blogs'));
    }

    public function showblog( $title) {
     $blog = Blog::where('title', $title)->first();
     if (!$blog)
        abort(404);

    return view('edific.show-blog', compact('blog', 'blogcomments', 'blogreplies'));
}

public function newss(){
    // dd('hhh');
    $news = news::get();
   
    return view('news.news_data', compact('news'));
}

public function news1(){
    // dd('hhh');
    $news = news::get();
   
    return view('news.axis-ecorp-to-invest-rs-100-crore-in-holiday-home-project-near-upcoming-goa-airport-devdiscourse', compact('news'));
}

public function news2(){
    // dd('hhh');
    $news = news::get();
   
    return view('news.axis-ecorp-to-invest-rs-100-crore-in-holiday-home-project-near-upcoming-goa-airport', compact('news'));
}

}
