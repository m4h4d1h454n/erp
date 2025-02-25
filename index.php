

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MasterMind</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
               <script>
        if (sessionStorage.getItem('authenticated') !== 'true') {
            window.location.href = "login.php";
        }

        function logout() {
            sessionStorage.removeItem('authenticated');
            window.location.href = "login.php";
        }
    </script>
</head>
<body>
     <?php
include('connection_str.php');
?> 

<?php include 'navi.php'; ?>
    <div id="wrapper">
        
           <!-- /. NAV TOP  -->
                
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Love to see you back</h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo $total_count ?? 0; ?></p>
                    <p class="text-muted">Total Netflix</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo $sold_count ?? 0; ?>/<?php echo $unsold_count ?? 0; ?>=<?php echo $active_count ?? 0; ?></p>
                    <p class="text-muted">Sold/Unsold=Total Active</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo $on_risk ?? 0; ?>/<?php echo $expire ?? 0; ?></p>
                    <p class="text-muted">At Risk/Expire</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo $active_r ?? 0; ?>/<?php echo $inactive_r ?? 0; ?></p>
                    <p class="text-muted">Active/Inactive Replacement</p>
                </div>
             </div>
		     </div>
			 
			<div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo $with_account_user ?? 0; ?></p>
                    <p class="text-muted">User With Netflix Account</p>
                </div>
             </div>
		     </div>
			 
			 
			<div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo $without_account_user ?? 0; ?></p>
                    <p class="text-muted">User Without Netflix Account</p>
                </div>
             </div>
		     </div>
			 
			</div>
                 <!-- /. ROW  -->
                <hr />                

                 <!-- /. ROW  -->
                <div class="row"> 
                    <div class="col-md-3 col-sm-12 col-xs-12">                       
                    <div class="panel panel-primary text-center no-boder bg-color-green">
                        <div class="panel-body">
                            <i class="fa fa-bar-chart-o fa-5x"></i>
                            <h3><?php echo $total_sell ?? 0; ?></h3>
                        </div>
                        <div class="panel-footer back-footer-green">
                           Total Sell
                            
                        </div>
                    </div>
                    <div class="panel panel-primary text-center no-boder bg-color-red">
                        <div class="panel-body">
                            <i class="fa fa-edit fa-5x"></i>
                            <h3><?php echo $total_buy ?? 0; ?></h3>
                        </div>
                        <div class="panel-footer back-footer-red">
                            Total Buy
                            
                        </div>
                    </div>   
    
           </div>
                 <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>

                        </div>
                
           </div>
		   

                </div>
				
                 <!-- /. ROW  -->
   
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->


    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   <script>
const url = "http://127/.0.0.1:82/netflix_flush"

document.getElementById('fetchButton2').addEventListener('click', function() 
        {
            

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json(); // Parsing the JSON data
                })
                .then(data => {
                    // Display the data in alerts
                    // For demonstration, assume data is an array of objects
                    alert('==============Stock Flushed=========\n');
                })
                .catch(error => {
                    alert('==============Stock Flushed=========\n');
                });



        });
    </script>
</body>
</html>
