<?php
	session_start();
	ob_start();
	include('../../connections/db_connection.php');
?>

<?php 	
date_default_timezone_set('Asia/Calcutta');
$date =substr((date('Y-m-d')),0,10);
$time =substr((date('Y-m-d H:i:s')),11,8);


$district =	base64_encode($_POST['district']);
$station = base64_encode($_POST['station']);
// $io =  base64_encode($_POST['io']);
// $cos_gpf_no = base64_encode($_POST['cos_gpf_no']);
$ioname = base64_encode($_POST['ioname']);
$iodesignation = base64_encode($_POST['iodesignation']);
$iocontact_no = $_POST['iocontact_no'];
$fir_no = base64_encode($_POST['fir_no']);
// $csr_no = base64_encode($_POST['csr_no']);
$others = base64_encode($_POST['others']);
$complainant_name = base64_encode($_POST['complainant_name']);
// // $cps_gpf_no = base64_encode($_POST['cps_gpf_no']);
// $case_type = base64_encode($_POST['case_type']);
// $item_type = base64_encode($_POST['item_type']);
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
$status = '1';


// $seizure_code = $_POST['seizure_code'];
// $property_code = base64_encode($_POST['property_code']);
// $seizure_quantity = $_POST['seizure_quantity'];
// $seizure_unit = base64_encode($_POST['seizure_unit']);
// $seizure_location = base64_encode($_POST['seizure_location']);


// $seizure_code1 = $_POST['seizure_code1'];
// $property_code1 = base64_encode($_POST['property_code1']);
// $seizure_quantity1 = $_POST['seizure_quantity1'];
// $seizure_unit1 = base64_encode($_POST['seizure_unit1']);
// $seizure_location1 = base64_encode($_POST['seizure_location1']);


//$cmd = "INSERT INTO tbl_custodian (district_code, station_code, cos_gpf_no, io_name, io_designation, io_contact, firno_crimeno, csr_no, others, complaint_name, cps_gpf_no, case_type, item_type, remarks, court, nhd, rack_code, shelf_code, rack_code1, shelf_code1, created_by, created_at, status,seizure_code) VALUES ('$district', '$station', '$cos_gpf_no', '$name', '$designation','$contact_no', '$fir_no', '$csr_no', '$others', '$complainant_name', '$cps_gpf_no', '$case_type', '$item_type', '$remarks', '$court', '$nhd', '$rack_no', '$shelf_no', '$rack_no1', '$shelf_no1', 'Admin', CURRENT_TIMESTAMP,  '$status','$seizure_code')";

$cmd = "INSERT INTO tbl_custodian (district_code, station_code, ioname, iodesignation, iocontact_no, firno_crimeno, others, complainant_name, act, section, remarks, court, nhd, cc_src_no, doo, dor, autherized, rack_no, shelf_no, rack_no1, shelf_no1, created_by, created_at, status) VALUES  ('$district', '$station', '$ioname', '$iodesignation','$iocontact_no', '$fir_no',  '$others', '$complainant_name',  '$act', '$section', '$remarks', '$court', '$nhd', '$cc_src_no', '$doo', '$dor', '$autherized', '$rack_no',  '$shelf_no', '$rack_no1', '$shelf_no1', 'Admin', CURRENT_TIMESTAMP,  '$status')";


if(mysqli_query($db,$cmd)){

    $rs = "SELECT id FROM tbl_custodian order by id desc limit 1";
    $data = mysqli_query($db,$rs);
    $rsArr = mysqli_fetch_array($data);
    if($rsArr != ""){
        $m_id = $rsArr['id'];
    } else {
        $m_id = 1;
    }

    
    $total = count($_POST['contraband_type']);

    $contraband_type = $_POST['contraband_type'];
    $contraband_name = $_POST['contraband_name'];
    $totqty = $_POST['totqty'];
    $nopack = $_POST['nopack'];
    $qtyperpack = $_POST['qtyperpack'];

    for($i=0; $i<$total; $i++) {
        $contraband_type1 = base64_encode($contraband_type[$i]);
        $contraband_name1 = base64_encode($contraband_name[$i]);
        $totqty1 = base64_encode($totqty[$i]);
        $nopack1 = base64_encode($nopack[$i]);
        $qtyperpack1 = base64_encode($qtyperpack[$i]);

        $cmd1 = "INSERT INTO tbl_seizure_custodian  (m_id,contraband_type,contraband_name,totqty,nopack,qtyperpack) VALUES ('$m_id','$contraband_type1','$contraband_name1','$totqty1','$nopack1','$qtyperpack1')";
        $rs = mysqli_query($db,$cmd1);
    }
    echo "Success~".$m_id;
} else {
    echo "Error";
}

//$cmd1 = "INSERT INTO tbl_seizure_custodian  (status,seizure_code,firno_crimeno,property_code,seizure_quantity,seizure_unit,seizure_location) VALUES ('R',$seizure_code,'$fir_no','$property_code','$seizure_quantity','$seizure_unit','$seizure_location')";


// $rs = mysqli_query($db,$cmd1);


// $cmd2 = "INSERT INTO tbl_seizure_custodian  (status,seizure_code,firno_crimeno,property_code,seizure_quantity,seizure_unit,seizure_location) VALUES ('S',$seizure_code1,'$fir_no','$property_code1','$seizure_quantity1','$seizure_unit1','$seizure_location1')";
// $rs1 = mysqli_query($db,$cmd2);

	
?>