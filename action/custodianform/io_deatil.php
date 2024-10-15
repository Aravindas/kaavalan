<?php
    session_start();
    include('../../connections/db_connection.php');
?>
<?php
	if(!empty($_POST["ioname"])) {
        $ioname =	base64_encode($_POST['ioname']);
		$query ="SELECT * FROM tbl_iodetail WHERE io_nm = '".$ioname."'";
        $data = mysqli_query($db,$query);
        $results = mysqli_fetch_array($data);
        echo base64_decode($results['io_desig'])."~".base64_decode($results['io_con_num']);
    }
?>
		