
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
		
			<input type="hidden" id="hiddenReview" name="review" value="{{$review}}">
		
		<div class="container">
			<div class="row pagination-example" style="padding:0px 20px;">
				@foreach ($review as $data)
				    <div class=" col-md-6 reviewBox hoverEffect paged-element" style="margin-bottom:10px;">
				      <div class="quoteSignOne"></div>
				      <div class="quoteSignTwo"></div>
				      <p>{{$data->review_comment}}</p>
				      <div class=""></div>
				      <h1>by <span>{{$data->full_name}}</span></h1>
				    </div>
				 @endforeach   
			</div>

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
	let reviewData = JSON.parse($('#hiddenReview').val());
	
});
(function(){ 
  paginateChildren($('.pagination-example'));
}(jQuery));

function paginateChildren(parentElement) {
    var page = 1;
    var currentElements;
    var offsetStart;
    var offsetEnd;
    var currentPage = 1;
    var elementsPerPage = 8;
    var elements = parentElement.find($('.paged-element'));
    var nmbrOfPages = Math.ceil(elements.length / elementsPerPage);
    var displayNav = function () {
        htmlNav = '<div class="paginationNav col-md-12">';
        htmlNav += '<span>' + currentPage + ' of ' + nmbrOfPages + '</span><br />';
        htmlNav += '<a href="#" title="Previous" rel="" class="prev"><i class="fa fa-angle-left fa-lg"></i></a>';
        htmlNav += '<a href="#" title="Next" rel="" class="next active"><i class="fa fa-angle-right fa-lg"></i></a>';
        htmlNav += '</div>';
        if (!$(parentElement).find('.paginationNav').length) {
            $(parentElement).append(htmlNav);
        }
    };
    $(parentElement).on('click', '.paginationNav a.prev', function (e) {
        e.preventDefault();
        page = currentPage > 1 ? parseInt(currentPage) - 1 : 1;
        displayPage(page);
    });
    $(parentElement).on('click', '.paginationNav a.next', function (e) {
        e.preventDefault();
        page = currentPage < nmbrOfPages ? parseInt(currentPage) + 1 : nmbrOfPages;
        displayPage(page);
    });
    var displayPage = function (page) {
        if (currentPage != page || page == 1) {
            currentPage = parseInt(page);
            $('.paginationNav span', parentElement).html(currentPage + ' of ' + nmbrOfPages);
            var $prevButton = $('.paginationNav a.prev');
            var $nextButton = $('.paginationNav a.next');
            if (currentPage == 1 && nmbrOfPages > 1) {
                if ($prevButton.hasClass('active')) {
                    $prevButton.removeClass('active');
                }
                $nextButton.addClass('active');
            } else if (currentPage > 1 && currentPage < nmbrOfPages) {
                $prevButton.addClass('active');
                $nextButton.addClass('active');
            } else if (nmbrOfPages > 1 && currentPage == nmbrOfPages) {
                $prevButton.addClass('active');
                if ($nextButton.hasClass('active')) {
                    $nextButton.removeClass('active');
                }
            }
            offsetStart = (page - 1) * elementsPerPage;
            offsetEnd = page * elementsPerPage;
            if (currentElements) {
                currentElements.hide();
            } else {
                elements.hide();
            }
            currentElements = elements.slice(offsetStart, offsetEnd);
            currentElements.fadeIn();
        }
    };
    if (page.length <= 0 || page < 1 || page > nmbrOfPages) {
        page = 1;
    }
    displayPage(page);
    if (nmbrOfPages > 1) {
        displayNav();
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