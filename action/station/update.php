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

   $commissionerate =	base64_encode($_POST['u_commissionerate']);
   $district = base64_encode($_POST['u_district']);
   $district_code = base64_encode($_POST['u_district_code']);
   $station =  base64_encode($_POST['u_station']);
   $station_code = base64_encode($_POST['u_station_code']);
   $status =  $_POST['u_status'];

   $cmd = "UPDATE tbl_station set commissionerate='$commissionerate', district='$district', district_code='$district_code', station='$station', station_code='$station_code',created_by='Admin', created_at=CURRENT_TIMESTAMP, status='$status' WHERE id='".$id."' ";
	
	if(mysqli_query($db,$cmd)){
        echo "Success";
    } else {
        echo "Error";
    }
?>