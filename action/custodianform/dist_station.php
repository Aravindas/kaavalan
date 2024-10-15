<?php
    session_start();
    include('../../connections/db_connection.php');
?>
<?php
	if(!empty($_POST["dist"])) {
        $district =	base64_encode($_POST['dist']);
		$query ="SELECT * FROM tbl_station WHERE district = '".$district."'";
        $data = mysqli_query($db,$query);
        $results = mysqli_fetch_all($data,MYSQLI_ASSOC);
?>
		<option value=""> - Select Here - </option>
<?php

		foreach($results as $array) {
?>
<?php if(!empty($_POST["sttn"])) {  ?>
			<option value="<?php echo base64_decode($array['station']); ?>"  <?php if(base64_decode($array['station']) == $_POST["sttn"]){ echo "selected"; } else { echo "";  } ?> ><?php echo base64_decode($array['station']); ?></option>
<?php } else { ?>
			<option value="<?php echo base64_decode($array['station']); ?>"><?php echo base64_decode($array['station']); ?></option>
<?php }  ?>
<?php
		}
	}

?>