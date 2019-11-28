@extends('bsd24_admin.html.layout.master')
@section('page_title', "our Reserve | Buy & Sell dollar")
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
                        <h4 class="page-title">Our Reserve</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/admin_home_page')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Our Reserve</li>
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
                        <a href="{{URL::to('/add_a_new_reserve')}}"><button class="btn btn-lg btn-info"> Add a new reserve</button></a>
                    </div>
                </div>
                <hr>
                <div class="container">


                    <div class="row">

                        @foreach ($all_reserve as $reserve)

                            <div class="col-md-3" style="background:white;box-shadow:1px 1px 1px;border-radius:5px; margin:10px;" >
                                <div style="text-align:center;">
                                    <div>
                                    <img style="text-align:center;width:80px; height:80px;border-radius:50px;margin-top:5px;"   src="{{URL::asset('bsd24_assets/reserved_file')}}/{{$reserve->reserve_image}}">
                                    </div>
                                    <div style="margin-top:1px">
                                        <hr style="margin:3px;">
                                        <h6 style="font-size:11px;padding:-5px">{{$reserve->reserve_name}}</h6>
                                        <hr style="margin:3px;">
                                        <hr style="margin:3px;">
                                            <h4 style="font-size:16px;padding:-5px">{{$reserve->reserve_currency}}: <span style="margin:2px 5px;color:green;">{{ $reserve->reserve_amount }}</span> /=</h4>
                                        <hr style="margin:3px;">
                                        <hr style="margin:3px;">
                                            <a href="{{URL::to('reserve_update/'.$reserve->id)}}"><button class="btn btn-primary">Update It</button></a>
                                        <hr style="margin:3px;">
                                    </div>

                                </div>
                            </div>

                        @endforeach
                        
                    </div>


                </div>
              
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

@endsection