<?php 
$data = $_GET['data']; 
include('qrlib.php'); 
$codeContents = $data; 
QRcode::png($codeContents, false, QR_ECLEVEL_L); 
?>
