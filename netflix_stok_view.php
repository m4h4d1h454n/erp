

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
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
   <script type="text/javascript" src="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css"></script>
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
          <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
      <h1>Netflix Not Sold Stocks</h1>
    <!-- <a href="http://13.233.179.4" class="button">Home</a> -->
    <table border="1" class="table table-responsive" id="table">
        <thead>
            <tr>
            <th>profile_type</th>
            <th>user_email</th>
            <th>seller</th>
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
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
</div>


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
   $(document).ready(function() {
      $('#table').DataTable();
    });
</script>
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
