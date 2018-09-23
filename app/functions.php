<?php 

function post_number($type)
{

if($type!='')
{
	$append = " WHERE type = '".$type."'";
}
else $append=' ';

	global $pdo;

	$sql = "SELECT count(id) FROM posts".$append;
	$q = $pdo->prepare($sql);
	$q->execute(array($date));

	foreach ($q as $key) {
		$count = $key['count(id)'];
	}
	return $count;

}

function calculate_post_number ($date)
{

	global $pdo;

	$sql = "SELECT count(id) FROM posts WHERE date(from_unixtime(date)) = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($date));

	foreach ($q as $key) {
		$count = $key['count(id)'];
	}
	return $count;

}

function get_loginout ()
{
	global $pdo;

	$sql = "SELECT * FROM logs ORDER BY id DESC";
	$q = $pdo->prepare($sql);
	$q->execute(array());
	return $q;
}


function get_logs ()
{
	global $pdo;

	$sql = "SELECT * FROM online ORDER BY time DESC LIMIT 1000";
	$q = $pdo->prepare($sql);
	$q->execute(array());
	return $q;
}

function delete_file ($inputs)
{
	global $pdo;

	$sql = "SELECT * FROM ".clear($inputs['type'])." WHERE id=?";
	$query= $pdo->prepare($sql);
	$query->execute(array(clear($inputs['id'])));

	$num = 0;
	foreach ($query as $key) {
		$file_address = $key['address'];
		$num=1;
	}
	if($num==1){

	$result = "DELETE FROM ".clear($inputs['type'])." WHERE id=?";
	$q=$pdo->prepare($result);
	$q->execute(array(clear($inputs['id'])));

	 $file = '../../upload/files/' . $file_address;
    	if(file_exists($file))
		unlink($file);
	$data = 1;
	}
	else { $data = 0; }
	return $data;
}

function get_post_files ($id,$type)
{
	global $pdo;

	$sql = "SELECT * FROM ".$type." WHERE post_id = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	return $q;
}

function get_admins ()
{
	global $pdo;

	$sql = "SELECT * FROM users";
	$q = $pdo->prepare($sql);
	$q->execute(array());
	return $q;
}


function get_post_with_id ($id,$type)
{

if($type!='')
{
	$append = " AND type = '".$type."'";
}
else $append=' ';

	global $pdo;

	$sql = "SELECT * FROM posts WHERE id = ? ".$append;
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	return $q;
}

function get_posts ()
{
	global $pdo;

	$sql = "SELECT * FROM posts ORDER BY sort DESC , id DESC";
	$q = $pdo->prepare($sql);
	$q->execute(array());
	return $q;
}

function get_posts_android ($type)
{

if($type!='')
{
	$append = " AND type = '".$type."'";
}
else $append=' ';

	global $pdo;

	$sql = "SELECT title,id,thumbnail,date,type FROM posts WHERE date <= ? ".$append." ORDER BY sort DESC , id DESC";
	$q = $pdo->prepare($sql);
	$q->execute(array(time()));
	return $q;
}

function get_posts_with_authors ()
{
	global $pdo;

	$sql = "SELECT * FROM users INNER JOIN posts ON posts.user_id = users.id ORDER BY sort DESC , posts.id DESC";
	$q = $pdo->prepare($sql);
	$q->execute(array());
	return $q;
}



function date_diff_persian ($date){

	   $date11 = explode(' ',$date);
	   $date11 = date_create($date11[0]);
	   $date22 = date_create(date("Y-m-d"));
	   $different  = date_diff($date11,$date22);
	   $different  = $different->format("%R%a");
	   

	   if($different==0)
	   {

	   	$dt = explode(' ',$date);
	   	$dt = explode(':',$dt[1]);

	   	if ($dt[0]<date("H"))
	   	{
	   		$dt = date("H")-$dt[0];
	   		return $dt.' ساعت قبل';
	   	}
	   	else if ($dt[0]>date("H"))
	   	{
	   		$dt = $dt[0]-date("H");
	   		return $dt.' ساعت بعد';
	   	}
	   	else if ($dt[0]==date("H"))
	   	{
	   		
	   		if ($dt[1]<date("i"))
		   	{
		   		$dt = date("i")-$dt[1];
		   		return $dt.' دقیقه قبل';
		   	}
		   	else if ($dt[1]>date("i"))
		   	{
		   		$dt = $dt[1]-date("i");
		   		return $dt.' دقیقه بعد';
		   	}
		   	else if ($dt[1]==date("i"))
		   	{
		   		return 'چند ثانیه قبل';
		   	}

	   	}
	   	
	   	
	   }

	   else if($different<=0)
	   {
	   		if($different<=(-21))
		   	{
			   		return round(((($different)*(-1))/7)).' هفته بعد';
		   	}
		   	if($different<=(-14))
		   	{
			   		return 'دو هفته بعد';
		   	}
		   	else if($different<=(-7))
		   	{
			   		return 'یک هفته بعد';
		   	}
		   	else
		   	return ($different)*(-1).' روز بعد';
	   }
	   else if($different>=0)
	   {
	   		if($different>=21)
		   	{
			   		return round(($different/7)).' هفته قبل';
		   	}
	   		if($different>=14)
		   	{
			   		return 'دو هفته قبل';
		   	}
		   	else if($different>=7)
		   	{
			   		return 'یک هفته قبل';
		   	}
		   	else
		   	return ((int)$different).' روز قبل';
	   }
	   
}


function login ($username,$password)
{
	global $pdo;

	$sql_ajax_ajax = "SELECT * FROM users where username = ? LIMIT 1";
	$q_ajax_ajax = $pdo->prepare($sql_ajax_ajax);
	$q_ajax_ajax->execute(array($username));
	$data = $q_ajax_ajax->fetch(PDO::FETCH_ASSOC);

	if($q_ajax_ajax->rowCount() > 0)
	{
		if(password_verify($password, $data['password']))
		{

			session_regenerate_id();
			
			$_SESSION['id'] 	 = $data['id'];
			$_SESSION['username'] = $data['username'];
			$_SESSION['name']	 = $data['fname']." ".$data['lname'];
			$_SESSION['mobile']   = $data['mobile'];
			$_SESSION['profilepicurl']     = $data['profilepicurl'];
			$_SESSION['loginpage'] = 1;

			$sql_ajax_ajax = "INSERT INTO logs (happening,comment,time,ip) values(?,?,?,?)";
			$q_ajax_ajax = $pdo->prepare($sql_ajax_ajax);
			$q_ajax_ajax->execute(array('login_success',$_SESSION['username'],date("Y-m-d H:i:s"),$_SERVER['REMOTE_ADDR']));

			$sql_ajax_ajax = "UPDATE users set logincount = logincount + 1 WHERE username=?";
			$q_ajax_ajax = $pdo->prepare($sql_ajax_ajax);
			$q_ajax_ajax->execute(array(clear($data['username'])));
			return 1;

		}
		else
		{

			$sql_ajax_ajax = "INSERT INTO logs (happening,comment,time,ip) values(?,?,?,?)";
			$q_ajax_ajax = $pdo->prepare($sql_ajax_ajax);
			$q_ajax_ajax->execute(array('login_error',$username,date("Y-m-d H:i:s"),$_SERVER['REMOTE_ADDR']));

			return 2;

		}
	}
	else {


		$sql_ajax_ajax = "INSERT INTO logs (happening,comment,time,ip) values(?,?,?,?)";
		$q_ajax_ajax = $pdo->prepare($sql_ajax_ajax);
		$q_ajax_ajax->execute(array('login_error','/wrong/',date("Y-m-d H:i:s"),$_SERVER['REMOTE_ADDR']));

		return 3;


	}


}


?>