<?php
require_once("../../app/config.php");
if(!isset($_SESSION['username']) || !isset($_FILES['file']))
die("<center><h2 style='margin-top:200px;'>OOPS !</h2></center>");



if(isset($_FILES['file'])){

  // $file_size = $_FILES['file']['size'];
 
  // $address = $_SESSION['username']."_".rand(54564565,time()+1000000);   
  // $fileName = $address.".jpg";
  // $filePath = '../../upload/files/' . $fileName;
  
  // if (!move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
  //       echo ('Problem saving file.');
  //       return;
  //   }
    

  //   $message='';

  //   $pdo = Database::connect();
  //   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
  //   $success = 1;
  //   $pdo = Database::disconnect();
    

    $name = $_FILES["file"]["name"];
    $ext = end((explode(".", $name))); 
    $address = $_SESSION['username']."_".rand(5456554565,time()+1000000);   
    $fileName = $address.".".$ext;
    $filePath = '../../upload/files/' . $fileName;

if (!move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
        echo ('Problem saving file.');
        return;
    }

    echo "1";

          
}
