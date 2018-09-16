<?php 

require_once("../../app/config.php");
if(!isset($_SESSION['username']) || !isset($_POST['form']))
die("<center><h2 style='margin-top:200px;'>Security Team</h2></center>");

$data 			    = array();
$errors         = array();

if(clear($_POST['form'])=='karmand_create'){

  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT username FROM users";
  $query= $pdo->prepare($sql);
  $query->execute(array());
  $results = $query->fetchAll(PDO::FETCH_ASSOC);

  foreach ($results as $result) {   
    if ($result['username'] == $_POST['username']) {
      $errors['exist'] = 'این نام کاربری قبلا ثبت شده است';
    }
  }


 if (empty($_POST['username']))
   $errors['username'] = ' نام کاربری وارد نشده است ';

 if (empty($_POST['pass1']))
   $errors['pass1'] = ' رمز عبور  وارد نشده است';

 if (empty($_POST['pass2']))
   $errors['pass2'] = ' تکرار رمز عبور وارد نشده است ';

 if(! empty($_POST['pass1']) && ! empty($_POST['pass2']) && $_POST['pass1'] != $_POST['pass2']){
  $errors['nomatch'] = 'رمز های عبور یکسان نیستند';
}

if (empty($_POST['fname']))
 $errors['fname'] = ' نام وارد نشده است ';

if (empty($_POST['lname']))
 $errors['lname'] = ' نام خانوادگی وارد نشده است';

if (!empty($_POST['email'])) 
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
    $errors['email'] = 'ایمیل وارد شده نا معتبر است';
  else{
    $sql_ajax = "SELECT * FROM  users WHERE email = ? ";
    $q = $pdo->prepare($sql_ajax);
    $q->execute(array($_POST['email']));

    if($q->rowCount()>0){
      $errors['email'] = 'این ایمیل قبلا ثبت شده است';
    }
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
  $sql_ajax = "SELECT * FROM  users WHERE mobile = ? ";
  $q = $pdo->prepare($sql_ajax);
  $q->execute(array($_POST['mobile']));

if($q->rowCount()>0)
$errors['mobile'] = 'این شماره قبلا ثبت شده است  !';

}


 if (!isset($_SESSION['token']) || empty($_POST['csrf'])) {
   $errors['csrf'] = 'رویداد مشکوک';
 }else if ($_SESSION['token']!= $_POST['csrf']){
   $errors['csrf'] = 'رویداد مشکوک';
 }




if ( ! empty($errors)) {
	$data['success'] = false;
	$data['errors']  = $errors;
} else {

  $username       = clear ($_POST['username']);
	// $username       = "aaa";
	$password     = clear ($_POST['pass1']);
  $password       = password_hash($password, PASSWORD_DEFAULT);
	// $password       = password_hash("aaa", PASSWORD_DEFAULT);
  $fname       = clear ($_POST['fname']);
  // $fname       = "aaa";
  $lname       = clear ($_POST['lname']);
  // $lname       = "aaa";

  
  $mobile       = clear ($_POST['mobile']);
  // $mobile       = "";
  $phone       = clear ($_POST['phone']);
  // $phone       = "";
  $email       = clear ($_POST['email']);
  // $email       = "";
  $status       = clear ($_POST['status']);
  // $status       = "yes";

  $registerdate =  date('Y-m-d H:i:s');


  $sql_ajax = "INSERT INTO users (id, username, password, fname, lname, mobile, phone, email, active,registerdate) VALUES (NULL,?, ?, ?, ?, ?, ?, ?, ?, ?) ";
  $q = $pdo->prepare($sql_ajax);
  $q->execute(array($username,$password,$fname,$lname ,$mobile,$phone,$email,$status,$registerdate));

  $data['success'] = true;
  $data['message'] = 'اطلاعات با موفقیت ثبت شدند ';

}

$pdo = Database::disconnect();

header('Content-Type: application/json');
echo json_encode($data);

}
?>