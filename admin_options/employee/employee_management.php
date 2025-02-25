<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MasterMind</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script>
        $(document).ready(function() {
            // Handle dropdown selection change
            $('#formSelector').on('change', function() {
                const selectedValue = $(this).val();
                $('.form-container').hide(); // Hide all forms
                $(`#${selectedValue}`).show(); // Show the selected form
            });

            // Handle AJAX submission for password update
            $('#passwordForm').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "admin_options/employee/management/employee_pass_update_api.php",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        alert(response.message);
                    },
                    error: function() {
                        alert("An error occurred while processing your request.");
                    }
                });
            });

            // Handle AJAX submission for status update
            $('#statusForm').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "admin_options/employee/management/employee_status_update_api.php",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        alert(response.message);
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
                        <h2>Update Employee</h2>   
                        <h5>Love to see you back. </h5>
                    </div>
                </div>
                <hr />
                <!-- Dropdown for selecting form -->
                <div class="row">
                    <div class="col-md-12">
                        <label for="formSelector">Select Form:</label>
                        <select id="formSelector" class="form-control">
                            <option value="" disabled selected>Select an option</option>
                            <option value="passwordFormContainer">Update Password</option>
                            <option value="statusFormContainer">Update Status</option>
                        </select>
                    </div>
                </div>
                <br />
                <!-- Password Update Form -->
                <div id="passwordFormContainer" class="form-container" style="display: none;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Employee Password
                        </div>
                        <div class="panel-body">
                            <form id="passwordForm" method="POST">
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" name="user_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="pass" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Status Update Form -->
                <div id="statusFormContainer" class="form-container" style="display: none;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Employee Status
                        </div>
                        <div class="panel-body">
                            <form id="statusForm" method="POST">
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" name="user_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" name="status" class="form-control" placeholder="active = 1 / inactive = 0" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
