<?php
	session_start();
	ob_start();
	include('../../connections/db_connection.php');
?>

<?php 

$m_id =	$_POST['h_vf_id'];

date_default_timezone_set('Asia/Calcutta');
$date =substr((date('Y-m-d')),0,10);
$time =substr((date('Y-m-d H:i:s')),11,8);

// print_r($_FILES['video']);exit();

$total = count($_FILES['video']['name']);

for($i=0; $i<$total; $i++) {

  $tmpFilePath = $_FILES['video']['tmp_name'][$i];
  $filenm = $_FILES['video']['name'];

  $filesize = $_FILES["video"]["size"][$i];
	$filetype = $_FILES["video"]["type"][$i];
	$filerr = $_FILES["video"]["error"][$i];	

	$temp = explode(".", $filenm[$i]);
	$extension = end($temp);
	$allowedExts = array("mp4","ogg","webm");
	

  if($tmpFilePath!="") 	{
    if (($filetype == "video/mp4") || ($filetype == "video/ogg") || ($filetype == "video/webm") && in_array($extension, $allowedExts)) {
		if($filesize > 125829120){  // bytes - 15MB

            echo "<span id='invalid' class='invalid'>&nbsp;File is too large......</span><br/>";
            $err = 1; 
        }
        else if($filerr > 0){
            echo "<span id='invalid' class='invalid'>&nbsp;Loading error......</span><br/>";
            $_SESSION['err_msg22'] = "Loading error...";
            $err = 1; 
        }
		
			  if ($tmpFilePath != ""){	
			    $newFilePath = "../../uploads/custodianVideo/" . $filenm[$i];

				$image = $_FILES['video']['tmp_name'][$i]; 
            	$imgContent = addslashes(file_get_contents($image));

				$efilenm = base64_encode($filenm[$i]);

			    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
					$qry = "insert into tbl_custodian_upload(m_id,doc_nm,doc_size,doc_type,created_at,status)values('$m_id','$efilenm','$filesize','V',CURRENT_TIMESTAMP,2)";
				  	if(mysqli_query($db,$qry)){
						echo "Success";
					}
			    }
			  }
		} else {
		echo "<span id='invalid' class='invalid'>&nbsp;Invalid File format of Uploaded File...</span><br/>";
		$err = 1;
		}
	}
}	


?>