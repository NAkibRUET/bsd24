<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class bsd24_mainController extends Controller
{
    function bsd24_home_page()
    {
        return view('main_home_page');
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
        return view('bsd24_reviews');
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
                $data = array('name' => $name, 'email' => $email);
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
    
}
