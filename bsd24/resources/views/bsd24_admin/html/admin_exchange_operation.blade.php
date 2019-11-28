@extends('bsd24_admin.html.layout.master')
@section('page_title', "Exchange Operation | Buy & Sell dollar")
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
                        <h4 class="page-title">Exchange Operation</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/admin_home_page')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Exchange Operation</li>
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
            <div class="container-fluid" style="min-height:360px; overflow:scroll;">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                
                
                    <div>
                    <h5>Exchange Operation Table:</h5>
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col" class="hiddenElem2">#</th>
                          <th scope="col">Send</th>
                          <th scope="col">Receive</th>
                          <th scope="col">From</th>
                          <th scope="col">To</th>
                          <th scope="col">Action</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row" class="hiddenElem2">1</th>
                          <td>BKash Agent</td>
                          <td>Nagad</td>
                          <td>5000 BDT</td>
                          <td>5000 USD</td>
                          <td>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="#"><button type="button" id="ProcesssingId" class="btn btn-warning">Processsing</button></a>
                              <a class="dropdown-item" href="#"><button type="button" id="CompletedId" class="btn btn-success">Completed</button></a>
                              <a class="dropdown-item" href="#"><button type="button" id="DeleteId" class="btn btn-danger">Delete</button></a>
                            </div>
                          </td>
                          <td>Processing</td>
                          <!--When the button Processing is pressed it will show "Processing" in Status
                            when completed is pressed it will show "Completed" in status. (as it will show in the homepage in frontend)-->  
                        </tr>
                        <tr>
                          <th scope="row" class="hiddenElem2">1</th>
                          <td>BKash Agent</td>
                          <td>Nagad</td>
                          <td>5000 BDT</td>
                          <td>5000 USD</td>
                          <td>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="#"><button type="button" id="ProcesssingId" class="btn btn-warning">Processsing</button></a>
                              <a class="dropdown-item" href="#"><button type="button" id="CompletedId" class="btn btn-success">Completed</button></a>
                              <a class="dropdown-item" href="#"><button type="button" id="DeleteId" class="btn btn-danger">Delete</button></a>
                            </div>
                          </td>
                          <td>Processing</td>

                        </tr>
                        
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