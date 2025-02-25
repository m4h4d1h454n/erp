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
                     <h2>Netflix Full Stock</h2>   
                        <h5>Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             This accounts are currently used by a customer
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="netflixStockTable">

        <thead>
            <tr>
            <th>profile_type</th>
            <th>user_email</th>
            <th>seller</th>
            <th>on_replace_time</th>
            <th>on_replace_day</th>
            <th>start_date</th>
            <th>end_date</th>
            <th>day_left</th>
            <th>price</th>
            </tr>
        </thead>
        <tbody>
         <?php foreach ($response as $row): ?> 
            <tr>
            <td><?= htmlspecialchars($row[0]) ?></td>
            <td><?= htmlspecialchars($row[1]) ?></td>
            <td><?= htmlspecialchars($row[2]) ?></td>
            <td><?= htmlspecialchars($row[3]) ?></td>
            <td><?= htmlspecialchars($row[4]) ?></td>
            <td><?= htmlspecialchars($row[5]) ?></td>
            <td><?= htmlspecialchars($row[6]) ?></td>
            <td><?= htmlspecialchars($row[7]) ?></td>
            <td><?= htmlspecialchars($row[8]) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
 
                <!-- /. ROW  -->
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
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
       <script src="assets/js/dataTables/jquery.dataTables.js"></script>
     <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <script>
           $(document).ready(function() {
        
            $('#netflixStockTable').DataTable({
                paging: true,         // Enable pagination
                searching: true,      // Enable search bar
                ordering: true,       // Enable column ordering
                lengthChange: true,   // Allow users to change number of rows displayed
                pageLength: 10,        // Default number of rows per page
            
            });
        });
    </script>
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
     <!-- DATA TABLE SCRIPTS -->

</body>
</html>

