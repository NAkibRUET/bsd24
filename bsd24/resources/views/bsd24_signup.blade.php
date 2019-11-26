
@extends('layout.master')
@section('page_title', "Sign In | Buy & Sell dollar")

@section('dynamic_page')

	<!--SECTION STARTS HERE -->
	<!--Please, place all your div/box/anything inside the above SECTION-->
	
	<div class="section" style="">
		<div class="box40">
		<!--For Alert Messages Use the Following-->
			
			
			 <div class="alertDanger" id="alertDanger" style="display: none;">
			 </div>
			
			 <div class="alertSuccess" style="display: none;" id="alertSuccess">
			 </div>

		
			 <h5 class="boxHeader">Sign Up:</h5>
			 <form id="signUpForm">
			 	<input type="hidden" id="login_token" name="_token" value="{{csrf_token()}}">
                <label for="nameOfUser">Name:*</label>
			 	<input required id="nameOfUser" type="text" name="nameOfUser" placeholder="Enter your name" class="form-control" autocomplete="off" onkeyup="validator(this)">
			 	
			 	<label for="userEmail">Email:</label>
			 	<input required id="userEmail" type="email" name="email" placeholder="Enter your email" class="form-control" autocomplete="off" onfocusout="validator(this)">
			 	
			 	<label for="mobile">Mobile No:*</label>
			 	<input required id="mobile" type="text" name="mobile" placeholder="Enter your mobile no" class="form-control" autocomplete="off" onfocusout="validator(this)">
			 	
			 	
			 	<label for="password">Password:*</label>
			 	<input required id="password" type="password" name="password" placeholder="Enter your password"  class="form-control">
			 	
			 	<label for="RetypePassword">Confirm Password:*</label>
			 	<input required id="RetypePassword" type="password" name="RetypePassword" placeholder="Enter your password again"  class="form-control" onchange="validator(this)">
			 	
			 	<div class="user-option">
					<div class="checkbox">
						<label><input type="checkbox" name="remember_me" value="yes"> I agree to the <a href="#">Term & Conditions</a></label>
					</div>
				</div>
				
			 	<button type="submit" id="signUpBtn" class="btn btn-success">Create Account</button>
			</form>
		</div>
		
	</div>
	<!--Please, place all your div/box/anything inside the above SECTION-->

<script type="text/javascript">

const pat1 = new RegExp(/(\%27)|(\')|(\-\-)|(\%23)|(#)/i);
const pat2 = new RegExp(/[1-9][0-9]*|0/);
const pat3 = new RegExp(/[-!$%^&*()_+|~=`{}\[\]:";'<>?,.\/]/);
const pat4 = new RegExp(/(^(\+88|0088)?(01|09){1}[56789]{1}(\d){8})$/);
const pat5 = new RegExp(/\S+@\S+\.\S+/);
function validator(inputData){
	if(inputData.id=="nameOfUser"){
		let name = document.getElementById('nameOfUser').value;
		if(name != ""){
			if(pat1.test(name) || pat2.test(name) || pat3.test(name)) {
				document.getElementById('alertDanger').style.display = 'block';
				document.getElementById('alertDanger').innerHTML = '<i class="fa fa-times"></i> Invalid Name';
			}
			else{
				document.getElementById('alertDanger').style.display = 'none';
			}
		}
		else{
			document.getElementById('alertDanger').style.display = 'none';
		}
	}
	else if(inputData.id=="mobile"){
		let mobile = document.getElementById('mobile').value;
		if(mobile!=""){
			pat4.test(mobile)?document.getElementById('alertDanger').style.display = 'none':document.getElementById('alertDanger').style.display = 'block';
				document.getElementById('alertDanger').innerHTML = '<i class="fa fa-times"></i> Invalid Mobile Number';	
		}
		else{
			document.getElementById('alertDanger').style.display = 'none';
		}
	}
	else if(inputData.id=="userEmail"){
		let userEmail = document.getElementById('userEmail').value;	
		if(userEmail!=""){
			pat5.test(userEmail)?document.getElementById('alertDanger').style.display = 'none':document.getElementById('alertDanger').style.display = 'block';
				document.getElementById('alertDanger').innerHTML = '<i class="fa fa-times"></i> Invalid Email Address';	
		}
		else{
			document.getElementById('alertDanger').style.display = 'none';
		}
	}

}
$(document).ready(function(){
  $("#signUpBtn").click(function(event){
    event.preventDefault();
    var nameError = 0;
    var mobileError = 0;
    var emailError = 0;
    var fullName = $('#nameOfUser').val();
    var userEmail = $('#userEmail').val();
    var mobile = $('#mobile').val();
    var password = $('#password').val();
    var RetypePassword = $('#RetypePassword').val();
   
    if(pat1.test(fullName) || pat2.test(fullName) || pat3.test(fullName)) {
		nameError = 1;	
	}
	if(pat4.test(mobile)) {
		
	}
	else{
		mobileError = 1;	
	}
    if(password === RetypePassword && nameError == 0 && mobileError == 0){
        $.ajax({
            method: "POST",
            url : '/sign_up/request',
            dataType:"json",
            data :{
            	_token: $('#login_token').val(),
            	fullName: fullName, 
            	userEmail: userEmail, 
            	mobile: mobile, 
            	password: password,  
            },
            success: function(response){
                console.log(response.a);
                
                if(response.a=="ok")
                {
                	document.getElementById('alertDanger').style.display = 'none';
                    document.getElementById('alertSuccess').style.display = 'block';
					document.getElementById('alertSuccess').innerHTML = '<i class="fa fa-check"></i> Successfully Registered, Please Login.';
                }
                else if(response.a=="failed")
                {
                	document.getElementById('alertDanger').style.display = 'block';
                	document.getElementById('alertSuccess').style.display = 'none';
                	response.b == ""?document.getElementById('alertDanger').innerHTML = '<i class="fa fa-times"></i> Something went wrong, Please try again'
					:document.getElementById('alertDanger').innerHTML = '<i class="fa fa-times"> '+response.b;	 
                }
            },
            error: (error)=>{
            	console.log(JSON.stringify(error));
            } 
        })
		document.getElementById('alertDanger').style.display = 'none';			
    }
    else{
    	if(nameError == 1){
	    	document.getElementById('alertDanger').style.display = 'block';
			document.getElementById('alertDanger').innerHTML = '<i class="fa fa-times"></i> Invalid Name';
		}
		else if(mobileError == 1){
			document.getElementById('alertDanger').style.display = 'block';
			document.getElementById('alertDanger').innerHTML = '<i class="fa fa-times"></i> Invalid Mobile';	
		}
		else{
			document.getElementById('alertDanger').style.display = 'block';
			document.getElementById('alertDanger').innerHTML = '<i class="fa fa-times"></i> Password and Confirm Password should be same';	
		}
    }
  });
});

</script>

@endsection