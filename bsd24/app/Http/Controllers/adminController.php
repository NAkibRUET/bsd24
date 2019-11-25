<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function admin_login()
    {
        return view('bsd24_admin/html/admin_login');
    }
    public function admin_login_request(request $data)
    {
        $adminName = $data->adminName;
        $adminPass = $data->adminPass;
        $exist = DB::table('admin_informations')->where('admin_user_bsd',$adminName)->where('admin_password_bsd',$adminPass)->get()->count();
        //echo $exist;

        if ($exist){
            session(['admin_login_info'=>"adil_reza"]);
            return "ok";
        }
        else{
            return "unknown";
        }
        

        
    }

    function admin_home_page(){
        return view('bsd24_admin/html/index');
    }






}
