<?php 
require("../app/config.php");
auth ('foruser',basename(__FILE__,".php"));

if (!isset($_GET['id'])) {
  header('Location: user_list');
}else{
  $sql = "SELECT id FROM users WHERE id = ?";
  $query= $pdo->prepare($sql);
  $query->execute(array($_GET['id']));
  $result = $query->fetch(PDO::FETCH_ASSOC);

  if (isset($result['id'])) {
  $_SESSION['karmand_id'] = clear($_GET['id']);
  }else{
    die("<center><h2 style='margin-top:200px;'>Security Team</h2></center>");
  }
}

require "..".THEME."header.php";

$sql = "SELECT * FROM users WHERE id = ?";
$query= $pdo->prepare($sql);
$query->execute(array($_GET['id']));
$result = $query->fetch(PDO::FETCH_ASSOC);

?>


<div class="row">
  <div class="col-md-12">


    <div class="portlet light">
      <div class="portlet-title">
        <div class="caption">
         ویرایش مدیر
       </div>


                                     <div class="actions">
                                        <div class="btn-group btn-group-devided">
                                           
                                               <a href="user_list" class="btn btn-outline green-meadow">لیست مدیران</a>
                                         
                                        </div>
                                    </div>
     </div>


     <div class="portlet-body"  style="min-height:480px;">



      <form method="POST" id="user_edit" onsubmit="event.preventDefault(); user_edit()">


        <div class="row">
          <div class="col-sm-3">
            <div id="username-div" class="form-group form-md-line-input form-md-floating-label">
              <input class="form-control input-sm" id="username" name="username" value="<?=$result['username']?>" autocomplete="off"  onblur="username_check_user_edit();">
              <label for="username">نام مدیر</label>
            </div>
            <div id="loading_username" style="display:none;"> <img src="<?php echo ASSETS; ?>/img/loading.gif" width="15" /> در حال انجام ... </div>

          </div>

          <div class="col-sm-3">
            <div class="form-group form-md-line-input form-md-floating-label">
              <input type="password" class="form-control input-sm" id="pass1" name="pass1" autocomplete="off">
              <label for="pass1">رمز عبور</label>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group form-md-line-input form-md-floating-label">
              <input type="password" class="form-control input-sm" id="pass2" name="pass2" autocomplete="off">
              <label for="pass2">تکرار رمز عبور</label>
            </div>
          </div>
          



        </div>

        <div class="row">
          <div class="col-sm-3">

            <div class="form-group form-md-line-input form-md-floating-label">
              <input type="text" class="form-control input-sm" autocomplete="off" id="fname" name="fname" value="<?=$result['fname']?>">
              <label for="fname">نام</label>
            </div>

          </div>

          <div class="col-sm-3">

            <div class="form-group form-md-line-input form-md-floating-label">
              <input type="text" class="form-control input-sm" autocomplete="off" id="lname" name="lname" value="<?=$result['lname']?>">
              <label for="lname">نام خانوادگی</label>
            </div>

          </div>

           <div class="col-sm-3">

          <div class="form-group form-md-line-input form-md-floating-label">
            <input type="text" class="form-control input-sm" autocomplete="off" id="mobile" name="mobile" value="<?=$result['mobile']?>">
            <label for="mobile">موبایل</label>
          </div>

        </div>

          
         
          <?php 
          $token = md5(uniqid(rand(), TRUE));
          $_SESSION['token'] = $token;
          $_SESSION['token_time'] = time();
          ?>
          <input type="hidden" id="csrf" name="csrf" value="<?=$token?>">

        
      </div>
      <div class="row">
       
         <div class="col-sm-3">

          <div class="form-group form-md-line-input form-md-floating-label">
            <input type="text" class="form-control input-sm" autocomplete="off" id="email" name="email" value="<?=$result['email']?>">
            <label for="email">ایمیل</label>
          </div>

        </div>

        <div class="col-sm-3">

          <div class="form-group form-md-line-input form-md-floating-label">
            <input type="text" class="form-control input-sm" autocomplete="off" id="phone" name="phone" value="<?=$result['phone']?>" >
            <label for="phone">تلفن ثابت</label>
          </div>

        </div>
       
       

      </div>
      <div class="row">
        
        <div class="col-sm-2">
        <?php //set default value for radio buttom
        if ($result['active'] == 'yes') {
          $active_check = 'checked="checked"';
          $deactive_check = '';
        }else{
          $active_check = '';
          $deactive_check = 'checked="checked"';
        }

        ?>
         <div class="form-group" style="color: #999">
                                                <label>وضعیت</label>
                                                <div class="mt-radio-list ">
                                                    <label class="mt-radio"> فعال
                                                        <input value="yes" name="status" type="radio" <?=$active_check?> >
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio"> غیر فعال
                                                        <input value="no" name="status" type="radio" <?=$deactive_check?> >
                                                        <span></span>
                                                    </label>
                                                    
                                                </div>
                                            </div>
      </div>

      <div class="col-sm-2">
         <div class="form-actions noborder" style="margin-top:45px;">
        <button type="submit" class="btn blue" style="float:left; margin-right:3px;">ذخیره</button>
        <button type="reset" class="btn default" style="float:left;">پاک کردن</button>

        <div id="loading_username" style="display:none;"> <img src="<?php echo ASSETS; ?>/img/loading.gif" id="loadingImage" width="15" /> در حال انجام ... </div>
        
      </div>

                                                
      </div>



      

    </form>

  </div>
</div>

</div>




</div>


<script src="js/user_create.js"></script>

<?php
require "..".THEME."footer.php";
?>