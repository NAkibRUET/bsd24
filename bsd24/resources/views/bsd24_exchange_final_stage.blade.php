
@extends('layout.master')
@section('page_title', "Exchange final Operation | Buy & Sell dollar")

@section('dynamic_page')




	<!--SECTION STARTS HERE -->
	<!--Please, place all your div/box/anything inside the above SECTION-->
	<div class="section" style="">
		<div class="box40">
			<div style="border-bottom: 1px solid #e5e5e5; background: #f3f3f3; padding: 10px">
			<h5>{{Session::get('exchange_info.conversion_from')}} <i class="fa fa-exchange"></i> {{Session::get('exchange_info.conversion_to')}}</td></h5>
			</div>
			<div style="border-bottom: 1px solid #e5e5e5; background: #fff; padding: 10px">
				<h6>This exchange is done manually by an operator. Work Time 9:00 am to 11:00pm</h6>
			</div>
			<div style="border-bottom: 1px solid #e5e5e5; background: #f3f3f3; padding: 10px">
			<h6 style="text-align: left; font-weight: bold">Exchange ID <span style="float: right">
				@if(empty(Session::get('exchange_info.bsd24_exchange_id')))
				{{$bsd24_exchange_id}}
				@else
				{{Session::get('exchange_info.bsd24_exchange_id')}}
				@endif
			
			</span></h6>
			</div>
			<div style="border-bottom: 1px solid #e5e5e5; background: #fff; padding: 10px">
			<h6 style="text-align: left;">Amount Send <span style="float: right">{{Session::get('exchange_info.user_send_value')}}</span></h6>
			</div>
			<div style="border-bottom: 1px solid #e5e5e5; background: #f3f3f3; padding: 10px">
			<h6 style="text-align: left;">Amount Receive <span style="float: right">{{Session::get('exchange_info.user_receive_value')}}</span></h6>
			</div>
			<div style="border-bottom: 1px solid #e5e5e5; background: #fff; padding: 10px">
			<h6 style="text-align: left;">Your Neteller Account <span style="float: right">{{Session::get('exchange_info.user_operator_no')}}</span></h6>
			</div>
			
			<div style="border-bottom: 1px solid #e5e5e5; background: #9FCB9F; padding: 10px">
				<h6 style="text-align: left;">Transaction Fee <span style="float: right">0.0</span></h6>
			</div>
			<div style="border-bottom: 1px solid #e5e5e5; background: #9FCB9F; padding: 10px">
			<h6 style="text-align: left;">Total for payment <span style="float: right">{{Session::get('exchange_info.user_send_value')}}</span></h6>
			</div>
			<hr/>
			<p style="font-size:13px;">
				নিচের এই অ্যাকাউন্টে <span style="color:red;font-size:18px;">@if(!empty($money_receiving_credentials)){{$money_receiving_credentials}} @endif </span> পেমেন্ট করে ট্রান্সজেকশন (TrxID:) আইডি নিচে লিখে কনফার্ম বাটনে ক্লিক করুণ। <br>আপনার লেনদেন টি একটা অপারেটরে দ্বারা ম্যানুয়ালি সম্পন্ন হবে, দেরি হলে আমাদের কন্টাক্ট নাম্বারে কল করুন।
			</p>

				<hr>  
            <br>
			<h5>Enter the transaction ID Here</h5>
			<form action="{{URL::to('/bsd24_exchange_final_stage')}}" method="post">
				{{ csrf_field() }}
            	<input class="form-control" name = "transaction_id" id="transaction_id" />
			<input class="form-control" type="hidden" name = "bsd24_exchange_id" id="bsd24_exchange_id" 
			@if(empty(Session::get('exchange_info.bsd24_exchange_id')))
					value="{{$bsd24_exchange_id}}"
			@else
			value="{{Session::get('exchange_info.bsd24_exchange_id')}}"
			@endif
			
			/>
           	 	<br>
				<button type="submit" class="btn btn-success btn-lg" style="width: 45%;">Confirm</button>
			</form>
		</div>
	</div>
    <!--Please, place all your div/box/anything inside the above SECTION-->
    



	@endsection