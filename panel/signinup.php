<?php 
require("../app/config.php");
?>
<html lang="en" dir="rtl">
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="FaridFroozan" />
        <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" /> -->
        <link href="<?php echo ASSETS;?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS;?>global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS;?>global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS;?>global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS;?>global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS;?>global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS;?>global/css/components-md-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo ASSETS;?>global/css/plugins-md-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS;?>pages/css/login-5-rtl.min.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo ASSETS;?>global/css/font.css" rel="stylesheet" type="text/css" />
    
        <link rel="shortcut icon" href="favicon.ico" />
      <link href="<?php echo ASSETS;?>css/toastr.css" rel="stylesheet">
  <script src="<?php echo ASSETS;?>js/jquery.min.js"></script>
  <script src="<?php echo ASSETS;?>js/toastr.js"></script>

<script>
  
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "rtl": true,
  "positionClass": "toast-top-left",
  "preventDuplicates": false,
  "showDuration": 300,
  "hideDuration": 1000,
  "timeOut": 7000,
  "extendedTimeOut": 5000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>


<style>
    .login-content h1 , h3{
        font-family: IRANSansWeb;
    }
</style>
        </head>


    <body class=" login">



        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 bs-reset mt-login-5-bsfix">
                    <div class="login-bg" style="background-image:url(<?php echo ASSETS;?>pages/img/login/bg1.jpg)">
                       </div>
                </div>
                <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
                    <div class="login-content">
                        <h1>ورود به حساب کاربری</h1>
                        <p> برای ورود به حساب کاربری خود اطلاعات زیر را با دقت وارد کنید </p>
                        <div class="login-form">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <span>نام کاربری و رمز عبور را وارد کنید </span>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="نام کاربری" name="username" id="username" required/> </div>
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="رمز عبور" name="password" id="password" required/> </div>
                            </div>
                            <?php 
                            $token = md5(uniqid(rand(), TRUE));
                            $_SESSION['token'] = $token;
                            $_SESSION['token_time'] = time();
                            ?>
                            <input type="hidden" id="csrf" name="csrf" value="<?=$token?>">

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="rem-password">
                                      
                                    </div>
                                </div>
                                <div class="col-sm-8 text-right">
                                    <div class="forgot-password">
                                        <a href="javascript:;" id="forget-password" class="forget-password">رمز عبور را فراموش کرده ام</a>
                                    </div>
                                    <button class="btn green" onclick="event.preventDefault(); login_form()">ورود</button>

                                    <div id="loading" style="display:none;"> <img src="<?php echo ASSETS; ?>/img/loading.gif" id="loadingimg" width="15" /> در حال انجام ... </div>
                                </div>
                            </div>
                        </div>  

                        <div class="forget-form" action="javascript:;">
                            <h3 class="font-green">فراموشی رمز عبور</h3>
                            <div class="form-group">
                                برای بازیابی رمز عبور با توسعه دهنده تماس بگیرید : <b>09364961262</b>
                                 </div>
                            <div class="form-actions">
                                <button type="button" id="back-btn" class="btn green btn-outline">بازگشت</button>
                            </div>
                        </div>
                    </div>


                    

                    <div class="login-footer">
                        <div class="row bs-reset">
                            <div class="col-xs-5 bs-reset">
                                <ul class="login-social">
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-dribbble"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-7 bs-reset">
                                <div class="login-copyright text-right">
                                    <p><a href="http://faridfr.ir" style="color:grey; text-decoration:none;">توسعه و طراحی توسط فرید فروزان</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<script src="js/signinup.js"></script>

<?php
// require "..".THEME."footer.php";
?>

 <!--[if lt IE 9]>
<script src="<?php echo ASSETS;?>global/plugins/respond.min.js"></script>
<script src="<?php echo ASSETS;?>global/plugins/excanvas.min.js"></script> 
<script src="<?php echo ASSETS;?>global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <script src="<?php echo ASSETS;?>global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo ASSETS;?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo ASSETS;?>global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo ASSETS;?>global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo ASSETS;?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo ASSETS;?>global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="<?php echo ASSETS;?>global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo ASSETS;?>global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo ASSETS;?>global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?php echo ASSETS;?>global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <script src="<?php echo ASSETS;?>global/scripts/app.min.js" type="text/javascript"></script>
        <script src="<?php echo ASSETS;?>pages/scripts/login-5.min.js" type="text/javascript"></script>
                <script src="<?php echo ASSETS;?>js/offline.js"></script>
                <script src="<?php echo ASSETS;?>js/lightbox.js"></script>
                <script type="text/javascript" src="<?php echo ASSETS;?>js/intro.js"></script>
                <script src="<?php echo ASSETS;?>js/dynamic-table.js"></script>
    </body>

</html>
