<?php

// if you are in test mode set it 1 , and if you want to upload on server set 0
$test=1;

if($test) {

  // change this variables due to the localhost port and phpmyadmin info
  define('ADMIN_MOBILE','#');
  define('FOLDER_NAME','weband');
  define('PORT_NUMBER','81');
  define('DATABASE_NAME','weband');
  define('DATABASE_USERNAME','root');
  define('DATABASE_PASSWORD','');
  define('DATABASE_HOST','localhost');

  define('SITE_URL', 'http://localhost:'.PORT_NUMBER.'/'.FOLDER_NAME); // don't change it
  define('THEME','/app/theme/version1/'); // don't change it
  define('ASSETS','/'.FOLDER_NAME.'/app/theme/version1/'); // don't change it
}
else {

  // change this variables due to the DOMAIN , HOST or SERVER and DATABASE info
  define('ADMIN_MOBILE','#');
  define('SITE_URL', 'http://yourwebsite.com');
  define('DATABASE_NAME','weband');
  define('DATABASE_USERNAME','root');
  define('DATABASE_PASSWORD','');
  define('DATABASE_HOST','localhost');

  define('THEME','/app/theme/version1/'); // don't change it
  define('ASSETS','../app/theme/version1/'); // don't change it
}

date_default_timezone_set('Asia/Tehran');

include_once __DIR__.'/jdf.php';
include_once __DIR__.'/auth.php';
include_once __DIR__.'/functions.php';

function getip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
    //check ip from share internet
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    //to check ip is pass from proxy
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    else 
        $ip=$_SERVER['REMOTE_ADDR'];
   
    return $ip;
}


function is_rtl( $string ) {
    $rtl_chars_pattern = '/[\x{0590}-\x{05ff}\x{0600}-\x{06ff}]/u';
    return preg_match($rtl_chars_pattern, $string);
}


function header_date_compare ($date){

  $dt=explode(' ', $date);
  $date=explode('-', $dt[0]);
  $time=$dt[1];
  $y=$date[0];
  $m=$date[1];
  $d=$date[2];
  $time = explode(':',$time);
  $ho=$time[0];
  $mi=$time[1];
  $se=$time[2];


  $date1=date_create("$y-$m-$d");
  $date2=date_create(date('Y-m-d'));
  $diff=date_diff($date1,$date2);

  return $diff;

}
function email ($maghsad,$onvan,$matn){

  $to = "$maghsad";
  $subject = "$onvan";

  $message = "
  <html>
  <head>
    <meta charset='UTF-8'>
    <title>$onvan</title>
    <style>*{direction:rtl; font-family:tahoma; font-size:14px;}</style>
  </head>
  <body>
    <p>$matn</p>
  </body>
  </html>
  ";

// Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
  $headers .= 'From: <no-reply@yourwebsite.com>' . "\r\n";

  mail($to,$subject,$message,$headers);

}
function sms($maghsad,$matn){



  ini_set("soap.wsdl_cache_enabled", "0");
  try {
    $user = "RELAX USERNAME";
    $pass = "RELAX PASSWORD";

    $client = new SoapClient("http://87.107.121.52/post/send.asmx?wsdl");
    
    $getcredit_parameters = array(
      "username"=>$user,
      "password"=>$pass
      );

    
    $encoding = "UTF-8";
    $textMessage = iconv($encoding, 'UTF-8//TRANSLIT',"$matn\nYOUR COPYRIGHT");
    

    $sendsms_parameters = array(
      'username' => $user,
      'password' => $pass,
      'from' => "YOUR SMS PANEL NUMBER",
      'to' => array($maghsad),
      'text' => $textMessage,
      'isflash' => false,
      'udh' => "",
      'recId' => array(0),
      'status' => 0
      );
    
    $status = $client->SendSms($sendsms_parameters)->SendSmsResult;
  }
  catch (SoapFault $ex) {
    echo $ex->faultstring;
  }
}

//to change date from gregorian to jalali with only one parameter.
//this doesn't affect time!
function to_jalali($date){
  //jalali date + time
  $dt=explode(' ', $date);
  $date=explode('-', $dt[0]);
  if(count($dt)==2){
    $time=$dt[1];
  }
  else {
    $time=" ";
  }
  $y=$date[0];
  $m=$date[1];
  $d=$date[2];
  $date=gregorian_to_jalali($y,$m,$d);


  return $date[0]."/".$date[1]."/".$date[2]." ".$time;
}

function getshamsi ($date,$format){

  $split_date_time = explode(' ', $date);
  list($year, $month, $day) = explode('-', $split_date_time[0]);
  list($hour, $minute, $second) = explode(':', $split_date_time[1]);
  $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
  return jdate($format , $timestamp ,'' ,'','en');

}

function getmiladi ($year,$month,$day,$hour,$minute,$second){

  $timestamp = jmktime($hour, $minute, $second, $month, $day, $year);
  return date('Y/m/d H:i:s', $timestamp);


}

function getmiladi_bisaat ($year,$month,$day){

  $timestamp = jmktime(0,0,0, $month, $day, $year);
  return date('Y/m/d', $timestamp);


}

function clear($var)
{

  $var = strip_tags($var);
  $var = htmlentities($var);
  $var = stripslashes($var);
  return $var;
}

function rs($length = 6) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

function rn() {
  $characters = '123456789';
  return $characters[rand(0,8)];
}


class Database 
{
	private static $dbName = DATABASE_NAME;
	private static $dbHost = DATABASE_HOST;
	private static $dbUsername = DATABASE_USERNAME;
	private static $dbUserPassword = DATABASE_PASSWORD;
	private static $cont  = null;
	
	public function __construct() {
		exit('Init function is not allowed');
	}
	
	public static function connect()
	{
	   // One connection through whole application
   if ( null == self::$cont )
   {      
    try 
    {
      self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")); 

    }
    catch(PDOException $e) 
    {
      die($e->getMessage());  
    }
  } 
  return self::$cont;
}

public static function disconnect()
{
  self::$cont = null;
}
}

session_start();
if ( !isset($_SESSION['lang']) ){
  $_SESSION['lang'] = 'fa';
}

include_once(__DIR__.'/lang/'.$_SESSION['lang'].'.php');
include_once(__DIR__.'/lang/system.php');

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>