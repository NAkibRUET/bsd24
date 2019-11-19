<!DOCTYPE html>
<html>
<head>
    <title> @yield('page_title') </title>
    
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset ('bsd24_assets/css/index.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	
	
	<div class="top">
		<div class="top_one">
			<div class="container">
			<div class="row uppr"> 
		      <!-- TOP LEFT -->
		      <div class="col-md-5 col-sm-6">
		        <div class="top-address uppernav">
                <a href="{{URL::to('/login')}}" class=""><i class="fa fa-user"></i> Login</a>
			  	  <a href="{{URL::to('/sign_up')}}">Sign Up</a>
		        </div>
		      </div>
		      <div class="col-md-3 col-sm-3">
		        <div class="top-number">
		          <p><i class="fa fa-phone"></i> 01904293874</p>
		        </div>
		      </div>
		      <!-- TOP RIGHT -->
		      <div class="col-md-4 col-sm-3">
		        <div class="top-right-menu">
		          <ul class="social-icons text-right">
		            <li><a class="facebook social-icon" href="javascript:void(0)" title="Facebook"><i class="fa fa-facebook"></i></a></li>
		            <li><a class="twitter social-icon" href="javascript:void(0)" title="Twitter"><i class="fa fa-twitter"></i></a></li>
		            <li><a class="pinterest social-icon" href="javascript:void(0)" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
		            <li><a class="linkedin social-icon" href="javascript:void(0)" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
		            <li><a class="dribbble social-icon" href="javascript:void(0)" title="Dribbble"><i class="fa fa-dribbble"></i></a></li>
		          </ul>
		        </div>
		      </div>
		    </div>
		 </div>
		</div>
		<div>
	      <div class="scrollText">
	        <marquee behavior="scroll" direction="left" 
	          onmouseover="this.stop();" 
	          onmouseout="this.start();" style="margin-bottom: -4px; color:#fff;">
	            <a><i class="fa fa-angle-double-right" ></i> নোবিপ্রবি'তে আওয়ামীপন্থী শিক্ষকদের নীল দল গঠন</a>
	            <a><i class="fa fa-angle-double-right" ></i> নোবিপ্রবি'তে আওয়ামীপন্থী শিক্ষকদের নীল দল গঠন</a>
	            <a><i class="fa fa-angle-double-right" ></i> নোবিপ্রবি'তে আওয়ামীপন্থী শিক্ষকদের নীল দল গঠন</a>
	        </marquee> 
	      </div>
	    
		</div>

		 <div class="container top_three">
			<div class="topnav" id="myTopnav">
			  <a><img class="logo" src="{{ URL::asset ('bsd24_assets/logo.png') }}" ></a>
              <a href="{{URL::to('/')}}" class="nav_content">Home</a>
			  <a href="" class="nav_content">Review</a>
			  <a href="" class="nav_content">Vip Program</a>
			  <a href="" class="nav_content">History</a>
			  <a href="{{URL::to('/contact_us')}}" class="nav_content">Contact</a>
			  
			  <!-- CODE FOR DROPDOWN IF NEEDED
			  <div class="dropdownx">
			    <button class="dropbtn">CONTACT
			      <i class="fa fa-caret-down"></i>
			    </button>
			    <div class="dropdownx-content">
			      <a href="" class="nav_content"></a>
			      <a href="" class="nav_content"></a>
			      <a href="" class="nav_content"></a>
			    </div>
			  </div> -->
			  
			  <a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="fa fa-bars" aria-hidden="true"></i></a>
			</div>
		</div>
    </div>
    
    <!--ENF OF TOP. (PLEASE "TEMPLATE EXTEND" the above part as TOP/HEAD) -->
    

    @yield("index_page");

    @yield("dynamic_page")










    <!--FOOTER starts here (Please "Template Extend" the bottom part as BOTTOM/FOOTER-->
	<div class="footer">
		<div class="footerOne">
			<div class="row footerOneOne">
				<div class="col-md-4">
					<img src="{{ URL::asset ('bsd24_assets/logo.png') }}" width="300" alt="BuySellDollar24">
					<h5 style=" color: #1B6DC1;">Dollar Buy, Sell, Exchange in Bangladesh</h5>

				</div>
				<div class="col-md-4">
					<h5 style="color: #1B6DC1; text-align: center;">Contact Info:</h5>
					<h6 style="color: #7f7f7f; text-align: center;">Email: mail@buyselldollar24.com</h6>
					<h6 style="color: #7f7f7f; text-align: center;">Facebook: <small><a href="https://www.facebook.com/">https://www.facebook.com/buyselldollar24/</a></small></h6>
					<h6 style="color: #7f7f7f; text-align: center;">9 AM - 12 PM, Saturday - Friday</h6>
				</div>
				<div class="col-md-4">
					<h5 style="color: #1B6DC1; text-align: center;">Support:</h5>
					<h6 style="color: #7f7f7f; text-align: center;"><a style="text-decoration: none;" href="">FAQ</a></h6>
					<h6 style="color: #7f7f7f; text-align: center;"><a style="text-decoration: none;" href="">Terms of Services</a></h6>
					<h6 style="color: #7f7f7f; text-align: center;"><a style="text-decoration: none;" href="">Privacy Policy</h6>
				</div>
			</div>
		
		</div>
		<div class="row footerOneTwo">
			<div class="col-md-1"></div>
			<div style="width: 220px; margin: 0 auto;" class="col-md-4 social">
				<a href="https://www.facebook.com/" class="fa fa-facebook"></a>
				<a href="#" class="fa fa-youtube"></a>
				<a href="#" class="fa fa-linkedin"></a>
				<a href="#" class="fa fa-twitter"></a>
				<a href="#" class="fa fa-instagram"></a>
			</div>
			<div class="col-md-6" style="padding: 10px 10px;">
				<h6 style=" color: white; text-align: center; font-family: Helvetica">&copy Copyright buyselldollar24.com All Right Reserved.</h6>
			</div>
		</div>
	
	</div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>
</html>