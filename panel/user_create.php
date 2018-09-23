<?php 
require("../app/config.php");
auth ('foruser',basename(__FILE__,".php"));
require "..".THEME."header.php";

?>
<div class="row">

  <form method="POST" id="user_create" onsubmit="event.preventDefault(); user_create()">

   <div class="col-md-6">
    <div class="portlet light">
      <div class="portlet-title">
        <div class="caption">
         مدیر جدید
       </div>


       <div class="actions">
        <div class="btn-group btn-group-devided">

         <a href="user_list" class="btn green-meadow">لیست مدیران</a>

       </div>
     </div>
   </div>

   <div class="portlet-body" >
     <div class="row">

      <?php 
          $token = md5(uniqid(rand(), TRUE));
          $_SESSION['token'] = $token;
          $_SESSION['token_time'] = time();
          ?>
          <input type="hidden" id="csrf" name="csrf" value="<?=$token?>">

       <div class="col-sm-12">
        <div class="form-group form-md-line-input form-md-floating-label" id="username-div">
          <input class="form-control input-sm" id="username" name="username" autocomplete="off">
          <label for="username">نام کاربری</label>
        </div>
        <div id="loading_username" style="display:none;"src="<?php echo ASSETS; ?>/img/loading.gif" id="loading_username" width="15" /> در حال انجام ... </div>

      </div> 



    </div>

    <div class="row">
      

 <div class="col-sm-6">
      <div class="form-group form-md-line-input form-md-floating-label">
        <input type="password" class="form-control input-sm" id="pass1" name="pass1" autocomplete="off">
        <label for="pass1">رمز عبور</label>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="form-group form-md-line-input form-md-floating-label">
        <input type="password" class="form-control input-sm" id="pass2" name="pass2" autocomplete="off">
        <label for="pass2">تکرار رمز عبور</label>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">

      <div class="form-group form-md-line-input form-md-floating-label">
        <input type="text" class="form-control input-sm" autocomplete="off" id="fname" name="fname">
        <label for="fname">نام</label>
      </div>

    </div>

    <div class="col-sm-6">

      <div class="form-group form-md-line-input form-md-floating-label">
        <input type="text" class="form-control input-sm" autocomplete="off" id="lname" name="lname">
        <label for="lname">نام خانوادگی</label>
      </div>

    </div>
  </div>

  <div class="row">
   <div class="col-sm-6">

    <div class="form-group form-md-line-input form-md-floating-label">
      <input type="text" class="form-control input-sm" autocomplete="off" id="mobile" name="mobile">
      <label for="mobile">موبایل</label>
    </div>

  </div>
  <div class="col-sm-6">
   <div class="form-group" style="color: #999">
    <label>وضعیت</label>
    <div class="mt-radio-list ">
      <label class="mt-radio"> فعال
        <input value="yes" name="status" type="radio" checked="checked">
        <span></span>
      </label>
      <label class="mt-radio"> غیر فعال
        <input value="no" name="status" type="radio">
        <span></span>
      </label>

    </div>
  </div>
</div>
</div>

<div class="row">
  <div class="col-sm-12">
   <div class="form-actions noborder" style="margin-top:45px;">
    <button type="submit" class="btn blue" style="float:left; margin-right:3px;">ذخیره</button>
    <button type="reset" class="btn default" style="float:left;">پاک کردن</button>

    <div id="loading" style="display:none;"> <img  src="<?php echo ASSETS; ?>/img/loading.gif" id="loading" width="15" /> در حال انجام ... </div>

  </div>


</div>
</div>


</div>

</div>

</div>








<div class="col-md-6">
  <div class="portlet light">
    <div class="portlet-body" style="min-height: 532px">
      <div class="portlet box blue ">
        <div class="portlet-title">
          <div class="caption">
            <i class="fa fa-gift"></i> موارد اختیاری </div>
            <div class="tools">
              <a href="" class="collapse"> </a>
            </div>
          </div>
          <div class="portlet-body">
           
            <div class="row">
             <label class="col-md-3 control-label" >تلفن ثابت</label>
             <div class="col-md-9">
              <div class="form-group">
                <input type="text" class="form-control input-sm" autocomplete="off" id="phone" name="phone">

              </div>             
            </div>

          </div>

          <div class="row">
            <label class="col-md-3 control-label" >ایمیل</label>
            <div class="col-md-9">
              <div class="form-group">
                <input type="text" class="form-control input-sm" autocomplete="off" id="email" name="email">


              </div>             
            </div>

          </div>

          
        </div>

      </div>
          
    </div>
  </div>




</div>
</form>





<script src="js/user_create.js"></script>

<?php
require "..".THEME."footer.php";
?>