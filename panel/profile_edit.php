<?php 
require_once '../app/config.php';
auth ('foruser',basename(__FILE__,".php"));

require "../".THEME."header.php";

$sql="SELECT * FROM users WHERE id=".clear($_SESSION['id']);

foreach ($pdo->query($sql) as $q) {

	
	$active1 = '';
	$active2 = '';
	$active3 = '';
	$active4 = '';

	if(isset($_GET['tab']))
	{

		if (clear($_GET['tab'])=='1'){
			$active1 = 'active';
		}
		else if (clear($_GET['tab'])=='2'){
			$active2 = 'active';
		}
		else if (clear($_GET['tab'])=='3'){
			$active3 = 'active';
		}
		else if (clear($_GET['tab'])=='4'){
			$active4 = 'active';
		}

	}
	else {
		$active1 = 'active';
	}

	?>


	<section class="panel">
		<header class="panel-heading tab-bg-dark-navy-blue ">

		
			<ul class="nav nav-tabs">
				<li class="<?=$active1?>">
					<a data-toggle="tab" href="#tab1" accesskey="1">اطلاعات اصلی و الزامی</a>
				</li>
				<li class="<?=$active2?>">
					<a data-toggle="tab" href="#tab2" accesskey="2">تغییر عکس پروفایل</a>
				</li>
				<li class="<?=$active4?>">
					<a data-toggle="tab" href="#tab4" accesskey="4">تغییر رمز عبور</a>
				</li>
			</ul>
		</header>
		
		<div class="panel-body">
			<div class="tab-content">
				<div id="tab1" class="tab-pane <?=$active1?>">
					
					<form class="form-horizontal" onsubmit="event.preventDefault(); form1()" role="form" method="POST" id="form1">
					<?php
					if(isset($_GET['activate'])){
if(clear($_GET['activate'])==1){
	?>

			<?php
}}
?>
<div class="alert alert-info fade in" style="margin-bottom:25px;">

				<strong>اطلاعات اصلی : </strong> این اطلاعات باید در سایت وارد شده باشند تا ارتباط مدیریت با شما برقرار باشد 
			</div>


						<div class="form-group">
							<label class="col-sm-2 control-label">نام</label>
							<div class="col-sm-5">
								<input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" name="fname" type="text" class="form-control" id="fname" placeholder="نام"value="<?=$q['fname']?>" >
							</div>

						</div><div class="form-group">
						<label class="col-sm-2 control-label">نام خانوادگی</label>
						<div class="col-sm-5">
							<input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" name="lname" type="text" class="form-control" id="lname" placeholder="نام خانوادگی" value="<?=$q['lname']?>">
						</div>

					</div>

					
<div>
					<div class="form-group">
						<label class="col-sm-2 control-label">موبایل</label>
						<div class="col-sm-5">
							<input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="text" name="mobile" class="form-control" id="mobile" placeholder=" " value="<?=$q['mobile']?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">ایمیل</label>
						<div class="col-sm-5">
							<input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="text" class="form-control" name="email" id="email" placeholder=" " value="<?=$q['email']?>"                                           >
						</div>
					</div>
</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">

							<button type="reset" class="btn btn-default">ریست</button>
							<button  type="submit" id="save1" name="save1"  class="btn btn-success">ذخیره</button>  <div id="loading" style="display:none;"> <h5><img src="http://i.stack.imgur.com/FhHRx.gif" id="loadingImage" width="15" /> در حال انجام ... </h5> </div>

						</div>
					</div>
				</form>
			</div>
			<div id="tab2" class="tab-pane  <?=$active2?>">


<div class="alert alert-info fade in" style="margin-bottom:25px;">

				<strong>تغییر عکس پروفایل : </strong> فعلا عکس پروفایل فقط در پنل به نمایش در می آید
			</div>

				<div class="row">
					<div class="col-sm-5">


					<!--collapse start-->
<div class="panel-group m-bot20" id="accordion" >
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
        تغییر عکس پروفایل</a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in">
        <div class="panel-body">



	<form action="ajax/upload_profile_pic.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" >	
							

							<aside class="profile-nav alt green-border">
								<section class="panel">
									<div class="user-heading alt green-bg">
									<center>
										<a href="#">
											<img id="avatar" class="img-responsive img-circle" width="250" alt="" src="../upload/avatars/<?=$q['profilepicurl']?>.jpg">
										</a>
									</center>
									</div>


								</section>
							</aside>
							<div class="alert alert-warning fade in">
								
								<center>
									<label class="control-label">یک عکس را انتخاب کنید ( با اندازه زیر 500*500 پیکسل )</label> <br><br>    
									<div class="form-group">
										
										
										<input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="file" class="file-pos" name="myfile"  style="display:inline-block">				
										
										<button type="submit" name="submitBtn" class="btn btn-success" style="display:inline-block">ذخیره</button>
										
										<div id="f1_upload_process"><h5><img src="http://i.stack.imgur.com/FhHRx.gif" width="15" /> در حال انجام ... </h5></div>
									</div>
								</center>
								<p id="result"></p>			
							</form>


							<iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
							<script>
								function startUpload(){
									document.getElementById('f1_upload_process').style.visibility = 'visible';
									return true;
								}
								function stopUpload(success,url){
									var result = '';
									if (success == 1){
										document.getElementById('result').innerHTML =
										'<span class="msg">تصویر پروفایل با موفقیت ذخیره شد ...<\/span><br/><br/>';
										$('.user-heading>a>img#avatar').attr('src','../upload/avatars/'+url+'.jpg');
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

  </div>
  
</div>
<!--collapse end-->


					

					</div> <!-- end column two -->
				
					
				</div> <!-- end row -->
			</div> <!-- end tab3 -->
			
			<div id="tab4" class="tab-pane  <?=$active4?>">


<div class="alert alert-info fade in" style="margin-bottom:25px;">

				<strong>اطلاعات امنیتی و حریم خصوصی : </strong> برای افزایش امنیت حساب کاربری شما
			</div>

				<form class="form-horizontal" id="form4" method="post" role="form" onsubmit="event.preventDefault(); form4()">

					<div class="form-group">
						<label class="col-sm-2 control-label">رمز فعلی</label>
						<div class="col-sm-6">
							<input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="password" class="form-control" name="c_pwd" id="c_pwd" placeholder=" ">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">رمز جدید</label>
						<div class="col-sm-6">
							<input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="password" class="form-control" name="n_pwd" id="n_pwd" placeholder=" ">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">تکرار رمز جدید</label>
						<div class="col-sm-6">
							<input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="password" class="form-control" name="rt_pwd" id="rt_pwd" placeholder=" ">
						</div>
					</div>




					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">

							<button type="reset" class="btn btn-default">ریست</button>
							<button type="submit" name="save4" class="btn btn-success">ذخیره</button>
							<div id="loading" style="display:none;"> <h5><img src="http://i.stack.imgur.com/FhHRx.gif" id="loadingImage" width="15" /> در حال انجام ... </h5> </div>
						</div>
					</div>
				</form>
			</div>


			
		</div>
	</div>
</div>
</section>


</aside>
</div>




<!-- page end-->
 
<script src="js/profile_edit.js"></script>
<?php 

}

require "../".THEME."footer.php";
?>
<script type="text/javascript">
      if (RegExp('multipage', 'gi').test(window.location.search)) {
        introJs().start();
      }
    </script>