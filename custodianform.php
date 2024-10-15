<?php include('custheader.php'); ?>

<script src="js/custodianform.js"></script>

<script type="text/javascript" src="js/jquery.multi-select.js"></script>

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
                        <input type="hidden" id="mid" name="mid" >
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
 
 foreach($data as $i=>$data){ ?>
                                    <option value="<?php  echo $data['district']; ?>"> <?php  echo $data['district']; ?></option>
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
$.ajax({
	type: "POST",
	url: "action/custodianform/dist_station.php",
	data:{dist:dist},
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
                            <!-- <div class="col-md-4 form-group">
                                <div class="full field">
                                    <label><i class="fa fa-pencil" aria-hidden="true"></i>  IO: </label>
                                    <div class="row">
                                        <div class="col-md-8"><input type="text" class="txt_box form-control" placeholder="IO" name="io" id="io" /></div>
                                        <div class="col-md-2"><button class="btn btn-secondary" type="button" id="iosearch" onclick="showHide(this.id)"><i class="fa fa-search" aria-hidden="true"></i></button></div>
                                        <div class="col-md-2"><button class="btn btn-primary" type="button" id="iosearch" onclick="showHide(this.id)"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
                                    </div>
                                </div>
                            </div> -->
                        <!-- <div class="col-md-4 form-group">
                           <div class="full field">
                                   <label><i class="fa fa-pencil" aria-hidden="true"></i>  COS/GPF No: </label>
                                   <input type="text" class="txt_box form-control" placeholder="COS/GPF No" name="cos_gpf_no" id="cos_gpf_no" />
                           </div>
                          </div> -->
                        </div>
                        <div id="iosearch_cont1">
                        <div class="row">
                          <div class="col-md-4 form-group">
                             <div class="full field">
                                     <label><i class="fa fa-pencil" aria-hidden="true"></i> IO Name: </label>
                                     <!-- <input type="text" class="txt_box form-control" placeholder="Name"  name="ioname" id="ioname" /> -->
                                    <select class="form-control selectpicker" data-live-search="true" title="Select Case Type" name="ioname" id="ioname" value="" data-toggle1="tooltip" data-placement="top"  >
                                        <option value=""> - Select Here - </option>
                                     <?php
$rs2 = "SELECT * from tbl_iodetail";
$data2 = mysqli_query($db,$rs2);
while($rsArr2 = mysqli_fetch_array($data2)){  
    $array2[] = $rsArr2;
}
foreach($array2 as $i=>$array2){ ?>
                            <option value="<?php  echo base64_decode($array2['io_nm']); ?>"> <?php  echo base64_decode($array2['io_nm']); ?></option>
<?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                           <div class="full field">
                                   <label><i class="fa fa-pencil" aria-hidden="true"></i> IO Designation: </label>
                                   <input type="text" class="txt_box form-control" placeholder="IO Designation" name="iodesignation" id="iodesignation" />
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
                                     <input type="text" class="txt_box form-control" placeholder="Contact No" name="iocontact_no" id="iocontact_no" />
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
                                    <input type="text" class="txt_box form-control" placeholder="FIR No" name="fir_no" id="fir_no" />
                            </div>
                            </div>
                            <!-- <div class="col-md-4 form-group">
                                <div class="full field">
                                        <label><i class="fa fa-pencil" aria-hidden="true"></i>   CSR No</label>
                                        <input type="text" class="txt_box form-control" placeholder="CSR No" name="csr_no" id="csr_no" />
                                </div>
                                </div> -->
                            <div class="col-md-4 form-group">
                            <div class="full field">
                                    <label><i class="fa fa-pencil" aria-hidden="true"></i>  Others</label>
                                    <textarea class="txt_box form-control" rows = "1" placeholder="Others" name="others" id="others"></textarea>
                            </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <div class="full field">
                                        <label><i class="fa fa-pencil" aria-hidden="true"></i>  Complainant Name</label>
                                        <textarea class="txt_box form-control" rows = "1" placeholder="Complainant Name" name="complainant_name" id="complainant_name"></textarea>
                                </div>
                            </div>
                            <!-- <div class="col-md-4 form-group">
                            <div class="full field">
                                    <label><i class="fa fa-pencil" aria-hidden="true"></i>  If dept person CPS/ GPF No </label>
                                    <input type="text" class="txt_box form-control" placeholder="CPS/ GPF No" name="cps_gpf_no" id="cps_gpf_no" onblur="showHide(this.id)"/>
                            </div>
                            </div>
                            <div class="col-md-4 form-group" id="cps_gpf_no_cont">
                            <div class="full field">
                                    <br>
                                    <b><p>Name - Designation </p></b>
                            </div>
                            </div> -->
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
foreach($array5 as $i=>$array5){ ?>
                            <option value="<?php  echo base64_decode($array5['section_act']); ?>"> <?php  echo base64_decode($array5['section_act']); ?></option>
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
foreach($array6 as $i=>$array6){ ?>
                            <option value="<?php  echo base64_decode($array6['section_law']); ?>"> <?php  echo base64_decode($array6['section_law']); ?></option>
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
                                    <textarea class="txt_box form-control" rows = "1" placeholder="Remarks" name="remarks" id="remarks"></textarea>
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
foreach($array4 as $i=>$array4){ ?>
                            <option value="<?php  echo base64_decode($array4['court']); ?>"> <?php  echo base64_decode($array4['court']); ?></option>
<?php  } ?>                               </select>
                            </div>
                            </div>
							<div class="col-md-4 form-group">
                               <div class="full field">
                               		<label><i class="fa fa-pencil" aria-hidden="true"></i>  Next hearing date</label>
                                  	<input type="text" class="txt_box form-control" id="nhd" name="nhd" data-date-format="dd/mm/yyyy" class="txt_box form-control"  placeholder="Next hearing date" maxlength="10" size="10"   />
                               </div>
                              </div>
                            <div class="col-md-4 form-group">
                            <div class="full field">
                                    <label><i class="fa fa-pencil" aria-hidden="true"></i>  CC No / SRC No / PRC No</label>
                                    <input type="text" class="txt_box form-control" placeholder="CC No / SRC No" name="cc_src_no" id="cc_src_no" />
                            </div>
                            </div>
							<div class="col-md-4 form-group">
                               <div class="full field">
                               		<label><i class="fa fa-pencil" aria-hidden="true"></i>  Date of Occurance</label>
                                  	<input type="text" class="txt_box form-control" id="doo" name="doo" data-date-format="dd/mm/yyyy" class="txt_box form-control"  placeholder="Date of Occurance" maxlength="10" size="10"   />
                               </div>
                              </div>
							<div class="col-md-4 form-group">
                               <div class="full field">
                               		<label><i class="fa fa-pencil" aria-hidden="true"></i>  Date of Report</label>
                                  	<input type="text" class="txt_box form-control" id="dor" name="dor" data-date-format="dd/mm/yyyy" class="txt_box form-control"  placeholder="Date of Report" maxlength="10" size="10"   />
                               </div>
                              </div>

                              
                              <div class="col-md-4 form-group">
                              <div class="full field">
                                      <div class="row">
                                        <div class="col-md-12">
                                        <label><i class="fa fa-pencil" aria-hidden="true"></i> Autherized by IO : </label>
                                        <br><input type="radio" id="yes" name="autherized" value="1" onclick="btnEnable('yes')">
                                        <label for="yes" style="color:#340e71" >Yes</label>&nbsp;&nbsp;&nbsp;
                                        <input type="radio" id="no" name="autherized" value="0" onclick="btnEnable('no')">
                                        <label for="no" style="color:#340e71" >No</label>
                                        </div>
                                    </div>
                            </div>
                              </div>

                        </div>
                        </div>
                        <br>
                        <div class="cborder" id="autorize">
                              <!-- <div class="row">
                              <div class="col-md-11 form-group">
                              <div class="full field">
                                      <div class="row">
                                        <div class="col-md-3">
                                        <label><i class="fa fa-pencil" aria-hidden="true"></i>  Contraband Type </label>
                                        <input type="text" class="txt_box form-control" placeholder=" Contraband Type" name="seizure_code1 " id="seizure_code1" />
                                        </div>
                                        <div class="col-md-2" >
                                            <label><i class="fa fa-pencil" aria-hidden="true"></i>  Contraband Name </label>
                                            <input type="text" class="txt_box form-control" placeholder=" Contraband Name" name="contraband_name" id="contraband_name" />
                                        </div>
                                        <div class="col-md-2">
                                        <label><i class="fa fa-pencil" aria-hidden="true"></i>  Total Quantity </label>
                                        <input type="text" class="txt_box form-control" placeholder=" Total Quantity" name="seizure_quantity" id="seizure_quantity" />
                                        </div>
                                        <div class="col-md-5" >
                                            <div class="row"><div class="col-md-6">
                                            <label><i class="fa fa-pencil" aria-hidden="true"></i>  No.of Packets </label>
                                            <input type="text" class="txt_box form-control" placeholder="No.of Packets" name="seizure_unit1" id="seizure_unit1" />
                                            </div><div class="col-md-6">
                                            <label><i class="fa fa-pencil" aria-hidden="true"></i>  Quantity per Packet </label>
                                            <input type="text" class="txt_box form-control" placeholder=" Quantity per Packet" name="seizure_unit1" id="seizure_unit1" />
                                            </div></div>
                                        </div>
                                    </div>
                              </div>
                              </div>
                            
                              <div class="col-md-1"><br><button class="btn btn-info" type="button" id="myButton" style="margin-top: 12px;"><i class="fa fa-plus"></i></button><button class="btn btn-danger" type="button" id="myButton1" style="margin-top: 12px;"><i class="fa fa-times"></i></button></div>  
                        </div>   -->
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
foreach($array7 as $i=>$array7){ ?>
                            <option value="<?php  echo base64_decode($array7['rack_name']); ?>"> <?php  echo base64_decode($array7['rack_name']); ?></option>
<?php  } ?>                                                <option value="others">Others</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6" id="rack_cont">
                                            <input type="text" class="txt_box form-control" placeholder=" Rack No" name="rack_no1" id="rack_no1" />
                                        </div>
                                    </div>
                              </div>
                              <!-- <div class="col-md-12 form-group">
                              <div class="full field">
                                      <div class="row">
                                        <div class="col-md-6">
                                        <label><i class="fa fa-pencil" aria-hidden="true"></i>  Seizure Code </label>
                                        <input type="text" class="txt_box form-control" placeholder=" Seizure Code" name="seizure_code " id="seizure_code " />
                                        </div>
                                        <div class="col-md-6" id="rack_cont">
                                            <label><i class="fa fa-pencil" aria-hidden="true"></i>  Property Code </label>
                                            <input type="text" class="txt_box form-control" placeholder=" Property Code" name="property_code" id="property_code " />
                                        </div>
                                    </div>
                              </div>
                              </div>
                              <div class="col-md-12 form-group">
                              <div class="full field">
                                      <div class="row">
                                        <div class="col-md-6">
                                        <label><i class="fa fa-pencil" aria-hidden="true"></i>  Seizure Quantity </label>
                                        <input type="text" class="txt_box form-control" placeholder=" Seizure Quantity" name="seizure_quantity" id="seizure_quantity" />
                                        </div>
                                        <div class="col-md-6" id="rack_cont">
                                            <label><i class="fa fa-pencil" aria-hidden="true"></i>  Seizure Unit </label>
                                            <input type="text" class="txt_box form-control" placeholder=" Seizure Unit" name="seizure_unit" id="seizure_unit " />
                                        </div>
                                    </div>
                              </div>
                              </div> -->
                              <!-- <div class="col-md-12 form-group">
                              <div class="full field">
                                      <div class="row">
                                        <div class="col-md-6">
                                        <label><i class="fa fa-pencil" aria-hidden="true"></i>  Seizure Location </label>
                                        <input type="text" class="txt_box form-control" placeholder=" Seizure Location" name="seizure_location " id="seizure_location " />
                                        </div>
                                    </div>
                              </div>
                              </div> -->
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
foreach($array8 as $i=>$array8){ ?>
                            <option value="<?php  echo base64_decode($array8['shelf_name']); ?>"> <?php  echo base64_decode($array8['shelf_name']); ?></option>
<?php  } ?>                                               <option value="others">Others</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6" id="shelf_cont">
                                            <input type="text" class="txt_box form-control" placeholder="Shelf No" name="shelf_no1" id="shelf_no1" />
                                        </div>
                                    </div>
                                </div>
                              <!-- <div class="col-md-12 form-group">
                              <div class="full field">
                                      <div class="row">
                                        <div class="col-md-6">
                                        <label><i class="fa fa-pencil" aria-hidden="true"></i>  Seizure Code </label>
                                        <input type="text" class="txt_box form-control" placeholder=" Seizure Code" name="seizure_code1 " id="seizure_code1" />
                                        </div>
                                        <div class="col-md-6" id="rack_cont">
                                            <label><i class="fa fa-pencil" aria-hidden="true"></i>  Property Code </label>
                                            <input type="text" class="txt_box form-control" placeholder=" Property Code" name="property_code1" id="property_code1" />
                                        </div>
                                    </div>
                              </div>
                              </div>
                              <div class="col-md-12 form-group">
                              <div class="full field">
                                      <div class="row">
                                        <div class="col-md-6">
                                        <label><i class="fa fa-pencil" aria-hidden="true"></i>  Seizure Quantity </label>
                                        <input type="text" class="txt_box form-control" placeholder=" Seizure Quantity" name="seizure_quantity1" id="seizure_quantity1" />
                                        </div>
                                        <div class="col-md-6" id="rack_cont">
                                            <label><i class="fa fa-pencil" aria-hidden="true"></i>  Seizure Unit </label>
                                            <input type="text" class="txt_box form-control" placeholder=" Seizure Unit" name="seizure_unit1" id="seizure_unit1" />
                                        </div>
                                    </div>
                              </div>
                              </div>
                              <div class="col-md-12 form-group">
                              <div class="full field">
                                      <div class="row">
                                        <div class="col-md-6">
                                        <label><i class="fa fa-pencil" aria-hidden="true"></i>  Seizure Location </label>
                                        <input type="text" class="txt_box form-control" placeholder=" Seizure Location" name="seizure_location1" id="seizure_location1" />
                                        </div>
                                    </div>
                              </div>
                              </div> -->
<?php
$rs9 = "SELECT * from tbl_seizure_contraband";
$data9 = mysqli_query($db,$rs9);
while($rsArr9 = mysqli_fetch_array($data9)){  
    $array9[] = $rsArr9;
} 
 foreach($array9 as $i=>$array9){ 
    $id = $array9['id'];
    $nm = base64_decode($array9['contraband_type_name']);
   $cc .= "<option value='$id'>$nm</option>"; 
 } 
 ?>                         
                                <input type="hidden" id="cont" name="cont" value="<?php echo $cc; ?>" />     
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
                                <button class="btn btn-danger" type="button" id="qr_cd"><i class="fa fa-qrcode fa-1x" aria-hidden="true" onclick="genQrcode()"></i></button></div>
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
            <input type="hidden" id="h_if_id" name="h_if_id" >
				<div class="modal-body">
					<div class="row">
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


<div class="modal fade" id="qrcode_gen_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content" >
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel" align="center"><b> Generate QR Code </b></h3>
				
			</div>
			<form id='qrcode_form' action="" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 text-left">
                            <div class="upload__box">
                            <label>  Generated QR Code for Contraband </label><br>
                                <div class="upload__btn-box" id="DivIdToPrint">
                                    <div class="col-md-12 row">
                                        <div class="col-md-4 qrcd_img"></div>
                                        <div class="col-md-4 qr-txt"></div>
                                        <div class="col-md-2 noofcopy"></div>
                                        <div class="col-md-2 print_id"></div>
                                    </div>
                                </div>
                                
                            </div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
                
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
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
    $('#nhd').datepicker("setDate", new Date());
    
    $('#doo').datepicker({
      dateFormat:"dd/mm/yy",
      defaultDate: "-2w",
      changeMonth: true,
      changeYear: true,
      maxDate: "0",
    });
    $('#doo').datepicker("setDate", new Date());
    
    $('#dor').datepicker({
      dateFormat:"dd/mm/yy",
      defaultDate: "-2w",
      changeMonth: true,
      changeYear: true,
      maxDate: "0",
    });
    $('#dor').datepicker("setDate", new Date());
</script>