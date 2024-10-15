<?php include('custheader.php'); ?>
<?php include('datatbleplugins.php'); ?>
<?php 
    $mid = $_REQUEST['mid']; 
?>

<!-- section -->
<br>
<div class="section margin-top_50">
    <div class="container">
        <div class="row form-bg">
           <div class="col-md-12">
                <div class="full">
                    <div class="heading_main text_align_left">
                       <h2><span class="title"><i class="fa fa-plus-circle" aria-hidden="true"></i> Generate QR Code</span></h2>
                    </div>
                </div>
<div class="tborder table-responsive" id="printTable">
        <table class="table table-striped table-hover" cellspacing="0" id="example" >
            <thead>
               <tr>
                  <th>Sl.No.</th>
                  <th>QR Code</th>
                  <th>QR Detail</th>
                  <th>Number of Copies</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
<?php 
$_SESSION['mip']="qrcontraband~".$mid; 
include('getData.php');
$data = unserialize(base64_decode($_SESSION['data']));
// print_r($data);exit();
//$contArr = array("Opium" =>1, "Ganja"=>2, "Cocaine"=>3, "Hashish"=>4, "Morphine"=>5, "Others" =>6);
foreach($data as $j=>$data1){
    $totqty = base64_decode($data1['totqty']);
    $sum += (float)$totqty;
}

foreach($data as $i=>$data){
    if($data['status'] == '1'){
        $status = '<span class="btn btn1 btn-success">IN</span>';
    } else {
        $status = '<span class="btn btn1 btn-danger">OUT</span>';
    }
    
    $qrdata = "Avadi-".base64_decode($data['district_code'])."-".base64_decode($data['station_code'])."-".base64_decode($data['firno_crimeno'])."-".base64_decode($data['contraband_type_name'])."-".$sum."-".base64_decode($data['qtyperpack'])."-".base64_decode($data['nopack']);
?>                
                <tr>
                    <td><?php echo ++$i; ?></td>
                    <td><div id="printcont<?php echo +$i; ?>"><?php echo '<img src="phpqrcode/data.php?data='.$qrdata.'" />'; ?></div></td>
                    <td><?php echo $qrdata; ?></td>
                    <td><input type="text" class="txt_box form-control" placeholder="Number of Copies" name="noofcopy" id="noofcopy<?php echo +$i; ?>" maxlength="3" size="3"/></td>
                    <td style="line-height: 35px;">
                        <i class="fa fa-print btn btn-primary" aria-hidden="true" onclick="printData('<?php echo +$i; ?>')" ></i>
                    </td>
                </tr>
 <?php } ?>               
            </tbody>
        </table>
    </div>
            </div>
        </div>
    </div>
</div>
<br>
<?php include("footer.php"); ?>
<script>
function printData(id) {
      var noofcopy=$('#noofcopy'+id).val(); 
      var divToPrint=document.getElementById('printcont'+id);
      var newWin=window.open('','Print-Window');
      newWin.document.open();
      newWin.document.write('<html><body onload="window.print()">');

      for (var i = 0; i < noofcopy; i++) {
        newWin.document.write(divToPrint.innerHTML+'<br><br>');
      }
      
      newWin.document.write('</body></html>');
      newWin.document.close();
      setTimeout(function(){newWin.close();},10);
}
</script>