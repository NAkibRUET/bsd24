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
                      <h5>Delete Headline</h5>
                      <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th scope="col">sl#</th>
                            <th scope="col">Headline Text</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i=1;?>
                        @foreach ($headline as $data)
                          <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$data->headline_text}}</td>
                            <td><a href="/headline/delete/{{$data->id}}"><button class="btn btn-danger btn-sm mr-3">Confirm Delete</button></a></td>

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