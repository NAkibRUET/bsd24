
@extends('layout.master')
@section('page_title', "Exchange Operation | Buy & Sell dollar")

@section('dynamic_page')




	<!--SECTION STARTS HERE -->
	<!--Please, place all your div/box/anything inside the above SECTION-->
	<div class="section" style="">
		<div class="box40">
			<div style="border-bottom: 1px solid #e5e5e5; background: #f3f3f3; padding: 10px">
				<h5>bKash Agent <i class="fa fa-exchange"></i> Neteller USD</td></h5>
			</div>
			<div style="border-bottom: 1px solid #e5e5e5; background: #fff; padding: 10px">
				<h6>This exchange is done manually by an operator. Work Time 9:00 am to 11:00pm</h6>
			</div>
			<div style="border-bottom: 1px solid #e5e5e5; background: #f3f3f3; padding: 10px">
				<h6 style="text-align: left; font-weight: bold">Exchange ID <span style="float: right">365983456983456</span></h6>
			</div>
			<div style="border-bottom: 1px solid #e5e5e5; background: #fff; padding: 10px">
				<h6 style="text-align: left;">Amount Send <span style="float: right">365983456983456</span></h6>
			</div>
			<div style="border-bottom: 1px solid #e5e5e5; background: #f3f3f3; padding: 10px">
				<h6 style="text-align: left;">Amount Receive <span style="float: right">365983456983456</span></h6>
			</div>
			<div style="border-bottom: 1px solid #e5e5e5; background: #fff; padding: 10px">
				<h6 style="text-align: left;">Your Neteller Account <span style="float: right">365983456983456</span></h6>
			</div>
			<div style="border-bottom: 1px solid #e5e5e5; background: #f3f3f3; padding: 10px">
				<h6 style="text-align: left;">Bkash Agent Fee <span style="float: right">365983456983456</span></h6>
			</div>
			<div style="border-bottom: 1px solid #e5e5e5; background: #9FCB9F; padding: 10px">
				<h6 style="text-align: left;">Transaction Fee <span style="float: right">365983456983456</span></h6>
			</div>
			<div style="border-bottom: 1px solid #e5e5e5; background: #9FCB9F; padding: 10px">
			<h6 style="text-align: left;">Total for payment <span style="float: right">365983456983456</span></h6>
			</div>
			<br>
			<button class="btn btn-success" style="width: 45%;">Confirm</button> <button class="btn btn-danger float-right" style="width: 45%;">Cancel</button>
		</div>
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