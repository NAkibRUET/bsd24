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
    public function send_receive_store()
    {
        $all_data = DB::table('send_receive_infos')->get();
        return view('bsd24_admin/html/admin_send_receive_store')->with('all_data',$all_data);
    }
    public function send_receive_store_delete($id)
    {
        $check = DB::table('send_receive_infos')->where('id',$id)->delete();
        return back();
    }
    public function send_receive_store_update($id)
    {
        $data = DB::table('send_receive_infos')->where('id',$id)->first();
        return view('bsd24_admin/html/admin_send_receive_info')->with('data',$data);
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

    public function send_receive_info_post(request $data)
    {
        $send_or_receive = $data->send_or_receive;
        $operator_name  = $data->operator_name;
        $card_or_phone = $data->card_or_phone;
        $make_array = array('send_or_receive'=>$send_or_receive, 'operator_name'=>$operator_name, 'card_or_phone'=>$card_or_phone);
        DB::table('send_receive_infos')->insert($make_array);

        return view('bsd24_admin/html/admin_send_receive_info')->with('msg_status','SuccessFully Added one');
    }

    public function send_receive_info_post_update(request $data, $id)
    {
        DB::table('send_receive_infos')->where('id',$id)->update(['send_or_receive'=>$data->send_or_receive, 'operator_name'=>$data->operator_name, 'card_or_phone'=>$data->card_or_phone]);
        return redirect('/send_receive_store');
    }
    public function currency_equivalent()
    {
        return view('bsd24_admin/html/currency_equivalent');
    }
    public function currency_equivalent_post(request $data)
    {
        $conversion_from = $data->conversion_from;
        $conversion_to = $data->conversion_to;
        $conversion_factor = $data->conversion_factor;
        $update_selector = $data->update_selector;
        if($update_selector==0){
        
            $make_array = array('conversion_from'=>$conversion_from, 'conversion_to'=>$conversion_to,'conversion_factor'=>$conversion_factor);
            DB::table('currency_equivalents')->insert($make_array);

            return view('bsd24_admin/html/currency_equivalent')->with('msg_status', 'Successfully added one');
        }
        else
        {
            DB::table('currency_equivalents')->where('conversion_from',$conversion_from)->where('conversion_to',$conversion_to)->update(['conversion_factor'=>$conversion_factor]);
            return view('bsd24_admin/html/currency_equivalent')->with('msg_status', 'Updated Successfully...');
        }

    }
    public function currency_check(request $data)
    {
        $conversion_from = $data->conversion_from;
        $conversion_to = $data->conversion_to;
        $check = DB::table('currency_equivalents')->where('conversion_from',$conversion_from)->where('conversion_to',$conversion_to)->first();
        if($check)
        {
            $factor = $check->conversion_factor;
        }
        else{
            $factor = 0;
        }
        return $factor;
    }

    
    /*Review Handling*/
    public function admin_review()
    {
        $admin_review = DB::table('bsd_reviews')->orderBy('id', 'DESC')->get();
        return view('bsd24_admin/html/admin_review')->with('admin_review',$admin_review);
    }
    public function show_accept_review($id)
    {
        $show_review = DB::table('bsd_reviews')->where('id', $id)->get();
        return view('bsd24_admin/html/admin_review_accept')->with('show_review',$show_review);
    }
    public function update_review($id)
    {   
        $check = DB::table('bsd_reviews')->where('id',$id)->update(['status'=>'1']);
        if($check)
        {
            $status = "ok";
            return redirect('/admin_review');
        }
        else{
            return redirect('/admin_review');
        }
    }

    /*Contact Us Handling*/
    public function admin_contact_us()
    {
        $contact_reqs = DB::table('bsd_contact_uses')->orderBy('id', 'DESC')->get();
        return view('bsd24_admin/html/admin_contact_us')->with('contact_reqs',$contact_reqs);
    }

}
