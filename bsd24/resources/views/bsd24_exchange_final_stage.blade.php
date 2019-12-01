
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
				<h6 style="text-align: left; font-weight: bold">Exchange ID <span style="float: right">365983456983456</span></h6>
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
            <br>
            <h5>Enter the transaction ID Here</h5>
            <input class="form-control"  />
            <br>
			<button class="btn btn-success btn-lg" style="width: 45%;">Confirm</button>
		</div>
	</div>
    <!--Please, place all your div/box/anything inside the above SECTION-->
    



	@endsection