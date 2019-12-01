<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class bsd24_mainController extends Controller
{
    function bsd24_home_page()
    {
        $review = DB::table('bsd_reviews')->where('status','1')->orderBy('id', 'DESC')->take(10)->get();
        return view('main_home_page')->with('review',$review);
    }
    function login()
    {
        return view('bsd24_login');
    }
    function sign_up()
    {
        return view('bsd24_signup');
    }
    function contact_us()
    {
        return view('bsd24_contact');
    }
    function reviews()
    {
        $review = DB::table('bsd_reviews')->where('status','1')->orderBy('id', 'DESC')->get();
        return view('bsd24_reviews')->with('review',$review);
    }
    function profile()
    {
        return view('bsd24_profile');
    }
    function exchange_operation_view()
    {
        if(session('exchange_info.user_receive_value','')=='')
        {
            return redirect('/');
        }
        else{
        return view('bsd24_exchange_operation');
        }

    }

    function bsd24_exchange_final_stage()
    {
        if(session('exchange_info.user_receive_value','')=='')
        {
            return redirect('/');
        }
        else{
            return view('bsd24_exchange_final_stage');
        }
        
    }

    function exchange_operation_view_post(request $data)
    {
        $conversion_from = $data->conversion_from;
        $conversion_to = $data->conversion_to;
        $user_send_value = $data->user_send_value;
        $user_receive_value = $data->user_receive_value;
        $user_operator_no = $data->user_operator_no;
        $exchange_info = array('conversion_from'=>$conversion_from, 'conversion_to'=>$conversion_to, 'user_send_value'=>$user_send_value,'user_receive_value'=>$user_receive_value,'user_operator_no'=>$user_operator_no);
        session(['exchange_info'=>$exchange_info]);
        return redirect('/exchange_operation_view');
    }


    public function sign_up_request(request $data)
    {
        $fullName= $data->fullName; 
        $userEmail= $data->userEmail; 
        $mobile= $data->mobile;
        $password= $data->password;
        $msg = "";
        $status;
        if(!empty($fullName) && !empty($userEmail) && !empty($mobile) &&!empty($password)){
            $exist = DB::table('bsd_user_informations')->where('user_email',$userEmail)->get()->count();
            if(!$exist){
                $values = array('full_name' => $fullName,'user_email' => $userEmail, 'user_phone' => $mobile, 'password' => $password);
                $insert = DB::table('bsd_user_informations')->insert($values);

                if($insert){
                    $status = "ok";
                }
                else{
                    $status = "failed";
                }
            }
            else{
                $status = "failed";
                $msg = "An account with this Email already exists";    
            }
        }
        else{
            $status = "failed";
            $msg = "No field should be empty!";
        }
        $arr = array('a' => $status, 'b' => $msg);

        echo json_encode($arr);
    }



    public function login_request(request $data){
        $userEmail= $data->userEmail;
        $password= $data->password;
        $msg = "";
        $exist = DB::table('bsd_user_informations')->where('user_email',$userEmail)->get()->count();
        if(!$exist){
            $status = "failed";
            $msg = "Username not found!";    
        }
        else{
            $match = DB::table('bsd_user_informations')->where('user_email',$userEmail)->where('password',$password)->get()->count();
            if($match){
                $status = "ok";
                $email = DB::table('bsd_user_informations')->where('user_email',$userEmail)->value('user_email');
                $name = DB::table('bsd_user_informations')->where('user_email',$userEmail)->value('full_name');
                $mobile = DB::table('bsd_user_informations')->where('user_email',$userEmail)->value('user_phone');
                $data = array('name' => $name, 'email' => $email, 'mobile' => $mobile);
                session(['user_info'=>$data]);
                

            }
            else{
                $status = "failed";
                $msg = "Password doesn't match!";           
            }
        }
    
        $arr = array('a' => $status, 'b' => $msg);

        echo json_encode($arr);
    }


    public function reviews_submit(request $data){
        $userName= $data->userName;
        $review= $data->review;
        $msg = "";
        
        if(strlen($review)){
            $values = array('full_name' => $userName,'review_comment' => $review);
            $insert = DB::table('bsd_reviews')->insert($values);
            
            if($insert){
                $status = "ok";
            }
            else{
                $status = "failed";
                $msg = "Something went wrong, please try again";           
            }
        }
        else{
            $status = "failed";
            $msg = "Review Should not be over 250 characters!";               
        }
    
        $arr = array('a' => $status, 'b' => $msg);

        echo json_encode($arr);
    }


    public function login_check_user()
    {
       
        $check = session('user_info.email','none');
        //echo $check;
        if($check=="none")
        {
            return "Please Login First...";
        }
        else
        {
            return "1";
        }
        
    }

    
    public function contact_request(request $data){
        $userName= $data->userName;
        $review= $data->review;
        $msg = "";
        
        if(strlen($review)){
            $values = array('full_name' => $userName,'review_comment' => $review);
            $insert = DB::table('bsd_reviews')->insert($values);
            
            if($insert){
                $status = "ok";
            }
            else{
                $status = "failed";
                $msg = "Something went wrong, please try again";           
            }
        }
        else{
            $status = "failed";
            $msg = "Review Should not be over 250 characters!";               
        }
    
        $arr = array('a' => $status, 'b' => $msg);

        echo json_encode($arr);
    }


    
}
