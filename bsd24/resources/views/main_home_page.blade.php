
@extends('layout.master')

@section('page_title', "Hompage | Buy & Sell dollar")


@section('index_page')




	<!--SECTION STARTS HERE -->
	<!--Please, place all your div/box/anything inside the above SECTION-->
	<div class="section container" style="">
  		<div class="row">
  			<div class="col-lg-9">
					<form method="post" action="{{URL::to('/exchange_operation_view')}}">
						<div class="box100">
							<div class="row">
									<input type="hidden" id="login_token" name="_token" value="{{csrf_token()}}">
								<div class="col-sm-6">
									<div class="row">
										<div class="col-md-3 imgDivExchange">
											<br>
											<br>
											<img src="{{ URL::asset ('bsd24_assets/bkash_agent.png') }}" id="imgSend" width="80px"
											class="rounded-circle img-thumbnail imgExchange">	
										</div>
										<div class="col-md-9">
											<h4 class="boxHeader"><i class="fa fa-arrow-up"></i> Send</h4>
											<select name="conversion_from" id="moneySend" class="form-control" onchange="funcSend(this.value)">
												<option value="Bkash Agent BDT" >BKash Agent BDT</option>
												<option value="Neteller USD">Neteller USD</option>
												<option value="WebMoney USD">WebMoney USD</option>
												<option value="Rocket Agent BDT">Rocket Agent BDT</option>
												<option value="Nagad Agent BDT">Nagad Agent BDT</option>
												<option value="Skrill USD">Skrill USD</option>
												
											</select>	
											<br>
											<input type="text" id="user_sendVal" value="1" onkeyup="exchange_operation()" class="form-control" name="user_send_value">	
											<br>
											<h6 class="exRate" id="exchangeRate" style="text-align: right;">Buy-Sell rate: 1 USD = 85 BDT</h6>
											<br>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="row">
										<div class="col-md-9">
											<h4 class="boxHeader"><i class="fa fa-arrow-down"></i> Receive</h4>
											<select name="conversion_to" id="moneyReceive" class="form-control" onchange="funcReceive(this.value)">
													<option value="Neteller USD">Neteller USD</option>
													<option value="WebMoney USD">WebMoney USD</option>
													<option value="Bkash Agent BDT">BKash Agent BDT</option>
													<option value="Rocket Agent BDT">Rocket Agent BDT</option>
													<option value="Nagad Agent BDT">Nagad Agent BDT</option>
													<option value="Skrill USD">Skrill USD</option>
													
											</select>	
											<br>
											<input type="text" id="user_receiveVal" class="form-control" name="user_receive_value" readonly>	
											<br>
											<h6 class="exRate" id="reserveAmount">Reserve: 65439.5 BDT</h6>	
											<br>
										</div>
										<div class="col-md-3 imgDivExchange">
											<br>
											<br>
											<img src="{{ URL::asset ('bsd24_assets/neteller.png') }}" id="imgReceive" width="80px"
											class="rounded-circle img-thumbnail imgExchange">	
										</div>
									</div>
								</div>
								
							</div>
							
							<div class="" id="operator_credential" style="background:#d1d8e0;padding:15px; border:1px solid #4b6584;border-radius:5px;display:none;">
								<h6 id="credential_message"></h6>
								<hr style="">
								<input required  class="form-control" style="width:60%;padding:10px;" name="user_operator_no">
							</div>
							<br>
							<h6 style="color:red;font-size:15px;font-style:italic;padding-bottom:4px;" id="user_login_req"></h6>
							<button id="exchange_command" class="btn btn-primary w-100" type="button">Exchange</button>
							<input type="submit" style="display:none;" id="exchange_command2" class="btn-n btn-lg btn-primary" value="Go for Exchange">
						</div>


				</form>

				
				<div class="box2nd95">
					<h5 class="box2ndHeader">Latest Buy Sell (Processing)</h5>
					<div class="tableDiv">

						<table class="table table-striped table-hover">
						  <thead>
						    <tr>
						      <th scope="col" class="hiddenElem2">#</th>
						      <th scope="col">Send</th>
						      <th scope="col">Receive</th>
						      <th scope="col">Amount</th>
						      <th scope="col">User</th>
						      <th scope="col">Date</th>
						      <th scope="col"><span class="hiddenElem">Status</span></th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <th scope="row" class="hiddenElem2">1</th>
						      <td><img src="{{ URL::asset ('bsd24_assets/bkash_agent.png') }}" width="25" class="rounded-circle"> <span class="hiddenElem">BKash Agent</span></td>
						      <td><img src="{{ URL::asset ('bsd24_assets/nagad.jpg') }}" width="25" class="rounded-circle"> <span class="hiddenElem">Nagad</span></td>
						      <td>5000 BDT</td>
						      <td>Mark Otto</td>
						      <td><span class="badge badge-primary">09/11/2019</span></td>
						      <td><span class="badge badge-warning hiddenElem"> Processing</span></td>
						    </tr>
						    <tr>
						      <th scope="row" class="hiddenElem2">2</th>
						      <td><img src="{{ URL::asset ('bsd24_assets/skrill.png') }}" width="25" class="rounded-circle"> <span class="hiddenElem">Skrill</span></td>
						      <td><img src="{{ URL::asset ('bsd24_assets/neteller.png') }}" width="25" class="rounded-circle"> <span class="hiddenElem">Neteller</span></td>
						      <td>5000 BDT</td>
						      <td>John Doe</td>
						      <td><span class="badge badge-primary">09/11/2019</span></td>
						      <td><span class="badge badge-warning hiddenElem"> Processing</span></td>
						    </tr>
						  </tbody>
						</table>

						
					</div>
				</div>
				<div class="box2nd95">
					<h5 class="box2ndHeader">Latest Buy Sell (Completed)</h5>
					<div class="tableDiv">
						<table class="table table-striped table-hover">
						  <thead>
						    <tr>
						      <th scope="col" class="hiddenElem2">#</th>
						      <th scope="col">Send</th>
						      <th scope="col">Receive</th>
						      <th scope="col">Amount</th>
						      <th scope="col">User</th>
						      <th scope="col">Date</th>
						      <th scope="col"><span class="hiddenElem">Status</span></th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <th scope="row" class="hiddenElem2">1</th>
						      <td><img src="{{ URL::asset ('bsd24_assets/bkash_agent.png') }}" width="25" class="rounded-circle"> <span class="hiddenElem">BKash Agent</span></td>
						      <td><img src="{{ URL::asset ('bsd24_assets/city-bank.png') }}" width="25" class="rounded-circle"> <span class="hiddenElem">City Bank</span></td>
						      <td>5000 BDT</td>
						      <td>Mark Otto</td>
						      <td><span class="badge badge-primary">09/11/2019</span></td>
						      <td><span class="badge badge-success hiddenElem"><i class="fa fa-check"></i> Completed</span></td>
						    </tr>
						    <tr>
						      <th scope="row" class="hiddenElem2">2</th>
						      <td><img src="{{ URL::asset ('bsd24_assets/webmoney.png') }}" width="25" class="rounded-circle"> <span class="hiddenElem">WebMoney</span></td>
						      <td><img src="{{ URL::asset ('bsd24_assets/neteller.png') }}" width="25" class="rounded-circle"> <span class="hiddenElem">Neteller</span></td>
						      <td>500 USD</td>
						      <td>Jon Doe</td>
						      <td><span class="badge badge-primary">09/11/2019</span></td>
						      <td><span class="badge badge-success hiddenElem"><i class="fa fa-check"></i> Completed</span></td>
						    </tr>
						  </tbody>
						</table>
					</div>
				</div>
				<div class="box2nd95">
					<h5 class="box2ndHeader">Reviews</h5>
					<section class="lazy slider">
						@foreach ($review as $i)
					    <div class="reviewBox" style="min-height: 200px;">
					      <div class="quoteSignOne"></div>
					      <div class="quoteSignTwo"></div>
					      <p>{{$i->review_comment}}</p>
					      <div class=""></div>
					      <h1>by <span>{{$i->full_name}}</span></h1>
					    </div>
					    @endforeach
				 	</section>
				</div>
			</div>
			<div class="col-lg-3">
  				<div class="box2nd100">
					<h5 class="box2ndHeader">Our Reserve</h5>
					
					@foreach ($all_reserve as $reserve)

					<div class="reserveDiv">
						<img src="{{ URL::asset ('bsd24_assets/reserved_file/'.$reserve->reserve_image)}}" width="50px"
								class="rounded-circle img-thumbnail pull-left">
						<span class="pull-left reserveSpan">
						<span class="mainText">{{$reserve->reserve_name}}</span><br/>
							<span class="text text-muted">{{$reserve->reserve_amount}} {{$reserve->reserve_currency}} </span>
						</span>
					</div> 

					@endforeach
					
					
					
					
					
					
				</div>
				<div class="box2nd100">
					<h5 class="box2ndHeader">Today Exchange Rate</h5>
					<table class="table table-hover">
					  <thead>
					    <tr>
					      <th scope="col">Currency</th>
					      <th scope="col">Buy</th>
					      <th scope="col">Sell</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <td><img src="{{ URL::asset ('bsd24_assets/skrill.png') }}" width="25" class="rounded-circle"> Skrill</td>
					      <td>80</td>
					      <td>100</td>
						</tr>
						<tr>
					    <td><img src="{{ URL::asset ('bsd24_assets/neteller.png') }}" width="25" class="rounded-circle"> Neteller</td>
					      <td>80</td>
					      <td>100</td>
					    </tr>
					    
					  </tbody>
					</table>
				</div>
				<div class="box2nd100">
					<h5 class="box2ndHeader">Track Exchange</h5>
					<div style="padding: 10px;">
						<input type="text" minlength="16" maxlength="17" id="exchange_track" name="" class="form-control">
						<input type="hidden" id="track_token" name="_token" value="{{csrf_token()}}">
						<button type="button" id="track_search" class="btn btn-primary" style="width: 100%; margin-top: 10px;">Track</button>
						<br>
						<h3 id= "status_message_display" style="margin-top:20px;color:green;"></h3>
						<h3 id= "Not_found_track" style="margin-top:20px;color:red;"></h3>
					</div>
				</div>
			</div>
		</div>
		<div>
			<marquee behavior="scroll" direction="left" 
	          onmouseover="this.stop();" 
	          onmouseout="this.start();" style="margin-bottom: -4px; color:#fff;">
	            <img src="{{ URL::asset ('bsd24_assets/nagad.jpg') }}" width="100" class="rounded-circle">
	            <img src="{{ URL::asset ('bsd24_assets/bkash.png') }}" width="100" class="rounded-circle">
	            <img src="{{ URL::asset ('bsd24_assets/rocket.png') }}" width="100" class="rounded-circle">
	            <img src="{{ URL::asset ('bsd24_assets/skrill.png') }}" width="100" class="rounded-circle">
	            <img src="{{ URL::asset ('bsd24_assets/pm.png') }}" width="100" class="rounded-circle">
	            <img src="{{ URL::asset ('bsd24_assets/coinbase.png') }}" width="100" class="rounded-circle">
	            <img src="{{ URL::asset ('bsd24_assets/neteller.png') }}" width="100" class="rounded-circle">
	            <img src="{{ URL::asset ('bsd24_assets/city-bank.png') }}" width="100" class="rounded-circle">
	            <img src="{{ URL::asset ('bsd24_assets/dbbl.png') }}" width="100" class="rounded-circle">
	            <img src="{{ URL::asset ('bsd24_assets/bkash_agent.png') }}" width="100" class="rounded-circle">
	            <img src="{{ URL::asset ('bsd24_assets/rocket_agent.jpg') }}" width="100" class="rounded-circle">
	        </marquee> 
		</div>
	</div>
	<!--Please, place all your div/box/anything inside the above SECTION-->

	<script type="text/javascript">


		$(document).ready(function(){
			$('#exchange_command').click(function(event){
				$.ajax({
					method: "GET",
					url : '/login_check_user',
					data :{
						_token: $('#login_token').val()

					},
					success: function(response){
						console.log(response);
						if(response=="not_login")
						{
							document.getElementById('user_login_req').innerHTML = "Please Login First...";
						}
						else if(response==37)
							{
								var card_or_phone = document.getElementById('moneyReceive').value;

							document.getElementById('credential_message').innerHTML = "Enter Your " + card_or_phone+ " Account mail/card/number";
							document.getElementById('operator_credential').style.display="block";
							document.getElementById('exchange_command').style.display = 'none';
							document.getElementById('exchange_command2').style.display = 'block';

								
							}
						else
						{
							
							document.getElementById('user_login_req').innerHTML ="you have to wait "+ response +" minutes more for next exchange.";

						}
					}

                
            });

		});
	});



	$(document).ready(function(){
		$("#track_search").click(function(event){
			event.preventDefault();
			exchange_track = $('#exchange_track').val();
			//console.log(exchange_track);
			$.ajax({
				method: "GET",
				url: '/track_transaction',
				data :{
                    tracking_id : exchange_track,
                    _token: $('#track_token').val()

                },
				success: function(response)
				{
					//console.log(response);
					if(response=="not_found")
					{
						$("#Not_found_track").text("Not Found..");
					}
					else
					{
						$("#status_message_display").text(response);
					}
				}
			})
		})
	})







		function do_core_operation(factor)
		{
			ffactor = parseFloat(factor);
			send_value = document.getElementById('user_sendVal').value;
			$result = ffactor*parseFloat(send_value);
			//console.log($result);
			document.getElementById('user_receiveVal').value= $result;
		}





		function server_communication(moneySend, moneyReceive)
		{

            $.ajax({
                method: "GET",
                url : '/currency_equivalent/currency_check',
                data :{
                    conversion_from : moneySend,
                    conversion_to : moneyReceive,
                    _token: $('#login_token').val()

                },
                success: function(response){
                    if(response!=0)
                    {
                        do_core_operation(response);
                    }
                    else{
                        console.log(response);
                    }
                }

                
            });
		}

		function exchange_operation()
		{
			var moneySend = $('#moneySend').val();
            var moneyReceive = $('#moneyReceive').val();
			server_communication(moneySend, moneyReceive);
			console.log("I am calling");
		}





		var sendType = "Bkash Agent BDT";
		var receiveType = "Neteller USD";
		function funcSend(val) {
			var value = val;
			sendType = value;
			console.log(value);
			if(value === "Nagad Agent BDT"){
				document.getElementById('imgSend').src = "{{ URL::asset ('bsd24_assets/nagad.jpg') }}";
			}
			else if(value === "Bkash Personal BDT"){
				document.getElementById('imgSend').src = "{{ URL::asset ('bsd24_assets/bkash.png') }}";	
			}
			else if(value === "Bkash Agent BDT"){
				document.getElementById('imgSend').src = "{{ URL::asset ('bsd24_assets/bkash_agent.png') }}";
			}
			else if(value === "Rocket Agent BDT"){
				document.getElementById('imgSend').src = "{{ URL::asset ('bsd24_assets/rocket_agent.jpg') }}";	
			}
			else if(value === "Rocket Personal BDT"){
				document.getElementById('imgSend').src = "{{ URL::asset ('bsd24_assets/rocket.png') }}";	
			}
			else if(value === "Skrill USD"){
				document.getElementById('imgSend').src = "{{ URL::asset ('bsd24_assets/skrill.png') }}";	
			}
			else if(value === "pm"){
				document.getElementById('imgSend').src = "{{ URL::asset ('bsd24_assets/pm.png') }}";
			}
			else if(value === "Neteller USD"){
				document.getElementById('imgSend').src = "{{ URL::asset ('bsd24_assets/neteller.png') }}";
			}
			else if(value === "WebMoney USD"){
				document.getElementById('imgSend').src = "{{ URL::asset ('bsd24_assets/webmoney.png') }}";	
			}
			else if(value === "coinbase"){
				document.getElementById('imgSend').src = "{{ URL::asset ('bsd24_assets/coinbase.png') }}";	
			}
			else if(value === "dbbl"){
				document.getElementById('imgSend').src = "{{ URL::asset ('bsd24_assets/dbbl.png') }}";
			}
			else if(value === "city"){
				document.getElementById('imgSend').src = "{{ URL::asset ('bsd24_assets/city-bank.png') }}";
			}
			else if(value === "payoneer"){
				document.getElementById('imgSend').src = "{{ URL::asset ('bsd24_assets/payoneer.png') }}";	
			}
			else if(value === "paypal"){
				document.getElementById('imgSend').src = "{{ URL::asset ('bsd24_assets/paypal.jpg') }}";	
			}

			exchange_operation();
		}

		function funcReceive(val) {
			
			var value = val;
			receiveType = value;
			console.log(value);
			if(value === "Nagad Agent BDT"){
				document.getElementById('imgReceive').src = "{{ URL::asset ('bsd24_assets/nagad.jpg') }}";
			}
			else if(value === "Bkash Personal BDT"){
				document.getElementById('imgReceive').src = "{{ URL::asset ('bsd24_assets/bkash.png') }}";	
			}
			else if(value === "Bkash Agent BDT"){
				document.getElementById('imgReceive').src = "{{ URL::asset ('bsd24_assets/bkash_agent.png') }}";	
			}
			else if(value === "Rocket Agent BDT"){
				document.getElementById('imgReceive').src = "{{ URL::asset ('bsd24_assets/rocket_agent.jpg') }}";	
			}
			else if(value === "Rocket Personal BDT"){
				document.getElementById('imgReceive').src = "{{ URL::asset ('bsd24_assets/rocket.png') }}";	
			}
			else if(value === "Skrill USD"){
				document.getElementById('imgReceive').src = "{{ URL::asset ('bsd24_assets/skrill.png') }}";	
			}
			else if(value === "pm"){
				document.getElementById('imgReceive').src = "{{ URL::asset ('bsd24_assets/pm.png') }}";	
			}
			else if(value === "Neteller USD"){
				document.getElementById('imgReceive').src = "{{ URL::asset ('bsd24_assets/neteller.png') }}";	
			}
			else if(value === "WebMoney USD"){
				document.getElementById('imgReceive').src = "{{ URL::asset ('bsd24_assets/webmoney.png') }}";	
			}
			else if(value === "coinbase"){
				document.getElementById('imgReceive').src = "{{ URL::asset ('bsd24_assets/coinbase.png') }}";	
			}
			else if(value === "dbbl"){
				document.getElementById('imgReceive').src = "{{ URL::asset ('bsd24_assets/dbbl.png') }}";	
			}
			else if(value === "city"){
				document.getElementById('imgReceive').src = "{{ URL::asset ('bsd24_assets/city-bank.png') }}";	
			}
			else if(value === "payoneer"){
				document.getElementById('imgReceive').src = "{{ URL::asset ('bsd24_assets/payoneer.png') }}";	
			}
			else if(value === "paypal"){
				document.getElementById('imgReceive').src = "{{ URL::asset ('bsd24_assets/paypal.jpg') }}";	
			}

			exchange_operation();
		}

		/* */

		if(sendType === "Bkash Agent BDT" && receiveType === "Neteller USD"){
			var sendRate = 96;
			var receiveRate = 1;
			var sendCurrencyType = " BDT";
			var receiveCurrencyType = " USD";
			var reserveAmount = 13644;
			var reserveCurrencyType = " USD";
			//document.getElementById('sendVal').value = sendRate;
			//document.getElementById('receiveVal').value = receiveRate;

			document.getElementById('exchangeRate').innerHTML = "Buy-Sell rate: "+ sendRate + sendCurrencyType +" = " + receiveRate + receiveCurrencyType;
			document.getElementById('reserveAmount').innerHTML = reserveAmount+" "+reserveCurrencyType;			
			

			/*Do the rest in this way */
		}
		// else if(sendType = .... && receiveType = ....){

	</script>
	

@endsection


	
