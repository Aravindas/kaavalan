<?php include('custheader.php'); ?>
<?php include('datatbleplugins.php'); ?>

<script src="js/rack.js"></script>

<!-- section -->
<br>
<div class="section margin-top_50">
    
<div class="full">
    <div class="heading_main text_align_left p-2">
        <h2><span class="title"><i class="fa fa-plus-circle" aria-hidden="true"></i> Rack List</span>
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
				<h3 class="modal-title" id="myModalLabel" align="left"><b>Add Rack</b></h3>
			</div>
			<form id="rackform"  name="rackform" method="post">
            <div class="modal-body">
        		<div class="row">
                <fieldset>
                        <div class="cborder">
                        <div class="row">
                        <!-- <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Rack Type</label>
                            <input type="text" class="txt_box form-control" placeholder=" Rack Type" name="rack_type" id="rack_type" />
                           </div>
                         </div> -->
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Rack Name</label>
                            <input type="text" class="txt_box form-control" placeholder=" Rack Name" name="rack_name" id="rack_name" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Rack Code</label>
                            <input type="text" class="txt_box form-control" placeholder=" Rack Code" name="rack_code" id="rack_code" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Rack Description</label>
                            <textarea class="txt_box form-control" rows = "2" placeholder="Rack Description" name="rack_description" id="rack_description"></textarea>
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Rack Capacity</label>
                            <input type="text" class="txt_box form-control" placeholder=" Rack Capacity" name="rack_capacity" id="rack_capacity" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Rack Capacity Unit</label>
                            <input type="text" class="txt_box form-control" placeholder=" Rack Capacity Unit" name="rack_capacity_unit" id="rack_capacity_unit" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Shelf Name</label>
                            <input type="text" class="txt_box form-control" placeholder=" Shelf Name" name="shelf_name" id="shelf_name" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Shelf Code</label>
                            <input type="text" class="txt_box form-control" placeholder=" Shelf Code" name="shelf_code" id="shelf_code" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Shelf Description</label>
                            <textarea class="txt_box form-control" rows = "2" placeholder="Shelf Description" name="shelf_description" id="shelf_description"></textarea>
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Shelf Capacity</label>
                            <input type="text" class="txt_box form-control" placeholder=" Shelf Capacity" name="shelf_capacity" id="shelf_capacity" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Shelf Capacity Unit</label>
                            <input type="text" class="txt_box form-control" placeholder=" Shelf Capacity Unit" name="shelf_capacity_unit" id="shelf_capacity_unit" />
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
				<h3 class="modal-title" id="myModalLabel" align="left"><b>Update Rack </b></h3>
			</div>
			<form id="rackform_update"  name="rackform_update" method="post">
            <div class="modal-body">
        		<div class="row">
                <fieldset>
                <input type="hidden"  name="h_id" id="h_id" />
                        <div class="cborder">
                        <div class="row">
                        <!-- <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Rack Type</label>
                            <input type="text" class="txt_box form-control" placeholder=" Rack Type" name="u_rack_type" id="u_rack_type" />
                           </div>
                         </div> -->
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Rack Name</label>
                            <input type="text" class="txt_box form-control" placeholder=" Rack Name" name="u_rack_name" id="u_rack_name" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Rack Code</label>
                            <input type="text" class="txt_box form-control" placeholder=" Rack Code" name="u_rack_code" id="u_rack_code" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Rack Description</label>
                            <textarea class="txt_box form-control" rows = "2" placeholder="Rack Description" name="u_rack_description" id="u_rack_description"></textarea>
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Rack Capacity</label>
                            <input type="text" class="txt_box form-control" placeholder=" Rack Capacity" name="u_rack_capacity" id="u_rack_capacity" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Rack Capacity Unit</label>
                            <input type="text" class="txt_box form-control" placeholder=" Rack Capacity Unit" name="u_rack_capacity_unit" id="u_rack_capacity_unit" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Shelf Name</label>
                            <input type="text" class="txt_box form-control" placeholder=" Shelf Name" name="u_shelf_name" id="u_shelf_name" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Shelf Code</label>
                            <input type="text" class="txt_box form-control" placeholder=" Shelf Code" name="u_shelf_code" id="u_shelf_code" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Shelf Description</label>
                            <textarea class="txt_box form-control" rows = "2" placeholder="Shelf Description" name="u_shelf_description" id="u_shelf_description"></textarea>
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Shelf Capacity</label>
                            <input type="text" class="txt_box form-control" placeholder=" Shelf Capacity" name="u_shelf_capacity" id="u_shelf_capacity" />
                           </div>
                         </div>
                        <div class="col-md-6 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Shelf Capacity Unit</label>
                            <input type="text" class="txt_box form-control" placeholder=" Shelf Capacity Unit" name="u_shelf_capacity_unit" id="u_shelf_capacity_unit" />
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
				<h3 class="modal-title" id="myModalLabel" align="left"><b>Delete Rack</b></h3>
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