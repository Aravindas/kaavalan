<?php include('custheader.php'); ?>
<?php include('datatbleplugins.php'); ?>

<script src="js/user_creation.js"></script>

<!-- section -->
<br>
<div class="section margin-top_50">
    
<div class="full">
    <div class="heading_main text_align_left p-2">
        <h2><span class="title"><i class="fa fa-plus-circle" aria-hidden="true"></i> User Creation</span>
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
				<h3 class="modal-title" id="myModalLabel" align="left"><b>User Creation</b></h3>
			</div>
			<form id="userform"  name="userform" method="post">
            <div class="modal-body">
        		<div class="row">
                <fieldset>
                        <div class="cborder">
                        <div class="row">
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Username</label>
                            <input type="text" class="txt_box form-control" placeholder=" Username" name="username" id="username" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Display Name</label>
                            <input type="text" class="txt_box form-control" placeholder=" Display Name" name="display_name" id="display_name" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Password</label>
                            <input type="text" class="txt_box form-control" placeholder=" Password" name="password" id="password" />
                           </div>
                         </div>
                        <!-- <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> CPS No</label>
                            <input type="text" class="txt_box form-control" placeholder=" CPS No" name="cps_no" id="cps_no" />
                           </div>
                         </div> -->
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Email ID</label>
                            <input type="text" class="txt_box form-control" placeholder=" Email ID" name="email_id" id="email_id" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Contact No</label>
                            <input type="text" class="txt_box form-control" placeholder=" Contact No" name="contact_no" id="contact_no" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Designation</label>
                            <input type="text" class="txt_box form-control" placeholder=" Designation" name="designation" id="designation" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Role</label>
                            <select class="form-control selectpicker" data-live-search="true" title="Select Role" name="role" id="role" value="" data-toggle="tooltip" data-placement="top" >
                                <option value=""> - Select Here - </option>
                                <option value="superadmin">Super Admin</option>
                                <option value="admin">Admin</option>
                                <option value="sho">SHO</option>
                            </select>
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> District Code</label>
                            <input type="text" class="txt_box form-control" placeholder=" District Code" name="district_code" id="district_code" />
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
				<h3 class="modal-title" id="myModalLabel" align="left"><b>User Creation Update</b></h3>
			</div>
			<form id="userform_update"  name="userform_update" method="post">
            <div class="modal-body">
        		<div class="row">
                <fieldset>
                <input type="hidden"  name="h_id" id="h_id" />
                        <div class="cborder">
                        <div class="row">
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Username</label>
                            <input type="text" class="txt_box form-control" placeholder=" Username" name="u_username" id="u_username" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Display Name</label>
                            <input type="text" class="txt_box form-control" placeholder=" Display Name" name="u_display_name" id="u_display_name" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Password</label>
                            <input type="text" class="txt_box form-control" placeholder=" Password" name="u_password" id="u_password" />
                           </div>
                         </div>
                        <!-- <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> CPS No</label>
                            <input type="text" class="txt_box form-control" placeholder=" CPS No" name="u_cps_no" id="u_cps_no" />
                           </div>
                         </div> -->
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Email ID</label>
                            <input type="text" class="txt_box form-control" placeholder=" Email ID" name="u_email_id" id="u_email_id" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Contact No</label>
                            <input type="text" class="txt_box form-control" placeholder=" Contact No" name="u_contact_no" id="u_contact_no" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Designation</label>
                            <input type="text" class="txt_box form-control" placeholder=" Designation" name="u_designation" id="u_designation" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Role</label>
                            <select class="form-control selectpicker" data-live-search="true" title="Select Role" name="u_role" id="u_role" value="" data-toggle="tooltip" data-placement="top" >
                                <option value=""> - Select Here - </option>
                                <option value="superadmin">Super Admin</option>
                                <option value="admin">Admin</option>
                                <option value="sho">SHO</option>
                            </select>
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> District Code</label>
                            <input type="text" class="txt_box form-control" placeholder=" District Code" name="u_district_code" id="u_district_code" />
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
				<h3 class="modal-title" id="myModalLabel" align="left"><b>Delete User</b></h3>
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