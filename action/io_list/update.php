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

$io_nm =	base64_encode($_POST['u_io_nm']);
$io_desig =	base64_encode($_POST['u_io_desig']);
$io_con_num =	base64_encode($_POST['u_io_con_num']);

   $cmd = "UPDATE tbl_iodetail set io_nm='$io_nm',io_desig='$io_desig', io_con_num='$io_con_num'  WHERE id='".$id."' ";
	
	if(mysqli_query($db,$cmd)){
        echo "Success";
    } else {
        echo "Error";
    }
?>