<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/navstyle.css" rel="stylesheet">
  <script src="js/jquery.min.js"></script>
<style>
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
.btn1 {
    width:60px;
}
</style>


<?php 
date_default_timezone_set('Asia/Calcutta');

include('connections/db_connection.php');
?>
<?php 
$id= $_REQUEST['id'];
$_SESSION['mip']="cusio_Detail~".$id; 
include('getData.php');
$data = unserialize(base64_decode($_SESSION['data']));

foreach($data as $j=>$data1){
    $totqty = base64_decode($data1['totqty']);
    $sum += (float)$totqty;
}

$data = $data[0];

// $contArr = array("Opium" =>1, "Ganja"=>2, "Cocaine"=>3, "Hashish"=>4, "Morphine"=>5, "Others" =>6);
$purposeArr = array("Court" =>1, "Investigation"=>2, "Others"=>3);
// print_r($data);
?>
<div class="container">
    <form id='printAck_form' action="" method="post">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-10">
                <div style="text-align:center" class="col-md-12"><img src="images/logo.png" style="height: 90px;"> <h3> Avadi Police Commissionerate <br> E- Malkhana </h3></div></div><div class="col-md-2"><div align="right"> <span id="qrcd_img" style="display:block"></span></div></div></div>
                  <br>
                    <div class="row"><div class="col-md-3"><label>District : </label></div><div class="col-md-3"><P><?php echo base64_decode($data['district_code']); ?></P></div></div>

                    <div class="row"><div class="col-md-3"><label>Station : </label></div><div class="col-md-3"><P><?php echo base64_decode($data['station_code']); ?></P></div></div>

                    <div class="row"><div class="col-md-3"><label>FIR/ Crime No</label></div><div class="col-md-3"><P><?php echo base64_decode($data['firno_crimeno']); ?></P></div></div>

                    <div class="row"><div class="col-md-3"><label>Section</label> </div><div class="col-md-3"><P><?php echo base64_decode($data['section']); ?></P></div> </div>

                    <div class="row"><div class="col-md-3"><label>IO Name</label></div><div class="col-md-3"><P><?php echo base64_decode($data['ioname']); ?></P></div></div> 
                    
                    <div class="row"><div class="col-md-3"><label>IO Contact Number</label></div><div class="col-md-3"><P><?php echo $data['iocontact_no']; ?></P></div>  </div>
                    
                    <div class="row"><div class="col-md-3"><label>Rack No</label></div><div class="col-md-3"><P><?php echo base64_decode($data['rack_no']); ?></P></div> </div>

                    <div class="row"> <div class="col-md-3"><label>Shelf No</label></div><div class="col-md-3"><P><?php echo base64_decode($data['shelf_no']); ?></P></div></div> 
                    
                    <br><br>

                    <div class="row"><div class="col-md-12">
                        <table border="1" width="100%">
                            <thead>
                                <tr>
                                    <th>Name of contraband</th>
                                    <th>Total Quantity</th>
                                    <th>Number of Packets</th>
                                    <th>Quantity per Packet</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
    $data1 = unserialize(base64_decode($_SESSION['data']));
    foreach($data1 as $j=>$data1){
        if($data1['s_status'] == 2){
            $status = '<span class="btn btn1 btn-danger">OUT</span>';
        } else {
            $status = '<span class="btn btn1 btn-success">IN</span>';
        }
?>                             
                                <tr>
                                    <td><?php echo base64_decode($data1['contraband_type_name']); ?></P></td>
                                    <td><?php echo $sum."Kg"; ?></td>
                                    <td><?php echo base64_decode($data1['nopack']); ?></P></td>
                                    <td><?php echo base64_decode($data1['qtyperpack']); ?></P></td>
                                    <td><?php echo $status; ?></td>
                                </tr>
<?php 
    }
?> 
                            </tbody>
                        </table>
                    </div></div>
                    <br><br><br><br>
                    <div class="row full field"><div class="col-md-3"><label>Purpose of taking out</label></div><div class="col-md-3"><?php echo array_search($_REQUEST['purpose'], $purposeArr); ?></div> </div>
                    <!-- <label>QRCode</label> -->

                    <div class="row full field"><div class="col-md-3"><label>Court</label></div><div class="col-md-3"><P><?php echo $_REQUEST['court']; ?></P></div></div> 
                    
                    <div class="row full field"><div class="col-md-3"><label>CC/SCN/PR No</label></div><div class="col-md-3"><P><?php echo $_REQUEST['ccno']; ?></P></div> </div>

                    <div class="row full field"><div class="col-md-3"><label>Date of hearing</label></div><div class="col-md-3"><P><?php echo $_REQUEST['doh']; ?></P></div></div> 
                    
                    <div class="row full field"><div class="col-md-3"><label>Passport Signed by IO </label></div><div class="col-md-3"><?php if($data['passport_authorize'] =="1"){ echo "YES"; } else { echo "No"; } ?></div> </div>

                    <div class="row full field"><div class="col-md-3"><label>Autherized IO Name</label></div><div class="col-md-3"><P><?php echo base64_decode($data['authorized_io_name']); ?></P></div> </div>

                    <!-- <div class="row full field"><div class="col-md-3"><label>Passport / Supporting Documents</label></div><div class="col-md-3"><i class="fa fa-upload fa-2x" aria-hidden="true"  onclick="view_docModal()" ></i></div> <div class="col-md-3"><label>Capture Image </label></div><div class="col-md-3"><input type="file" name="photo" capture="user" accept="image/*"></div> </div>

                    <div class="row full field"><div class="col-md-3"><label>Capture Video </label></div><div class="col-md-3"><input type="file" name="video" capture="user" accept="video/*"></div></div> -->
                    <br>
                    <br><br><br>
                    <div class="row"><div class="col-md-3"><label>Date & Time </label></div><div class="col-md-3"><p><?php echo date('d/m/Y  H:i:s'); ?></p></div><div class="col-md-3" style="text-align:left"><div class="col-md-12"><label>Malkhana in-charge </label></div></div>
                    <br>
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
        $("#qrcd_img").html(data);setTimeout(function () {
         window.print();
        }, 50);
        $(".container").hover(function(){
            window.close();
        });
	});
    
    });
</script>
