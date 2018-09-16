<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
    <!--<![endif]-->

    <head>
        <meta charset="utf-8" />
        <title>پنل مدیریتی نرم افزار اندروید</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="weband" name="android app admin panel" />
        <meta content="weband" name="Farid Froozan" />

        <link href="<?php echo ASSETS;?>css/select2.min.css" rel="stylesheet">
        <link href="<?php echo ASSETS;?>css/select2-bootstrap.min.css" rel="stylesheet">
        
        <link href="<?php echo ASSETS;?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS;?>global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS;?>global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
   

        <link href="<?php echo ASSETS;?>global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />


       <!--  <link href="<?php echo ASSETS;?>global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS;?>global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" /> -->


         <link href="<?php echo ASSETS;?>global/plugins/jquery-nestable/jquery.nestable.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo ASSETS;?>global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS;?>global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo ASSETS;?>global/css/components-md-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo ASSETS;?>global/css/plugins-md-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS;?>layouts/layout2/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS;?>layouts/layout2/css/themes/blue-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo ASSETS;?>layouts/layout2/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS;?>global/css/font.css" rel="stylesheet" type="text/css" />


  <link href="<?php echo ASSETS;?>css/toastr.css" rel="stylesheet">
  <script src="<?php echo ASSETS;?>js/jquery.min.js"></script>
  <script src="<?php echo ASSETS;?>js/toastr.js"></script>


  <link href="<?php echo ASSETS;?>css/jquery.fileuploader.css" media="all" rel="stylesheet">
    <link href="<?php echo ASSETS;?>css/jquery.fileuploader-theme-dragdrop.css" media="all" rel="stylesheet">
    <link href="<?php echo ASSETS;?>css/jquery.fileuploader-theme-thumbnails.css" media="all" rel="stylesheet">
    

<script>
  
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "rtl": true,
  "positionClass": "toast-bottom-left",
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
table td a{
    margin-left: 3px;
}
    .pull-left{
        float: left;
        text-align: left;
    }
</style>
    <link href="<?php echo ASSETS;?>css/introjs.css" rel="stylesheet">
    <link href="<?php echo ASSETS;?>css/introjs-rtl.css" rel="stylesheet">
    <link href="<?php echo ASSETS;?>css/offline.css" rel="stylesheet">
    <link href="<?php echo ASSETS;?>css/offline-language-persian.css" rel="stylesheet">
    <link href="<?php echo ASSETS;?>css/offline-language-persian-indicator.css" rel="stylesheet">


        <link rel="shortcut icon" href="favicon.ico" />

          <link rel="stylesheet" href="<?php echo ASSETS;?>css/jtheme.css">
                              <script src="<?php echo ASSETS;?>js/jalali.js"></script>
                              <script src="<?php echo ASSETS;?>js/calendar.js"></script>
                              <script src="<?php echo ASSETS;?>js/calendar-setup.js"></script>
                              <script src="<?php echo ASSETS;?>js/calendar-fa.js"></script>

    
                              </head>

    <body class="page-header-fixed page-sidebar-closed-logo page-container-bg-solid page-md">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <!-- <a href="index.html"> -->
                        <!-- <img src="<?php echo ASSETS;?>layouts/layout2/img/logo-default.png" alt="logo" class="logo-default" /> </a> -->
                        <p style="text-align:center; display:inline-block; font-size:22px; font-weight:200; color:white;"></p>
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE ACTIONS -->
                <!-- DOC: Remove "hide" class to enable the page header actions -->
                <div class="page-actions">
                    <div class="btn-group">
                    
                    </div>
                </div>
                <!-- END PAGE ACTIONS -->
                <!-- BEGIN PAGE TOP -->
                <div class="page-top ">
                    <!-- BEGIN HEADER SEARCH BOX -->
                    <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                   
                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu ">
                        <ul class="nav navbar-nav ">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class below "dropdown-extended" to change the dropdown styte -->
                            <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                            <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                           
                          
                            <!-- END INBOX DROPDOWN -->
                            <!-- BEGIN TODO DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                          
                           
                            <!-- END TODO DROPDOWN -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    
                                    <span class="username username-hide-on-mobile"> <?=$_SESSION['name']?></span>

                                    <img alt="" class="img-circle" src="../upload/avatars/<?=$_SESSION['profilepicurl']?>.jpg" />

                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="profile_edit">
                                            <i class="icon-user"></i> ویرایش پروفایل </a>
                                    </li>
                                    <li>
                                        <a href="logout">
                                            <i class="icon-key"></i> خروج </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->

         <!-- BEGIN CONTAINER -->
        <div class="page-container">

        <?php 
            require_once'sidebar.php';
        ?>

          <div class="page-content-wrapper">
          <div class="page-content">