
@extends('layout.master')

@section('page_title', "Hompage | Buy & Sell dollar")


@section('index_page')




	<!--SECTION STARTS HERE -->
	<!--Please, place all your div/box/anything inside the above SECTION-->
	<div class="section container" style="">
  		<div class="row">
  			<div class="col-lg-9">
  				<div class="box100">
  					<div class="row">
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
	  								<select id="moneySend" class="form-control" onchange="funcSend(this.value)">
										  <option value="neteller">Neteller USD</option>
										  <option value="paypal">Paypal USD</option>
										  <option value="payoneer">Payoneer USD</option>
										  <option value="pm">PM USD</option>
										  <option value="coinbase">Coinebase USD</option>
										  <option value="webmoney">WebMoney USD</option>
										  <option value="city">City Bank USD</option>
										  <option value="bkashA" selected>BKash Agent</option>
										  <option value="rocketA">Rocket Agent</option>
										  <option value="nagad">Nagad Agent</option>
										  <option value="skrill">Skrill USD</option>
										  <option value="dbbl">DBBL BDT</option>
	  								</select>	
	  								<br>
	  								<input type="text" id="sendVal" class="form-control" name="">	
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
	  								<select id="moneyReceive" class="form-control" onchange="funcReceive(this.value)">
										  <option value="neteller">Neteller USD</option>
										  <option value="paypal">Paypal USD</option>
										  <option value="payoneer">Payoneer USD</option>
										  <option value="pm">PM USD</option>
										  <option value="coinbase">Coinebase USD</option>
										  <option value="webmoney">WebMoney USD</option>
										  <option value="city">City Bank USD</option>
										  <option value="bkashP">BKash Personal</option>
										  <option value="rocketP">Rocket Personal</option>
										  <option value="nagad">Nagad Agent</option>
										  <option value="skrill">Skrill USD</option>
										  <option value="dbbl">DBBL BDT</option>
	  								</select>	
	  								<br>
	  								<input type="text" id="receiveVal" class="form-control" name="" disabled>	
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
  					
  					<button class="btn btn-primary w-100" type="button">Exchange</button>
				</div>

				
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
					    <div class="reviewBox">
					      <div class="quoteSignOne"></div>
					      <div class="quoteSignTwo"></div>
					      <p>Duis sed odio sit ameta sit mt mauris. Morbi accumsan ipsum velit. Nam nec tellus  odio tincidunt auctor a ornare.</p>
					      <div class=""></div>
					      <h1>by <span>sunita due</span></h1>
					    </div>
					    <div class="reviewBox">
					      <div class="quoteSignOne"></div>
					      <div class="quoteSignTwo"></div>
					      <p>Duis sed odio sit ameta sit mt mauris. Morbi accumsan ipsum velit. Nam nec tellus  odio tincidunt auctor a ornare.</p>
					      <div class=""></div>
					      <h1>by <span>sunita due</span></h1>
					    </div>
					    <div class="reviewBox">
					      <div class="quoteSignOne"></div>
					      <div class="quoteSignTwo"></div>
					      <p>Duis sed odio sit ameta sit mt mauris. Morbi accumsan ipsum velit. Nam nec tellus  odio tincidunt auctor a ornare.</p>
					      <div class=""></div>
					      <h1>by <span>Tahsin</span></h1>
					    </div>
					    <div class="reviewBox">
					      <div class="quoteSignOne"></div>
					      <div class="quoteSignTwo"></div>
					      <p>Duis sed odio sit ameta sit mt mauris. Morbi accumsan ipsum velit. Nam nec tellus  odio tincidunt auctor a ornare.</p>
					      <div class=""></div>
					      <h1>by <span>Nakib</span></h1>
					    </div>
				 	</section>
				</div>
			</div>
			<div class="col-lg-3">
  				<div class="box2nd100">
					<h5 class="box2ndHeader">Our Reserve</h5>	
					<div class="reserveDiv">
						<img src="{{ URL::asset ('bsd24_assets/neteller.png') }}" width="50px"
								class="rounded-circle img-thumbnail pull-left">
						<span class="pull-left reserveSpan">
							<span class="mainText">Neteller USD</span><br/>
							<span class="text text-muted">2357.42 USD </span>
						</span>
					</div> 
					<div class="reserveDiv">
						<img src="{{ URL::asset ('bsd24_assets/paypal.jpg') }}" width="50px"
								class="rounded-circle img-thumbnail pull-left">
						<span class="pull-left reserveSpan">
							<span class="mainText">Paypal USD</span><br/>
							<span class="text text-muted">2357.42 USD </span>
						</span>
					</div> 
					<div class="reserveDiv">
						<img src="{{ URL::asset ('bsd24_assets/payoneer.png') }}" width="50px"
								class="rounded-circle img-thumbnail pull-left">
						<span class="pull-left reserveSpan">
							<span class="mainText">Payoneer USD</span><br/>
							<span class="text text-muted">2357.42 USD </span>
						</span>
					</div> 
					<div class="reserveDiv">
						<img src="{{ URL::asset ('bsd24_assets/pm.png') }}" width="50px"
								class="rounded-circle img-thumbnail pull-left">
						<span class="pull-left reserveSpan">
							<span class="mainText">PM USD</span><br/>
							<span class="text text-muted">2357.42 USD </span>
						</span>
					</div> 
					<div class="reserveDiv">
						<img src="{{ URL::asset ('bsd24_assets/skrill.png') }}" width="50px"
								class="rounded-circle img-thumbnail pull-left">
						<span class="pull-left reserveSpan">
							<span class="mainText">Skrill USD</span><br/>
							<span class="text text-muted">2357.42 USD </span>
						</span>
					</div> 
					<div class="reserveDiv">
						<img src="{{ URL::asset ('bsd24_assets/bkash.png') }}" width="50px"
								class="rounded-circle img-thumbnail pull-left">
						<span class="pull-left reserveSpan">
							<span class="mainText">BKash Personal BDT</span><br/>
							<span class="text text-muted">2357.42 BDT </span>
						</span>
					</div> 
					<div class="reserveDiv">
						<img src="{{ URL::asset ('bsd24_assets/bkash_agent.png') }}" width="50px"
								class="rounded-circle img-thumbnail pull-left">
						<span class="pull-left reserveSpan">
							<span class="mainText">BKash Agent BDT</span><br/>
							<span class="text text-muted">2357.42 BDT </span>
						</span>
					</div> 
					<div class="reserveDiv">
						<img src="{{ URL::asset ('bsd24_assets/rocket.png') }}" width="50px"
								class="rounded-circle img-thumbnail pull-left">
						<span class="pull-left reserveSpan">
							<span class="mainText">Rocket Personal BDT</span><br/>
							<span class="text text-muted">2357.42 BDT </span>
						</span>
					</div> 
					<div class="reserveDiv">
						<img src="{{ URL::asset ('bsd24_assets/rocket_agent.jpg') }}" width="50px"
								class="rounded-circle img-thumbnail pull-left">
						<span class="pull-left reserveSpan">
							<span class="mainText">Rocket Agent BDT</span><br/>
							<span class="text text-muted">2357.42 BDT </span>
						</span>
					</div> 
					<div class="reserveDiv">
						<img src="{{ URL::asset ('bsd24_assets/nagad.jpg') }}" width="50px"
								class="rounded-circle img-thumbnail pull-left">
						<span class="pull-left reserveSpan">
							<span class="mainText">Nagad BDT</span><br/>
							<span class="text text-muted">2357.42 BDT </span>
						</span>
					</div> 
					<div class="reserveDiv">
						<img src="{{ URL::asset ('bsd24_assets/dbbl.png') }}" width="50px"
								class="rounded-circle img-thumbnail pull-left">
						<span class="pull-left reserveSpan">
							<span class="mainText">DBBL BDT</span><br/>
							<span class="text text-muted">2357.42 BDT </span>
						</span>
					</div> 
					<div class="reserveDiv">
						<img src="{{ URL::asset ('bsd24_assets/city-bank.png') }}" width="50px"
								class="rounded-circle img-thumbnail pull-left">
						<span class="pull-left reserveSpan">
							<span class="mainText">City Bank BDT</span><br/>
							<span class="text text-muted">2357.42 BDT </span>
						</span>
					</div> 
					<div class="reserveDiv">
						<img src="{{ URL::asset ('bsd24_assets/webmoney.png') }}" width="50px"
								class="rounded-circle img-thumbnail pull-left">
						<span class="pull-left reserveSpan">
							<span class="mainText">Webmoney USD</span><br/>
							<span class="text text-muted">2357.42 USD </span>
						</span>
					</div> 
					<div class="reserveDiv">
						<img src="{{ URL::asset ('bsd24_assets/coinbase.png') }}" width="50px"
								class="rounded-circle img-thumbnail pull-left">
						<span class="pull-left reserveSpan">
							<span class="mainText">Coinbase USD</span><br/>
							<span class="text text-muted">2357.42 USD </span>
						</span>
					</div> 
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
					    <td><img src="{{ URL::asset ('bsd24_assets/neteller.png') }}" width="25" class="rounded-circle"> Neteller</td>
					      <td>80</td>
					      <td>100</td>
					    </tr>
					    <td><img src="{{ URL::asset ('bsd24_assets/paypal.jpg') }}" width="25" class="rounded-circle"> Paypal</td>
					      <td>80</td>
					      <td>100</td>
					    </tr>
					    <td><img src="{{ URL::asset ('bsd24_assets/payoneer.png') }}" width="25" class="rounded-circle"> Payoneer</td>
					      <td>80</td>
					      <td>100</td>
					    </tr>
					    <td><img src="{{ URL::asset ('bsd24_assets/webmoney.png') }}" width="25" class="rounded-circle"> WebMoney</td>
					      <td>80</td>
					      <td>100</td>
					    </tr>
					    <td><img src="{{ URL::asset ('bsd24_assets/pm.png') }}" width="25" class="rounded-circle"> PM</td>
					      <td>80</td>
					      <td>100</td>
					    </tr>
					    <td><img src="{{ URL::asset ('bsd24_assets/coinbase.png') }}" width="25" class="rounded-circle"> Coinbase</td>
					      <td>80</td>
					      <td>100</td>
					    </tr>
					  </tbody>
					</table>
				</div>
				<div class="box2nd100">
					<h5 class="box2ndHeader">Track Exchange</h5>
					<div style="padding: 10px;">
						<input type="text" name="" class="form-control">
						<button type="button" class="btn btn-primary" style="width: 100%; margin-top: 10px;">Track</button>
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
		var sendType = "bkashA";
		var receiveType = "neteller";
		function funcSend(val) {
			var value = val;
			sendType = value;
			console.log(value);
			if(value === "nagad"){
				document.getElementById('imgSend').src = "{{ URL::asset ('bsd24_assets/nagad.jpg') }}";
			}
			else if(value === "bkashP"){
				document.getElementById('imgSend').src = "{{ URL::asset ('bsd24_assets/bkash.png') }}";	
			}
			else if(value === "bkashA"){
				document.getElementById('imgSend').src = "{{ URL::asset ('bsd24_assets/bkash_agent.png') }}";
			}
			else if(value === "rocketA"){
				document.getElementById('imgSend').src = "{{ URL::asset ('bsd24_assets/rocket_agent.jpg') }}";	
			}
			else if(value === "rocketP"){
				document.getElementById('imgSend').src = "{{ URL::asset ('bsd24_assets/rocket.png') }}";	
			}
			else if(value === "skrill"){
				document.getElementById('imgSend').src = "{{ URL::asset ('bsd24_assets/skrill.png') }}";	
			}
			else if(value === "pm"){
				document.getElementById('imgSend').src = "{{ URL::asset ('bsd24_assets/pm.png') }}";
			}
			else if(value === "neteller"){
				document.getElementById('imgSend').src = "{{ URL::asset ('bsd24_assets/neteller.png') }}";
			}
			else if(value === "webmoney"){
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
		}

		function funcReceive(val) {
			var value = val;
			receiveType = value;
			console.log(value);
			if(value === "nagad"){
				document.getElementById('imgReceive').src = "{{ URL::asset ('bsd24_assets/nagad.jpg') }}";
			}
			else if(value === "bkashP"){
				document.getElementById('imgReceive').src = "{{ URL::asset ('bsd24_assets/bkash.png') }}";	
			}
			else if(value === "bkashA"){
				document.getElementById('imgReceive').src = "{{ URL::asset ('bsd24_assets/bkash_agent.png') }}";	
			}
			else if(value === "rocketA"){
				document.getElementById('imgReceive').src = "{{ URL::asset ('bsd24_assets/rocket_agent.jpg') }}";	
			}
			else if(value === "rocketP"){
				document.getElementById('imgReceive').src = "{{ URL::asset ('bsd24_assets/rocket.png') }}";	
			}
			else if(value === "skrill"){
				document.getElementById('imgReceive').src = "{{ URL::asset ('bsd24_assets/skrill.png') }}";	
			}
			else if(value === "pm"){
				document.getElementById('imgReceive').src = "{{ URL::asset ('bsd24_assets/pm.png') }}";	
			}
			else if(value === "neteller"){
				document.getElementById('imgReceive').src = "{{ URL::asset ('bsd24_assets/neteller.png') }}";	
			}
			else if(value === "webmoney"){
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
		}

		/* */

		if(sendType === "bkashA" && receiveType === "neteller"){
			var sendRate = 96;
			var receiveRate = 1;
			var sendCurrencyType = " BDT";
			var receiveCurrencyType = " USD";
			var reserveAmount = 13644;
			var reserveCurrencyType = " USD";
			document.getElementById('sendVal').value = sendRate;
			document.getElementById('receiveVal').value = receiveRate;

			document.getElementById('exchangeRate').innerHTML = "Buy-Sell rate: "+ sendRate + sendCurrencyType +" = " + receiveRate + receiveCurrencyType;
			document.getElementById('reserveAmount').innerHTML = reserveAmount+" "+reserveCurrencyType;			
			

			/*Do the rest in this way */
		}
		// else if(sendType = .... && receiveType = ....){

	</script>
	

@endsection


	
