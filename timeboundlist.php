<?php include('custheader.php'); ?>

<?php include('datatbleplugins.php'); ?>
<script>
$(document).ready(function () {
    $('#example').dataTable({
       dom: 'Bfrtip',
       "order": [],
       "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
         buttons: [
             {
                 extend: 'pageLength'

             },
             {
                 extend: 'collection',
                text: 'Export',
                 split: [
                    {extend:'csv',text: 'CSV',title:"Registered Student(s) List"},
                    {extend:'pdf',text: 'PDF',title:"Registered Student(s) List",messageBottom:'Contents owned by ABIMS ',customize: function(doc) {
                         var arr2 = $('.img1').map(function(){
                         return this.src;
                      }).get();

                         for (var i = 0, c = 1; i < arr2.length; i++, c++) {
                            doc.content[1].table.body[c][0] = {
                            image: arr2[i],
                            width: 30
                         }
                      }
                      }},
                    {extend:'excel',text: 'Excel',title:"Registered Student(s) List"},
                    {extend:'print',text: 'Print',title:"Registered Student(s) List",messageBottom:'Contents owned by ABIMS',exportOptions: {stripHtml: false },customize: function ( win ) {
                     $(win.document.body)
                         .css( 'font-size', '10pt' );
                     $(win.document.body).find( 'table' )
                         .addClass( 'compact' )
                         .css( 'font-size', 'inherit' );
                 }}
                 ],
             }
         ]
    });
 });
</script>
<style>
    .btn1 {
        width:60px;
    }
</style>
<!-- section -->

<div class="section margin-top_50">
    <div class="full">
        <div class="heading_main text_align_left p-2">
            <h2><span class="title"><i class="fa fa-plus-circle" aria-hidden="true"></i> Inventory Out Before 24 Hrs</span>
            </h2>
        </div>
    </div>
<div class="tborder table-responsive" id="iotable">
        <table class="table table-striped table-hover" cellspacing="0" id="example" >
            <thead>
               <tr>
                  <th>Sl.No.</th>
                  <th>Contraband Name</th>
                  <th>FIR / Crime No</th>
                  <th>IO Name</th>
                  <!-- <th>IO CPS No</th> -->
                  <th>Court</th>
                  <th>Next Hearing Date</th>
                  <th>Status</th>
                  <th>Rack No</th>
                  <th>Shelf No</th>
                  <th>Out Date & Time</th>
               </tr>
            </thead>
            <tbody>
<?php 
$_SESSION['mip']="timeboundlist"; 
include('getData.php');
$data = unserialize(base64_decode($_SESSION['data']));

// $contArr = array("Opium" =>1, "Ganja"=>2, "Cocaine"=>3, "Hashish"=>4, "Morphine"=>5, "Others" =>6);

foreach($data as $i=>$data){
    if($data['cstatus'] == '1'){
        $status = '<span class="btn btn1 btn-success">IN</span>';
    } else {
        $status = '<span class="btn btn1 btn-danger">OUT</span>';
    }
?>                
                <tr>
                    <td><?php echo ++$i; ?></td>
                    <td><?php echo base64_decode($data['contraband_type_name']); ?></td>
                    <td><?php echo base64_decode($data['firno_crimeno']); ?></td>
                    <td><?php echo base64_decode($data['ioname']); ?> </td>
                    <td><?php echo base64_decode($data['court']); ?></td>
                    <td><?php echo base64_decode($data['nhd']); ?></td>
                    <td><?php echo $status; ?></td>
                    <td><?php echo base64_decode($data['rack_no']); ?></td>
                    <td><?php echo base64_decode($data['shelf_no']); ?></td>
                    <td><?php echo $data['out_time']; ?></td>
                </tr>
 <?php } ?>               
            </tbody>
        </table>
    </div>
</div>
    <br>
<?php include("footer.php"); ?>
