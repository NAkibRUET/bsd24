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
            <div class="container-fluid" style="height:460px; overflow:scroll;">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                
                
                    <div>
                      <form>
                        <input type="hidden" id="login_token" name="_token" value="{{csrf_token()}}">
                        <label>Insert Headline / Scroll Text</label>
                        <textarea id="headline_text" class="form-control" placeholder="Enter New Headline / Scroll Text"></textarea>
                        <div id="warningText"></div>
                        <br>
                        <button id="headlineBtn" type="button" class="btn btn-success">Submit</button>
                      </form>
                      <hr>
                      <h5>Headlines:</h5>
                      <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th scope="col">sl#</th>
                            <th scope="col">Headline Text</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i=1;?>
                        @foreach ($headline as $data)
                          <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$data->headline_text}}</td>
                            <td><a href="/headline_update/{{$data->id}}"><button class="btn btn-info btn-sm mr-3">Edit</button></a></td>
                            <td><a href="/headline_delete/{{$data->id}}"><button class="btn btn-danger btn-sm mr-3">Delete</button></a></td>

                          </tr>
                        @endforeach

                         
                        </tbody>
                      </table>
                    
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
    //console.log(review);
      $.ajax({
          method: "POST",
          url : '/headline',
          dataType:"json",
          data :{
            _token: $('#login_token').val(), 
            hText: Text 
          },
          success: function(response){
              //console.log(response.a);
              
              if(response.a=="ok")
              {
                document.getElementById('warningText').innerHTML = '<h6 style="color:green;margin-top:5px;">Successfully submitted!</h5>';
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