<?php
if(isset($_POST['id']) && isset($_POST['id']) != "") {
   
	$id = $_POST['id'];

    $_SESSION['mip']="court_detail~".$id; 
    include('../../getData.php');
    $data = unserialize(base64_decode($_SESSION['data']));
    echo json_encode($data);
}
?>