@extends('bsd24_admin.html.layout.master')
@section('page_title', "Send Receive Info | Buy & Sell dollar")
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
                        <h4 class="page-title">Send/Receive Info</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/admin_home_page')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Send/Receive Info</li>
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
                  <div style="width:60%; background: white; color: white; border: 1px solid #e5e5e5; padding: 30px; border-radius: 5px;">
                    <h3 style="color:black;">Send/Receive Info:</h3>
                    <hr>
                  <form id="InfoForm"  @if(!empty($data)) action="{{URL::to('send_receive_info/'.$data->id)}}" @elseif(empty($data))  action="{{URL::to('/send_receive_info')}}" @endif method="post">
                    {{ csrf_field() }}
                    
                      <label style="color:black;">Send/Receive:</label>
                      <select required name="send_or_receive" class="form-control" id="selectId">
                        @if(!empty($data))
                          <option value="{{$data->send_or_receive}}">{{$data->send_or_receive}}</option>
                        @endif
                        <option value="send">Send</option>
                        <option value="receive">Receive</option>
                      </select>
                      <br>
                      <label style="color:black;">Operator Name:</label>
                    <input type="text" required @if(!empty($data)) value="{{$data->operator_name}}" @endif name="operator_name" placeholder="Bkash BDT / Neteller USD"  id="operatorName" class="form-control">
                      <br>
                   


                      <label style="color:black;">Card/Phone</label>
                    <input type="text" name="card_or_phone" @if(!empty($data)) value="{{$data->card_or_phone}}" @endif placeholder="0177xxxx or 56789543" id="number" class="form-control">
                      <br>
                      @if (!empty($msg_status))
                          <h3 style="color:green;">{{$msg_status}}</h3>
                      @endif
                      @if(empty($data))
                        <input class="btn btn-primary btn-lg" type="submit" id="submitBtn" value="Stor It Now"/>
                      @endif
                      @if(!empty($data))
                        <input class="btn btn-primary btn-lg" type="submit" id="submitBtn" value="Update It now"/>
                      @endif
                    </form>
                  </div>
        
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

@endsection