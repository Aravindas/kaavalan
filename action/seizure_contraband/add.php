<?php
	session_start();
	ob_start();
	include('../../connections/db_connection.php');
?>

<?php 
		
date_default_timezone_set('Asia/Calcutta');
$date =substr((date('Y-m-d')),0,10);
$time =substr((date('Y-m-d H:i:s')),11,8);


$contraband_code =	base64_encode($_POST['contraband_code']);
$contraband_type_name = base64_encode($_POST['contraband_type_name']);
$contraband_quantity_type = base64_encode($_POST['contraband_quantity_type']);
$contraband_units =  base64_encode($_POST['contraband_units']);
$storage_mode = base64_encode($_POST['storage_mode']);
$status = $_POST['status'];

   $cmd = "INSERT INTO tbl_seizure_contraband (contraband_code, contraband_type_name, contraband_quantity_type, contraband_units, storage_mode, created_by, created_at, status) VALUES ('$contraband_code', '$contraband_type_name', '$contraband_quantity_type', '$contraband_units', '$storage_mode', 'Admin', CURRENT_TIMESTAMP,  '$status')";
	
	if(mysqli_query($db,$cmd)){
        echo "Success";
    } else {
        echo "Error";
    }
?>