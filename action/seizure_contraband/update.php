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

    $contraband_code =	base64_encode($_POST['u_contraband_code']);
    $contraband_type_name = base64_encode($_POST['u_contraband_type_name']);
    $contraband_quantity_type = base64_encode($_POST['u_contraband_quantity_type']);
    $contraband_units =  base64_encode($_POST['u_contraband_units']);
    $storage_mode = base64_encode($_POST['u_storage_mode']);
    $status =  $_POST['u_status'];

   $cmd = "UPDATE tbl_seizure_contraband set contraband_code='$contraband_code', contraband_type_name='$contraband_type_name', contraband_quantity_type='$contraband_quantity_type', contraband_units='$contraband_units', storage_mode='$storage_mode', created_by='Admin', created_at=CURRENT_TIMESTAMP, status='$status' WHERE id='".$id."' ";
	
	if(mysqli_query($db,$cmd)){
        echo "Success";
    } else {
        echo "Error";
    }
?>