<?php 

$data = $_GET['data']; 

include('phpqrcode/qrlib.php'); $codeContents = $data; QRcode::png($codeContents, false, QR_ECLEVEL_L); ?>
