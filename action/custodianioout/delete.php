<?php
	session_start();
	ob_start();
	include('../../connections/db_connection.php');
?>

<?php 

$id =	$_REQUEST['id'];

$cmd = "UPDATE tbl_custodian set status='0', update_at=CURRENT_TIMESTAMP WHERE id='".$id."' ";

$cmd1 = "INSERT INTO h_tbl_custodian SELECT * FROM tbl_custodian WHERE id='".$id."' ";


$rs1 = mysqli_query($db,$cmd1);
$rs = mysqli_query($db,$cmd);

echo "Success";
?>