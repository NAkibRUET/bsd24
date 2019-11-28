
@extends('layout.master')
@section('page_title', "Profile | Buy & Sell dollar")

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
				<div class="col-md-4">
					
					<div style="font-family: Helvetica; background: white; border: 1px solid #e5e5e5; margin-top: 10px; ">
						<center><div id="profileImage"></div></center>	
						<div class="profileInfo">
							@if (Session::has('user_info'))
								<h2 style="text-align: center; color: #1B6DC1;">{{ Session::get('user_info.name') }}</h2>
								<h6 style="text-align: center; color: #7f7f7f;">Email: {{ Session::get('user_info.email') }}</h6>
								<h6 style="text-align: center; color: #7f7f7f;">Mobile: {{ Session::get('user_info.mobile') }}</h6>
							@endif
						</div>
					</div>
					

				</div>
				<div class="col-md-8">
					<div class="box2nd100">
						<h5 class="box2ndHeader">Transaction History</h5>
						<div class="tableDiv">
						<table class="table table-striped table-hover">
						  <thead>
						    <tr>
						      <th scope="col" class="hiddenElem2">#</th>
						      <th scope="col">Send</th>
						      <th scope="col">Receive</th>
						      <th scope="col">Amount</th>
						      <th scope="col">Date</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <th scope="row" class="hiddenElem2">1</th>
						      <td><img src="{{ URL::asset ('bsd24_assets/bkash_agent.png') }}" width="25" class="rounded-circle"> <span class="hiddenElem">BKash Agent</span></td>
						      <td><img src="{{ URL::asset ('bsd24_assets/nagad.jpg') }}" width="25" class="rounded-circle"> <span class="hiddenElem">Nagad</span></td>
						      <td>5000 BDT</td>
						      <td><span class="badge badge-primary">09/11/2019</span></td>
						    </tr>
						    <tr>
						      <th scope="row" class="hiddenElem2">2</th>
						      <td><img src="{{ URL::asset ('bsd24_assets/bkash_agent.png') }}" width="25" class="rounded-circle"> <span class="hiddenElem">BKash Agent</span></td>
						      <td><img src="{{ URL::asset ('bsd24_assets/nagad.jpg') }}" width="25" class="rounded-circle"> <span class="hiddenElem">Nagad</span></td>
						      <td>5000 BDT</td>
						      <td><span class="badge badge-primary">09/11/2019</span></td>
						    </tr>
						    <tr>
						      <th scope="row" class="hiddenElem2">3</th>
						      <td><img src="{{ URL::asset ('bsd24_assets/bkash_agent.png') }}" width="25" class="rounded-circle"> <span class="hiddenElem">BKash Agent</span></td>
						      <td><img src="{{ URL::asset ('bsd24_assets/nagad.jpg') }}" width="25" class="rounded-circle"> <span class="hiddenElem">Nagad</span></td>
						      <td>5000 BDT</td>
						      <td><span class="badge badge-primary">09/11/2019</span></td>
						    </tr>
						    <tr>
						      <th scope="row" class="hiddenElem2">4</th>
						      <td><img src="{{ URL::asset ('bsd24_assets/bkash_agent.png') }}" width="25" class="rounded-circle"> <span class="hiddenElem">BKash Agent</span></td>
						      <td><img src="{{ URL::asset ('bsd24_assets/nagad.jpg') }}" width="25" class="rounded-circle"> <span class="hiddenElem">Nagad</span></td>
						      <td>5000 BDT</td>
						      <td><span class="badge badge-primary">09/11/2019</span></td>
						    </tr>
						    <tr>
						      <th scope="row" class="hiddenElem2">5</th>
						      <td><img src="{{ URL::asset ('bsd24_assets/bkash_agent.png') }}" width="25" class="rounded-circle"> <span class="hiddenElem">BKash Agent</span></td>
						      <td><img src="{{ URL::asset ('bsd24_assets/nagad.jpg') }}" width="25" class="rounded-circle"> <span class="hiddenElem">Nagad</span></td>
						      <td>5000 BDT</td>
						      <td><span class="badge badge-primary">09/11/2019</span></td>
						    </tr>
						  </tbody>
						</table>
					</div>
					<nav aria-label="Page navigation example">
					  <ul class="pagination justify-content-center">
					    <li class="page-item disabled">
					      <a class="page-link" href="#" tabindex="-1">Previous</a>
					    </li>
					    <li class="page-item"><a class="page-link" href="#">1</a></li>
					    <li class="page-item"><a class="page-link" href="#">2</a></li>
					    <li class="page-item"><a class="page-link" href="#">3</a></li>
					    <li class="page-item">
					      <a class="page-link" href="#">Next</a>
					    </li>
					  </ul>
					</nav>
					<br>
				  </div>
				</div>
			</div>
		</div>
		
		
		
	</div>
	<!--Please, place all your div/box/anything inside the above SECTION-->
<script type="text/javascript">
$(document).ready(function(){
	var fullName = $('#hiddenName').val();
	var res = fullName.split(" ");
  	var firstName = res[0];
  	console.log(res.length);
  	if(res.length>1){
 		var lastName = res[1];
 	}
 	console.log(res[0]);
 	if(res.length>1){
 		var intials = firstName.charAt(0) + lastName.charAt(0);
 	}
 	else{
 		var intials = firstName.charAt(0);	
 	}
  	var profileImage = $('#profileImage').text(intials);
});
</script>


@endsection