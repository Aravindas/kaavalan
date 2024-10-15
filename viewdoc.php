<?php 
    include("connections/db_connection.php");
    $type = base64_decode($_REQUEST['ty']);

    if($type == 'I'){
        $id = $_REQUEST['id'];
        $sql = "SELECT doc_data FROM tbl_custodian_upload WHERE id =".$id;
        $result = mysqli_query($db,$sql) or die("Invalid query: " . mysqli_error($db));
        $row = mysqli_fetch_array($result);
        $image = base64_decode($row[0]);
        if($image != ''){
            // echo $image;
            echo '<img src="data:image/jpeg;base64,'.base64_encode($row[0]).'"/>';
        } 
    } else if($type == 'D') {

        $pdfId = $_REQUEST['id'];
        $query = "SELECT doc_data FROM tbl_custodian_upload WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('i', $pdfId);
        $stmt->execute();
        $stmt->bind_result($pdfBlob);
        $stmt->fetch();
        $stmt->close();

        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="document.pdf"');

        echo $pdfBlob;
    }
 ?>