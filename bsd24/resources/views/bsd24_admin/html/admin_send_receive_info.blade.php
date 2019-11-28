@extends('bsd24_admin.html.layout.master')
@section('page_title', "Send Receive Info | Buy & Sell dollar")
@section('admin_dynamic_page')

            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid" style="height:360px; overflow:scroll;">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                  <div style="width:40%; background: black; color: white; border: 1px solid #e5e5e5; padding: 30px; border-radius: 5px;">
                    <h5>Send/Receive Info:</h5>
                    <form id="InfoForm">
                      <label>Send/Receive:</label>
                      <select class="form-control" id="selectId">
                        <option value="send">Send</option>
                        <option value="receive">Receive</option>
                      </select>
                      <br>
                      <label>Operator Name:</label>
                      <input type="text" name="" id="operatorName" class="form-control">
                      <br>
                      <label>Card/Phone</label>
                      <input type="text" name="" id="number" class="form-control">
                      <br>
                      <button class="btn btn-primary" type="button" id="submitBtn">Store It</button>
                    </form>
                  </div>
        
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

@endsection