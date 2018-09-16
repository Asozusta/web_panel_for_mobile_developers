
<?php 

require_once("../../app/config.php");
if(!isset($_SESSION['username']) || !isset($_POST['form']))
die("<center><h2 style='margin-top:200px;'>OOPS !</h2></center>");

$data 			= array ();
$errors         	= array();

if(clear($_POST['form'])=='edit_file')
{
			$inputs['type'] = $_SESSION['file_upload_type'];
			$inputs['user_id'] = $_SESSION['id'];
			$inputs['id'] = $_POST['id'];
			$inputs['name'] = $_POST['name'];

			$data = edit_file ($inputs);
			header('Content-Type: application/json');
			echo json_encode($data);
}


if(clear($_POST['form'])=='delete_file')
{
			$inputs['type'] = $_SESSION['last_post_type'];
			$inputs['id'] = $_POST['id'];

			$data = delete_file ($inputs);
			header('Content-Type: application/json');
			echo json_encode($data);
}

// if(clear($_POST['form'])=='uploadvoice')
// {
// 	$message ='';

// 	if(!isset($_POST['mp3'],$_POST['type']))
// 	{
// 	$message = 'ورودی های مناسب ارسال نشده است';
// 	}
// 	else 
// 	{	
// 		$address = rand(54564565,time()+1000000);	
// 		$file_name = $_SESSION['username'].'_'.$address.'.mp3';
// 		file_put_contents('../../upload/chat/'.$file_name, $_POST['mp3']);
// 		$file_size = strlen(base64_decode($_POST['mp3']));
// 	}

// 	$pdo = Database::connect();
// 	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 	 $sql="SELECT maxupload,upload,confirm FROM ".DB_PREFIX."users WHERE id = ".$_SESSION['id'];

//             foreach( $pdo->query($sql) as $row) { 
//                 $maxupload   = $row['maxupload'];
//                 $upload      = $row['upload'];
//                 $confirm     = $row['confirm'];
//             }
           
//               if ($confirm=='no')
// 				$message = 'حساب کاربری شما فعال نیست';

// 		if($file_size>($maxupload-$upload))
// 				$message = 'شما از حداکثر مجاز ظرفیت آپلود خود استفاده کرده اید . لطفا به فروشگاه مراجعه کنید تا محدودیت را کاهش دهید .';


// 			if($message=='')
// 			{

// 				$chat_message = '~~/audio|'.$file_name.'/~~';


// 				switch ($_POST['type']) {
// 					case 'team_chat':
// 					$type = 'team';
// 					$sql_ajax = "INSERT INTO ".DB_PREFIX."team_chat (team_id,content,date,from_id,seen) values(?,?,?,?,?)";
			       
// 			$q = $pdo->prepare($sql_ajax);
// 			$q->execute(array($_SESSION['file_upload_id'],$chat_message,date("Y-m-d H:i:s"),clear($_SESSION ['id']),$_SESSION['id']."|"));

// 			foreach( get_team_users_accepted($_SESSION['file_upload_id']) as $row) { 
// 				$user_id = $row['user_id'];
// 				if($user_id!=$_SESSION['id'])
// 					send_browser_noti( array('maghsad' => $user_id, 'matn' => $_SESSION['name'].' : یک صدا فرستاده است ', 'small_picture' => 'http://teroject.com/upload/avatars/'.$_SESSION['profilepicurl'].'.jpg' , 'android_group'=>'team_chat_'.$_SESSION['file_upload_id']));
// 			}
// 					break;

// 					case 'ticket':
// 					$type = 'ticket';


// $ticket_message =  $chat_message;

// $sql="SELECT to_id,from_id FROM ".DB_PREFIX."ticket WHERE id = ?";
// 		$q = $pdo->prepare($sql);
// 		$q->execute(array($_SESSION['file_upload_id']));

// 			foreach( $q as $row) { 
// 				$to_id = $row['to_id'];
// 				$from_id = $row['from_id'];
// 			}

// 		if($from_id==$_SESSION['id'])
// 		{
// 			send_browser_noti( array('maghsad' => $to_id, 'matn' => $_SESSION['name'].' , یک صدا در تیکت فرستاده است' , 'small_picture' => 'http://teroject.com/upload/avatars/'.$_SESSION['profilepicurl'].'.jpg' , 'android_group'=>'newmessage'));

// 			$sql_ajax="UPDATE ".DB_PREFIX."ticket SET date=? , situation='admin_reply' WHERE id=?";
// 			$q=$pdo->prepare($sql_ajax);
// 			$q->execute(array(date("Y-m-d H:i:s"),$_SESSION['file_upload_id']));

// 		}

// 		else if ($to_id==$_SESSION['id'])
// 		{
// 			send_browser_noti( array('maghsad' => $from_id, 'matn' => $_SESSION['name'].' , یک صدا در تیکت فرستاده است' , 'small_picture' => 'http://teroject.com/upload/avatars/'.$_SESSION['profilepicurl'].'.jpg' , 'android_group'=>'newmessage'));

// 			$sql_ajax="UPDATE ".DB_PREFIX."ticket SET date=? ,  situation='user_reply' WHERE id=?";
// 			$q=$pdo->prepare($sql_ajax);
// 			$q->execute(array(date("Y-m-d H:i:s"),$_SESSION['file_upload_id']));
// 		}

// $sql_ajax = "INSERT INTO ".DB_PREFIX."ticket_content (ticket_id,content,date,from_id) values(?,?,?,?)";
//         $q = $pdo->prepare($sql_ajax);
//         $q->execute(array(clear($_SESSION['file_upload_id']),$ticket_message,date("Y-m-d H:i:s"),clear($_SESSION['id'])));


// 					break;
					
// 					default:
// 					exit;
// 					break;
// 				}


// 				// $sql = "INSERT INTO ".DB_PREFIX."file_".$type." (file_name,file_size,file_date,file_fromid,file_toid,file_extension,file_address) values(?,?,?,?,?,?,?)";
// 			 //    	$q = $pdo->prepare($sql);
// 			 //    	$q->execute(array($_SESSION['username'].'_voice',$file_size,date("Y-m-d H:i:s"),$_SESSION['id'],$_SESSION['file_upload_id'],'mp3',$file_name));

// 				$sql_ajax="UPDATE ".DB_PREFIX."users SET upload=upload+? WHERE id=?";
// 			       $q=$pdo->prepare($sql_ajax);
// 			       $q->execute(array($file_size,$_SESSION['id']));


// 			       $success = 1;

// 			}
// 			else {
// 				unlink('../../upload/chat/'.$file_name);
// 				$success = 0;
// 			}
   
// 			       $pdo = Database::disconnect();

// 			       $data['message'] = $message;
// 			       $data['success'] = $success;
// return $data;

// }

if(clear($_POST['form'])=='accept')
{



		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		$prkey = clear($_POST['id']);
		$prkey = explode('-',$prkey);
		$team_id = $prkey[1];

		team_accept ($_SESSION['id'],$team_id);

		$pdo = Database::disconnect();
		$data = 1;

			header('Content-Type: application/json');
			echo json_encode($data);


}


else if(clear($_POST['form'])=='set_browser_id')
{



		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		$key = clear($_POST['userid']);

/*		set_browser_id ($_SESSION['username'],$key);
*/

		$sql_ajax="UPDATE ".DB_PREFIX."users SET browser_id=? WHERE id=?";
		$q=$pdo->prepare($sql_ajax);
		$q->execute(array($key,clear($_SESSION['id'])));

		$pdo = Database::disconnect();

			header('Content-Type: application/json');
			echo json_encode($data);


}

else if (clear($_POST['form'])=='ignor')
{

		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$prkey = clear($_POST['id']);
		$prkey = explode('-',$prkey);
		$team_id = $prkey[1];

		team_ignor ($_SESSION['id'],$team_id);
		
		$pdo = Database::disconnect();

		$data = 1;

			header('Content-Type: application/json');
			echo json_encode($data);


}


else if (clear($_POST['form'])=='1')
{


		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if($_POST['type']=='news')
		{
		seen_notification ($_SESSION['id']);
	}

		else {
		seen_notes ($_SESSION['id']);
	}


		$pdo = Database::disconnect();

			header('Content-Type: application/json');
			echo json_encode($data);


}
?>