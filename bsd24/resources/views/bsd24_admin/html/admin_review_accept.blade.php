@extends('bsd24_admin.html.layout.master')
@section('page_title', "Admin | Review")
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
                        <h4 class="page-title">Reviews</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/admin_home_page')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Reviews</li>
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
                    <h5>Exchange Operation Table:</h5>
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">sl#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Review</th>
                          <th scope="col">Accept</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1;?>
                      @foreach ($show_review as $data)
                        <tr>
                          <th scope="row">{{$i++}}</th>
                          <td>{{$data->full_name}}</td>
                          <td>{{$data->review_comment}}</td>
                        <td><span><a href="/admin_review/update/{{$data->id}}"><button class="btn btn-info btn-sm mr-3">Accept</button></a></span></td>

                        </tr>
                      @endforeach

                       
                      </tbody>
                    </table>
                    </div> 
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

@endsection