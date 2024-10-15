<?php
	session_start();
	ob_start();
	include('../../connections/db_connection.php');
?>

<?php 
// print_r($_REQUEST);exit();		
date_default_timezone_set('Asia/Calcutta');
$date =substr((date('Y-m-d')),0,10);
$time =substr((date('Y-m-d H:i:s')),11,8);

$id =	$_POST['id'];
$purpose =	$_POST['purpose'];
$court =	base64_encode($_POST['court']);
$ccno =	base64_encode($_POST['ccno']);
$doh =	$_POST['doh'];
$autherized =	$_POST['autherized'];
$authorized_io_name =	base64_encode($_POST['authorized_io_name']);
$s_status = '2';

$contcnt = $_POST['contcnt'];
$cnt = count($_POST['contrabandcheck']);
$status_type = isset($_POST['status_type']) ? $_POST['status_type'] : "";

if($status_type == 1){
    $status = '1';
    $s_status = '1';
}elseif($contcnt == $cnt){
    $status = '2';
} else {
    $status = '3';
}

$contrabandcheck = implode(',', $_POST['contrabandcheck']);

    $cmd1 = "UPDATE tbl_seizure_custodian set s_status='$s_status'  WHERE id IN ($contrabandcheck)";
    $rs = mysqli_query($db,$cmd1);

    $targetDir = "../../uploads/";
    $sup_doc = "";
    $img = "";
    $video = "";

   
    
    if(isset($_FILES["support_doc"])){
        $fileName = uniqid() . "-" .basename($_FILES["support_doc"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        if ($_FILES["support_doc"]["error"] === UPLOAD_ERR_OK) {
            if (move_uploaded_file($_FILES["support_doc"]["tmp_name"], $targetFilePath)) {
                $sup_doc = $fileName;
            } 
        } else {
            echo "File upload error: " . $_FILES["support_doc"]["error"]; exit();
        }
       
    }

    if(isset($_FILES["video_doc"])){
        $fileName = uniqid() . "-" .basename($_FILES["video_doc"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        if (move_uploaded_file($_FILES["video_doc"]["tmp_name"], $targetFilePath)) {
            $video = $fileName;
        } 
    }

    if(isset($_FILES["img_doc"])){
        $fileName = uniqid() . "-" .basename($_FILES["img_doc"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        if (move_uploaded_file($_FILES["img_doc"]["tmp_name"], $targetFilePath)) {
            $img = $fileName;
        } 
    }
    

    $cmd2 = "INSERT INTO custodion_history 
    (purpose, o_court, cc_scn_pr, doh, passport_authorize, authorized_io_name, status, time, custodian_id,sup_doc,img,video) 
    VALUES ('$purpose', '$court', '$cc_scn_pr', '$doh', '$autherized', '$authorized_io_name', '$status', CURRENT_TIMESTAMP, '$id','$sup_doc','$img','$video')";

    $rs2 = mysqli_query($db,$cmd2);


   $cmd = "UPDATE tbl_custodian set purpose='$purpose',o_court='$court',cc_scn_pr='$ccno',doh='$doh',passport_authorize ='$autherized',authorized_io_name='$authorized_io_name',status='$status',out_time=CURRENT_TIMESTAMP  WHERE id='".$id."' ";
	
	if(mysqli_query($db,$cmd)){
        echo "Success";
    } else {
        echo "Error";
    }
?>