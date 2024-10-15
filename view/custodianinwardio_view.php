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
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
<?php 
// print_r($_REQUEST);exit();
$qrres = $_REQUEST['qrres'];

if($qrres != '') {
    $qrresArr = explode("-",$qrres);
    $cnt = count($qrresArr);
    $t1=$qrresArr[0]; 
    $t2=base64_encode($qrresArr[1]);// Dist
    $t3=base64_encode($qrresArr[2]);//station
    $t4=base64_encode($qrresArr[3]); // Fir 
    if($cnt == 8){
        $t5=$qrresArr[4];
        $t6=$qrresArr[5];	
        $t7=$qrresArr[6]; 
        $t8=$qrresArr[7];
    }

    if($t4 != ''){
        $cond ="WHERE firno_crimeno = '$t4' ";
    
        if($t2 != ''){
            $cond .= "and district_code = '$t2' ";
        }
        if($t3 != ''){
            $cond .= "and station_code = '$t3' ";
        }
    } else if($t2 != ''){
        $cond ="WHERE district_code = '$t2' ";
    
        if($t3 != ''){
            $cond .= "and station_code = '$t3' ";
        }
    } else if($t3 != ''){
        $cond ="WHERE station_code = '$t3' ";
    }

} else {
// $firno_crimeno = base64_encode($_REQUEST['fir_no']); 
$firno_crimeno = $_REQUEST['fir_no'];
$firArr = explode(",",$firno_crimeno); 
$frcnt = count($firArr) -1;

$imArr='';
for($k=0; $k<$frcnt; $k++){
    $imArr .= "'".base64_encode(trim($firArr[$k]," "))."' , ";
}

$district_code = base64_encode($_REQUEST['dist_nm']);
$station_code =	base64_encode($_REQUEST['station_nm']);
$ioname = base64_encode($_REQUEST['io_nm']);
$iocontact_no = $_REQUEST['io_contact'];
$court = base64_encode($_REQUEST['court']);

$cond ="WHERE c.status != 0 ";
if($firno_crimeno != ''){
    $firno = rtrim($imArr," ,");
    $cond .="and firno_crimeno IN($firno) ";

    if($district_code != ''){
        $cond .= "and district_code = '$district_code' ";
    }
    if($station_code != ''){
        $cond .= "and station_code = '$station_code' ";
    }
    if($ioname != ''){
        $cond .= "and ioname = '$ioname' ";
    }
    if($iocontact_no != ''){
        $cond .= "and iocontact_no = '$iocontact_no' ";
    }
    if($court != ''){
        $cond .= "and court = '$court' ";
    }
} else if($district_code != ''){
    $cond ="and district_code = '$district_code' ";

    if($station_code != ''){
        $cond .= "and station_code = '$station_code' ";
    }
    if($ioname != ''){
        $cond .= "and ioname = '$ioname' ";
    }
    if($iocontact_no != ''){
        $cond .= "and iocontact_no = '$iocontact_no' ";
    }
    if($court != ''){
        $cond .= "and court = '$court' ";
    }
} else if($station_code != ''){
    $cond ="and station_code = '$station_code' ";

    if($ioname != ''){
        $cond .= "and ioname = '$ioname' ";
    }
    if($iocontact_no != ''){
        $cond .= "and iocontact_no = '$iocontact_no' ";
    }
    if($court != ''){
        $cond .= "and court = '$court' ";
    }
} else if($ioname != ''){
    $cond ="and ioname = '$ioname' ";

    if($iocontact_no != ''){
        $cond .= "and iocontact_no = '$iocontact_no' ";
    }
    if($court != ''){
        $cond .= "and court = '$court' ";
    }
} else if($iocontact_no != ''){
    $cond ="and iocontact_no = '$iocontact_no' ";

    if($court != ''){
        $cond .= "and court = '$court' ";
    }
} else if($court != ''){
    $cond ="and court = '$court' ";
}

}

include("../connections/db_connection.php");

$rs = "SELECT *,c.status as cstatus FROM tbl_custodian c LEFT JOIN  tbl_seizure_custodian a  on  c.id  = a.m_id LEFT JOIN  tbl_seizure_contraband s  on  FROM_BASE64(a.contraband_name)  = s.id  $cond group by m_id ";
$res = mysqli_query($db,$rs);
while($rsArr = mysqli_fetch_array($res)){
    $array[] = $rsArr;
}

$_SESSION['data']=base64_encode(serialize($array));

// $_SESSION['mip']="custoutio"; 
// include('../getData.php');
$data = unserialize(base64_decode($_SESSION['data']));

// $contArr = array("Opium" =>1, "Ganja"=>2, "Cocaine"=>3, "Hashish"=>4, "Morphine"=>5, "Others" =>6);

foreach($data as $i=>$data){
    if($data['cstatus'] == '1'){
        $status = '<span class="btn btn1 btn-success">IN</span>';
    } else if($data['cstatus'] == '2'){
        $status = '<span class="btn btn1 btn-danger">OUT</span>';
    } else if($data['cstatus'] == '3'){
        $status = '<span class="btn btn1 btn-primary">PO</span>';
    }
?>                
                <tr>
                    <td><?php echo ++$i; ?></td>
                    <td><?php echo base64_decode($data['contraband_type_name']); ?></td>
                    <td><?php echo base64_decode($data['firno_crimeno']); ?></td>
                    <td><?php echo base64_decode($data['ioname']); ?> </td>
                    <!-- <td>12345</td> -->
                    <td><?php echo base64_decode($data['court']); ?></td>
                    <td><?php echo base64_decode($data['nhd']); ?></td>
                    <td><?php echo $status; ?></td>
                    <td><?php echo base64_decode($data['rack_no']); ?></td>
                    <td><?php echo base64_decode($data['shelf_no']); ?></td>
                    <td style="line-height: 35px;">
                        <!-- <i class="fa fa-clock-o btn btn-action" aria-hidden="true"></i>
                        <i class="fa fa-file-text btn btn-action" aria-hidden="true"></i>
                        <i class="fa fa-sign-in btn btn-default1"  aria-hidden="true"></i> -->
                        <?php if($data['cstatus'] == 1 ){ ?>
                            <i class="fa fa-arrow-circle-o-left btn btn-action"  onclick="ioout('<?php echo $data['m_id']; ?>')"  data-toggle="tooltip" title="Out" aria-hidden="true"></i>
                       <?php } ?>
                       <?php if($data['cstatus'] == 2 ){ ?>
                        <i class="fa fa-arrow-circle-o-right btn btn-action"  onclick="ioin('<?php echo $data['m_id']; ?>')"  data-toggle="tooltip" title="In" aria-hidden="true"></i>
                       <?php } ?>
                       <i class="fa fa-history btn btn-action" onclick="iohistory('<?php echo $data['m_id']; ?>')"  data-toggle="tooltip" title="History" aria-hidden="true"></i>
                        <i class="fa fa-pencil-square-o btn btn-action"  data-toggle="tooltip" title="Edit"  aria-hidden="true" onclick="ioedit('<?php echo $data['m_id']; ?>')"></i>
                        <i class="fa fa-trash-o btn btn-action"  data-toggle="tooltip" title="Delete"  aria-hidden="true" onclick="ioDelete('<?php echo $data['m_id']; ?>')"></i>
                        <i class="fa fa-qrcode btn btn-action" aria-hidden="true" onclick="genQrcode('<?php echo $data['m_id']; ?>')"></i>
                        <!-- <i class="fa fa-exchange btn btn-action" aria-hidden="true"></i> -->
                    </td>
                </tr>
 <?php } ?>               
            </tbody>
        </table>
    </div>