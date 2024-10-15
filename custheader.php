<?php session_start(); 
if($_SESSION['username'] == ""){
  header('Location:login.php');	
} else { }

include('connections/db_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Avadi Police</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.css" rel="stylesheet">
  <link href="css/navstyle.css" rel="stylesheet">

  <!-- <script src="js/bootstrap.bundle.min.js"></script> -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet">

<script src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
  <!-- <link rel="stylesheet" href="css/bootstrap-datepicker.css" /> -->
  <!-- <script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script> -->
</head>
<body>
<div class="nav-bg">
    <div class="navbar navbar-expand-lg p-2"><img src="images/logo.png" style="height: 90px;">
    <div class="headtitle">காவல் மால்கானா</div>
        <div class="d-flex">
            <div class="p-2"><i class="fa fa-user fa-2x" aria-hidden="true"></i></div>
<?php 
$rs = "SELECT out_time FROM tbl_custodian c LEFT JOIN  tbl_seizure_custodian a  on  c.id  = a.m_id WHERE DATE(out_time) < CURDATE() group by m_id ";
$data = mysqli_query($db,$rs);
$rsArr = mysqli_fetch_all($data);
if($rsArr != ""){
	$cnt = COUNT($rsArr);
} else {
	$cnt = 0;
}
?>            
            <div class="p-2"><a href="timeboundlist.php" style="color: #c1a559;"><i class="fa fa-bell fa-2x" aria-hidden="true"></i><span class="notify"><?php echo $cnt; ?></span></a></div>
            <div class="p-2"><a href="sesdestroy.php" style="color: #c1a559;"><i class="fa fa-power-off fa-2x" aria-hidden="true"></i></a></div>
            <div class="p-2"><button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span></div>
        </div>
    </div>
</div>
<div class="collapse" id="navbarToggleExternalContent">
<nav class="navbar navbar-expand-lg nav-bg-menu">
    <div class="container-fluid">
      <div class="collapse show navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="custodianform.php">New Inventory</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="custodianinwardio.php">Inventory Management</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Masters
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="user_creation.php">User Creation</a></li>
              <li><a class="dropdown-item" href="court.php">Court</a></li>
              <li><a class="dropdown-item" href="station.php">Station</a></li>
              <li><a class="dropdown-item" href="actlaw.php">Act Law</a></li>
              <li><a class="dropdown-item" href="rack.php">Rack</a></li>
              <li><a class="dropdown-item" href="seizure_contraband.php">Seizure Contraband</a></li>
              <li><a class="dropdown-item" href="io_list.php">IO List</a></li>
              <!-- <li>
                <hr class="dropdown-divider">
              </li>
              <li class="nav-item dropend">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li class="nav-item dropend">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Dropdown
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li>
                            <hr class="dropdown-divider">
                          </li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul> -->
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
</body>
</html>
