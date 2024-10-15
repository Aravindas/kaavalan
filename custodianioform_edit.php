<?php include('custheader.php'); ?>

<script src="js/custodianedit.js"></script>

<script type="text/javascript" src="js/jquery.multi-select.js"></script>
<?php 
$mid = $_REQUEST['id'];
include("../connections/db_connection.php");

$rs = "SELECT * FROM tbl_custodian c LEFT JOIN  tbl_seizure_custodian a  on  c.id  = a.m_id WHERE m_id='$mid'  ";
$res = mysqli_query($db,$rs);
$rsArr = mysqli_fetch_array($res);

$resdata = $rsArr;//echo '<pre>';print_r($resdata);

?>

<script>
$(document).ready(function () {
    getStation('<?php echo base64_decode($resdata['district_code']); ?>');
});
</script>
<!-- section -->
<br>
<div class="section margin-top_50">
    <div class="container">
        <div class="row form-bg">
           <div class="col-md-12">
                <div class="full">
                    <div class="heading_main text_align_left">
                       <h2><span class="title"><i class="fa fa-plus-circle" aria-hidden="true"></i> Custodian - Add New Inventory</span></h2>
                    </div>
                   </div>
                   <div class="full">
                    <form id="applyform"  name="applyform" method="post">
                        <fieldset>
                        <input type="hidden" id="mid" name="mid"  value="<?php echo $mid; ?>">
                        <div class="cborder">
                        <div class="row">
                        <div class="col-md-4 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> District</label>
                                <select class="form-control selectpicker" data-live-search="true" title="Select District" name="district" id="district" value="" data-toggle1="tooltip" data-placement="top"  >
                                    <option value=""> - Select Here - </option>
                                
 <?php 
 $_SESSION['mip']="getDistrict";
 include('getData.php');
 $data = unserialize(base64_decode($_SESSION['data']));
 
 foreach($data as $i=>$data){ 
    if(base64_decode($resdata['district_code']) == $data['district']) { 
        $sel = 'selected'; 
    } else { 
        $sel = ""; 
    }  
    ?>
                                    <option value="<?php  echo $data['district']; ?>"  <?php echo $sel; ?> > <?php  echo $data['district']; ?></option>
<?php  }  ?>
                                </select>   
                           </div>
                         </div>
                        <div class="col-md-4 form-group">
                           <div class="full field">
                                   <label><i class="fa fa-pencil" aria-hidden="true"></i>  Police Station</label>
<script type="text/javascript">
$('#district').on('change', function() {
getStation(this.value);
});

function getStation(dist){
    var sttn = "<?php echo base64_decode($resdata['station_code']); ?>";
$.ajax({
	type: "POST",
	url: "action/custodianform/dist_station.php",
	data:{dist:dist, sttn:sttn},
	success: function(data){

	$("#station").html(data);
	}
});
}
</script>	                                   
                                   <select class="form-control selectpicker" data-live-search="true" title="Select Station" name="station" id="station" value="" data-toggle1="tooltip" data-placement="top"  >
                                       <option value=""> - Select Here - </option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div id="iosearch_cont1">
                        <div class="row">
                          <div class="col-md-4 form-group">
                             <div class="full field">
                                     <label><i class="fa fa-pencil" aria-hidden="true"></i> IO Name: </label>
                                    <select class="form-control selectpicker" data-live-search="true" title="Select Case Type" name="ioname" id="ioname" value="" data-toggle1="tooltip" data-placement="top"  >
                                        <option value=""> - Select Here - </option>
                                     <?php
$rs2 = "SELECT * from tbl_iodetail";
$data2 = mysqli_query($db,$rs2);
while($rsArr2 = mysqli_fetch_array($data2)){  
    $array2[] = $rsArr2;
}
foreach($array2 as $i=>$array2){ 
    if($resdata['ioname'] == $array2['io_nm']) { 
        $sel = 'selected'; 
    } else { 
        $sel = ""; 
    }    
?>
                            <option value="<?php  echo base64_decode($array2['io_nm']); ?>"  <?php echo $sel; ?> > <?php  echo base64_decode($array2['io_nm']); ?></option>
<?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                           <div class="full field">
                                   <label><i class="fa fa-pencil" aria-hidden="true"></i> IO Designation: </label>
                                   <input type="text" class="txt_box form-control" placeholder="IO Designation" name="iodesignation" id="iodesignation" value="<?php  echo base64_decode($resdata['iodesignation']); ?>"/>
                           </div>
                          </div>
                          <div class="col-md-4 form-group">
                             <div class="full field">
                                     <label><i class="fa fa-pencil" aria-hidden="true"></i> IO Contact No: </label>
                                     <script type="text/javascript">
$('#ioname').on('change', function() {
getIODetail(this.value);
});

function getIODetail(val){
$.ajax({
	type: "POST",
	url: "action/custodianform/io_deatil.php",
	data:{ioname:val},
	success: function(data){
    const iodet = data.split("~");
	$("#iodesignation").val(iodet[0]);
	$("#iocontact_no").val(iodet[1]);
	}
});
}
</script>                                     
                                     <input type="text" class="txt_box form-control" placeholder="Contact No" name="iocontact_no" id="iocontact_no" value="<?php  echo $resdata['iocontact_no']; ?>"/>
                             </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        <br>
                        <div class="cborder">
                        <div class="row">
                            <div class="col-md-4 form-group">
                            <div class="full field">
                                    <label><i class="fa fa-pencil" aria-hidden="true"></i>  FIR No / Crime No</label>
                                    <input type="text" class="txt_box form-control" placeholder="FIR No" name="fir_no" id="fir_no" value="<?php  echo base64_decode($resdata['firno_crimeno']); ?>" />
                            </div>
                            </div>
                            <div class="col-md-4 form-group">
                            <div class="full field">
                                    <label><i class="fa fa-pencil" aria-hidden="true"></i>  Others</label>
                                    <textarea class="txt_box form-control" rows = "1" placeholder="Others" name="others" id="others" ><?php  echo base64_decode($resdata['others']); ?></textarea>
                            </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <div class="full field">
                                        <label><i class="fa fa-pencil" aria-hidden="true"></i>  Complainant Name</label>
                                        <textarea class="txt_box form-control" rows = "1" placeholder="Complainant Name" name="complainant_name" id="complainant_name"><?php  echo base64_decode($resdata['complainant_name']); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group">
                            <div class="full field">
                                    <label><i class="fa fa-pencil" aria-hidden="true"></i> Act</label>
                                    <select class="form-control selectpicker" data-live-search="true" title="Select Case Type" name="act" id="act" value="" data-toggle1="tooltip" data-placement="top"  >
                                        <option value=""> - Select Here - </option>
<?php
$rs5 = "SELECT * from tbl_act_law GROUP BY section_act";
$data5 = mysqli_query($db,$rs5);
while($rsArr5 = mysqli_fetch_array($data5)){  
    $array5[] = $rsArr5;
}
foreach($array5 as $i=>$array5){ 
    if($resdata['act'] == $array5['section_act']) { 
        $sel = 'selected'; 
    } else { 
        $sel = ""; 
    }     
?>
                            <option value="<?php  echo base64_decode($array5['section_act']); ?>"  <?php echo $sel; ?> > <?php  echo base64_decode($array5['section_act']); ?></option>
<?php  } ?>                                  </select>
                            </div>
                            </div>
                            <div class="col-md-4 form-group">
                            <div class="full field">
                                    <label><i class="fa fa-pencil" aria-hidden="true"></i>  Section </label><br>
                                    <select class="form-control selectpicker" data-live-search="true" title="Select Item Type" name="section[]" id="section" value="" data-toggle1="tooltip" data-placement="top"  multiple>
                                        <!-- <option value=""> - Select Here - </option> -->
<?php
$rs6 = "SELECT * from tbl_act_law WHERE section_law != '' GROUP BY section_law";
$data6 = mysqli_query($db,$rs6);
while($rsArr6 = mysqli_fetch_array($data6)){  
    $array6[] = $rsArr6;
}
$secArr = explode(',',base64_decode($resdata['section']));
foreach($array6 as $i=>$array6){ 
    if(in_array(base64_decode($array6['section_law']), $secArr)) { 
        $sel = 'selected'; 
    } else { 
        $sel = ""; 
    }     
?>
                            <option value="<?php  echo base64_decode($array6['section_law']); ?>" <?php echo $sel; ?>> <?php  echo base64_decode($array6['section_law']); ?></option>
<?php  } ?>                                  </select>
<script type="text/javascript">
    $(function(){
        $('#section').multiSelect();
    });
</script>
                            </div>
                            </div>
                            <div class="col-md-4 form-group">
                            <div class="full field">
                                    <label><i class="fa fa-pencil" aria-hidden="true"></i> Remarks</label>
                                    <textarea class="txt_box form-control" rows = "1" placeholder="Remarks" name="remarks" id="remarks"><?php  echo base64_decode($resdata['others']); ?></textarea>
                            </div>
                            </div>
                            <div class="col-md-4 form-group">
                            <div class="full field">
                                    <label><i class="fa fa-pencil" aria-hidden="true"></i>  Court </label>
                                    <select class="form-control selectpicker" data-live-search="true" title="Select Case Type" name="court" id="court" value="" data-toggle1="tooltip" data-placement="top"  >
                                        <option value=""> - Select Here - </option>
<?php 
include('connections/db_connection.php');
$rs4 = "SELECT * from tbl_court";
$data4 = mysqli_query($db,$rs4);
while($rsArr4 = mysqli_fetch_array($data4)){  
    $array4[] = $rsArr4;
}
foreach($array4 as $i=>$array4){ 
    if($resdata['court'] == $array4['court']) { 
        $sel = 'selected'; 
    } else { 
        $sel = ""; 
    }
?>
                            <option value="<?php  echo base64_decode($array4['court']); ?>"  <?php echo $sel; ?> > <?php  echo base64_decode($array4['court']); ?></option>
<?php  } ?>                               </select>
                            </div>
                            </div>
							<div class="col-md-4 form-group">
                               <div class="full field">
                               		<label><i class="fa fa-pencil" aria-hidden="true"></i>  Next hearing date</label>
                                  	<input type="text" class="txt_box form-control" id="nhd" name="nhd" data-date-format="dd/mm/yyyy" class="txt_box form-control"  placeholder="Next hearing date" maxlength="10" size="10"   value="<?php echo base64_decode($resdata['nhd']); ?>" />
                               </div>
                              </div>
                            <div class="col-md-4 form-group">
                            <div class="full field">
                                    <label><i class="fa fa-pencil" aria-hidden="true"></i>  CC No / SRC No / PRC No</label>
                                    <input type="text" class="txt_box form-control" placeholder="CC No / SRC No" name="cc_src_no" id="cc_src_no" value="<?php echo base64_decode($resdata['cc_src_no']); ?>" />
                            </div>
                            </div>
							<div class="col-md-4 form-group">
                               <div class="full field">
                               		<label><i class="fa fa-pencil" aria-hidden="true"></i>  Date of Occurance</label>
                                  	<input type="text" class="txt_box form-control" id="doo" name="doo" data-date-format="dd/mm/yyyy" class="txt_box form-control"  placeholder="Date of Occurance" maxlength="10" size="10"  value="<?php echo base64_decode($resdata['doo']); ?>"  />
                               </div>
                              </div>
							<div class="col-md-4 form-group">
                               <div class="full field">
                               		<label><i class="fa fa-pencil" aria-hidden="true"></i>  Date of Report</label>
                                  	<input type="text" class="txt_box form-control" id="dor" name="dor" data-date-format="dd/mm/yyyy" class="txt_box form-control"  placeholder="Date of Report" maxlength="10" size="10"  value="<?php echo base64_decode($resdata['dor']); ?>" />
                               </div>
                              </div>

                           
                              <div class="col-md-4 form-group">
                              <div class="full field">
                                      <div class="row">
                                        <div class="col-md-12">
                                        <label><i class="fa fa-pencil" aria-hidden="true"></i> Autherized by IO : </label>
                                        <br><input type="radio" id="yes" name="autherized" value="1" onclick="btnEnable('yes')" <?php if(trim(base64_decode($resdata['autherized'])) == '1') { echo 'Checked'; } else { echo ''; } ?>    >
                                        <label for="yes" style="color:#340e71" >Yes</label>&nbsp;&nbsp;&nbsp;
                                        <input type="radio" id="no" name="autherized" value="0" onclick="btnEnable('no')"  <?php if(trim(base64_decode($resdata['autherized'])) == '1') { echo ''; } else { echo 'Checked'; } ?>   >
                                        <label for="no" style="color:#340e71" >No</label>
                                        </div>
                                    </div>
                            </div>
                              </div>

                        </div>
                        </div>

<?php
$rs9 = "SELECT * from tbl_seizure_contraband";
$data9 = mysqli_query($db,$rs9);
while($rsArr9 = mysqli_fetch_array($data9)){  
    $array9[] = $rsArr9;
} 
$array11 = $array9;
 foreach($array9 as $i=>$array9){ 
    $id = $array9['id'];
    $nm = base64_decode($array9['contraband_type_name']);
   $cc .= "<option value='$id'>$nm</option>"; 
 } 
 ?>                         
                                <input type="hidden" id="cont" name="cont" value="<?php echo $cc; ?>" />                         
                        <br>
                        <div class="cborder" id="autorize">
                        <div class="row">
                        <section class="container">
<div class="table table-responsive">
<table class="table table-responsive table-striped table-bordered">
<thead>
	<tr>
    	<td><label><i class="fa fa-pencil" aria-hidden="true"></i>  Contraband Type </label></td>
    	<td><label><i class="fa fa-pencil" aria-hidden="true"></i>  Contraband Name </label></td>
    	<td><label><i class="fa fa-pencil" aria-hidden="true"></i>  Total Quantity </label></td>
    	<td><label><i class="fa fa-pencil" aria-hidden="true"></i>  Number of Packets </label></td>
    	<td><label><i class="fa fa-pencil" aria-hidden="true"></i>  Quantity per Packet </label></td>
    	<td><label>Remove</label></td>
    </tr>
</thead>
<tbody id="TextBoxContainer">
<?php 
$rscon = "SELECT *,a.id as cid FROM tbl_custodian c LEFT JOIN  tbl_seizure_custodian a  on  c.id  = a.m_id WHERE m_id='$mid'  ";
$rescon = mysqli_query($db,$rscon);
while($rsArrcon = mysqli_fetch_array($rescon)){  
    $arraycon[] = $rsArrcon;
}
    foreach($arraycon as $j=>$arraycon){
?>
    <tr>
    <td><input type="hidden" name="cid[]" value="<?php echo $arraycon['cid']; ?>" /><select name = "contraband_type[]" type="text" class="txt_box form-control" placeholder=" Contraband Type"  id="contraband_type" /><option value="">- Select Here -</option><option value="1"  <?php if(base64_decode($arraycon['contraband_type']) == '1'){ echo "selected"; } else { echo ""; } ?> >Narcotic</option><option value="2" <?php if(base64_decode($arraycon['contraband_type']) == '2'){ echo "selected"; } else { echo ""; } ?>>Psychotropic</option><option value="3" <?php if(base64_decode($arraycon['contraband_type']) == '3'){ echo "selected"; } else { echo ""; } ?>>Others</option></select></td>
    
    <td> <select name = "contraband_name[]" type="text" class="txt_box form-control" placeholder=" Contraband Name"  id="contraband_name" /><option value="">- Select Here -</option>
 <?php  for ($x = 0; $x < count($array11); $x++) {
    $id = $array11[$x]['id'];
    $nm = base64_decode($array11[$x]['contraband_type_name']); ?>
    <option value='<?php echo $id; ?>'  <?php if(base64_decode($arraycon['contraband_name']) == $id ){ echo "selected"; } else { echo ""; } ?> ><?php echo $nm; ?></option>
    <?php } ?>
</select></td>
    
    <td><input type="text" name = "totqty[]" class="txt_box form-control" placeholder=" Total Quantity" id="totqty" value="<?php echo base64_decode($arraycon['totqty']); ?>" /></td>

    <td><input type="text" class="txt_box form-control" placeholder="Number of Packets" name = "nopack[]" id="nopack" value="<?php echo base64_decode($arraycon['nopack']); ?>" /></td>
    
    <td> <input type="text" class="txt_box form-control" placeholder=" Quantity per Packet" name = "qtyperpack[]" id="qtyperpack" value="<?php echo base64_decode($arraycon['qtyperpack']); ?>" /></td>
    
    <td><button type="button" class="btn btn-danger remove"><i class="fa fa-times"></i></button></td>
</tr>
<?php } ?>
</tbody>
<tfoot>
  <tr>
    <th colspan="5">
    <button id="btnAdd" type="button" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add more controls"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp; Add&nbsp;</button></th>
  </tr>
</tfoot>
</table>
</div>
</section>
                            <div class="col-md-11"></div><br>
                        </div>    
                        <div class="row">
                              <div class="col-md-6 form-group">
                              <div class="full field">
                                    <label><i class="fa fa-pencil" aria-hidden="true"></i>  Rack No </label>
                                      <div class="row">
                                        <div class="col-md-6">
                                            <select class="form-control selectpicker" data-live-search="true" title="Select Rack No" name="rack_no" id="rack_no" value="" data-toggle="tooltip" data-placement="top"  onchange="showhidetxt(this.value,'rack');">
                                                <option value=""> - Select Here - </option>
<?php 
$rs7 = "SELECT * from tbl_rack WHERE rack_code != '' GROUP BY rack_name order by FROM_BASE64(rack_name) asc";
$data7 = mysqli_query($db,$rs7);
while($rsArr7 = mysqli_fetch_array($data7)){  
    $array7[] = $rsArr7;
}
foreach($array7 as $i=>$array7){ 
    if($resdata['rack_no'] == $array7['rack_name']) { 
        $sel = 'selected'; 
    } else { 
        $sel = ""; 
    }
?>
                            <option value="<?php  echo base64_decode($array7['rack_name']); ?>"  <?php echo $sel; ?> > <?php  echo base64_decode($array7['rack_name']); ?></option>
<?php  } ?>                                                <option value="others">Others</option>
                                            </select>
                                        </div>
<?php 
 if(base64_decode($resdata['rack_no']) == 'others'){
    $styl = "style='display:block;'";
 } else {
    $styl = "style='display:none;'";
 }
 ?>                                       
                                        <div class="col-md-6" id="rack_cont"  <?php echo $styl; ?>>
                                            <input type="text" class="txt_box form-control" placeholder=" Rack No" name="rack_no1" id="rack_no1" value="<?php  echo base64_decode($resdata['rack_no1']); ?>" />
                                        </div>
                                    </div>
                              </div>
                            </div>
                              <div class="col-md-6 form-group">
                              <div class="full field">
                                    <label><i class="fa fa-pencil" aria-hidden="true"></i>  Shelf No </label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select class="form-control selectpicker" data-live-search="true" title="Select Shelf No" name="shelf_no" id="shelf_no" value="" data-toggle1="tooltip" data-placement="top"  onchange="showhidetxt(this.value,'shelf');">
                                                <option value=""> - Select Here - </option>
<?php 
$rs8 = "SELECT * from tbl_rack WHERE shelf_code != '' GROUP BY shelf_name order by FROM_BASE64(shelf_name) asc";
$data8 = mysqli_query($db,$rs8);
while($rsArr8 = mysqli_fetch_array($data8)){  
    $array8[] = $rsArr8;
}
foreach($array8 as $i=>$array8){ 
    if($resdata['shelf_no'] == $array8['shelf_name']) { 
        $sel = 'selected'; 
    } else { 
        $sel = ""; 
    }
?>
                            <option value="<?php  echo base64_decode($array8['shelf_name']); ?>" <?php echo $sel; ?> > <?php  echo base64_decode($array8['shelf_name']); ?></option>
<?php  } ?>                  <option value="others">Others</option>
                                            </select>
                                        </div>
 <?php 
 if(base64_decode($resdata['shelf_no']) == 'others'){
    $sty = "style='display:block;'";
 } else {
    $sty = "style='display:none;'";
 }
 ?>

                                        <div class="col-md-6" id="shelf_cont" <?php echo $sty; ?>>
                                            <input type="text" class="txt_box form-control" placeholder="Shelf No" name="shelf_no1" id="shelf_no1" value="<?php  echo base64_decode($resdata['shelf_no1']); ?>" />
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                              <hr>
                              <div class="row">  
                              <div class="col-md-4 form-group">
                              <div class="full field">
                                <label>Passport / Supporting Documents</label>&nbsp;
                                &nbsp;<i class="fa fa-upload fa-2x" aria-hidden="true"  onclick="view_docModal()" ></i>
                              </div>
                              </div>
                              <div class="col-md-4 form-group">
                              <div class="full field">
                                <label>Upload Image </label>&nbsp;
                                &nbsp;<i class="fa fa-picture-o fa-2x" aria-hidden="true" onclick="view_imgModal()"></i>
                              </div>
                              </div>
                            </div></div>
                        <br>
                        <hr>
                        <div class="col-md-12" align="center" >
                            <div class="p-2"><button class="btn btn-success" id="save" type="submit" >Save</button>
                                <button class="btn btn-warning" type="button" onclick="clearForm()">Clear</button>
                                <button class="btn btn-info" type="button" id="print_ack" onclick="printAck()">Print Ack</button>
                                <a href="custodianinwardio.php"><button class="btn btn-danger" type="button">Close</button></a>
                                <button class="btn btn-danger" type="button" id="qr_cd"><i class="fa fa-qrcode fa-1x" aria-hidden="true" onclick="genQrcode('<?php echo $mid; ?>')"></i></button></div>
                        </div>
                       </fieldset>
                    </form>
            </div>
             </div>
        </div>
    </div>
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
                <input type="hidden" id="h_f_id" name="h_f_id" value="<?php echo $mid; ?>">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
                            <label>Uploaded Documents</label>
                            <ul>
<?php 
$rsdoc = "SELECT * FROM tbl_custodian_upload WHERE m_id='$mid' and doc_type='D' ";
$resdoc = mysqli_query($db,$rsdoc);
while($rsArrdoc = mysqli_fetch_array($resdoc)){  
    $arraydoc[] = $rsArrdoc;
}
    foreach($arraydoc as $j=>$arraydoc){
?> 
                                <a target="_blank" href="viewdoc.php?id=<?php echo $arraydoc['id']; ?>&& ty=<?php echo base64_encode($arraydoc['doc_type']); ?>"><li><?php echo base64_decode($arraydoc['doc_nm']); ?></li></a>
<?php } ?>
                            </ul>                           
						</div>
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
					<!-- <button type="submit" class="btn btn-success">Upload</button> -->
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
            <input type="hidden" id="h_if_id" name="h_if_id"  value="<?php echo $mid; ?>">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
                            <label>Uploaded Images</label>
                            <ul>
<?php 
$rsimg = "SELECT * FROM tbl_custodian_upload WHERE m_id='$mid' and doc_type='I' ";
$resimg = mysqli_query($db,$rsimg);
while($rsArrimg = mysqli_fetch_array($resimg)){  
    $arrayimg[] = $rsArrimg;
}
    foreach($arrayimg as $j=>$arrayimg){
?> 
                                <a target="_blank" href="viewdoc.php?id=<?php echo $arrayimg['id']; ?>&& ty=<?php echo base64_encode($arrayimg['doc_type']); ?>"><li><?php echo base64_decode($arrayimg['doc_nm']); ?></li><?php echo '<img  width="100" src="data:image/jpeg;base64,'.base64_encode($arrayimg['doc_data']).'"/>';  ?></a>
<?php } ?>
                            </ul>                           
						</div>
						<div class="col-md-12 text-center">
                            <div class="upload__box">
                                <div class="upload__btn-box">
                                    <label class="upload__btn">
                                    Upload Images
                                    <input type="file" name="image[]" multiple="" data-max_length="20" class="upload__inputfile">
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

<script type="text/javascript">
    $("#nhd").datepicker({
      dateFormat:"dd/mm/yy",
      defaultDate: "-2w",
      changeMonth: true,
      changeYear: true,
      minDate: "0",
    });
    
    $('#doo').datepicker({
      dateFormat:"dd/mm/yy",
      defaultDate: "-2w",
      changeMonth: true,
      changeYear: true,
      maxDate: "0",
    });
    
    $('#dor').datepicker({
      dateFormat:"dd/mm/yy",
      defaultDate: "-2w",
      changeMonth: true,
      changeYear: true,
      maxDate: "0",
    });
</script>