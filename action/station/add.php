<?php
	session_start();
	ob_start();
	include('../../connections/db_connection.php');
?>

<?php 
		
date_default_timezone_set('Asia/Calcutta');
$date =substr((date('Y-m-d')),0,10);
$time =substr((date('Y-m-d H:i:s')),11,8);


$commissionerate =	base64_encode($_POST['commissionerate']);
$district = base64_encode($_POST['district']);
$district_code = base64_encode($_POST['district_code']);
$station =  base64_encode($_POST['station']);
$station_code = base64_encode($_POST['station_code']);
$status = $_POST['status'];

   $cmd = "INSERT INTO tbl_station (commissionerate, district, district_code, station, station_code, created_by, created_at, status) VALUES ('$commissionerate', '$district', '$district_code', '$station', '$station_code', 'Admin', CURRENT_TIMESTAMP,  '$status')";
	
	if(mysqli_query($db,$cmd)){
        echo "Success";
    } else {
        echo "Error";
    }
?>