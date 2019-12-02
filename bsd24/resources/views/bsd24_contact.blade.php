
@extends('layout.master')
@section('page_title', "Contact us | Buy & Sell dollar")

@section('dynamic_page')

	<!--SECTION STARTS HERE -->
	<!--Please, place all your div/box/anything inside the above SECTION-->
	<div class="section" style="">
		<div class="box70">
			<h5 class="boxHeader">Contact Us:</h5>
			<div class="row">
				<div class="col-md-3" style="border-right: 1px solid #e5e5e5">
					<div style="padding: 15px 0px;">
						<h6 style="font-weight: bold; color: #7f7f7f;">Skype:</h6>
						<h6 style="color: #7f7f7f;">live:bsd24</h6>
						<h6 style="font-weight: bold; color: #7f7f7f;">Hotline:</h6>
						<h6 style="color: #7f7f7f;">01963123243</h6>
						<h6 style="font-weight: bold; color: #7f7f7f;">Email:</h6>
						<h6 style="color: #7f7f7f;">info@bsd24.com</h6>
					</div>
				</div>
				<div class="col-md-9">
				
					<div style="padding: 0px 20px;"> 
						<div class="alertDanger" id="alertDanger" style="display: none;">
						  	
						</div>
						<div class="alertSuccess" id="alertSuccess" style="display: none;">
					  	
					 	</div>
						<form id="contactForm">
							<input type="hidden" id="login_token" name="_token" value="{{csrf_token()}}">
						 	<label for="nameOfUser">Name:</label>
						 	<input required id="nameOfUser" type="text" name="nameOfUser" placeholder="Enter your name" class="form-control" autocomplete="off">
						 	<br>
						 	<label for="email">Email:</label>
						 	<input required id="email" type="email" name="email" placeholder="Enter your email" class="form-control" onfocusout="validator(this.value)">
						 	<br>
						 	<label for="subject">Subject:</label>
						 	<input required id="subject" type="text" name="subject" placeholder="Enter the subject of your message" class="form-control" autocomplete="off">
						 	<br>
						 	<label for="message">Message:</label>
						 	<textarea required id="message" class="form-control"  placeholder="Enter your message here" rows="5" onkeyup="message_size(this)"></textarea>
						 	<div id="sizeControl"></div>
							<br>
						 	<button type="submit" id="sendMessage" class="btn btn-success">Send Message</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Please, place all your div/box/anything inside the above SECTION-->

<script type="text/javascript">
const pat5 = new RegExp(/\S+@\S+\.\S+/);
function validator(inputvalue){
	let userEmail = inputvalue;
	if(userEmail!=""){
		pat5.test(userEmail)?document.getElementById('alertDanger').style.display = 'none':document.getElementById('alertDanger').style.display = 'block';
			document.getElementById('alertDanger').innerHTML = '<i class="fa fa-times"></i> Invalid Email Address';	
	}
	else{
		document.getElementById('alertDanger').style.display = 'none';
	}

}
function message_size(data){
	let str = data.value;
	let size = str.length;
	//console.log(size);
	if(size>500 && size<=550){
		let left = 550-size;
		document.getElementById('sizeControl').innerHTML = '<h6 style="color:#7f7f7f;margin-top:5px;">You have only '+left+' characters left</h5>';
		document.getElementById('sendMessage').style.marginTop = "-25px";
		document.getElementById('sendMessage').disabled = false;
		
	}
	if(size>550){
		document.getElementById('sizeControl').innerHTML = '<h6 style="color:red;margin-top:5px;">You should not exceed 550 characters</h5>';
		document.getElementById('sendMessage').disabled = true;
		document.getElementById('sendMessage').style.marginTop = "-25px";
		
	}
	if(size<=500){
		document.getElementById('sizeControl').innerHTML = '';
		document.getElementById('sendMessage').style.marginTop = "0px";
		document.getElementById('sendMessage').disabled = false;
	}
}

$(document).ready(function(){
  $("#sendMessage").click(function(event){
    event.preventDefault();
    let userName = $('#nameOfUser').val();
    let userEmail = $('#email').val();
    let subject = $('#subject').val();
    let message = $('#message').val();
    console.log(message);
   	if(message.length<=550){
	    $.ajax({
	        method: "POST",
	        url : '/contact_us',
	        dataType:"json",
	        data :{
	        	_token: $('#login_token').val(), 
	        	userName: userName, 
	        	userEmail: userEmail, 
	        	subject: subject, 
	        	message: message  
	        },
	        success: function(response){
	            //console.log(response.a);
	            
	            if(response.a=="ok")
	            {
	            	document.getElementById('alertDanger').style.display = 'none';
	            	document.getElementById('alertSuccess').style.display = 'block';
	            	document.getElementById('alertSuccess').innerHTML = "<i class='fa fa-check'></i> Successfully submitted message, we will contact with you by your email soon.";	 
	            	document.getElementById('sendMessage').disabled = true;
	            	
	            }
	            else if(response.a=="failed")
	            {
	            	document.getElementById('alertDanger').style.display = 'block';
	            	document.getElementById('alertDanger').innerHTML = '<i class="fa fa-times"></i> '+response.b;	 
	            }
	        },
	        error: (error)=>{
	        	console.log(JSON.stringify(error));
	        } 
	    })
	}
    
  });
});

</script>

@endsection