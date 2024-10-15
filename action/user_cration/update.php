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

   $username =	$_POST['u_username'];
   $display_name = $_POST['u_display_name'];
   $password1 = $_POST['u_password'];
   $password = base64_encode($password1);
   $cps_no =  $_POST['u_cps_no'];
   $email_id = $_POST['u_email_id'];
   $contact_no =  $_POST['u_contact_no'];
   $designation = $_POST['u_designation'];
   $role = $_POST['u_role'];
   $district_code =  $_POST['u_district_code'];
   $station_code = $_POST['u_station_code'];
   $status =  $_POST['u_status'];

   $cmd = "UPDATE tbl_usercreation set username='$username', display_name='$display_name', password='$password', cps_no='$cps_no', email_id='$email_id', contact_no='$contact_no', designation='$designation', role='$role', district_code='$district_code', station_code='$station_code', created_by='Admin', created_at=CURRENT_TIMESTAMP, status='$status' WHERE id='".$id."' ";
	
	if(mysqli_query($db,$cmd)){
        echo "Success";
    } else {
        echo "Error";
    }
?>