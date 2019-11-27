<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('bsd24_assets/admin_asset/assets/images/favicon.png')}}">
    <title>Matrix Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="{{URL::asset('bsd24_assets/admin_asset/dist/css/style.min.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img style="width:60%;" src="{{URL::asset('bsd24_assets/admin_asset/assets/images/LogoBSD.png')}}" alt="logo" /></span>
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" id="loginform" action="index.html">
                        <input type="hidden" id="login_token" name="_token" value="{{csrf_token()}}">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username" id="admin_name" aria-describedby="basic-addon1" required="">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" id="admin_pass" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                            <h6 id ="message_status"></h6>
                                        <button class="btn btn-info disabled" id="to-recoverComment" type="button"><i class="fa fa-lock m-r-5"></i> Lost password?</button>
                                        <button id="bsd_admin_login" class="btn btn-success float-right" type="submit">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="recoverform">
                    <div class="text-center">
                        <span class="text-white">Enter your e-mail address below and we will send you instructions how to recover a password.</span>
                    </div>
                    <div class="row m-t-20">
                        <!-- Form -->
                        <form class="col-12" action="index.html">
                            <!-- email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-lg" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <!-- pwd -->
                            <div class="row m-t-20 p-t-20 border-top border-secondary">
                                <div class="col-12">
                                    <a class="btn btn-success" href="#" id="to-login" name="action">Back To Login</a>
                                    <button class="btn btn-info float-right" type="button" name="action">Recover</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{URL::asset('bsd24_assets/admin_asset/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{URL::asset('bsd24_assets/admin_asset/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{URL::asset('bsd24_assets/admin_asset/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>

    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){
        
        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
    </script>





        
<script>

function pageRedirect_to_admin_panel() {
    window.location.replace("{{URL::to('/admin_home_page')}}");
}           

$(document).ready(function(){
  $("#bsd_admin_login").click(function(event){
    event.preventDefault();
    var adminName = $('#admin_name').val();
    var adminPass = $('#admin_pass').val();
    if (adminName=='' || adminPass=='')
    {
        alert("Field Should not be Empty");
    }
    else{

        $.ajax({
            method: "POST",
            url : '/admin/login',
            data :{adminName: adminName, 
                    adminPass: adminPass,
                    _token: $('#login_token').val()
                    },
            success: function(response){
                //console.log(response);
                //console.log(response);
                if(response=="ok")
                {
                    $("#message_status").text("Ok! Admin recognized");
                    $("#message_status").css('color','green');
                    setTimeout("pageRedirect_to_admin_panel()", 2000);
                }
                else if(response=="unknown")
                    {
                        $("#message_status").text("Soryy! Admin Not Recognized");
                        $("#message_status").css('color','red');
                        console.log(response);
                    }

            } 
        })

    }


  });
});

    
    
</script>

</body>

</html>