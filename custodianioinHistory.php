<?php include('custheader.php'); ?>

<script src="js/custodianioout.js"></script>
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

//$contArr = array("Opium" =>1, "Ganja"=>2, "Cocaine"=>3, "Hashish"=>4, "Morphine"=>5, "Others" =>6);
// print_r($data);

?>

<style>
th {
    padding:5px;
    border: 1px solid #000;
}
td {
    padding:5px;
    border: 1px solid #000;
}
</style>
<br>
<div style="text-align:center" ><h3>  Avadi Police Commissionerate <br> E- Malkhana </h3><a class="pull-right btn btn-primary col-md-1" href="custodianinwardio.php">Back &nbsp;</a></div>
<div class="container">
    <form id='printAck_form' action="" method="post">
        <div class="modal-body"> 
            <div class="row">
                <div class="col-md-12">
                    <!-- <div style="text-align:center" class="col-md-12"><h3>  Avadi Police Commissionerate <br> E- Malkhana </h3></div> -->
                    <br>
                    <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>"/>

                    <div class="row full field"><div class="col-md-3"><label>District : </label></div><div class="col-md-3"><P><?php echo base64_decode($data['district_code']); ?></P></div><div class="col-md-3"><label>Station : </label></div><div class="col-md-3"><P><?php echo base64_decode($data['station_code']); ?></P></div></div>

                    <div class="row full field"><div class="col-md-3"><label>FIR/ Crime No</label></div><div class="col-md-3"><P><?php echo base64_decode($data['firno_crimeno']); ?></P></div>   <div class="col-md-3"><label>Section</label> </div><div class="col-md-3"><P><?php echo base64_decode($data['section']); ?></P></div> </div>


                    <div class="row full field"><div class="col-md-3"><label>IO Name</label></div><div class="col-md-3"><P><?php echo base64_decode($data['ioname']); ?></P></div> <div class="col-md-3"><label>IO Contact Number</label></div><div class="col-md-3"><P><?php echo $data['iocontact_no']; ?></P></div> </div>

                    <div class="row full field"> <div class="col-md-3"><label>Rack No</label></div><div class="col-md-3"><P><?php echo base64_decode($data['rack_no']); ?></P></div> <div class="col-md-3"><label>Shelf No</label></div><div class="col-md-3"><P><?php echo base64_decode($data['shelf_no']); ?></P></div> </div>

                    <br><br>

                    <div class="row  full field"><div class="col-md-12">
                        <table border="1" width="100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name of contraband</th>
                                    <th>Total Quantity</th>
                                    <th>Number of Packets</th>
                                    <th>Quantity per Packet</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
    $data1 = unserialize(base64_decode($_SESSION['data']));//echo '<pre>';print_r($data1);
    $contCount = count($data1);
    foreach($data1 as $j=>$data1){
?>                             
                                <tr>
                                    <td><input type="checkbox" id="contrabandcheck_<?php echo $data1['cid']; ?>" name="contrabandcheck[]" value="<?php echo $data1['cid']; ?>"></td>
                                    <td><?php echo base64_decode($data1['contraband_type_name']); ?></P></td>
                                    <td><?php echo $sum."Kg"; ?></td>
                                    <td><?php echo base64_decode($data1['nopack']); ?></P></td>
                                    <td><?php echo base64_decode($data1['qtyperpack']); ?></P></td>
                                </tr>
<?php 
    }
?> 
                            </tbody>
                            <input type="hidden" id="contcnt" name="contcnt" value="<?php echo $contCount; ?>">
                        </table>
                    </div></div>

                    <hr>
                    <h3>History</h3>
                    <hr>
                    <table border="1" width="100%">
                            <thead>
                                <tr>
                                    <th>Purpose</th>
                                    <!-- <th>CC/SCN/PR No</th> -->
                                    <!-- <th>Passport authorize</th> -->
                                    <th>Authorized io name</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Support Docs</th>
                                    <th>Documents</th>
                                    <th>Video</th>
                                </tr>
                            </thead>
                         <tbody>
                    <?php 
                        include('connections/db_connection.php');
                        $rs4 = "SELECT * from custodion_history ch LEFT JOIN tbl_court tc on tc.id = ch.purpose where custodian_id = ".$_REQUEST['id'];
                        $data4 = mysqli_query($db,$rs4);
                        while($rsArr4 = mysqli_fetch_array($data4)){  
                     ?>
                     <tr>
                                    <td><?php echo base64_decode($rsArr4['court']);?></td>
                                    <!-- <td><?php echo base64_decode($rsArr4['cc_scn_pr']);?></td> -->
                                    <!-- <td><?php echo base64_decode($rsArr4['passport_authorize']);?></td> -->
                                    <td><?php echo base64_decode($rsArr4['authorized_io_name']);?></td>
                                    <td><?php echo $rsArr4['status'] == 1 ? "IN" : "OUT";?></td>
                                    <td><?php echo $rsArr4['time'];?></td>
                                    <td><a href="./uploads/<?php echo $rsArr4['sup_doc'];?>" target="_blank"><?php echo $rsArr4['sup_doc'];?></a></td>
                                    <td><a href="./uploads/<?php echo $rsArr4['img'];?>" target="_blank"><?php echo $rsArr4['img'];?></a> </td>
                                    <td><a href="./uploads/<?php echo $rsArr4['video'];?>" target="_blank"><?php echo $rsArr4['video'];?></a></td>
                                    
                                </tr>
                                <?php 
                                    }
                                ?> 
                            </tbody>
                            </table>
            </div>
        </div>
    </form>
</div>


<br>
<?php include("footer.php"); ?>


<div class="modal fade" id="document_upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content" >
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel" align="center"><b> Upload Scaned Document </b></h3>
			</div>
			<form id='document_uploadform' action="" method="post">
                <input type="hidden" id="h_f_id" name="h_f_id" >
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
                                <p class="mt-5 text-center">
                                    <label for="attachment">
                                        <a class="btn btn-primary text-light" role="button" aria-disabled="false">Upload Documents</a>
                                    </label>
                                    <input type="file" name="file[]" accept=".pdf" id="attachment" style="visibility: hidden; position: absolute;" multiple />
                                </p>
                                <p id="files-area">
                                    <span id="filesList">
                                        <span id="files-names"></span>
                                    </span>
                                </p>
                            </div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>

					<div id="message3" style="color:red"></div>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="modal fade" id="image_upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content" >
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel" align="center"><b> Upload Images </b></h3>
			</div>
			<form id='image_uploadform' action="" method="post">
            <input type="hidden" id="h_if_id" name="h_if_id" >
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 text-center">
                            <div class="upload__box">
                                <div class="upload__btn-box">
                                    <label class="upload__btn">
                                    Upload Images
                                    <input type="file" name="image[]" multiple="" data-max_length="20" class="upload__inputfile" >
                                    </label>
                                </div>
                                <div class="upload__img-wrap"></div>
                            </div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<!-- <button type="submit" class="btn btn-success">Upload</button> -->
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>

					<div id="message3" style="color:red"></div>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="modal fade" id="video_upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content" >
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel" align="center"><b> Upload Video </b></h3>
			</div>
			<form id='video_uploadform' action="" method="post">
            <input type="hidden" id="h_vf_id" name="h_vf_id" >
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 text-center">
                            <div class="upload__box">
                                <div class="upload__btn-box">
                                    <label class="upload__btn">
                                    <!-- Upload Video -->
                                    <input type="file" name="video[]" multiple="" data-max_length="20" class="" accept="video/mp4,video/x-m4v,video/*">
                                    </label>
                                </div>
                                <div class="upload__video-wrap"></div>
                            </div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<!-- <button type="submit" class="btn btn-success">Upload</button> -->
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>

					<div id="message3" style="color:red"></div>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
    $('#doh').datepicker({
      dateFormat:"dd/mm/yy",
      defaultDate: "-2w",
      changeMonth: true,
      changeYear: true,
      minDate: "0",
    });
    $('#doh').datepicker("setDate", new Date());
</script>