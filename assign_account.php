
<?php include 'navi.php'; ?>
<?php ;
require_once('sell_account.php'); 
$countries_qry = $conn->query("SELECT id, user_email AS name FROM netflix_stock WHERE is_sold = 0 AND active = 1 AND is_rplacement = 0 AND shared_acount = 0");
$countries = $countries_qry->fetch_all(MYSQLI_ASSOC);
?>

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
</head>
<body>
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
                 <!-- All Here  -->
					<div class="panel panel-default">
                        <div class="panel-heading">
                            Assign Private Account
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Netflix Account Info</h3>
            <form name="main" action="" method="GET">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label>Free Account</label>
				  <select type="text" name="seller" class="form-control" id="seller" placeholder="Seller" required>\
                    <?php 
                    $default = mt_rand(1, count($countries));
                    $countries = $conn->query("SELECT id, user_email AS name FROM netflix_stock WHERE is_sold = 0 AND active = 1 AND is_rplacement = 0 AND shared_acount = 0");
                    while($row = $countries->fetch_assoc()):
                        if($default == $row['id'])
                            echo "<option value='{$row['id']}'>{$row['name']}</option>";
                        else
                            echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    endwhile;
                    ?>
                </select>
                </div>

                <div class="col-md-6 form-group mt-3 mt-md-0">
				<label>User ID</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="ID" required>
                </div>
        
              </div>
              </div>
              <div class="text-center"><button type="button" value="Submit" onClick="testResults2(this.form, this.form); refreshPage()">Submit</button></div>
               <div class="text-center"><a href="http://65.0.130.124/"><button type="button" value="Submit" >Home</button></a>
            </form>
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
function refreshPage(){
    window.location.reload();
} 
</script>
<script>
    $(function() {
        $("#date").datepicker({
            dateFormat: "YYYY-MM-DD"
        });
    });
    </script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  
  <script>
  function testResults2 (form, form) {
    var seller = form.seller.value;
	var email = form.email.value;
    var q = null;
      if (email == "") 
      {
          alert ("***********************************\n***** Please Provide All Data *****\n***********************************");
      }
      else {
		  const url = "http://65.0.130.124:82/assign_account?account="+seller+"&ids="+email
		  
		  fetch(url);
        alert ("***** Netflix Account Assigned *****");
      }

}
</script>
</body>
</html>
<?php $conn->close(); ?>