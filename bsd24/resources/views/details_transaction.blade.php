
@extends('layout.master')
@section('page_title', "Details Transaction | Buy & Sell dollar")

@section('dynamic_page')

	<!--SECTION STARTS HERE -->
	<!--Please, place all your div/box/anything inside the above SECTION-->
	@if (Session::has('user_info'))
		<input type="hidden" id="hiddenName" name="fullName" value="{{ Session::get('user_info.name') }}">
	@endif
	
	<div class="section" style="">
		<img src="{{ URL::asset ('bsd24_assets/n10.jpg') }}" class="brandImage">
		<div class="container">
			
			<div class="row">
				
				<div class="col-md-12">
					<div class="box2nd100">
                    <h5 class="box2ndHeader">Transaction Details for <b>{{$one_transaction->exchange_tracking_id}}</b></h5>
						<div class="tableDiv">
						<table class="table table-bordered table-hover">
						  <thead>
						    <tr>
						     
						      <th scope="col">Sent</th>
						      <th scope="col">Received</th>
						      <th scope="col">Sent Amount</th>
                              <th scope="col">Received Amount</th>
                              <th scope="col"> Transaction</th>
                    
                              
						      
						      <th scope="col">Date/time</th>
						      <th scope="col">Status</th>
						    </tr>
						  </thead>
						  <tbody>
						
						    <tr>
							<td>{{$one_transaction->sending}}</td>
							<td>{{$one_transaction->receiving}}</td>
							<td>{{$one_transaction->from_amount}}</td>
							<td>{{$one_transaction->to_amount}}</td>
							<td>{{$one_transaction->transaction}}</td>
							
								
							<td>{{$one_transaction->created_at}}</td>
							<td>{{$one_transaction->status}}</td>
									
									
						    </tr>
						 
						   
						  </tbody>
						</table>
					</div>
				
					<br>
				  </div>
				</div>
			</div>
		</div>
		
		
		
	</div>
	<!--Please, place all your div/box/anything inside the above SECTION-->


@endsection