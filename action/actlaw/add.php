<?php
	session_start();
	ob_start();
	include('../../connections/db_connection.php');
?>

<?php 
		
date_default_timezone_set('Asia/Calcutta');
$date =substr((date('Y-m-d')),0,10);
$time =substr((date('Y-m-d H:i:s')),11,8);


$section_act =	base64_encode($_POST['section_act']);
$section_act_code = base64_encode($_POST['section_act_code']);
$section_act_description = base64_encode($_POST['section_act_description']);
$section_law =  base64_encode($_POST['section_law']);
$section_law_code = base64_encode($_POST['section_law_code']);
$section_law_description = base64_encode($_POST['section_law_description']);
$status = $_POST['status'];

   $cmd = "INSERT INTO tbl_act_law (section_act, section_act_code, section_act_description, section_law, section_law_code, section_law_description, created_by, created_at, status) VALUES ('$section_act', '$section_act_code', '$section_act_description', '$section_law', '$section_law_code', '$section_law_description', 'Admin', CURRENT_TIMESTAMP,  '$status')";
	
	if(mysqli_query($db,$cmd)){
        echo "Success";
    } else {
        echo "Error";
    }
?>
