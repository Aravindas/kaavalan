<?php
	session_start();
	ob_start();
	include('../../connections/db_connection.php');
?>

<?php 
		
date_default_timezone_set('Asia/Calcutta');
$date =substr((date('Y-m-d')),0,10);
$time =substr((date('Y-m-d H:i:s')),11,8);


$rack_type =	base64_encode($_POST['rack_type']);
$rack_name = base64_encode($_POST['rack_name']);
$rack_code = base64_encode($_POST['rack_code']);
$rack_description =  base64_encode($_POST['rack_description']);
$rack_capacity = base64_encode($_POST['rack_capacity']);
$rack_capacity_unit = base64_encode($_POST['rack_capacity_unit']);
$shelf_name = base64_encode($_POST['shelf_name']);
$shelf_code = base64_encode($_POST['shelf_code']);
$shelf_description =  base64_encode($_POST['shelf_description']);
$shelf_capacity = base64_encode($_POST['shelf_capacity']);
$shelf_capacity_unit = base64_encode($_POST['shelf_capacity_unit']);
$status = $_POST['status'];

   $cmd = "INSERT INTO tbl_rack (rack_type, rack_name, rack_code, rack_description, rack_capacity, rack_capacity_unit, shelf_name, shelf_code, shelf_description, shelf_capacity, shelf_capacity_unit, created_by, created_at, status) VALUES ('$rack_type', '$rack_name', '$rack_code', '$rack_description', '$rack_capacity', '$rack_capacity_unit', '$shelf_name', '$shelf_code', '$shelf_description', '$shelf_capacity', '$shelf_capacity_unit', 'Admin', CURRENT_TIMESTAMP,  '$status')";
	
	if(mysqli_query($db,$cmd)){
        echo "Success";
    } else {
        echo "Error";
    }
?>