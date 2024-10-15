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

$m_id =	$_POST['mid'];


$district =	base64_encode($_POST['district']);
$station = base64_encode($_POST['station']);
$ioname = base64_encode($_POST['ioname']);
$iodesignation = base64_encode($_POST['iodesignation']);
$iocontact_no = $_POST['iocontact_no'];
$fir_no = base64_encode($_POST['fir_no']);
$others = base64_encode($_POST['others']);
$complainant_name = base64_encode($_POST['complainant_name']);
$act = base64_encode($_POST['act']);
$section =implode(",", $_POST['section']);
$section = base64_encode($section);
$remarks = base64_encode($_POST['remarks']);
$court = base64_encode($_POST['court']);
$nhd = base64_encode($_POST['nhd']);
$cc_src_no = base64_encode($_POST['cc_src_no']);
$doo = base64_encode($_POST['doo']);
$dor = base64_encode($_POST['dor']);
$autherized = base64_encode($_POST['autherized']);

$rack_no = base64_encode($_POST['rack_no']);
$rack_no1 = base64_encode($_POST['rack_no1']);
$shelf_no = base64_encode($_POST['shelf_no']);
$shelf_no1 = base64_encode($_POST['shelf_no1']);

$cmd = "UPDATE tbl_custodian set district_code='$district', station_code='$station', ioname='$ioname', iodesignation='$iodesignation', iocontact_no='$iocontact_no', firno_crimeno='$fir_no', others='$others', complainant_name='$complainant_name', act='$act', section='$section', remarks='$remarks', court='$court', nhd='$nhd', cc_src_no='$cc_src_no', doo='$doo', dor='$dor', autherized='$autherized', rack_no='$rack_no', shelf_no='$shelf_no', rack_no1='$rack_no1', shelf_no1='$shelf_no1',update_at=CURRENT_TIMESTAMP WHERE id='".$m_id."' ";


if(mysqli_query($db,$cmd)){

    $total = count($_POST['contraband_type']);

    $contraband_type = $_POST['contraband_type'];
    $contraband_name = $_POST['contraband_name'];
    $totqty = $_POST['totqty'];
    $nopack = $_POST['nopack'];
    $qtyperpack = $_POST['qtyperpack'];

    $cid = $_POST['cid'];

    for($i=0; $i<$total; $i++) {
      
        $contraband_type1 = base64_encode($contraband_type[$i]);
        $contraband_name1 = base64_encode($contraband_name[$i]);
        $totqty1 = base64_encode($totqty[$i]);
        $nopack1 = base64_encode($nopack[$i]);
        $qtyperpack1 = base64_encode($qtyperpack[$i]);
        $cid1 = $cid[$i];

        if($cid1 != ""){
            $cmd1 = "UPDATE tbl_seizure_custodian set contraband_type='$contraband_type1',contraband_name='$contraband_name1',totqty='$totqty1',nopack='$nopack1',qtyperpack='$qtyperpack1'  WHERE id ='".$cid1."' AND m_id='".$m_id."' ";
        } else {
            $cmd1 = "INSERT INTO tbl_seizure_custodian  (m_id,contraband_type,contraband_name,totqty,nopack,qtyperpack) VALUES ('$m_id','$contraband_type1','$contraband_name1','$totqty1','$nopack1','$qtyperpack1')";
        }
        $rs = mysqli_query($db,$cmd1);
    }
    echo "Success";
} else {
    echo "Error";
}
?>