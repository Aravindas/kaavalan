<?php
	session_start();
	ob_start();
	include('../../connections/db_connection.php');
?>

<?php 
		
date_default_timezone_set('Asia/Calcutta');
$date =substr((date('Y-m-d')),0,10);
$time =substr((date('Y-m-d H:i:s')),11,8);


$io_nm =	base64_encode($_POST['io_nm']);
$io_desig =	base64_encode($_POST['io_desig']);
$io_con_num =	base64_encode($_POST['io_con_num']);

   $cmd = "INSERT INTO tbl_iodetail (io_nm,io_desig,io_con_num) VALUES ('$io_nm','$io_desig','$io_con_num')";
	
	if(mysqli_query($db,$cmd)){
        echo "Success";
    } else {
        echo "Error";
    }
?>