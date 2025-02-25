<?php include('date_for.php'); ?>
<?php include 'navi.php'; ?>
<?php
include('connection_str.php');
?>

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
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">

        <!-- /. NAV TOP -->
   
        <!-- /. NAV SIDE -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Admin Dashboard</h2>
                        <h5>Love to see you back</h5>
                    </div>
                </div>
                <!-- Main Content -->
                <div class="panel panel-default">
                    <div class="panel-heading">New User Entry</div>
                    <div class="panel-body">
                        <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo $last_uid ?? 0; ?></p>
                    <p class="text-muted">Last Inserted User ID</p>
                </div>
             </div>
		     </div>
                            <div class="col-md-6">
                                <h3>Netflix User Info</h3>
                                <form name="main" id="userForm" action="" method="GET">
                                    <div class="row">
                                        <div class="col-md-6 form-group mt-3 mt-md-0">
                                            <label>Profile</label>
                                            <input type="text" class="form-control" name="profile" id="profile" placeholder="Profile" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>User Name</label>
                                            <input type="text" name="user_name" class="form-control" id="user_name" placeholder="User Name" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Contact</label>
                                            <input type="text" name="contact" class="form-control" id="contact" placeholder="Contact" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Package</label>
                                            <select type="text" name="packagess" class="form-control" id="packagess" placeholder="Package" required>
                                                <option value="" disabled selected>Select Option</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>6</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group mt-3 mt-md-0">
                                            <label>Start Date</label>
                                            <input type="date" class="form-control" name="date" id="date" placeholder="Start Date(YYYY-MM-DD)" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Price</label>
                                            <input type="text" name="price" class="form-control" id="price" placeholder="Price" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Pin</label>
                                            <input type="text" name="pin" class="form-control" id="pin" placeholder="Pin" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>User From</label>
											<select type="text" name="user_from_select" class="form-control" id="user_from_select" placeholder="user_from_select" required>
                                                <option value="" disabled selected>Select Option</option>
                                                <option>Page</option>
                                                <option>WhatsApp</option>
                                                <option>Reseller</option>
                                                <option>Shrayan</option>
												<option>Purob</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" onclick="testResults();refreshPage()">Submit</button>
                                    </div>
                                    <div class="text-center">
                                        <a href="http://65.0.130.124/"><button type="button">Home</button></a>
                                    </div>
	
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. PAGE INNER -->
            </div>
        </div>
        <!-- /. PAGE WRAPPER -->
    </div>
    <!-- /. WRAPPER -->
    <!-- SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        function testResults() {
            var form = document.getElementById('userForm');
            var profile = form.profile.value;
            var user_name = form.user_name.value;
            var contact = form.contact.value;
            var packagess = form.packagess.value;
            var date = form.date.value;
            var price = form.price.value;
            var pin = form.pin.value;
            var user_from_select = form.user_from_select.value;

            if (profile == "" || user_name == "" || contact == "" || date == "" || price == "") {
                alert("***********************************\n***** Please Provide All Data *****\n***********************************");
            } else {
var reply = "\n\nProfile: " + profile + "\nUser Name: " + user_name + "\nContact: " + contact + "\nPackage: " + packagess + " Month(s)\n"+"\nPrice: " + price+"\nUser From: " + user_from_select+"\n*****************************";
const url = "http://65.0.130.124:82/user_entry?profile="+profile+"&user_name="+user_name+"&contact="+contact+"&package="+packagess+"&start_date="+date+"&price="+price+"&pin="+pin+"&user_from="+user_from_select
                fetch(url)
                alert("***** Confirm Your Data *****" + reply);
            }
        }

        function toggleTextbox(value) {
            var user_from = document.getElementById('user_from');
            if (value === 'other') {
                user_from.style.display = 'inline';
                user_from.required = true;
            } else {
                user_from.style.display = 'none';
                user_from.required = false;
            }
        }
    </script>
       <script>
const url = "http://13.233.179.4:82/netflix_flush"

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
	     <script>
function refreshPage(){
    window.location.reload();
} 
</script>
</body>
</html>
