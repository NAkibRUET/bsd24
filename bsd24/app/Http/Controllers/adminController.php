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
    public function exchange_operation()
    {
        return view('bsd24_admin/html/admin_exchange_operation');
    }
    public function send_receive_info()
    {
        return view('bsd24_admin/html/admin_send_receive_info');
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

    public function admin_home_page(){
        return view('bsd24_admin/html/index');
    }

    public function our_reserve()
    {
        $all_reserve = DB::table('our_reserve_amounts')->orderBy('reserve_name', 'ASC')->get();
        return view('bsd24_admin/html/our_reserve')->with('all_reserve',$all_reserve);
    }
    public function add_a_new_reserve()
    {
        return view('bsd24_admin/html/add_a_new_reserve');
    }
    public function add_a_new_reserve_stor(request $data)
    {
        $reserve_name = $data->reserve_name;
        $reserve_image="";
        $reserve_currency=$data->reserve_currency;
        $reserve_amount=$data->reserve_amount;
        if($data->hasfile('reserve_image'))
        {
            $image_name = $data->file('reserve_image')->getClientOriginalName();
            $name_upadate = $image_name;
            $data->file('reserve_image')->move(public_path().'/bsd24_assets/reserved_file',$image_name);
            //return ("succesfull inserted")

            $make_array = array('reserve_name'=>$reserve_name, 'reserve_image'=>$image_name, 'reserve_currency'=>$reserve_currency, 'reserve_amount'=>$reserve_amount);
            DB::table('our_reserve_amounts')->insert($make_array);
            return view('bsd24_admin/html/add_a_new_reserve')->with('msg_status', "Successfully Inserted One Item");
        }
        else
        {
            //DB::table('our_reserve_amounts')->insert($make_array);
            return view('bsd24_admin/html/add_a_new_reserve')->with('msg_status', "Something went Wrong try again");
        }

    }

    public function reserve_update($id)
    {
        $specific_data = DB::table('our_reserve_amounts')->where('id', $id)->first();
        return view('bsd24_admin/html/reserve_update')->with('sp_data', $specific_data);
    }

    public function add_a_new_reserve_stor_update(request $data, $id)
    {
        $reserve_name = $data->reserve_name;
        $reserve_image="";
        $reserve_currency=$data->reserve_currency;
        $reserve_amount=$data->reserve_amount;
        if($data->hasfile('reserve_image'))
        {
            $image_name = $data->file('reserve_image')->getClientOriginalName();
            $name_upadate = $image_name;
            $data->file('reserve_image')->move(public_path().'/bsd24_assets/reserved_file',$image_name);
            //return ("succesfull inserted")

            DB::table('our_reserve_amounts')->where('id',$id)->update(['reserve_name'=>$reserve_name,'reserve_currency'=>$reserve_currency,'reserve_amount'=>$reserve_amount, 'reserve_image'=>$image_name]);

            return redirect('/our_reserve');
        }
        else
        {
            DB::table('our_reserve_amounts')->where('id',$id)->update(['reserve_name'=>$reserve_name,'reserve_currency'=>$reserve_currency,'reserve_amount'=>$reserve_amount]);

            return redirect('/our_reserve');
        }
        

    }

    public function delete_a_reserve($id)
    {
        $boss=DB::table('our_reserve_amounts')->where('id',$id)->delete();
        //echo $id;
        return redirect('/our_reserve');
    }






}
