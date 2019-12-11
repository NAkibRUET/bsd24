<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Dirape\Token\Token;


class bsd24_mainController extends Controller
{


    public function generate_exchange_id()
    {
        $randomString = md5(rand(3,100) . microtime());
        $Orginal_track_id = strtoupper($randomString);
        $Orginal_track_id = substr(str_shuffle($Orginal_track_id), 0, 16);
        return $Orginal_track_id;
    }




    function bsd24_home_page()
    {
        $review = DB::table('bsd_reviews')->where('status','1')->orderBy('id', 'DESC')->take(10)->get();
        $headline = DB::table('headline_tables')->orderBy('id', 'ASC')->first();
        session(['headline_text'=>$headline->headline_text]);
        $all_reserve = DB::table('our_reserve_amounts')->get();
        
        return view('main_home_page')->with(['review'=>$review, 'all_reserve'=>$all_reserve]);
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
        $transaction_history = DB::table('exchange_all_record_privates')->where('user_email',session('user_info.email'))->orderBy('id', 'desc')->take(10)->get();
        return view('bsd24_profile')->with('transaction_history',$transaction_history);
    }

    public function track_a_transaction($tracking_id)
    {
        $one_transaction = DB::table('exchange_all_record_privates')->where('exchange_tracking_id', $tracking_id)->first();
        return view('details_transaction')->with('one_transaction',$one_transaction);

    }

    public function logout_user()
    {
        session()->flush(); 
        return $this->bsd24_home_page();
    }
    public function track_transaction(request $data)
    {
        $track_id = $data->tracking_id;
        $result = $this->bsd24_exchange_tracking($track_id);
        return $result;

    }





    function exchange_operation_view()
    {
        if(session('exchange_info.user_receive_value','')=='')
        {
            return redirect('/');
        }
        else{
            $tid = $this->adil_test();
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
            
            $money_receiving_credentials = DB::table('send_receive_infos')->where('send_or_receive','send')->where('operator_name',session('exchange_info.conversion_from'))->value('card_or_phone');

            return view('bsd24_exchange_final_stage')->with(['money_receiving_credentials'=>$money_receiving_credentials,'bsd24_exchange_id'=>$this->adil_test()]);
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
        return view('bsd24_exchange_operation')->with('bsd24_exchange_id',$this->generate_exchange_id());

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
        
        if(strlen($review)<=250){
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

    public function eligibility_check()
    {
        $time = DB::table('user_last_exchange_times')->where('user_email',session('user_info.email'))->orderBy('id', 'DESC')->value('last_exchange_time');
        $to_time = strtotime($time);
        $from_time = strtotime(NOW());
        $tenu = round(abs($to_time - $from_time)/60);
        $wating_minutes = 10 - (int)$tenu;
        return $wating_minutes;

    }


    public function login_check_user()
    {
       
        $check = session('user_info.email','none');
        //echo $check;
        if($check=="none")
        {
            return "not_login";
        }
        else
        {
            $time = $this->eligibility_check();
            if($time>0)
                return $time;
            else
                return "37";
        }
        
    }



    public function contact_request(request $data){
        $userName= $data->userName;
        $userEmail= $data->userEmail;
        $subject= $data->subject;
        $message= $data->message;
        $msg = "";
        if(strlen($message)<=550){
            $values = array('full_name' => $userName,'user_email' => $userEmail,'subject' => $subject, 'message' => $message, 'created_at'=> NOW());
            $insert = DB::table('bsd_contact_uses')->insert($values);
            
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
            $msg = "Message Should not be over 550 characters!";               
        }
    
        $arr = array('a' => $status, 'b' => $msg);

        echo json_encode($arr);
    }

    public function bsd24_exchange_final_last(request $data)
    {
        $bsd24_exchange_id= $data->bsd24_exchange_id;
        $transaction_id = $data->transaction_id;
        session(['exchange_info.transaction_id'=>$transaction_id]);
        session(['exchange_info.bsd24_exchange_id'=>$bsd24_exchange_id]);

        $make_array = array('exchange_tracking_id'=>session('exchange_info.bsd24_exchange_id'),'sending'=>session('exchange_info.conversion_from'), 'receiving'=>session('exchange_info.conversion_to'),'from_amount'=>session('exchange_info.user_send_value'), 'to_amount'=>session('exchange_info.user_receive_value'), 'transaction'=>session('exchange_info.transaction_id'),'user_email'=>session('user_info.email'));

        DB::table('exchange_all_record_privates')->insert($make_array);
        $make_array2 = array('bsd24_exchange_id'=>session('exchange_info.bsd24_exchange_id'), 'status'=>"verifying your transaction");
        DB::table('exchange_trackers')->insert($make_array2);
        $make_array3 = array('user_email'=>session('user_info.email'), 'last_exchange_time'=>NOW());
        DB::table('user_last_exchange_times')->insert($make_array3);
        return redirect('/thank_you');
    }

    public function thank_you()
    {
        return view('thank_you');
    }

    public function adil_test()
    {
        $randomString = md5(rand(3,100) . microtime());
        $Orginal_track_id = strtoupper($randomString);
        $Orginal_track_id = substr(str_shuffle($Orginal_track_id), 0, 16);
        return $Orginal_track_id;
    }
    public function only_test()
    {
        //$single_value = DB::table('exchange_all_record_privates')->orderBy('id','DESC')->value('created_at');
        $single_value=$this->eligibility_check();
        return $single_value;
    }
    


    function other_user_profile($email)
    {   
        
        $user_data = DB::table('bsd_user_informations')->where('user_email', $email)->get();
        return view('bsd24_other_user_profile')->with('user_data', $user_data);
        
    }

    public function bsd24_exchange_tracking($bsd24_exchange_id)
    {
        $status = DB::table('exchange_trackers')->where('bsd24_exchange_id',$bsd24_exchange_id)->orderBy('id','DESC')->value('status');
        if($status!="")
            return $status;
        else
            return  "not_found";

    }



    function get_full_name($email)
    {
        $user_full_name = DB::table('bsd_user_informations')->where('user_email',$email)->value('full_name');
        return $user_full_name;

    }





    public function read_processing()
    {
        $all_processing = DB::table('exchange_all_record_privates')->where('status','processing')->orderBy('id', 'DESC')->take(5)->get();
        $var = "";
        $sl=1;
        foreach($all_processing as $processing)
        {
            $img1 = '/bsd24_assets/processing_complete/'.$processing->sending.'.png'; 
            $img2 = '/bsd24_assets/processing_complete/'.$processing->receiving.'.png'; 
            $var =$var.'<tr>
            <th scope="row" class="hiddenElem2">'.$sl++.'</th>
            <td><img src="" width="25" class="rounded-circle"> <span class="hiddenElem">'.$processing->sending.'</span></td>
            <td><img src="" width="25" class="rounded-circle"> <span class="hiddenElem">'.$processing->receiving.'</span></td>
            <td>'.$processing->to_amount.'</td>
            <td>'.$this->get_full_name($processing->user_email).'</td>
            <td><span class="badge badge-primary">'.date("d-m-Y", strtotime($processing->updated_at)).'</span></td>
            <td><span class="badge badge-warning hiddenElem"> '.$processing->status.'</span></td>
          </tr>'; 
        }


        return $var;
    }

    

    public function read_completed()
    {
        $all_completed = DB::table('exchange_all_record_privates')->where('status','completed')->orderBy('id', 'DESC')->take(5)->get();
        $var = "";
        $sl=1;
        foreach($all_completed as $completed)
        {
            $var =$var.'<tr>
            <th scope="row" class="hiddenElem2">'.$sl++.'</th>
            <td><img src="" width="25" class="rounded-circle"> <span class="hiddenElem">'.$completed->sending.'</span></td>
            <td><img src="" width="25" class="rounded-circle"> <span class="hiddenElem">'.$completed->receiving.'</span></td>
            <td>'.$completed->to_amount.'</td>
            <td>'.$this->get_full_name($completed->user_email).'</td>
            <td><span class="badge badge-primary">'.date("d-m-Y", strtotime($completed->updated_at)).'</span></td>
            <td><span class="badge badge-warning hiddenElem"> '.$completed->status.'</span></td>
          </tr>'; 
        }
        return $var;
    }




}
