<?php
	session_start();
	ob_start();
	include('../../connections/db_connection.php');
?>

<?php 

$rs = "SELECT id FROM tbl_custodian order by id desc limit 1";
$data = mysqli_query($db,$rs);
$rsArr = mysqli_fetch_array($data);
if($rsArr != ""){
	$m_id = $rsArr['id'];
} else {
	$m_id = 1;
}


date_default_timezone_set('Asia/Calcutta');
$date =substr((date('Y-m-d')),0,10);
$time =substr((date('Y-m-d H:i:s')),11,8);

// print_r($_FILES);exit();

$total = count($_FILES['file']['name']);

for($i=0; $i<$total; $i++) {

  $tmpFilePath = $_FILES['file']['tmp_name'][$i];
  $filenm1 = $_FILES['file']['name'];

  $filesize1 = $_FILES["file"]["size"][$i];
	$filetype1 = $_FILES["file"]["type"][$i];
	$filerr1 = $_FILES["file"]["error"][$i];	

	$temp1 = explode(".", $filenm1[$i]);
	$extension1 = end($temp1);
	$allowedExts = array("pdf","PDF");

	
  if($tmpFilePath!="") 	{
		if (($filetype1 == "application/pdf") || ($filetype1 == "application/PDF") && in_array($extension1, $allowedExts)) {
			if($filesize1 > 2000000){  // bytes
			echo "<span id='invalid' class='invalid'>&nbsp; Uploaded File is too large......</span><br/>";
			$err = 1; 
			}
			else if($filerr1 > 0){
			echo "<span id='invalid' class='invalid'>&nbsp;Loading error......</span><br/>";
			$_SESSION['err_msg22'] = "Loading error...";
			$err = 1; 
			}
			// $file_ext = strtolower(substr($imgnm,strrpos($tmpFilePath,".")));echo $file_ext;exit();
			$file_ext=trim($extension1);
			if(($file_ext== ".pdf")) {
				echo "<span id='invalid' class='invalid'>&nbsp;Uploaded Invalid image format...</span><br/>";
				$err = 1; 
			}
			$handle = fopen($tmpFilePath, "r");
			$header = fread($handle, 4);
			if($header!="%PDF") {
			echo "<span id='invalid' class='invalid'>&nbsp;The uploaded file doesn't seem to be an PDF...</span><br/>";
			$err = 1;
			}
			
			  if ($tmpFilePath != ""){
			    $newFilePath = "../../uploads/custodianDoc/" . $filenm1[$i];
				
				$filePointer = fopen($_FILES['file']['tmp_name'][$i], 'r');
				$fileData = fread($filePointer, filesize($_FILES['file']['tmp_name'][$i]));
				$fileData = addslashes($fileData);

				$efilenm = base64_encode($filenm1[$i]);

			    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
					 $qry = "insert into tbl_custodian_upload(m_id,doc_nm,doc_size,doc_data,doc_type,created_at,status)values('$m_id','$efilenm','$filesize1','$fileData','D',CURRENT_TIMESTAMP,1)";
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