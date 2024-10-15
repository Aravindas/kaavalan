<?php include('custheader.php'); ?>
<?php include('datatbleplugins.php'); ?>

<script src="js/io_list.js"></script>

<!-- section -->
<br>
<div class="section margin-top_50">
    
<div class="full">
    <div class="heading_main text_align_left p-2">
        <h2><span class="title"><i class="fa fa-plus-circle" aria-hidden="true"></i> IO List</span>
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
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel" align="left"><b>Add IO</b></h3>
			</div>
			<form id="ioform"  name="ioform" method="post">
            <div class="modal-body">
        		<div class="row">
                <fieldset>
                    <div class="cborder">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <div class="full field">
                                    <label><i class="fa fa-pencil" aria-hidden="true"></i> IO Name</label>
                                    <input type="text" class="txt_box form-control" placeholder="IO Name" name="io_nm" id="io_nm" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <div class="full field">
                                    <label><i class="fa fa-pencil" aria-hidden="true"></i> IO Designation</label>
                                    <input type="text" class="txt_box form-control" placeholder="IO Designation" name="io_desig" id="io_desig" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <div class="full field">
                                    <label><i class="fa fa-pencil" aria-hidden="true"></i> IO Contact Number</label>
                                    <input type="text" class="txt_box form-control" placeholder="IO Contact Number" name="io_con_num" id="io_con_num" />
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
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel" align="left"><b>Update IO </b></h3>
			</div>
			<form id="ioform_update"  name="ioform_update" method="post">
            <div class="modal-body">
        		<div class="row">
                    <fieldset>
                        <input type="hidden"  name="h_id" id="h_id" />
                        <div class="cborder">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <div class="full field">
                                        <label><i class="fa fa-pencil" aria-hidden="true"></i> IO Name</label>
                                        <input type="text" class="txt_box form-control" placeholder="IO Name" name="u_io_nm" id="u_io_nm" />
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <div class="full field">
                                    <label><i class="fa fa-pencil" aria-hidden="true"></i> IO Designation</label>
                                    <input type="text" class="txt_box form-control" placeholder="IO Designation" name="u_io_desig" id="u_io_desig" />
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <div class="full field">
                                        <label><i class="fa fa-pencil" aria-hidden="true"></i> IO Contact Number</label>
                                        <input type="text" class="txt_box form-control" placeholder="IO Contact Number" name="u_io_con_num" id="u_io_con_num" />
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
				<h3 class="modal-title" id="myModalLabel" align="left"><b>Delete Court</b></h3>
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