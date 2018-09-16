<?php 

require_once("../../app/config.php");
if(!isset($_SESSION['username']) || !isset($_POST['form']))
die("<center><h2 style='margin-top:200px;'>OOPS !</h2></center>");


$data 		  = array();
$errors         = array();


if(clear($_POST['form'])=='activate'){


  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql="SELECT * FROM users WHERE id = ".$_SESSION['id'];
  foreach( $pdo->query($sql) as $row) { 
    $activationcode = $row['activationcode'];
    $mobile = $row['mobile'];

    $str = $mobile;
    $mobile = substr($str, 1); 
  }

  

  ini_set("soap.wsdl_cache_enabled", "0");
  try {
    $user = "";
    $pass = "";


    $getnewmessage_parameters = array(
      "username"=>$user,
      "password"=>$pass,
      "from"=>"50001333337375"
      );
    $incomingMessagesClient = new SoapClient("http://87.107.121.52/post/IncomingMessages.asmx?wsdl");
    $res = $incomingMessagesClient->GetReceiveSMSIsNotReadList($getnewmessage_parameters);
    $data = 0;
    foreach($res->GetReceiveSMSIsNotReadListResult->Message as $row){
      if(strtolower($row->Body) == strtolower($activationcode) && $row->Sender == $mobile ) 
      {
        $data = 1;
        break;
      }
    }


  }
  catch (SoapFault $ex) {

  }

  if($data == 1)
  {

    $sql_ajax = "UPDATE users SET confirm=? WHERE id=".clear($_SESSION['id']);
    $q = $pdo->prepare($sql_ajax);
    $q->execute(array('yes'));
    $_SESSION['confirm'] = 'yes';

  }
    $pdo = Database::disconnect();

  header('Content-Type: application/json');
  echo json_encode($data);



}

else if(clear($_POST['form'])==1){


  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  if (empty($_POST['fname']))
   $errors['fname'] = 'وارد کردن نام ضروری است .';

 if(!is_rtl($_POST['fname'])) $errors['fname'] = 'فقط فارسی بنویسید';


 else if (!preg_match("/^\p{L}[\p{L} _.-]+$/u",$_POST['fname'])) {
   $errors['fname'] =  "اسم فقط شامل حروف و فاصله خالی می شود ..."; 
 }


if (!empty($_POST['email']) && !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) ) {
  $errors['email'] = 'لطفا ایمیل معتبر وارد کنید ...';

}
else if (!empty($_POST['email']) && filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))  {
  $sql_ajax = "SELECT * FROM  users WHERE email = ? AND id != ?";
  $q = $pdo->prepare($sql_ajax);
  $q->execute(array($_POST['email'],$_SESSION['id']));

if($q->rowCount()>0)
$errors['email'] = 'این ایمیل قبلا ثبت شده است  !';

}




if (empty($_POST['lname']))
	$errors['lname'] = 'وارد کردن نام خانوادگی ضروری است .';

if(!is_rtl($_POST['lname'])) $errors['lname'] = 'فقط فارسی بنویسید';


else if (!preg_match("/^\p{L}[\p{L} _.-]+$/u",$_POST['lname'])) {
 $errors['lname'] =  "فامیل فقط شامل حروف و فاصله خالی می شود ..."; 
}

if (empty($_POST['mobile']))
	$errors['mobile'] = 'وارد کردن موبایل ضروری است .';



else if(strlen($_POST['mobile'])!=11) 
{
  $errors['mobile'] = 'شماره ی موبایل معتبر نیست ... !';
}


else if(substr($_POST['mobile'], 0, 1)!=0)
  $errors['mobile'] = 'شروع شماره موبایل با 0 است  !';


else  {
  $sql_ajax = "SELECT * FROM  users WHERE mobile = ? AND id != ?";
  $q = $pdo->prepare($sql_ajax);
  $q->execute(array($_POST['mobile'],$_SESSION['id']));

if($q->rowCount()>0)
$errors['mobile'] = 'این شماره قبلا ثبت شده است  !';

}


if ( ! empty($errors)) {

        // if there are items in our errors array, return those errors
	$data['success'] = false;
	$data['errors']  = $errors;
} else {

	$fname       = clear ($_POST['fname']);
	$lname       = clear ($_POST['lname']);
	$email       = clear ($_POST['email']);
	$mobile      = clear ($_POST['mobile']);


  $sql_ajax = "UPDATE users SET fname=?,lname=?,email=?,mobile=? WHERE id=".clear($_SESSION['id']);
  $q = $pdo->prepare($sql_ajax);
  $q->execute(array($fname,$lname,$email,$mobile));

  $_SESSION['name'] = $fname." ".$lname;
  $_SESSION['mobile'] = $mobile;


sms($_SESSION['mobile'],"شماره همراه : ".$_SESSION['mobile']." در سیستم ارتاک برای شما ثبت شد");
     send_browser_noti( array('maghsad' => $_SESSION['id'], 'matn' => "شماره همراه : ".$_SESSION['mobile']." در سیستم ارتاک برای شما ثبت شد", 'small_picture' => 'http://artakit.com/upload/avatars/'.$_SESSION['profilepicurl'].'.jpg' , 'android_group'=>'profile'));
sms(ADMIN_MOBILE,"کارمند : ".$_SESSION['name']." شماره همراه : ".$_SESSION['mobile']." را برای خود ثبت کرد");
     send_browser_noti( array('maghsad' => ADMIN_ID, 'matn' => "کارمند : ".$_SESSION['name']." شماره همراه : ".$_SESSION['mobile']." را برای خود ثبت کرد", 'small_picture' => 'http://artakit.com/upload/avatars/'.$_SESSION['profilepicurl'].'.jpg' , 'android_group'=>'profile'));


  $data['success'] = true;
  $data['message'] = 'اطلاعات با موفقیت ثبت شدند ';

}

  $pdo = Database::disconnect();

header('Content-Type: application/json');
echo json_encode($data);

}

// form2

else if (clear($_POST['form'])==2){

  if (!empty($_POST['website'])){


    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",clear($_POST['website']))) {
      $errors['website']  = ' آدرس وبسایت صحیح نیست '; 
    }

  }

  if (!empty($_POST['phone']))
  {
    if(!is_numeric(clear($_POST['phone']))){
     $errors['phone'] ='لطفا برای تلفن عدد وارد کنید !';

   }

 }




 if ( ! empty($errors)) {

        // if there are items in our errors array, return those errors
   $data['success'] = false;
   $data['errors']  = $errors;
 } else {

  /*  $rooz_tavalod = clear ($_POST['rooz-tavalod']);
    $mah_tavalod = clear ($_POST['mah-tavalod']);
    $sal_tavalod = clear ($_POST['sal-tavalod']);
*/

    $birth ="0000-00-00";
    if(!empty($_POST['tavalod'])){
      $tavalod = clear ($_POST['tavalod']);
      $t = explode("-",$tavalod);

      $birth = getmiladi_bisaat($t[0],$t[1],$t[2]);
    }
    $phone = '';
    $website = '';  
    $about_me = '';
    $state='';
    $city='';
    // $tahsilat='';
    $job='';

    // if(!empty(clear ($_POST['tahsilat']))){
    //   $tahsilat  = clear ($_POST['tahsilat']);
    // }

    if(!empty(clear ($_POST['phone']))){
      $phone  = clear ($_POST['phone']);
    }
    if(!empty(clear ($_POST['website']))){
      $website  = clear ($_POST['website']);
    }
    if(!empty(clear ($_POST['about_me']))){
     $about_me   = clear ($_POST['about_me']);
   }
   if(!empty(clear ($_POST['state']))){
     $state   = clear ($_POST['state']);
   }
   if(!empty(clear ($_POST['city']))){
     $city   = clear ($_POST['city']);
   }
   if(!empty(clear ($_POST['job']))){
     $job   = clear ($_POST['job']);
   }

   $pdo = Database::connect();
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql_ajax = "UPDATE users SET job=?,phone=?,website=?,about_me=?,birthdate=?,state=?,city=?  WHERE id=".clear($_SESSION['id']);
   $q = $pdo->prepare($sql_ajax);
   $q->execute(array($job,$phone,$website,$about_me,$birth,$state,$city));
   $pdo = Database::disconnect();


   $data['success'] = true;
   $data['message'] = 'اطلاعات با موفقیت ثبت شدند ';
 }
 header('Content-Type: application/json');
 echo json_encode($data);



}

//form 3

else if (clear($_POST['form'])==3){
	

  if (!empty($_POST['melli']))
  {
    if(clear($_POST['melli'])=="error"){

      $errors['melli'] =' کد ملی اعتبار ندارد ! ';
    } 

  }

  if (!empty($_POST['shenasname']))
  {
    if(!is_numeric(clear($_POST['shenasname']))){
     $errors['shenasname'] ='لطفا برای شماره شناسنامه عدد وارد کنید !';

   }

 }

 if (!empty($_POST['postcode']))
 {
  if(!is_numeric(clear($_POST['postcode']))){
   $errors['postcode'] ='لطفا برای کد پستی عدد وارد کنید !';

 }

}


if (!empty($_POST['father']))
{

 if (!preg_match("/^\p{L}[\p{L} _.-]+$/u",$_POST['father'])) 
   $errors['father'] =  "اسم پدر فقط شامل حروف و فاصله خالی می شود ..."; 

}




if ( ! empty($errors)) {
  $data['success'] = false;
  $data['errors']  = $errors;
} else {


  $melli      = clear ($_POST['melli']);
  $shenasname = clear ($_POST['shenasname']);
  $father     = clear ($_POST['father']);
  $address    = clear ($_POST['address']);
  $postcode   = clear ($_POST['postcode']);

  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql_ajax = "UPDATE users SET melli=?,shenasname=?,father=?,address=?,postalcode=?  WHERE id=".clear($_SESSION['id']);
  $q = $pdo->prepare($sql_ajax);
  $q->execute(array($melli,$shenasname,$father,$address,$postcode));
  $pdo = Database::disconnect();







  $data['success'] = true;
  $data['message'] = 'اطلاعات با موفقیت ثبت شدند ';
}



header('Content-Type: application/json');
echo json_encode($data);

}


//form 4

else if (clear($_POST['form'])==4){


 if (empty($_POST['n_pwd']))
 {
  $errors['n_pwd'] = ' ورودی خالی قابل قبول نیست ';
}

else if(strlen($_POST['n_pwd'])<6) 
{
  $errors['n_pwd'] = ' باید بیشتر از 6 کاراکتر باشد  !';
}

if (empty($_POST['c_pwd']))
{
  $errors['c_pwd'] = ' ورودی خالی قابل قبول نیست ';
}
if (empty($_POST['rt_pwd']))
{
  $errors['rt_pwd'] = ' ورودی خالی قابل قبول نیست ';
}

if($_POST['n_pwd']!=$_POST['rt_pwd']) 
{
  $errors['rt_pwd'] = ' باید با قبلی برابر باشد !';
}



if ( ! empty($errors)) {

  $data['success'] = false;
  $data['errors']  = $errors;
} else {


 $pdo = Database::connect();
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql_ajax = "SELECT * FROM users where username=? LIMIT 1";
 $q = $pdo->prepare($sql_ajax);
 $q->execute(array($_SESSION['username']));
 $ec = $q->fetch(PDO::FETCH_ASSOC);

 if($q->rowCount() > 0)
 {
   if(password_verify($_POST['c_pwd'], $ec['password']))
   {

     $sql_ajax = "UPDATE users SET password=?  WHERE id=".clear($_SESSION['id']);
     $q = $pdo->prepare($sql_ajax);
     $q->execute(array(password_hash(clear($_POST['n_pwd']), PASSWORD_DEFAULT)));

     $pdo = Database::disconnect();
     session_destroy();

   }
   else {
     $errors['c_pwd'] = ' رمز قبلی صحیح نیست ! ';

   }
 }
 else {

   $errors['c_pwd'] = ' لطفا این مشکل را با مدیر سایت در میان بگذارید ';

 }


}

if ( ! empty($errors)) {

  $data['success'] = false;
  $data['errors']  = $errors;
}
else {

 $data['success'] = true;
 $data['message'] = 'اطلاعات با موفقیت ثبت شدند | برای استفاده از سیستم باید دوباره وارد شوید ';
}

header('Content-Type: application/json');
echo json_encode($data);

}
?>