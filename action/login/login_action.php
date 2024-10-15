<?php
	session_start();
	ob_start();
	include('../../connections/db_connection.php');
?>
<?php
if(isset($_POST['user_nm']) && isset($_POST['user_nm']) != "") {
   
	$username = $_POST['user_nm'];
    
    $rs = "SELECT username FROM tbl_usercreation WHERE username='".$username."'";
    $data = mysqli_query($db,$rs);
    $rsArr = mysqli_fetch_array($data);
    if($rsArr['username'] != ""){
        if(isset($_POST['password']) && isset($_POST['password']) != "") {
            $password = base64_encode($_POST['password']);

            $rs1 = "SELECT password FROM tbl_usercreation WHERE username='".$username."' and password='".$password."' ";
            $data1 = mysqli_query($db,$rs1);
            $rsArr1 = mysqli_fetch_array($data1);
            if($rsArr1['password'] != ""){
                session_start();
                $_SESSION["username"] = $rsArr['username'];
                echo "Valid";
            } else {
                echo "Please Check the Password";
            }

        } else {
            echo "Please Enter the Password";
        }
        
    } else {
        echo "Please Check the User Name";
    }
} else {
    echo "Please Enter the User Name";
}
?>