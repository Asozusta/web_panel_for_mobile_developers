 <?php 
require("../app/config.php");

if (!isset($_GET['id'])) {
	header('Location: posts_list');
}else{

	$sql = "SELECT * FROM posts WHERE id = ?";
	$query= $pdo->prepare($sql);
	$query->execute(array($_GET['id']));

	if ($query->rowCount() > 0) {

		foreach ($query as $row) {
			$type = $row['type'];
		}

		$sql = "SELECT * FROM ".$type." WHERE post_id = ?";
		$query= $pdo->prepare($sql);
		$query->execute(array($_GET['id']));

		foreach ($query as $row) {
			unlink('../upload/files/'.$row['address']);
		}

		$sql_delete = "DELETE FROM posts WHERE id = ?";
		$query= $pdo->prepare($sql_delete);
		$query->execute(array($_GET['id']));

		$sql_delete = "DELETE FROM ".$type." WHERE post_id = ?";
		$query= $pdo->prepare($sql_delete);
		$query->execute(array($_GET['id']));

		header('location: posts_list');
	}
	else {
		die("<center><h2 style='margin-top:200px;'>Security Team</h2></center>");
	}

}