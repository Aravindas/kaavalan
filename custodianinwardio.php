<?php include('custheader.php'); ?>
<?php include('datatbleplugins.php'); ?>

<script src="js/html5-qrcode.min.js"></script>
<!-- section -->

<div class="section margin-top_50">
   
    <div class="">
        <div class="row form-bg">
           <div class="col-md-12">
                <div class="full">
                    <div class="heading_main text_align_left">
                      <h2 class="p-4"><span class="title"><i class="fa fa-plus-circle" aria-hidden="true"></i> Inventory Management</span></h2>
                    </div>
                </div>
                <div class="full">
                    <form id="search_form"  name="search_form" method="post">
                        <fieldset>
                        <div class="cborder">
                        <div class="row">
                            <div class="col-md-2 form-group">
                               <div class="full field">
                                <label><i class="fa fa-pencil" aria-hidden="true"></i> Scan QR Code</label>&nbsp;&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-qrcode fa-2x" aria-hidden="true"></i></a>
                            </div>
                            </div>
                                <!-- QR SCANNER CODE BELOW  -->
<div class="row col-md-10 form-group">
    <div class="col-md-4">
        <div id="reader"></div>
    </div>
  <div class="col-md-6" style="padding: 30px">
    <h4>Scan Result </h4>
    <div id="result">
      Result goes here
    </div>
    <input type="hidden" class="txt_box form-control"  name="qrres" id="qrres" />
</div>
</div>
                              
                             
                        </div>
                        <div class="row">
                             <div class="col-md-2 form-group">
                                <div class="full field">
                                    <label><i class="fa fa-pencil" aria-hidden="true"></i> FIR No / Crime No</label>
                                    <input type="text" class="txt_box form-control" placeholder="FIR No / Crime No"  name="fir_no" id="fir_no" />
                                    <script>
  $( function() {
    var availableTags = [<?php  $rs2 = "SELECT firno_crimeno FROM tbl_custodian GROUP BY firno_crimeno";
$data2 = mysqli_query($db,$rs2);
// $res = implode(" ",$rsArr2);echo $res;
while($rsArr2 = mysqli_fetch_array($data2)){  
    $array2[] = $rsArr2;
}
foreach($array2 as $i=>$array2){ 
    echo '"'.base64_decode($array2['firno_crimeno']).'", ';                
 } ?>
    ];
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#fir_no" )
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  } );
  </script>                                   
                                </div>
                            </div>
                        <div class="col-md-2 form-group">
                           <div class="full field">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> District Name / Code</label>
                                <select class="form-control selectpicker" data-live-search="true" title="Select Gender" name="dist_nm" id="dist_nm" value="" data-toggle1="tooltip" data-placement="top"  >
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
                         <div class="col-md-2 form-group">
                            <div class="full field">
                             <label><i class="fa fa-pencil" aria-hidden="true"></i> Station Name / Code</label>
                                 <select class="form-control selectpicker" data-live-search="true" title="Select Gender" name="station_nm" id="station_nm" value="" data-toggle1="tooltip" data-placement="top"  >
                                     <option value=""> - Select Here - </option>
                                     <?php 
include('connections/db_connection.php');
$rs = "SELECT * from tbl_station";
$data1 = mysqli_query($db,$rs);
while($rsArr1 = mysqli_fetch_array($data1)){  
    $array1[] = $rsArr1;
}
foreach($array1 as $i=>$array1){ ?>
                            <option value="<?php  echo base64_decode($array1['station']); ?>"> <?php  echo base64_decode($array1['station']); ?></option>
<?php  } ?>
                              </select>
                            </div>
                          </div>
                         <div class="col-md-2 form-group">
                            <div class="full field">
                                <label><i class="fa fa-pencil" aria-hidden="true"></i> IO Name</label>
                                <input type="text" class="txt_box form-control" placeholder="IO Name"  name="io_nm" id="io_nm" />
                            </div>
                        </div>
                          <div class="col-md-2 form-group">
                             <div class="full field">
                                 <label><i class="fa fa-pencil" aria-hidden="true"></i> IO Contact Number</label>
                                 <input type="text" class="txt_box form-control" placeholder="IO Contact Number"  name="io_contact" id="io_contact" />
                             </div>
                         </div>
                        <div class="col-md-2 form-group">
                           <div class="full field">
                               <label><i class="fa fa-pencil" aria-hidden="true"></i> Court Name</label>
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
                       <br>
                       <div class="col-md-12" align="center" >
                           <div class="p-2"><button class="btn btn-primary" type="button" onclick="showHide();"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                       </div>
                        </div>
                        </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <br>
    <div id="target"></div>
</div>

<script src="js/custodianinwardio.js"></script>
<br>
<?php include("footer.php"); ?>