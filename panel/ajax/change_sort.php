<?php 
require_once("../../app/config.php");
if(!isset($_SESSION['username']) || !isset($_POST['form']))
die("<center><h2 style='margin-top:200px;'>Security Team</h2></center>");

$data 		  = array();
$errors         = array();

if(clear($_POST['form'])=='changesort'){

if(!isset($_POST['sortstring']))
{
	die();
}


	  $pdo = Database::connect();
	  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sort =  json_decode($_POST['sortstring'], true);
$i = -1;
foreach ($sort as $key) {



	  $sql = "UPDATE posts SET sort = ? WHERE id = ?";
	  $query= $pdo->prepare($sql);
	  $query->execute(array($i,$key['id']));

	  $i = $i -1 ;

}


  $pdo = Database::disconnect();
}

 ?>