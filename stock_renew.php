<?php
include('date_for.php');
?>
<?php include 'navi.php'; ?>
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
                            Netflix Stock Renew Panel
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Netflix Stock Renew Panel</h3>
            <form name="main" action="" method="GET">
              <div class="row">

                <div class="col-md-6 form-group mt-3 mt-md-0">
				<label>Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
                
              </div>
              </div>
                           <div class="text-center"><button type="button" value="Submit" onClick="testResults2(this.form)">Submit</button></div>
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
    function testResults2 (form) {
    var email = form.email.value;

    var q = null;
      if (email == "") 
      {
          alert ("***********************************\n***** Please Provide All Data *****\n***********************************");
      }
      else {
        const url = "http://65.0.130.124:82/stock_renew?email="+email
        var reply = "\n"+email+"\n*****************************"
        fetch(url);
        alert ("***** Netflix Stock Renewed *****" + reply);
      }
}

    $(function() {
        $("#date").datepicker({
            dateFormat: "YYYY-MM-DD"
        });
    });
    </script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src = assets/js/style.js></script>
</body>
</html>
