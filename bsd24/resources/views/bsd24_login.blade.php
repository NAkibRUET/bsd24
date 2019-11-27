
@extends('layout.master')
@section('page_title', "Sign In | Buy & Sell dollar")

@section('dynamic_page')




	<!--SECTION STARTS HERE -->
	<!--Please, place all your div/box/anything inside the above SECTION-->
	<div class="section" style="">
		<div class="box30">

			<div class="alertDanger" id="alertDanger" style="display: none;">		  	 
			</div>
			<div class="alertSuccess" style="display: none;" id="alertSuccess">  	
			</div>

			 <h5 class="boxHeader">Login:</h5>
			 
			 <form method="post">
			 	<input type="hidden" id="login_token" name="_token" value="{{csrf_token()}}">
			 	<label for="email">Email:</label>
			 	<input required id="userEmail" type="email" name="email" placeholder="Enter your email" class="form-control" autocomplete="off" onfocusout="validator(this.value)">
			 	<br>
			 	<label for="password">Password:</label>
			 	<input required id="password" type="password" name="password" placeholder="Enter your password"  class="form-control">
			 	<br>
			 	<div class="user-option">
					<div class="checkbox pull-left">
						<label><input type="checkbox" name="remember_me" value="yes"> Remember me</label>
					</div>
					<div class="pull-right forgot-password">
						<a href="#">Forgot password?</a>
					</div>
				</div>
				<br>
				<br>
			 	<button type="submit" id="loginBtn" class="btn btn-success">Login</button>
			 </form>
		</div>
		<br>
		<center><a href="{{URL::to('/sign_up')}}" class="btn btn-primary" style="width: 30%; font-family: Helvetica">Create New Account</button></a></center>
	</div>
	<!--Please, place all your div/box/anything inside the above SECTION-->
<script type="text/javascript">


const pat5 = new RegExp(/\S+@\S+\.\S+/);
function pageRedirect_to_home() {
    window.location.replace("{{URL::to('/')}}");
} 
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
$(document).ready(function(){
  $("#loginBtn").click(function(event){
    event.preventDefault();
    var userEmail = $('#userEmail').val();

    var password = $('#password').val();
   
    if(pat5.test(userEmail)){
        $.ajax({
            method: "POST",
            url : '/login',
            dataType:"json",
            data :{
            	_token: $('#login_token').val(), 
            	userEmail: userEmail, 
            	password: password,  
            },
            success: function(response){
                console.log(response.a);
                
                if(response.a=="ok")
                {
                	document.getElementById('alertDanger').style.display = 'none';
                    document.getElementById('alertSuccess').style.display = 'block';
					document.getElementById('alertSuccess').innerHTML = '<i class="fa fa-check"></i> Login Successfull.';
					setTimeout("pageRedirect_to_home()", 2000);
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
		document.getElementById('alertDanger').style.display = 'block';
		document.getElementById('alertDanger').innerHTML = '<i class="fa fa-times"></i> Please Enter Valid Email Address';	
	
    }
  });
});

</script>



	@endsection