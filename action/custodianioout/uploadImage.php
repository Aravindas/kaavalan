<?php
	session_start();
	ob_start();
	include('../../connections/db_connection.php');
?>

<?php 
$m_id =	$_POST['h_if_id'];

date_default_timezone_set('Asia/Calcutta');
$date =substr((date('Y-m-d')),0,10);
$time =substr((date('Y-m-d H:i:s')),11,8);

// print_r($_FILES['image']['tmp_name']);exit();

$total = count($_FILES['image']['name']);

for($i=0; $i<$total; $i++) {

  $tmpFilePath = $_FILES['image']['tmp_name'][$i];
  $filenm = $_FILES['image']['name'];

  $filesize = $_FILES["image"]["size"][$i];
	$filetype = $_FILES["image"]["type"][$i];
	$filerr = $_FILES["image"]["error"][$i];	

	$temp = explode(".", $filenm[$i]);
	$extension = end($temp);
	array("jpeg", "jpg", "png","JPEG","JPG","PNG");		


  if($tmpFilePath!="") 	{
    if((($filetype == "image/jpeg") ||($filetype == "image/JPEG") || ($filetype == "image/jpg") || ($filetype == "image/JPG") || ($filetype == "image/png") || ($filetype == "image/PNG"))){
        if($filesize > 4000000){  // bytes
            echo "<span id='invalid' class='invalid'>&nbsp;File is too large......</span><br/>";
            $err = 1; 
        }
        else if($filerr > 0){
            echo "<span id='invalid' class='invalid'>&nbsp;Loading error......</span><br/>";
            $_SESSION['err_msg22'] = "Loading error...";
            $err = 1; 
        }
        			
			  if ($tmpFilePath != ""){
			    $newFilePath = "../../uploads/custodianImage/" . $filenm[$i];

				$image = $_FILES['image']['tmp_name'][$i]; 
            	$imgContent = addslashes(file_get_contents($image));

				$efilenm = base64_encode($filenm[$i]);

			    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
					$qry = "insert into tbl_custodian_upload(m_id,doc_nm,doc_size,doc_data,doc_type,created_at,status)values('$m_id','$efilenm','$filesize','$imgContent','I',CURRENT_TIMESTAMP,2)";
				  	$rs = mysqli_query($db,$qry);
					echo "Success";
			    }
			  }
		} else {
		echo "<span id='invalid' class='invalid'>&nbsp;Invalid File format of Uploaded File...</span><br/>";
		$err = 1;
		}
	}
}	


?>