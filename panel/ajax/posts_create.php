<?php 
require_once("../../app/config.php");
if(!isset($_SESSION['username']) || !isset($_POST['form']))
die("<center><h2 style='margin-top:200px;'>Security Team</h2></center>");

$data 			    = array();
$errors         = array();

if(clear($_POST['form'])=='create_post'){

  if(empty($_POST['title']))
  {
    $errors = 'عنوان محتوا را وارد کنید';
  }

if ( ! empty($errors)) {

	$data['success'] = false;
	$data['errors']  = $errors;

} else {

  $title =  $_POST['title'];
  $text = $_POST['text'];
  $senddate = $_POST['senddate'];

  if(!empty($_POST['senddate'])) {
    $fdate = clear ($_POST['senddate']);
    $t = explode(" ",$fdate);
    $saat = $t[1];
    $tarikh = $t[0];
    $saat = explode(":",$saat);
    $dt = explode("-",$tarikh);
    $senddate = getmiladi($dt[0],$dt[1],$dt[2],$saat[0],$saat[1],00);
  }
  else {
    $senddate = date("Y-m-d H:i:s");
  }

  $senddate = date_create($senddate);
  $senddate = date_timestamp_get($senddate);

  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql_ajax = "INSERT INTO posts (title, type, text, date, user_id) VALUES (?, ?, ?, ?, ?) ";
  $q = $pdo->prepare($sql_ajax);
  $q->execute(array($title,$_SESSION['last_post_type'],$text,$senddate,$_SESSION['id']));

  $_SESSION['last_post_id'] = $pdo->lastinsertid();

  $data['success'] = true;
  $data['message'] = 'اطلاعات با موفقیت ثبت شدند ';

}

  $pdo = Database::disconnect();

header('Content-Type: application/json');
echo json_encode($data);

}




if(clear($_POST['form'])=='edit_post'){

  if(empty($_POST['title']))
  {
    $errors = 'عنوان محتوا را وارد کنید';
  }

if ( ! empty($errors)) {

  $data['success'] = false;
  $data['errors']  = $errors;

} else {

  $title =  $_POST['title'];
  $text = $_POST['text'];
  $senddate = $_POST['senddate'];

  if(!empty($_POST['senddate'])) {
    $fdate = clear ($_POST['senddate']);
    $t = explode(" ",$fdate);
    $saat = $t[1];
    $tarikh = $t[0];
    $saat = explode(":",$saat);
    $dt = explode("-",$tarikh);
    $senddate = getmiladi($dt[0],$dt[1],$dt[2],$saat[0],$saat[1],00);
  }
  else {
    $senddate = date("Y-m-d H:i:s");
  }

  $senddate = date_create($senddate);
  $senddate = date_timestamp_get($senddate);

  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql_ajax = "UPDATE posts SET title=?, type=? ,text=?, date=? ,user_id=? WHERE id = ".$_SESSION['last_post_id'];
  $q = $pdo->prepare($sql_ajax);
  $q->execute(array($title,$_SESSION['last_post_type'],$text,$senddate,$_SESSION['id']));

  $data['success'] = true;
  $data['message'] = 'اطلاعات با موفقیت ثبت شدند ';

}

  $pdo = Database::disconnect();

header('Content-Type: application/json');
echo json_encode($data);

}
?>