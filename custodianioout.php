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
    <form id='printAck_form' action="" method="post" enctype="multipart/form-data">
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
                    <div class="row full field"><div class="col-md-3"><label>Purpose of taking out</label></div><div class="col-md-3"><select class="form-control selectpicker" data-live-search="true" title="Select Shelf No" name="purpose" id="purpose" value="" data-toggle1="tooltip" data-placement="top" onchange="showpurpose(this.value);">
                                                <option value=""> - Select Here - </option>
                                                <option value="1">Court</option>
                                                <option value="2">Investigation</option>
                                                <option value="3">Others</option>
                                            </select></div> 
                    <div class="col-md-3 purpose"><label>Court</label></div><div class="col-md-3 purpose"><select class="form-control selectpicker" data-live-search="true" title="Select Case Type" name="court" id="court" value="" data-toggle1="tooltip" data-placement="top"  >
                                        <option value=""> - Select Here - </option>
                                        <?php 
include('connections/db_connection.php');
$rs4 = "SELECT * from tbl_court";
$data4 = mysqli_query($db,$rs4);
while($rsArr4 = mysqli_fetch_array($data4)){  
    $array4[] = $rsArr4;
}
foreach($array4 as $i=>$array4){ ?>
                            <option value="<?php  echo base64_decode($array4['court']); ?>"> <?php  echo base64_decode($array4['court']); ?></option>
<?php  } ?>
                                    </select></div></div>
                    <!-- <label>QRCode</label> -->

                    <div class="row full field"> <div class="col-md-3"><label>CC/SCN/PR No</label></div><div class="col-md-3"><input type="text" class="txt_box form-control" placeholder="CC/SCN/PR No" name="ccno" id="ccno" /><P><?php //echo $_REQUEST['rack_no']; ?></P></div> <div class="col-md-3 purpose"><label>Date of hearing</label></div><div class="col-md-3 purpose"><input type="text" class="txt_box form-control" id="doh" name="doh" data-date-format="dd/mm/yyyy" class="txt_box form-control"  placeholder="Next hearing date" maxlength="10" size="10"   /></div></div>

                    <div class="row full field"> <div class="col-md-3"><label>Passport Signed by IO </label></div><div class="col-md-3"><input type="radio" id="yes" name="autherized" value="1" >
                        <label for="yes" style="color:#340e71" >Yes</label>&nbsp;&nbsp;&nbsp;
                        <input type="radio" id="no" name="autherized" value="0" >
                        <label for="no" style="color:#340e71" >No</label></div>
                    <div class="col-md-3"><label>Autherized IO Name</label></div>
                    <div class="col-md-3"><input type="text" class="txt_box form-control" placeholder="Autherized IO Name" name="authorized_io_name" id="authorized_io_name" /></div></div>

                    <!--div class="row full field"> <div class="col-md-3"><label>Capture Image </label></div><div class="col-md-3"><input type="file" name="photo" capture="user" accept="image/*"></div> <div class="col-md-3"><label>Capture Video </label></div><div class="col-md-3"><input type="file" name="video" capture="user" accept="video/*"></div></div-->
                    <hr>
                    <div class="row"> 
                        <div class="col-md-4 form-group">
                            <div class="full field">
                                <label>Passport / Supporting Documents </label>&nbsp;
                                &nbsp;
                                <i class="fa fa-upload fa-2x" aria-hidden="true"   ></i>
                                <!-- <i class="fa fa-upload fa-2x" aria-hidden="true"  onclick="view_docModal()" ></i> -->
                            </div>
                            <div>
                                <input type="file" name="support_doc"  accept=".png,.jpeg,.jpg,.pdf,.doc,.docx" />
                             </div>
                        </div> 
                        <div class="col-md-4 form-group" align="center">
                            <div class="full field">
                                <label>Upload Image </label>&nbsp;
                                &nbsp;
                                <i class="fa fa-picture-o fa-2x" aria-hidden="true" ></i>
                                <!-- <i class="fa fa-picture-o fa-2x" aria-hidden="true" onclick="view_imgModal()"></i> -->
                            </div>
                            <div>
                            &nbsp;<input type="file" name="img_doc" accept=".png,.jpeg,.jpg"  />
                             </div>
                        </div> 
                        <div class="col-md-4 form-group" align="center">
                            <div class="full field">
                                <label>Upload Video</label>&nbsp;
                                &nbsp;
                                <i class="fa fa-video-camera fa-2x" aria-hidden="true"  ></i>
                                <!-- <i class="fa fa-video-camera fa-2x" aria-hidden="true"  onclick="view_videoModal()" ></i> -->
                            </div>
                            <div>
                            &nbsp; <input type="file" name="video_doc"  accept="video/*"/>
                             </div>
                        </div>
                    </div>


                     <br>
                    <br>
                    <!--<div class="row"><div class="col-md-1"><label>Date: </label></div><div class="col-md-2"><p><?php //echo date('d/m/Y'); ?></p></div></div>
                    <br>
                    <div class="row"><div class="col-md-1"><label>Time: </label></div><div class="col-md-2"><p><?php //echo date('H:i:s'); ?></p></div></div>
                    <div class="row" style="text-align:right"><div class="col-md-12"><label>Signed Malkhana in charge </label></div>  -->

                    
                    <div class="col-md-12" align="center" >
                            <button class="btn btn-info" type="submit" >Save & Print</button>
                            <a href="custodianinwardio.php"><button class="btn btn-danger" type="button">Close</button></a></i></button></div>
                    </div>

                </div>
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
			<form id='document_uploadform' action="" method="post" enctype="multipart/form-data">
                <input type="hidden" id="h_f_id" name="h_f_id" >
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
                                <p class="mt-5 text-center">
                                    <label for="attachment">
                                        <a class="btn btn-primary text-light" role="button" aria-disabled="false">Upload Documents</a>
                                    </label>
                                    <input type="file" name="file" accept=".pdf" id="attachment" style="visibility: hidden; position: absolute;" multiple />
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
			<form id='image_uploadform' action="" method="post" enctype="multipart/form-data">
            <input type="hidden" id="h_if_id" name="h_if_id" >
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 text-center">
                            <div class="upload__box">
                                <div class="upload__btn-box">
                                    <label class="upload__btn">
                                    Upload Images
                                    <input type="file" name="image" multiple="" data-max_length="20" class="upload__inputfile" >
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
			<form id='video_uploadform' action="" method="post" enctype="multipart/form-data">
            <input type="hidden" id="h_vf_id" name="h_vf_id" >
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 text-center">
                            <div class="upload__box">
                                <div class="upload__btn-box">
                                    <label class="upload__btn">
                                    <!-- Upload Video -->
                                    <input type="file" name="video" multiple="" data-max_length="20" class="" accept="video/mp4,video/x-m4v,video/*">
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