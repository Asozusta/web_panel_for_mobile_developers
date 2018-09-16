 <?php 
require("../app/config.php");

if (!isset($_GET['id'])) {
	header('Location: karmand_list');
}else{

	$sql = "SELECT * FROM users WHERE id = ?";
	$query= $pdo->prepare($sql);
	$query->execute(array($_GET['id']));


	if ($query->rowCount() > 0) {
		$sql_delete = "DELETE FROM users WHERE id = ?";
		$query= $pdo->prepare($sql_delete);
		$query->execute(array($_GET['id']));
		header('location: karmand_list');
	}else{
		die("<center><h2 style='margin-top:200px;'>Security Team</h2></center>");
	}

}