<?php 

require_once("../../app/config.php");
if(!isset($_SESSION['username']) || !isset($_POST['form']))
die("<center><h2 style='margin-top:200px;'>Security Team</h2></center>");

$data 		  = array();
$errors         = array();

 if(clear($_POST['element'])=='username'){

  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT username FROM users WHERE id != ?";
  $query= $pdo->prepare($sql);
  $query->execute(array($_SESSION['karmand_id']));
  $results = $query->fetchAll(PDO::FETCH_ASSOC);

  foreach ($results as $result) {   
    if ($result['username'] == $_POST['username']) {
      $errors['exist'] = 'این نام کاربری قبلا ثبت شده است';
    }
  }

  if (empty($_POST['username']))
   $errors['username'] = ' نام کاربری وارد نشده است ';



if ( ! empty($errors)) {
	$data['success'] = false;
	$data['errors']  = $errors;
} else {

	$data['success'] = true;
  $data['message'] = 'این نام کابری موجود است';
}

  $pdo = Database::disconnect();

header('Content-Type: application/json');
echo json_encode($data);

}
?>