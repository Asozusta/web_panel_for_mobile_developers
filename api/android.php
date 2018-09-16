<?php
require("../app/config.php");
$response = array();

$pdo = Database::connect();

if(isset($_POST['type'])){
	$type_mode = $_POST['type'];
}
else {
	$type_mode = '';
}

	switch ($_POST['api_function']) {

	case 'post_number':

		$number = post_number($type_mode);
		$response["success"]	 = 1;
		$response["message"]	 = 'دریافت شد';
		$response["number"] 	 = $number;

	break;
	
	case 'get_posts' :
		$posts = get_posts_android($type_mode);
		$response["success"]	 = 1;
		$response["message"]	 = 'دریافت شد';
		$response["posts"] 	 = $posts->fetchAll(PDO::FETCH_ASSOC);
	break;

	case 'get_post' :

		$post = get_post_with_id(clear($_POST['id']),$type_mode);

		foreach ($post as $key) {
			$type = $key['type'];
		}
		if($type_mode!='')
		{
			$type = $type_mode;
		}

		$post2 = get_post_with_id(clear($_POST['id']),$type_mode);
		$files = get_post_files (clear($_POST['id']),$type);

		$response["success"]	 = 1;
		$response["message"]	 = 'دریافت شد';
		if(isset($post2))
		$response["post"] 	 = $post2->fetchAll(PDO::FETCH_ASSOC);
		if(isset($files))
		$response["files"] 	 = $files->fetchAll(PDO::FETCH_ASSOC);
	break;

	}

			$sql_online = "INSERT INTO online (username,user_id,time,page,ip) values(?,?,?,?,?)";

			$q = $pdo->prepare($sql_online);
			$q->execute(array('( درگاه واسط api )','0',time(),$_POST['api_function'],getip()));


$pdo = Database::disconnect();

echo json_encode($response, JSON_UNESCAPED_UNICODE);

?>