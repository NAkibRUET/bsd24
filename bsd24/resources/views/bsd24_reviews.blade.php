
@extends('layout.master')
@section('page_title', "Reviews | Buy & Sell dollar")

@section('dynamic_page')




	<!--SECTION STARTS HERE -->
	<!--Please, place all your div/box/anything inside the above SECTION-->
	<div class="section" style="">
		@if (Session::has('user_info'))
		<div class="container" style="padding:0% 2.5%">
			<div class="reviewBox hoverEffect">
				<h5 style="color:#1B6DC1; margin-top:25px;">Review this website</h5>
				<form id="reviewform">
					<input type="hidden" id="hiddenName" name="fullName" value="{{ Session::get('user_info.name') }}">
					<input type="hidden" id="login_token" name="_token" value="{{csrf_token()}}">
					<textarea required id="review" class="form-control"  placeholder="Enter your review here" rows="3" onkeyup="review_size(this)"></textarea>
					<div id="sizeControl"></div>
					<br>
					<button type="button" id="reviewBtn" class="btn btn-primary">Submit Review</button>
				</form>
			</div>
		</div>
		@endif
		<div class="container">
			<div class="row" style="padding:0px 20px;">
				<div class="col-md-6">
				    <div class="reviewBox hoverEffect" style="margin-bottom:10px;">
				      <div class="quoteSignOne"></div>
				      <div class="quoteSignTwo"></div>
				      <p>Duis sed odio sit ameta sit mt mauris. Morbi accumsan ipsum velit. Nam nec tellus  odio tincidunt auctor a ornare.</p>
				      <div class=""></div>
				      <h1>by <span>Nakib</span></h1>
				    </div>
				    <div class="reviewBox hoverEffect" style="margin-bottom:10px;">
				      <div class="quoteSignOne"></div>
				      <div class="quoteSignTwo"></div>
				      <p>Duis sed odio sit ameta sit mt mauris. Morbi accumsan ipsum velit. Nam nec tellus  odio tincidunt auctor a ornare.</p>
				      <div class=""></div>
				      <h1>by <span>Nakib</span></h1>
				    </div>
				    <div class="reviewBox hoverEffect" style="margin-bottom:10px;">
				      <div class="quoteSignOne"></div>
				      <div class="quoteSignTwo"></div>
				      <p>Duis sed odio sit ameta sit mt mauris. Morbi accumsan ipsum velit. Nam nec tellus  odio tincidunt auctor a ornare.</p>
				      <div class=""></div>
				      <h1>by <span>Nakib</span></h1>
				    </div>
				    <div class="reviewBox hoverEffect" style="margin-bottom:10px;">
				      <div class="quoteSignOne"></div>
				      <div class="quoteSignTwo"></div>
				      <p>Duis sed odio sit ameta sit mt mauris. Morbi accumsan ipsum velit. Nam nec tellus  odio tincidunt auctor a ornare.</p>
				      <div class=""></div>
				      <h1>by <span>Nakib</span></h1>
				    </div>
				    <div class="reviewBox hoverEffect" style="margin-bottom:10px;">
				      <div class="quoteSignOne"></div>
				      <div class="quoteSignTwo"></div>
				      <p>Duis sed odio sit ameta sit mt mauris. Morbi accumsan ipsum velit. Nam nec tellus  odio tincidunt auctor a ornare.</p>
				      <div class=""></div>
				      <h1>by <span>Nakib</span></h1>
				    </div>
				</div>
				<div class="col-md-6">
				    <div class="reviewBox hoverEffect" style="margin-bottom:10px;">
				      <div class="quoteSignOne"></div>
				      <div class="quoteSignTwo"></div>
				      <p>Duis sed odio sit ameta sit mt mauris. Morbi accumsan ipsum velit. Nam nec tellus  odio tincidunt auctor a ornare.</p>
				      <div class=""></div>
				      <h1>by <span>Nakib</span></h1>
				    </div>
				    <div class="reviewBox hoverEffect" style="margin-bottom:10px;">
				      <div class="quoteSignOne"></div>
				      <div class="quoteSignTwo"></div>
				      <p>Duis sed odio sit ameta sit mt mauris. Morbi accumsan ipsum velit. Nam nec tellus  odio tincidunt auctor a ornare.</p>
				      <div class=""></div>
				      <h1>by <span>Nakib</span></h1>
				    </div>
				    <div class="reviewBox hoverEffect" style="margin-bottom:10px;">
				      <div class="quoteSignOne"></div>
				      <div class="quoteSignTwo"></div>
				      <p>Duis sed odio sit ameta sit mt mauris. Morbi accumsan ipsum velit. Nam nec tellus  odio tincidunt auctor a ornare.</p>
				      <div class=""></div>
				      <h1>by <span>Nakib</span></h1>
				    </div>
				    <div class="reviewBox hoverEffect" style="margin-bottom:10px;">
				      <div class="quoteSignOne"></div>
				      <div class="quoteSignTwo"></div>
				      <p>Duis sed odio sit ameta sit mt mauris. Morbi accumsan ipsum velit. Nam nec tellus  odio tincidunt auctor a ornare.</p>
				      <div class=""></div>
				      <h1>by <span>Nakib</span></h1>
				    </div>
				    <div class="reviewBox hoverEffect" style="margin-bottom:10px;">
				      <div class="quoteSignOne"></div>
				      <div class="quoteSignTwo"></div>
				      <p>Duis sed odio sit ameta sit mt mauris. Morbi accumsan ipsum velit. Nam nec tellus  odio tincidunt auctor a ornare.</p>
				      <div class=""></div>
				      <h1>by <span>Nakib</span></h1>
				    </div>
				</div>
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
		</div>
	</div>
	<!--Please, place all your div/box/anything inside the above SECTION-->

<script type="text/javascript">
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