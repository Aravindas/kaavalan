<?php 
    session_start();
	ob_start();
    include('../../connections/db_connection.php');
?>

<?php 
if(isset($_POST['id']) && isset($_POST['id']) != "") {
    $id = $_POST['id']; 
    $cmd="DELETE FROM tbl_seizure_contraband WHERE id = '$id'";
    
    if(mysqli_query($db,$cmd)){
        echo "Success";
    } else {
        echo "Error";
    }
}
?>