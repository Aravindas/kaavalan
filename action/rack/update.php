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

    $rack_type =	base64_encode($_POST['u_rack_type']);
    $rack_name = base64_encode($_POST['u_rack_name']);
    $rack_code = base64_encode($_POST['u_rack_code']);
    $rack_description =  base64_encode($_POST['u_rack_description']);
    $rack_capacity = base64_encode($_POST['u_rack_capacity']);
    $rack_capacity_unit = base64_encode($_POST['u_rack_capacity_unit']);
    $shelf_name = base64_encode($_POST['u_shelf_name']);
    $shelf_code = base64_encode($_POST['u_shelf_code']);
    $shelf_description =  base64_encode($_POST['u_shelf_description']);
    $shelf_capacity = base64_encode($_POST['u_shelf_capacity']);
    $shelf_capacity_unit = base64_encode($_POST['u_shelf_capacity_unit']);
    $status =  $_POST['u_status'];

   $cmd = "UPDATE tbl_rack set rack_type='$rack_type', rack_name='$rack_name', rack_code='$rack_code', rack_description='$rack_description', rack_capacity='$rack_capacity', rack_capacity_unit='$rack_capacity_unit',shelf_name='$shelf_name', shelf_code='$shelf_code', shelf_description='$shelf_description', shelf_capacity='$shelf_capacity', shelf_capacity_unit='$shelf_capacity_unit',created_by='Admin', created_at=CURRENT_TIMESTAMP, status='$status' WHERE id='".$id."' ";
	
	if(mysqli_query($db,$cmd)){
        echo "Success";
    } else {
        echo "Error";
    }
?>