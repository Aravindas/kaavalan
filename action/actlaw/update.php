<?php
	session_start();
	ob_start();
	include('../../connections/db_connection.php');
?>

<?php 
		
date_default_timezone_set('Asia/Calcutta');
$date =substr((date('Y-m-d')),0,10);
$time =substr((date('Y-m-d H:i:s')),11,8);

$id =	$_POST['h_id'];

   $section_act =	base64_encode($_POST['u_section_act']);
   $section_act_code = base64_encode($_POST['u_section_act_code']);
   $section_act_description = base64_encode($_POST['u_section_act_description']);
   $section_law =  base64_encode($_POST['u_section_law']);
   $section_law_code = base64_encode($_POST['u_section_law_code']);
   $section_law_description = base64_encode($_POST['u_section_law_description']);
   $status =  $_POST['u_status'];

   $cmd = "UPDATE tbl_act_law set section_act='$section_act', section_act_code='$section_act_code', section_act_description='$section_act_description', section_law='$section_law', section_law_code='$section_law_code', section_law_description='$section_law_description', created_by='Admin', created_at=CURRENT_TIMESTAMP, status='$status' WHERE id='".$id."' ";
	
	if(mysqli_query($db,$cmd)){
        echo "Success";
    } else {
        echo "Error";
    }
?>