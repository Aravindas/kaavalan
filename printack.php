<?php //print_r($_REQUEST);  ?>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/navstyle.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<style type="text/css" >
.rotingtxt {
    -webkit-transform: rotate(331deg);
    -moz-transform: rotate(331deg);
    -o-transform: rotate(331deg);
    transform: rotate(0deg);
    position: absolute;
    padding-left: 32%;
    padding-top: 18%;
    opacity: 0.2;
}
label {
    color:darkblue;
}
@media print and (max-width: 767px) {
    .col-md-3 {width:50%; float:left;}
}

th {
    padding:5px;
    border: 1px solid #000;
}
td {
    padding:5px;
    border: 1px solid #000;
}
</style>
<?php 
    $mid = $_REQUEST['mid']; 
    // $mid = 8; 
?>
<?php 
$_SESSION['mip']="qrcontraband~".$mid; 
include('getData.php');
$data = unserialize(base64_decode($_SESSION['data']));

//$contArr = array("Opium" =>1, "Ganja"=>2, "Cocaine"=>3, "Hashish"=>4, "Morphine"=>5, "Others" =>6);
foreach($data as $j=>$data1){
    $totqty = base64_decode($data1['totqty']);
    $sum += (float)$totqty;
}

foreach($data as $i=>$data){
    
}
?>
<?php 
date_default_timezone_set('Asia/Calcutta');

//$contArr = array("Opium" =>1, "Ganja"=>2, "Cocaine"=>3, "Hashish"=>4, "Morphine"=>5, "Others" =>6);
?>
<p class="rotingtxt"><img src="images/logo.png"></p>
<div class="container ">
    <form id='printAck_form' action="" method="post">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-10">
                <div style="text-align:center" class="col-md-12"><img src="images/logo.png" style="height: 90px;"> <h3> Avadi Police Commissionerate <br> E- Malkhana </h3></div></div><div class="col-md-2"><div align="right"> <span class="qrcd_img"></span></div></div></div>
                  <br>
                    <br>
                    <div style="text-align:center"><p><b>This is to Acknowledge the receipt of the contraband, the details of which are listed below</b><p></div>

                    <div class="row"><div class="col-md-3"><label>District  </label></div><div class="col-md-3"><P><?php echo base64_decode($data['district_code']); ?></P></div></div>

                    <div class="row"><div class="col-md-3"><label>Station  </label></div><div class="col-md-3"><P><?php echo base64_decode($data['station_code']); ?></P></div></div>

                    <div class="row"><div class="col-md-3"><label>FIR/ Crime No</label></div><div class="col-md-3"><P><?php echo base64_decode($data['firno_crimeno']); ?></P></div></div>

                    <div class="row"><div class="col-md-3"><label>Section</label> </div><div class="col-md-3"><P><?php echo base64_decode($data['section']); ?></P></div></div>

                    <div class="row"><div class="col-md-3"><label>Date of Occurrence </label> </div><div class="col-md-3"><P><?php echo base64_decode($data['doo']); ?></P></div></div>

                    <div class="row"><div class="col-md-3"><label>Date of report</label> </div><div class="col-md-3"><P><?php echo base64_decode($data['dor']); ?></P></div> </div>

                    <div class="row"><div class="col-md-3"><label>Rack No</label></div><div class="col-md-3"><P><?php echo base64_decode($data['rack_no']); ?></P></div></div>

                    <div class="row"><div class="col-md-3"><label>Shelf No</label></div><div class="col-md-3"><P><?php echo strtoupper(base64_decode($data['shelf_no'])); ?></P></div> </div>

                    <div class="row"><div class="col-md-3"><label>IO Name</label></div><div class="col-md-3"><P><?php echo base64_decode($data['ioname']); ?></P></div></div>
                    
                    <div class="row"><div class="col-md-3"><label>IO Contact Number</label></div><div class="col-md-3"><P><?php echo $data['iocontact_no']; ?></P></div>  </div>
                    <!-- <label>QRCode</label> -->
                    
                    <br><br>

                    <div class="row"><div class="col-md-12">
                        <table border="1" width="100%">
                            <thead>
                                <tr>
                                    <th>Name of contraband</th>
                                    <th>Total Quantity</th>
                                    <th>Number of Packets</th>
                                    <th>Quantity per Packet</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
    $data1 = unserialize(base64_decode($_SESSION['data']));
    foreach($data1 as $j=>$data1){
?>                             
                                <tr>
                                    <td><?php echo base64_decode($data1['contraband_type_name']);; ?></P></td>
                                    <td><?php echo $sum."Kg"; ?></td>
                                    <td><?php echo base64_decode($data1['nopack']); ?></P></td>
                                    <td><?php echo base64_decode($data1['qtyperpack']); ?></P></td>
                                </tr>
<?php 
    }
?> 
                            </tbody>
                        </table>
                    </div></div>

                    <br><br><br><br>
                     <div class="row"><div class="col-md-3"><label>Date & Time </label></div><div class="col-md-3"><p><?php echo date('d/m/Y  H:i:s'); ?></p></div></div><br>
                     <div class="row"><div class="col-md-3" style="text-align:left"><div class="col-md-12"><label>Malkhana in-charge </label></div></div>
                    <!--<div class="row"><div class="col-md-1"><label>Time: </label></div><div class="col-md-2"><p><?php echo date('H:i:s'); ?></p></div></div> -->
                     
                </div>

            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function () {
    var district = '<?php echo base64_decode($data['district_code']); ?>';
    var station = '<?php echo base64_decode($data['station_code']); ?>';
    var fir_no = '<?php echo base64_decode($data['firno_crimeno']); ?>';
    var qr_code="Avadi-"+district+"-"+station+"-"+fir_no;
	$.post("qr_cd_generator.php", {
    qr_code: qr_code
    },
	function (data, status) {
		if (data=="Error"){
			alert("unauthorized");
		}
    $(".qrcd_img").html(data);
    setTimeout(function () {
         window.print();
        }, 50);
        $(".container").hover(function(){
            window.close();
        });
	});
        
    });

</script>