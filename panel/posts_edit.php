<?php 
require("../app/config.php");
auth ('foruser',basename(__FILE__,".php"));
if(!isset($_GET['id']))
{
    header("Location: ".SITE_URL."/panel/posts_list");
}
$_SESSION['last_post_id'] = $_GET['id'];
require "..".THEME."header.php";
$post = get_post_with_id($_GET['id']);

  foreach ($post as $row) {
    $_SESSION['last_post_type'] = $row['type'];
    $type = $row['type'];
    if($row['thumbnail']=='')
        $th='no-avatar';
    else 
        $th = $row['thumbnail'];

$files = get_post_files($_GET['id'],$type);
?>
<iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>


<div class="row" id="textbox">
    <div class="col-md-8">


        <div class="portlet light ">
            <div class="portlet-title" style="margin-bottom:0px; padding-top:0px;">
                <div class="caption">
                 ویرایش محتوا <div class="btn-group btn-group-devided">
             </div>
         </div>

         <div class="tools"> </div>
         <div class="actions">
           <a href="posts_list" class="btn btn-xs btn-outline green-meadow">بازگشت</a>
       </div>

   </div>
   <div class="portlet-body" style="padding-top:20px;">

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-pencil"></i>
            </span>
            <input type="text" id="title" name="title" class="form-control" placeholder="عنوان محتوا"value="<?=$row['title']?>"> </div>
        </div>

            <div class="form-group" <?php if($type=='video') { ?> style='display:none;' <?php } ?>>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-file-text-o"></i>
                </span>
                <textarea rows="10" type="text" id="text" name="text" class="form-control" placeholder="متن و توضیحات"><?=$row['text']?></textarea></div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    <?php 
                           $date = date("Y-m-d H:i:s", $row['date']);
                     ?>
                    <input type="text" id="senddate" name="senddate" class="form-control" placeholder="زمان ارسال ( برای ارسال فوری , این بخش را خالی بگذارید )" value="<?=to_jalali($date)?>"> </div>
                </div>

                <script>
                   Calendar.setup({
                      inputField: 'senddate',
                      button: 'senddate',
                      ifFormat: '%Y-%m-%d %H:%M',
                      showsTime      :    true,
                      timeFormat     :    "24",
                      dateType: 'jalali',
                      /*  onClose : write_for_date,*/
                      showOthers  : false
                  });
              </script>

          

            <button class="btn btn-success" style="width:100%; margin-bottom:10px;" onclick="event.preventDefault();edit_post();" id="createpostbutton">ذخیره</button>

        </div>
    </div>

</div>
<div class="col-md-4">
    <form action="ajax/upload_thumbnail.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" > 
              

              <aside class="profile-nav alt green-border">
                <section class="panel">
                  <div class="user-heading alt green-bg" style="padding:15px;">
                  <center>
                    <a href="#">
                      <img id="avatar" class="img-circle" width="150" alt="" src="../upload/thumbnails/<?=$th?>.jpg">
                    </a>
                  </center>
                  </div>


                </section>
              </aside>
              <div class="alert alert-warning fade in">
                
                <center>
                  <label class="control-label">یک عکس را انتخاب کنید</label> <br><br>    
                  <div class="form-group">
                    
                    
                    <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="file" class="file-pos" name="myfile"  style="display:inline-block">       
                    
                    <button type="submit" name="submitBtn" class="btn btn-success" style="display:inline-block">ذخیره</button>
                    
                    <div id="f1_upload_process"><h5><img src="http://i.stack.imgur.com/FhHRx.gif" width="15" /> در حال انجام ... </h5></div>
                  </div>
                </center>
                <p id="result"></p>     
              </form>


              <script>
                function startUpload(){
                  document.getElementById('f1_upload_process').style.visibility = 'visible';
                  return true;
                }
                function stopUpload(success,url){
                  var result = '';
                  if (success == 1){
                    document.getElementById('result').innerHTML =
                    '<span class="msg">تصویر محتوا با موفقیت ذخیره شد ...<\/span><br/><br/>';
                    $('#avatar').attr('src','../upload/thumbnails/'+url+'.jpg');
                  }
                  else if (success == 2){
                    document.getElementById('result').innerHTML =
                    '<span class="msg">پسوند فایل مجاز نیست !<\/span><br/><br/>';
                  }
                  else {
                    document.getElementById('result').innerHTML = 
                    '<span class="emsg">در آپلود تصویر مشکلی پیش آمد ! دوباره امتحان کنید ...<\/span><br/><br/>';
                  }
                  document.getElementById('f1_upload_process').style.visibility = 'hidden';
                  return true;   
                }
              </script>  

              <style>
                #f1_upload_process{
                  z-index:100;
                  position:absolute;
                  visibility:hidden;
                  text-align:center;
                  background-color:#fff;
                }
              </style>
</div>

</div>
</div>
<div class="row" id="attachbox">


    <div class="portlet light ">
        <div class="portlet-title" style="margin-bottom:0px; padding-top:0px;">
            <div class="caption">
             آپلود پیوست <div class="btn-group btn-group-devided">
         </div>
     </div>

     <div class="tools"> </div>
     <div class="actions">
   </div>

</div>
<div class="portlet-body" style="padding-top:20px;">

<div class="row">

  <div class="col-md-6">
<input type="file" name="files">
  </div>

<div class="col-sm-6">
لیست فایل ها :<br><hr>
  <?php foreach ($files as $file) { ?>
      <div id="file<?=$file['id']?>"><a class='btn btn-xs btn-outline green-meadow' href="../upload/files/<?=$file['address']?>"><?=$file['address']?></a> <a onclick='delete_file(<?=$file['id']?>);' class='btn btn-xs btn-outline green-meadow'>حذف</a><hr></div>
  <?php } ?>
</div>


</div>
</div>
</div>




</div>
 


<script src="js/posts_create.js"></script>

<?php }
require "..".THEME."footer.php";
?>