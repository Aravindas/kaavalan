<?php 
include("connections/db_connection.php");
?>

<?php 
$_SESSION['data'] = "";
    $mip=$_SESSION['mip'];	
		$xx=(explode("~",$mip));
		$t1=$xx[0];
		$t2=$xx[1];
		$t3=$xx[2];
		$t4=$xx[3];
		$t5=$xx[4];
		$t6=$xx[5];	 

    if ($t1=="usercreation") {
        $rs = "SELECT * from tbl_usercreation";
    }
    if ($t1=="usercreation_detail") {
        $rs = "SELECT * from tbl_usercreation where id='".$t2."'";
    }
    if ($t1=="court") {
        $rs = "SELECT * from tbl_court";
    }
    if ($t1=="court_detail") {
        $rs = "SELECT * from tbl_court where id='".$t2."'";
    }
    if ($t1=="station") {
        $rs = "SELECT * from tbl_station";
    }
    if ($t1=="station_detail") {
        $rs = "SELECT * from tbl_station where id='".$t2."'";
    }
    if ($t1=="actlaw") {
        $rs = "SELECT * from tbl_act_law";
    }
    if ($t1=="actlaw_detail") {
        $rs = "SELECT * from tbl_act_law where id='".$t2."'";
    }
    if ($t1=="rack") {
        $rs = "SELECT * from tbl_rack";
    }
    if ($t1=="rack_detail") {
        $rs = "SELECT * from tbl_rack where id='".$t2."'";
    }
    if ($t1=="seizure_contraband") {
        $rs = "SELECT * from tbl_seizure_contraband";
    }
    if ($t1=="seizure_contraband_detail") {
        $rs = "SELECT * from tbl_seizure_contraband where id='".$t2."'";
    }
    if ($t1=="getDistrict") {
        $rs = "SELECT FROM_BASE64(district) as district,FROM_BASE64(district_code) as district_code from tbl_station group by district,district_code";
    }
    if ($t1=="getStation") {
        $rs = "SELECT * from tbl_station";
    }
    if ($t1=="custoutio") {
        $rs = "SELECT * FROM tbl_custodian c LEFT JOIN   tbl_seizure_custodian a  on  c.id  = a.m_id group by m_id ";
    }
    if ($t1=="timeboundlist") {
        $rs = "SELECT *,c.status as cstatus FROM tbl_custodian c LEFT JOIN   tbl_seizure_custodian a  on  c.id  = a.m_id LEFT JOIN  tbl_seizure_contraband s  on  FROM_BASE64(a.contraband_name)  = s.id  WHERE DATE(out_time) < CURDATE() and c.status='2' group by m_id ";
    }
    if ($t1 == "cusio_Detail"){
        $rs = "SELECT *,a.id as cid FROM tbl_seizure_custodian a  LEFT JOIN tbl_custodian c on  c.id  = a.m_id LEFT JOIN  tbl_seizure_contraband s  on  FROM_BASE64(a.contraband_name)  = s.id  WHERE m_id='".$t2."' ";
    }
    if ($t1=="io_list") {
        $rs = "SELECT * from tbl_iodetail";
    }
    if ($t1=="io_list_detail") {
        $rs = "SELECT * from tbl_iodetail where id='".$t2."'";
    }
    if ($t1=="qrcontraband") {
        $rs = "SELECT * FROM tbl_seizure_custodian a  LEFT JOIN tbl_custodian c on  c.id  = a.m_id 
        LEFT JOIN  tbl_seizure_contraband s  on  FROM_BASE64(a.contraband_name)  = s.id WHERE m_id='".$t2."'";
    }

    

    $res = mysqli_query($db,$rs);

    
    while($rsArr = mysqli_fetch_array($res)){
        $array[] = $rsArr;
    }
    
    $_SESSION['data']=base64_encode(serialize($array));
?>