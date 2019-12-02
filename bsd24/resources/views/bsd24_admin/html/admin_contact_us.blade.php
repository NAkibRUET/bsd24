@extends('bsd24_admin.html.layout.master')
@section('page_title', "Admin | Contact Us")
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
                        <h4 class="page-title">Contact Requests</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/admin_home_page')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact Requests</li>
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
            <div class="container-fluid" style="height:450px; overflow:scroll;">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                
                
                    <div>
                    <h5>Contact:</h5>
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Time</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Subject</th>
                          <th scope="col">Message</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($contact_reqs as $data)
                        <tr>
                          <th scope="row">{{date('d-m-Y h:i A', strtotime($data->created_at))}}</th>
                          <td>{{$data->full_name}}</td>
                          <td>{{$data->user_email}}</td>
                          <td>{{$data->subject}}</td>
                          <td>{{$data->message}}</td>
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