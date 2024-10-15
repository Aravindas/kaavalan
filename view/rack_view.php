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
<table class="table table-striped table-hover" cellspacing="0" id="example" >
    <thead>
        <tr>
            <th>Sl.No.</th>
            <!-- <th>Rack Type</th> -->
            <th>Rack Name</th>
            <th>Rack Code</th>
            <th>Rack Description</th>
            <th>Rack Capacity</th>
            <th>Rack Capacity Unit</th>
            <th>Shelf Name</th>
            <th>Shelf Code</th>
            <th>Shelf Description</th>
            <th>Shelf Capacity</th>
            <th>Shelf Capacity Unit</th>
            <th>Created By / <br>Created At</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
<?php 
$_SESSION['mip']="rack"; 
include('../getData.php');
$data = unserialize(base64_decode($_SESSION['data']));
foreach($data as $i=>$data){
    if($data['status'] == '1'){
        $status = '<span class="btn btn-success">Active</span>';
    } else {
        $status = '<span class="btn btn-danger">In Active</span>';
    }
?>
        <tr>
            <td><?php echo ++$i; ?></td>
            <!-- <td><?php //echo base64_decode($data['rack_type']); ?></td> -->
            <td><?php echo base64_decode($data['rack_name']); ?></td>
            <td><?php echo base64_decode($data['rack_code']); ?> </td>
            <td><?php echo base64_decode($data['rack_description']); ?></td>
            <td><?php echo base64_decode($data['rack_capacity']); ?></td>
            <td><?php echo base64_decode($data['rack_capacity_unit']); ?></td>
            <td><?php echo base64_decode($data['shelf_name']); ?></td>
            <td><?php echo base64_decode($data['shelf_code']); ?> </td>
            <td><?php echo base64_decode($data['shelf_description']); ?></td>
            <td><?php echo base64_decode($data['shelf_capacity']); ?></td>
            <td><?php echo base64_decode($data['shelf_capacity_unit']); ?></td>
            <td><?php echo $data['created_by']; ?> / <br><?php echo $data['created_at']; ?></td>
            <td><?php echo $status; ?></td>
            <td style="line-height: 35px;">
                <i class="fa fa-pencil-square-o btn btn-warning" aria-hidden="true" onclick="getData(<?php echo $data['id']; ?>)"></i>
                <i class="fa fa-trash-o btn btn-danger" aria-hidden="true" onclick="DeleteDetails1(<?php echo $data['id']; ?>)"></i>
            </td>
        </tr>
<?php } ?>
    </tbody>
</table>