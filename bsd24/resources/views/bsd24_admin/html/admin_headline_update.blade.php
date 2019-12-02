@extends('bsd24_admin.html.layout.master')
@section('page_title', "Admin | Headline")
@section('admin_dynamic_page')
            
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Headline</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/admin_home_page')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Headline</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid" style="height:360px; overflow:scroll;">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                
                
                    <div>
                      @foreach ($headline as $data)
                      <form>
                        <input type="hidden" id="login_token" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" id="headline_id" name="_token" value="{{$data->id}}">
                        <label>Insert Headline / Scroll Text</label>
                        <textarea id="headline_text" class="form-control" placeholder="Enter New Headline / Scroll Text">{{$data->headline_text}}</textarea>
                        <div id="warningText"></div>
                        <br>
                        <button id="headlineBtn" type="button" class="btn btn-success">Update</button>
                      </form>
                      @endforeach
                    </div>
                
              
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
<script type="text/javascript">
function pageRedirect_to_home() {
    window.location.replace("{{URL::to('/headline')}}");
} 
$(document).ready(function(){
  $("#headlineBtn").click(function(event){
    event.preventDefault();
    let Text = $('#headline_text').val();
    let TextId = $('#headline_id').val();
    console.log(Text);
      $.ajax({
          method: "POST",
          url : '/headline/update/',
          dataType:"json",
          data :{
            _token: $('#login_token').val(), 
            hText: Text,
            TextId:TextId
          },
          success: function(response){
              //console.log(response.a);
              
              if(response.a=="ok")
              {
                document.getElementById('warningText').innerHTML = '<h6 style="color:green;margin-top:5px;">Successfully Updated!</h5>';
                document.getElementById('headlineBtn').style.marginTop = "-25px";
                setTimeout("pageRedirect_to_home()", 1200);
              }
              else if(response.a=="failed")
              {
                document.getElementById('warningText').innerHTML = '<h6 style="color:red;margin-top:5px;">'+response.b+'</h6>';  
                document.getElementById('headlineBtn').style.marginTop = "-25px";
              }
          },
          error: (error)=>{
            console.log(JSON.stringify(error));
          } 
      })
  });
});
</script>
@endsection