@extends('bsd24_admin.html.layout.master')
@section('page_title', "Store | Send Receive info")
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
                        <h4 class="page-title">Send Receive Info store</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/admin_home_page')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Send Receive Info store</li>
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
                          <th scope="col">Send/Receive</th>
                          <th scope="col">Operator Type</th>
                          <th scope="col">Card/Phone No</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1;?>
                      @foreach ($all_data as $data)
                        <tr>
                          <th scope="row">{{$i++}}</th>
                          <td>{{$data->send_or_receive}}</td>
                          <td>{{$data->operator_name}}</td>
                          <td>{{$data->card_or_phone}}</td>
                        <td><span><a href="send_receive_store/update/{{$data->id}}"><button class="btn btn-info btn-sm mr-3">update</button></a><a href="send_receive_store/delete/{{$data->id}}"><button class="btn btn-danger btn-sm">delete</button></a></span></td>
                        </tr>
                      @endforeach

                       
                      </tbody>
                    </table>
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
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

@endsection