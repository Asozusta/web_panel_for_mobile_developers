
<?php
require_once '../../app/config.php';
auth ('foruser',basename(__FILE__,".php"));
if(!isset($_SESSION['username']) || !isset($_FILES['myfile']))
die("<center><h2 style='margin-top:200px;'>Security Team</h2></center>");

  $result = 0;
  $address = '';
 

 if (isset($_FILES['myfile']['name']))
{
	$address = rand(time(), time()+100);	
    $saveto = "../../upload/avatars/".$address.".jpg";


    $typeok = TRUE;
    
    switch($_FILES['myfile']['type'])
    {
        case "image/gif":   $src = imagecreatefromgif($saveto); break;
        case "image/jpeg":  
        case "image/jpg": 
        case "image/pjpeg": $src = imagecreatefromjpeg($saveto); break;
        case "image/png":   $src = imagecreatefrompng($saveto); break;
        default:            $typeok = FALSE; break;
    }
    
    if ($typeok)
    {
        list($w, $h) = getimagesize($saveto);

        $max = 500;
        $tw  = $w;
        $th  = $h;
        
        if ($w > $h && $max < $w)
        {
            $th = $max / $w * $h;
            $tw = $max;
        }
        elseif ($h > $w && $max < $h)
        {
            $tw = $max / $h * $w;
            $th = $max;
        }
        elseif ($max < $w)
        {
            $tw = $th = $max;
        }
        
        $tmp = imagecreatetruecolor($tw, $th);
        imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h);
        imageconvolution($tmp, array(array(-1, -1, -1),
        array(-1, 16, -1), array(-1, -1, -1)), 8, 0);
        imagejpeg($tmp, $saveto);
        imagedestroy($tmp);
        imagedestroy($src);



			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



            $sql="SELECT profilepicurl FROM users WHERE id = ".clear($_SESSION['id']);
            foreach( $pdo->query($sql) as $row) { 
                $profilepicurl = $row['profilepicurl'];
            }
            if(isset($profilepicurl) && $profilepicurl!='no-avatar')
            unlink('../../upload/avatars/'.$profilepicurl.'.jpg');



			$sql = "UPDATE users  set profilepicurl = ? WHERE id =".clear($_SESSION['id']);
			$q = $pdo->prepare($sql);
			$q->execute(array($address));
			Database::disconnect();
			$result = 1;
			move_uploaded_file($_FILES['myfile']['tmp_name'], $saveto);
            $_SESSION['profilepicurl'] = $address;
			

    }
      else {
      	 $result = 2;
      }
}

?>
 <script language="javascript" type="text/javascript">
   window.top.window.stopUpload(<?php echo $result; ?>,<?php echo $address; ?>);
</script>   
 