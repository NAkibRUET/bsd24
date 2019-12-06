@extends('bsd24_admin.html.layout.master')
@section('page_title', "Currency Equivalent | Buy & Sell dollar")
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
                        <h4 class="page-title">add Currency Equivalent</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/admin_home_page')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add a new Currency Equivalent</li>
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
                                <form method="POST" enctype="multipart/form-data" action="">
                                    <input type="hidden" id="login_token" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" id="update_selector" value="0" name="update_selector"/>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6" style=" border-right:1px solid #e5e5e5;">
                                                   <h3 style="font-weight:bold;text-align:center;">Convert From</h3>
                                                   <hr>

                                                   <select class="form-control" id="conversion_from" name="conversion_from" style="font-weight:bold;">
                                                        <option value="Bkash Agent BDT">Bkash Agent BDT</option>
                                                        <option value="Rocket Personal BDT">Rocket Personal BDT</option>
                                                        <option value="Rocket Agent BDT">Rocket Agent BDT</option>
                                                        <option value="Bkash Personal BDT">Bkash Personal BDT</option>
                                                        <option value="Neteller USD">Neteller USD</option>
                                                        <option value="Skrill USD">Skrill USD</option>
                                                        <option value="Nagad Personal BDT">Nagad Personal BDT</option>
                                                       
                                                   </select>
                                                   <hr>

                                                   <input class="form-control" readonly value="1" name="operator_from">
                                                </div>
                                                <div class="col-md-6">
                                                   <h3 style="font-weight:bold;text-align:center;">Convert To</h3>
                                                   <hr>
                                                    <select class="form-control" id="conversion_to" name="conversion_to" style="font-weight:bolder;">
                                                       <option value="Bkash Personal BDT">Bkash Personal BDT</option>
                                                       <option value="Bkash Agent BDT">Bkash Agent BDT</option>
                                                       <option value="Rocket Agent BDT">Rocket Agent BDT</option>
                                                       <option value="Rocket Personal BDT">Rocket Personal BDT</option>
                                                       <option value="Rocket Personal BDT">Rocket Personal BDT</option>
                                                       <option value="Neteller USD">Neteller USD</option>
                                                       <option value="Skrill USD">Skrill USD</option>
                                                       <option value="Nagad Personal BDT">Nagad Personal BDT</option>
                                                    </select>
                                                    <hr>
                                                    <input class="form-control" id="conversion_factor" value="1" name="conversion_factor">
                                                </div>
                                            </div>
                                            <hr>
                                            @if(!empty($msg_status))
                                                <h6 style="color:green;">{{$msg_status}}</h6>
                                            @endif
                                            <input type="submit" name='submit_currency_equavalent' value="Store It Now" class="btn btn-success" />
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
            
<script>

function do_something(factor)
{
    document.getElementById('conversion_factor').value = factor;
    document.getElementById('update_selector').value = factor;

    console.log(factor)
}

function do_not_anything()
{
    console.log("Nothing to do")
}




    $(document).ready(function(){
        $("#conversion_to").change(function(event){
            event.preventDefault();
            var conversion_from = $('#conversion_from').val();
            var conversion_to = $('#conversion_to').val();

            $.ajax({
                method: "GET",
                url : '/currency_equivalent/currency_check',
                data :{
                    conversion_from : conversion_from,
                    conversion_to : conversion_to,
                    _token: $('#login_token').val()

                },
                success: function(response){
                    if(response!=0)
                    {
                        do_something(response);
                    }
                    else{
                        do_not_anything();
                    }
                }

                
            })
            
        });
    });
</script>







@endsection