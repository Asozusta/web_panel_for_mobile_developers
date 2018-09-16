<?php 

require_once("../../app/config.php");
if(!isset($_POST['form']))
die("<center><h2 style='margin-top:200px;'>Security Team</h2></center>");

if($_POST['form']==1){


	$data 		  = array ();
	$errors         = array();

	if (empty($_POST['username'])){
		$errors['username'] = ' نام کاربری را وارد نکرده اید :) ';
	}


	if (empty($_POST['password'])){
		$errors['password'] = ' رمز عبور را وارد نکرده اید :) ';
	}



	if ( ! empty($errors)) {

		$data['success'] = false;
		$data['errors']  = $errors;
	} else {


		$username_ajax = clear ($_POST['username']);
		$password_ajax = clear ($_POST['password']);


		$pdo = Database::connect();



switch (login ($username_ajax,$password_ajax)) {
	case 1:
		
			$sql_online = "INSERT INTO online (username,user_id,time,page,ip) values(?,?,?,?,?)";

			$q = $pdo->prepare($sql_online);
			$q->execute(array($_SESSION['username'],$_SESSION['id'],time(),'dashboard',getip()));
		
		break;
	case 2:
		$errors['message_ajax'] = ' رمز عبور اشتباه است :( ';
		break;
	case 3:
		$errors['message_ajax'] =  ' کاربری با این مشخصات پیدا نشد :( ';
		break;

	}

	}	

	if ( ! empty($errors)) {

		$data['success'] = false;
		$data['errors']  = $errors;
	} 
	else {

		$data['success'] = true;
		$data['message'] = ' ورود با موفقیت انجام شد ';

	}

	header('Content-Type: application/json');
	echo json_encode($data);
	$pdo = Database::disconnect();

}

?>