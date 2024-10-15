<?php include('custheader.php'); ?>
<?php include('datatbleplugins.php'); ?>

<script src="js/station.js"></script>

<!-- section -->
<br>
<div class="section margin-top_50">
    
<div class="full">
    <div class="heading_main text_align_left p-2">
        <h2><span class="title"><i class="fa fa-plus-circle" aria-hidden="true"></i> Station List</span>
        <span class="btn btn-primary" style="float: right;" data-bs-toggle="modal" data-bs-target="#add_modal"><i class="fa fa-plus-circle " aria-hidden="true" ></i>&nbsp;Add New </span></h2>
    </div>
</div>

<div class="tborder">
        <div id="target"></div>
    </div>
</div>
<br>
<?php  include("footer.php"); ?>


<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content med-modal">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel" align="left"><b>Add Station</b></h3>
			</div>
			<form id="stationform"  name="stationform" method="post">
            <div class="modal-body">
        		<div class="row">
                <fieldset>
                        <div class="cborder">
                        <div class="row">
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Commissionerate</label>
                            <input type="text" class="txt_box form-control" placeholder=" Commissionerate" name="commissionerate" id="commissionerate" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> District / Units</label>
                            <input type="text" class="txt_box form-control" placeholder=" District / Units" name="district" id="district" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> District Code</label>
                            <input type="text" class="txt_box form-control" style="text-transform:uppercase" placeholder=" District Code" name="district_code" id="district_code" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Station Name</label>
                            <input type="text" class="txt_box form-control" placeholder=" Station Name" name="station" id="station" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Station Code</label>
                            <input type="text" class="txt_box form-control" placeholder=" Station Code" name="station_code" id="station_code" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Status</label>
                            <div><input type="radio" id="active" name="status" value="1">
                            <label for="active" style="color:#340e71">Active</label>&nbsp;&nbsp;&nbsp;
                            <input type="radio" id="inactive" name="status" value="0">
                            <label for="inactive" style="color:#340e71">In active</label></div>
                           </div>
                         </div>

                         </div>
                         </div>
                       </fieldset>
                </div>   
            </div>
            <div class="modal-footer">
               <div class="row">
                   <div class="col-md-6"><button class="btn btn-success" type="submit" >Submit</button></div>
                   <div class="col-md-6"><button class="btn btn-danger" type="button" data-bs-dismiss="modal" aria-label="Close">Cancel</button></div>
               </div>
          </div>
        	</form>
		</div>
	</div>
</div>
 
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content med-modal">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel" align="left"><b>Update Station </b></h3>
			</div>
			<form id="stationform_update"  name="stationform_update" method="post">
            <div class="modal-body">
        		<div class="row">
                <fieldset>
                <input type="hidden"  name="h_id" id="h_id" />
                        <div class="cborder">
                        <div class="row">
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Commissionerate</label>
                            <input type="text" class="txt_box form-control" placeholder=" Commissionerate" name="u_commissionerate" id="u_commissionerate" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> District / Units</label>
                            <input type="text" class="txt_box form-control" placeholder=" District / Units" name="u_district" id="u_district" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true" ></i> District Code</label>
                            <input type="text" class="txt_box form-control" style="text-transform:uppercase" placeholder=" District Code" name="u_district_code" id="u_district_code" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Station Name</label>
                            <input type="text" class="txt_box form-control" placeholder=" Station Name" name="u_station" id="u_station" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Station Code</label>
                            <input type="text" class="txt_box form-control" placeholder=" Station Code" name="u_station_code" id="u_station_code" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Status</label>
                            <div><input type="radio" id="u_active" name="u_status" value="1">
                            <label for="u_active" style="color:#340e71">Active</label>&nbsp;&nbsp;&nbsp;
                            <input type="radio" id="u_inactive" name="u_status" value="0">
                            <label for="u_inactive" style="color:#340e71">In active</label></div>
                           </div>
                         </div>

                         </div>
                         </div>
                       </fieldset>
                </div>   
            </div>
            <div class="modal-footer">
               <div class="row">
                   <div class="col-md-6"><button class="btn btn-success" type="submit" >Submit</button></div>
                   <div class="col-md-6"><button class="btn btn-danger" type="button" data-bs-dismiss="modal" aria-label="Close">Cancel</button></div>
               </div>
          </div>
        	</form>
		</div>
	</div>
</div>            


<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog fontresize" role="document">
		<div class="modal-content sm-modal">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel" align="left"><b>Delete Station</b></h3>
			</div>
			<form>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group">
              <i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;<label for="comment">Confirm Your Deletion</label>
              <input type='hidden' name='h_id2' id='h_id2'>		
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="icofont-close-circled" style="font-size:18px;" aria-hidden="true"></i>&nbsp;No</button>
          <button type="button" class="btn btn-warning" onclick="DeleteDetails()"><i class="icofont-check-circled" style="font-size:18px;" aria-hidden="true"></i>&nbsp;Yes</button>
        </div>
			</form>
		</div>
	</div>
</div>