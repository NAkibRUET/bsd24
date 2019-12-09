@extends('bsd24_admin.html.layout.master')
@section('page_title', "Transaction Fee Control | Buy & Sell dollar")
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
                        <h4 class="page-title">Transaction Fee Control</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/admin_home_page')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Transaction Fee Control</li>
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
                <div class="container">
                   
                </div>
                <hr>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-8" style="background:white;box-shadow:1px 1px 1px;border-radius:5px;" >
                            <div style="text-align:center;">
                                <form method="POST" enctype="multipart/form-data" action="{{URL::to('/transaction_fee')}}">
                                    <input type="hidden" id="login_token" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" id="update_selector" value="0" name="update_selector"/>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6" style=" border-right:1px solid #e5e5e5;">
                                                   <h3 style="font-weight:bold;text-align:center;">Minimum Amount</h3>
                                                   <hr>
                                                   <input required class="form-control" name="minimum_amount" placeholder="Enter Minimum Amount Ex: 1920 BDT">
                                                </div>
                                                <div class="col-md-6">
                                                   <h3 style="font-weight:bold;text-align:center;">Fee</h3>
                                                   <hr>
                                                    <input class="form-control" name="transaction_fee" placeholder="Enter Fee Ex: 60 BDT">
                                                </div>
                                            </div>
                                            @if(!empty($msg_status))
                                              <h5 style="color: green; margin-top: 10px;">{{$msg_status}}</h5>
                                            @endif
                                            <hr>
                                            <input type="submit" value="Store It Now" class="btn btn-success" />
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        
                    </div>


                </div>
              
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            

@endsection