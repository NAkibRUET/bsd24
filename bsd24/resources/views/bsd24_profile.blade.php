
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
					<button onclick="review_toggle()" class="btn btn-sm btn-success btn-block">make a review for this service</button>

					<div class="reviewform" id="review_box">
						<h5 style="color:#1B6DC1">Review this website</h5>
						
						<form id="reviewform">
							<input type="hidden" id="login_token" name="_token" value="{{csrf_token()}}">
							<textarea required id="review" class="form-control"  placeholder="Enter your review here" rows="3" onkeyup="review_size(this)"></textarea>
							<div id="sizeControl"></div>
							<br>
							<button type="button" id="reviewBtn" class="btn btn-primary form-control">Submit Review</button>
						</form>
					</div>

					<!--present transaction-->

					<div class="reviewform">
						<h6 style="color:#1B6DC1">~ Abort Options ~</h6>
						<hr>
					<button class="btn btn-danger"><a href="{{URL::to('/logout')}}" style="color:white;" onclick="return confirm('Are you sure to logout?');">Log Out</a></button>
						
						
						
					</div>


				</div>
				<div class="col-md-8">
					<div class="box2nd100">
						<h5 class="box2ndHeader">Transaction History</h5>
						<div class="tableDiv">
						<table class="table table-bordered table-hover">
						  <thead>
						    <tr>
						     
						      <th scope="col">Sent</th>
						      <th scope="col">Received</th>
						      <th scope="col">Tracking id</th>
						      
						      <th scope="col">Date/time</th>
						      <th scope="col">Status</th>
						    </tr>
						  </thead>
						  <tbody>
						@foreach($transaction_history as $transaction)
						    <tr>
							<td>{{$transaction->sending}}</td>
							<td>{{$transaction->receiving}}</td>
							<td><a href="all_transaction_info/{{$transaction->exchange_tracking_id}}">{{$transaction->exchange_tracking_id}}</a></td>
								
								<td>{{$transaction->created_at}}</td>
								<td>{{$transaction->status}}</td>
									
									
						    </tr>
						 @endforeach
						   
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

document.getElementById("review_box").style.display="none";

function review_toggle()
{
	var x = document.getElementById("review_box");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}






function review_size(data){
	let str = data.value;
	let size = str.length;
	//console.log(size);
	if(size>200 && size<=250){
		let left = 250-size;
		document.getElementById('sizeControl').innerHTML = '<h6 style="color:#7f7f7f;margin-top:5px;">You have only '+left+' characters left</h5>';
		document.getElementById('reviewBtn').style.marginTop = "-25px";
		document.getElementById('reviewBtn').disabled = false;
		
	}
	if(size>250){
		document.getElementById('sizeControl').innerHTML = '<h6 style="color:red;margin-top:5px;">You should not exceed 250 characters</h5>';
		document.getElementById('reviewBtn').disabled = true;
		document.getElementById('reviewBtn').style.marginTop = "-25px";
		
	}
	if(size<=200){
		document.getElementById('sizeControl').innerHTML = '';
		document.getElementById('reviewBtn').style.marginTop = "0px";
		document.getElementById('reviewBtn').disabled = false;
	}
}
$(document).ready(function(){
	var fullName = $('#hiddenName').val();
	var res = fullName.split(" ");
  	var firstName = res[0].toUpperCase();
  	//console.log(res.length);
  	if(res.length>1){
 		var lastName = res[1].toUpperCase();
 	}
 	//console.log(res[0]);
 	if(res.length>1){
 		var intials = firstName.charAt(0) + lastName.charAt(0);
 	}
 	else{
 		var intials = firstName.charAt(0);	
 	}
  	var profileImage = $('#profileImage').text(intials);
});

$(document).ready(function(){
  $("#reviewBtn").click(function(event){
    event.preventDefault();
    let userName = $('#hiddenName').val();
    let review = $('#review').val();
    //console.log(review);
   	if(review.length<=250){
	    $.ajax({
	        method: "POST",
	        url : '/review',
	        dataType:"json",
	        data :{
	        	_token: $('#login_token').val(), 
	        	userName: userName, 
	        	review: review,  
	        },
	        success: function(response){
	            //console.log(response.a);
	            
	            if(response.a=="ok")
	            {
	            	document.getElementById('sizeControl').innerHTML = '<h6 style="color:green;margin-top:5px;">Successfully submitted review!</h5>';
	            	document.getElementById('reviewBtn').style.marginTop = "-25px";
	            	document.getElementById('reviewBtn').disabled = true;
	            	document.getElementById('review').value = '';
	            }
	            else if(response.a=="failed")
	            {
	            	document.getElementById('sizeControl').innerHTML = '<h6 style="color:red;margin-top:5px;">'+response.b+'</h6>';	 
	            	document.getElementById('reviewBtn').style.marginTop = "-25px";
	            }
	        },
	        error: (error)=>{
	        	console.log(JSON.stringify(error));
	        } 
	    })
	}
	else{
		document.getElementById('sizeControl').innerHTML = '<h6 style="color:red;margin-top:5px;">You should not exceed 250 characters</h5>';
	}
    
  });
});

</script>


@endsection