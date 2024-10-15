<?php include('custheader.php'); ?>
<link id="pagestyle" href="plugins/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
<!-- Nucleo Icons -->
<link href="plugins/css/nucleo-icons.css" rel="stylesheet" />
  <!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    
      <div class="row mt-4">
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <div class="chart" style="height: 260px;">
                  <canvas id="verticalGroupBarChart" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Total Inventory</h6>
              <hr class="dark horizontal">
              <div class="d-flex ">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                <div class="chart" style="height: 260px;">
                  <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 "> Contraband Seized </h6>
              <hr class="dark horizontal">
              <div class="d-flex ">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mt-4 mb-3">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart" style="height: 260px;">
                  <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Occupied Racks</h6>
              <hr class="dark horizontal">
              <div class="d-flex ">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h4>Station Vs Contraband</h4>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th ><b>Station Name</b></th>
                      <th ><b>Opium(in Kg)</b></th>
                      <th ><b>Ganja(in Kg)</b></th>
                      <th ><b>Cocaine(in Kg)</b></th>
                    </tr>
                  </thead>
                  <tbody>
<?php 
include("../connections/db_connection.php");

// $rs = "SELECT * FROM tbl_station group by station ";
$rs ="SELECT FROM_BASE64(station) as station,
SUM(CASE WHEN (FROM_BASE64(contraband_type) = 1) THEN FROM_BASE64(totqty) ELSE 0  END) AS 'Opium',
SUM(CASE WHEN (FROM_BASE64(contraband_type) = 2) THEN FROM_BASE64(totqty) ELSE 0  END) AS 'Ganja',
SUM(CASE WHEN (FROM_BASE64(contraband_type) = 3) THEN FROM_BASE64(totqty) ELSE 0  END) AS 'Cocaine'
FROM tbl_station s
LEFT JOIN tbl_custodian c on s.station = c.station_code
LEFT JOIN tbl_seizure_custodian ss on c.id = ss.m_id
LEFT JOIN tbl_seizure_contraband sc on FROM_BASE64(ss.contraband_name)= sc.id
GROUP BY station";
$res = mysqli_query($db,$rs);
while($rsArr = mysqli_fetch_array($res)){
    $array[] = $rsArr;
}

$_SESSION['data']=base64_encode(serialize($array));
$data = unserialize(base64_decode($_SESSION['data']));
foreach($data as $i=>$data){
?>                    
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">&nbsp;<?php echo $data['station']; ?></h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle ">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <span class="text-xs font-weight-bold"> <?php echo $data['Opium']; ?></span>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle ">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <span class="text-xs font-weight-bold"> <?php echo $data['Ganja']; ?> </span>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                              <span class="text-xs font-weight-bold"><?php echo $data['Cocaine']; ?></span>
                          </div>
                          <!-- <div class="progress">
                            <div class="progress-bar bg-gradient-info w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                          </div> -->
                        </div>
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
    </div>
   
    <?php include("footer.php"); ?>
  </main>

<?php 
$cmd= "SELECT FROM_BASE64(contraband_type_name) as cbnm,MONTH(str_to_date(FROM_BASE64(dor),'%d/%m/%Y')) as mon,SUM(FROM_BASE64(totqty)) as totqty FROM tbl_seizure_custodian s
LEFT JOIN tbl_custodian c on s.m_id = c.id 
LEFT JOIN tbl_seizure_contraband sc on FROM_BASE64(s.contraband_name)= sc.id
where MONTH(str_to_date(FROM_BASE64(dor),'%d/%m/%Y')) = MONTH(CURRENT_DATE())  OR MONTH(str_to_date(FROM_BASE64(dor),'%d/%m/%Y')) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) OR MONTH(str_to_date(FROM_BASE64(dor),'%d/%m/%Y')) = MONTH(CURRENT_DATE - INTERVAL 2 MONTH)
group by MONTH(str_to_date(FROM_BASE64(dor),'%d/%m/%Y')),contraband_type_name";


$resinv = mysqli_query($db,$cmd);
while($resinvArr = mysqli_fetch_array($resinv)){
    $arrayinv[] = $resinvArr;
}

$_SESSION['data']=base64_encode(serialize($arrayinv));
$datainv = unserialize(base64_decode($_SESSION['data']));
$datainv1 = $datainv;
$datainv2 = $datainv;


$resinv1 = mysqli_query($db,"SELECT id,FROM_BASE64(contraband_type_name) as cbnm FROM tbl_seizure_contraband");
while($resinvArr1 = mysqli_fetch_array($resinv1)){
  $arrayinv1[] = $resinvArr1;
}
?>
  
  <script src="plugins/js/chartjs.min.js"></script>
  <script>
    // Vertical Group Bar Chart
var ctx3 = document.getElementById('verticalGroupBarChart');
if(ctx3) {
	var myChart3 = new Chart(ctx3, {
	    type: 'bar',
	    data: {
	        labels: [<?php foreach($arrayinv1 as $i=>$arrayinv1){ echo '"'.$arrayinv1['cbnm'].'", '; } ?>],
	        datasets: [{
	            label: '<?php echo date('M'); ?>',
	            data: [<?php foreach($datainv as $k=>$datainv){ if($datainv['mon'] == date('m')){ echo '"'.$datainv['totqty'].'", '; }} ?>],
	            backgroundColor: 
	                'rgba(255, 99, 132, 1)'
	            ,
	            borderColor: 
	                'rgba(255, 99, 132, 1)'
	            ,
	            borderWidth: 1
	        }, {
	            label: '<?php echo date("M", strtotime("-1 month")); ?>',
	            data: [<?php foreach($datainv1 as $k=>$datainv1){ if($datainv1['mon'] == date("m", strtotime("-1 month"))){ echo '"'.$datainv1['totqty'].'", '; }} ?>],
	            backgroundColor: 
	                'rgba(54, 162, 235, 1)'
	            ,
	            borderColor: 
	                'rgba(54, 162, 235, 1)'
	            ,
	            borderWidth: 1
	        }, {
	            label: '<?php echo date("M", strtotime("-2 month")); ?>',
	            data: [<?php foreach($datainv2 as $k=>$datainv2){ if($datainv2['mon'] == date("m", strtotime("-2 month"))){ echo '"'.$datainv2['totqty'].'", '; }} ?>],
	            backgroundColor: 
	                'rgba(255, 206, 86, 1)'
	            ,
	            borderColor: 
	                'rgba(255, 206, 86, 1)'
	            ,
	            borderWidth: 1
	        }]
	    },
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero: true
	                },
	                scaleLabel: {
						display: true,
						labelString: 'Production Units (in No.)',
						fontSize: '16',
					}
	            }],
	            xAxes: [{
	                scaleLabel: {
						display: true,
						labelString: 'Months',
						fontSize: '16',
					}
	            }]
	        }
	    }
	});
} else {

}

<?php 

$monthArr = array("Jan" =>1, "Feb"=>2, "Mar"=>3, "Apr"=>4, "May"=>5, "Jun" =>6, "Jul" =>7, "Aug" =>8, "Sep" =>9, "Oct" =>10, "Nov" =>11, "Dec" =>12);


$qry ="SELECT MONTH(str_to_date(FROM_BASE64(dor),'%d/%m/%Y')) as mon,SUM(FROM_BASE64(totqty)) as qty FROM
tbl_seizure_custodian s
LEFT JOIN tbl_custodian c on s.m_id = c.id 
LEFT JOIN tbl_seizure_contraband sc on FROM_BASE64(s.contraband_name)= sc.id
WHERE   str_to_date(FROM_BASE64(dor),'%d/%m/%Y') >= date_sub(now(), interval 6 month)  group by MONTH(str_to_date(FROM_BASE64(dor),'%d/%m/%Y'))";
$rescon = mysqli_query($db,$qry);
while($resconArr = mysqli_fetch_array($rescon)){
    $arraycon[] = $resconArr;
}

$_SESSION['data']=base64_encode(serialize($arraycon));
$datacont = unserialize(base64_decode($_SESSION['data']));
$datacont1 = $datacont;
?>
    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: [<?php foreach($datacont as $i=>$datacont){ echo '"'.array_search($datacont['mon'], $monthArr).'", '; } ?>],
        datasets: [{
          label: "Total Quantity of Contraband",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [<?php foreach($datacont1 as $i=>$datacont1){ echo '"'.$datacont1['qty'].'", '; } ?>],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


<?php 

$monthArr = array("Jan" =>1, "Feb"=>2, "Mar"=>3, "Apr"=>4, "May"=>5, "Jun" =>6, "Jul" =>7, "Aug" =>8, "Sep" =>9, "Oct" =>10, "Nov" =>11, "Dec" =>12);


$qry1 ="SELECT MONTH(str_to_date(FROM_BASE64(dor),'%d/%m/%Y')) as mon,COUNT(rack_no) rack FROM
tbl_custodian c
LEFT JOIN tbl_rack r on c.rack_no = r.rack_name
where str_to_date(FROM_BASE64(dor),'%d/%m/%Y') >= date_sub(now(), interval 6 month)  group by MONTH(str_to_date(FROM_BASE64(dor),'%d/%m/%Y'))";
$resrack = mysqli_query($db,$qry1);
while($resrackArr = mysqli_fetch_array($resrack)){
    $arrayrack[] = $resrackArr;
}

$_SESSION['data']=base64_encode(serialize($arrayrack));
$datarack = unserialize(base64_decode($_SESSION['data']));
$datarack1 = $datarack;
?>
    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: [<?php foreach($datarack as $i=>$datarack){ echo '"'.array_search($datarack['mon'], $monthArr).'", '; } ?>],
        datasets: [{
          label: "Rack Occupied",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [<?php foreach($datarack1 as $i=>$datarack1){ echo '"'.$datarack1['rack'].'", '; } ?>],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx23 = document.getElementById('pieChart');
if(ctx23) {
	var myChart23 = new Chart(ctx23, {
	    type: 'pie',
	    data: {
	        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
	        datasets: [{
	            label: 'Pie',
	            data: [40, 4, 36, 19, 53, 67, 59],
	            backgroundColor: [
	            	'rgba(255,99,132,1)', 
	            	'rgba(54,162,235,1)',
	            	'rgba(75,192,192,1)',
	            	'rgba(255,205,86,1)',
	            	'rgba(255,159,64,1)',
	            	'rgba(255,159,164,1)',
	            	'rgba(255,99,232,1)'
	            ],
	            borderWidth: 2,
	            pointRadius: 3,
				fill: '1',
	        }]
	    },
	    options: {
	        
	    }
	});
} else {

}  

  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>