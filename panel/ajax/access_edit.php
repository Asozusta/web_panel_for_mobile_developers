<?php 

require_once("../../app/config.php");
if(!isset($_SESSION['username']) || !isset($_POST['form']))
die("<center><h2 style='margin-top:200px;'>Security Team</h2></center>");

$data 			    = array();
$errors         = array();

if(clear($_POST['form'])=='access_edit'){

  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  

  $access = '';
  if (isset($_POST['access']) && count($_POST['access'])>0)
  foreach ($_POST['access'] as $key) {
    $access .= $key.'~';
  }
  $id = $_SESSION['karmand_id'];

  $sql_ajax = "UPDATE `users` SET access = ? WHERE id = ?";
  $q = $pdo->prepare($sql_ajax);
  $q->execute(array($access,$id)); 

  $data['success'] = true;
  $data['message'] = 'اطلاعات با موفقیت ثبت شدند ';



$pdo = Database::disconnect();

header('Content-Type: application/json');
echo json_encode($data);

}
?>