@extends('bsd24_admin.html.layout.master')
@section('page_title', "Update a Reserve | Buy & Sell dollar")
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
                        <h4 class="page-title">Reserve Update</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/admin_home_page')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Reserve Update</li>
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
                <div class="container">
                    <div class="row">
                        <a href="{{URL::to('/our_reserve')}}"><button class="btn btn-lg btn-info"> back to reserve list</button></a>
                    </div>
                </div>
                <hr>
                <div class="container">


                    <div class="row text-center">
                        <div class="col-md-6" style="background:white;box-shadow:1px 1px 1px;border-radius:5px;" >
                            <div style="text-align:center;">
                                <form method="POST" enctype="multipart/form-data" action="{{URL::to('add_a_new_reserve/'.$sp_data->id)}}">
                                    {{ csrf_field() }}
                                    <div class="card">
                                            <div class="card-body">
                                                <h3 class="card-title m-b-0">Update this Reserve</h3>
                                              
                                                <hr>
                                                <div class="form-group m-t-20">
                                                    <label>Reserved Name <small class="text-muted">(bkash agent, Rocket)</small></label>
                                                <input required type="text" name="reserve_name" class="form-control date-inputmask" id="date-mask" value="{{$sp_data->reserve_name}}" placeholder="reserve name">
                                                </div>

                                                <div class="form-group m-t-20">
                                                        <label>Reserved Image <small class="text-muted">(bkash agent, Rocket)</small></label>
                                                        <input  type="file" name="reserve_image" class="form-control date-inputmask" id="date-mask" placeholder="reserve image">
                                                        @if (!empty($sp_data))
                                                            <img src = "{{URL::asset('bsd24_assets/reserved_file/'.$sp_data->reserve_image)}}"/>
                                                        @endif
                                                </div>
                                           
                                                <div class="form-group">
                                                    <label>Currency<small class="text-muted"> (USD, BDT)</small></label>
                                                <select value="{{$sp_data->reserve_currency}}" required name="reserve_currency" class="form-control" style="height: 36px;width: 100%;">
                                                       
                                                <option value="{{$sp_data->reserve_currency}}">{{$sp_data->reserve_currency}}</option>
                                                        <option value="BDT">BDT</option>
                                                        <option value="USD">USD</option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Edit Your Amount<small class="text-muted"> (99954)</small></label>
                                                <input required value="{{$sp_data->reserve_amount}}" name="reserve_amount" type="text" class="form-control purchase-inputmask" id="purchase-mask" placeholder="Enter amount">
                                                </div>

                                                <input type="submit" class="btn btn-lg btn-success" value="Update It Now">

                                            </div>
                                          
                                        </div>
                                    </form>
                                    <a href="/delete_reserve/{{$sp_data->id}}" class="btn btn-danger" >Delete </a>

                            </div>
                        </div>
                        
                    </div>


                </div>
              
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

@endsection