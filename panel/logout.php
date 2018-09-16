<?php
require("../app/config.php");

/*if(isset($_COOKIE['verify']))
{
unset($_COOKIE['verify']);
$res = setcookie('verify', '', time() - 3600);
} */

  	$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sql = "INSERT INTO logs (happening,comment,time,ip) values(?,?,?,?)";
				$q = $pdo->prepare($sql);
				$q->execute(array('logout_success',$_SESSION['username'],date("Y-m-d H:i:s"),$_SERVER['REMOTE_ADDR']));
		      $pdo = Database::disconnect();



session_destroy();
header("Location: dashboard");
 ?>