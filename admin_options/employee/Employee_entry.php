<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MasterMind</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script>
        // Handle form submission with AJAX
        $(document).ready(function() {
            $("form[name='main']").submit(function(event) {
                event.preventDefault(); // Prevent the default form submission

                $.ajax({
                    type: "POST",
                    url: "admin_options/employee/management/employee_entry_api.php", // PHP script to handle the request
                    data: $(this).serialize(), // Serialize the form data
                    dataType: "json",
                    success: function(response) {
                        if (response.status === "success") {
                            alert(response.message); // Show success message in popup
                        } else {
                            alert(response.message); // Show error message in popup
                        }
                    },
                    error: function() {
                        alert("An error occurred while processing your request.");
                    }
                });
            });
        });
    </script>
</head>
<body>
    <?php include('connection_str.php'); ?> 
    <?php include 'navi.php'; ?>

    <div id="wrapper">
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>New Employee Onboard</h2>   
                        <h5>Love to see you back. </h5>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Create User For Employee
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <form name="main" method="POST">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Employee Type</label>
                                                <select type="text" name="seller" class="form-control" id="seller" placeholder="Seller" required>
                                                    <option>Admin</option>
                                                    <option>General Employee</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>User Name</label>
                                                <input type="text" name="user_name" class="form-control" id="user_name" placeholder="user_name" required>
                                            </div>
                                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Password</label>
                                                <input type="password" name="pass" class="form-control" id="pass" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
       <script src="assets/js/dataTables/jquery.dataTables.js"></script>
     <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
	 <script src="assets/js/custom.js"></script>
</body>
</html>
