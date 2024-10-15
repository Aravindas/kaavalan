<?php
	session_start();
	ob_start();
	include('../../connections/db_connection.php');
?>

<?php 
		
date_default_timezone_set('Asia/Calcutta');
$date =substr((date('Y-m-d')),0,10);
$time =substr((date('Y-m-d H:i:s')),11,8);


   $username =	$_POST['username'];
   $display_name = $_POST['display_name'];
   $password1 = $_POST['password'];
   $password = base64_encode($password1);
   $cps_no =  $_POST['cps_no'];
   $email_id = $_POST['email_id'];
   $contact_no =  $_POST['contact_no'];
   $designation = $_POST['designation'];
   $role = $_POST['role'];
   $district_code =  $_POST['district_code'];
   $station_code = $_POST['station_code'];
   $status =  $_POST['status'];

   $cmd = "INSERT INTO tbl_usercreation (username, display_name, password, cps_no, email_id, contact_no, designation, role, district_code, station_code, created_by, created_at, status) VALUES ('$username', '$display_name', '$password', '$cps_no', '$email_id', '$contact_no', '$designation', '$role', '$district_code', '$station_code', 'Admin', CURRENT_TIMESTAMP,  '$status');";
	
	if(mysqli_query($db,$cmd)){
        echo "Success";
    } else {
        echo "Error";
    }
?>