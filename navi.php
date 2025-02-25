
<!DOCTYPE lang="en">
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Logout Example</title>
    <script>
        let logoutTimer;

        function resetTimer() {
            // Clear the existing timer
            clearTimeout(logoutTimer);

            // Set a new timer for 5 minutes (300000 ms)
            logoutTimer = setTimeout(() => {
                alert("You have been logged out due to inactivity.");
                window.location.href = 'session_logout_logger.php'; // Redirect to logout or timeout handler
            }, 180000);
        }

        // Detect user activity
        window.onload = resetTimer;
        document.onmousemove = resetTimer;
        document.onkeydown = resetTimer;
        document.onclick = resetTimer;
    </script>
</head>
<body>
    <header>
	<div id="wrapper">
	        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">MasterMind</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Welcome &nbsp; <button class="btn btn-danger square-btn-adjust" onclick="flush()" type="button" value="Submit"">Flush Inventory</button> 
<button class="btn btn-danger square-btn-adjust" onclick="logout()" type="button" value="Submit">Logout</button>

</div>
        </nav>   
<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				    <li>
                        <a class="active-menu"  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
					<li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Netflix Stocks<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
							<li>
                                <a href="functions.php?action=full_stock" class="button">Full Stock</a>
                            </li>                            
							<li>
                                <a href="functions.php?action=sold_stock" class="button">Sold Stock</a>
                            </li>
                            <li>
                                <a href="functions.php?action=unsold_stock" class="button">Unsold Stock</a>
                            </li>
							<li>
                                <a href="functions.php?action=stock_on_replace" class="button">On Replace Stock</a>
                            </li>                            
							<li>
                                <a href="functions.php?action=stock_on_risk" class="button">Risk Stock</a>
                            </li>                            
                            <li>
                                <a href="functions.php?action=stock_expire" class="button">Expired Stock</a>
                            </li>    
                        </ul>
                      
					</li> 
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Management<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           
                            <li>
                                <a href="http://127.0.0.1/stock_entry.php" class="button">Stock Entry</a>
                            </li>
                            <li>
                                <a href="http://127.0.0.1/stock_renew.php" class="button">Stock Renew</a>
                            </li>
							<li>
                                <a href="http://127.0.0.1/user_renew.php" class="button">User Renew</a>
                            </li>
                            <li>
                                <a href="http://127.0.0.1/stock_replace.php" class="button">Stock Replace</a>
                            </li>
							
                            <li>
                                <a href="http://127.0.0.1:82/view_password" class="button">View Password</a>
                            </li>  
							                            <li>
                                <a href="http://127.0.0.1:82/update_password" class="button">Update Password</a>
                            </li> 
                        </ul>
                      
                    </li> 
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Netflix Users<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
						                                                        <li>
                                <a href="http://127.0.0.1/user_entry.php" class="button">User Entry</a>
                            </li>
                            <li>
                                <a href="http://127.0.0.1:82/s_user_active" class="button">Active Users</a>
                            </li>                            
                                                           <li>
                                <a href="http://127.0.0.1:82/s_user_no_stock" class="button">No Account Users</a>
                            </li>    
							                               <li>
                                <a href="http://127.0.0.1/assign_account.php" class="button">Assign Private Account</a>
                            </li>   
							<li>
                                <a href="http://127.0.0.1/assign_shared_account.php" class="button">Assign Shared Account</a>
                            </li>  
                            <li>
                                <a href="http://127.0.0.1/unassigned_account.php" class="button">Unassign Account</a>
                            </li>   							
                        </ul>
                      
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Employee Management<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
						    <li>
                                <a href="functions.php?action=Employee_list" class="button">Employee List</a>
                            </li> 
                            <li>
                                <a href="functions.php?action=Employee_Activity" class="button">Employee Activity</a>
                            </li> 
                            <li>
                                <a href="functions.php?action=Employee_entry" class="button">Employee Entry</a>
                            </li>  
							<li>
                                <a href="functions.php?action=Employee_management" class="button">Employee Management</a>
                            </li>  
 							
                        </ul>
                      
                    </li> 
                </ul>
               
            </div>
            
        </nav>  
    </header>
	<script>
        if (sessionStorage.getItem('authenticated') !== 'true') {
            window.location.href = "login.php";
        }

        function logout() {
            window.location.href = "logout_logger.php";
        }
		
		function flush() {
			fetch('inventory/flush_stock.php', {
    method: 'GET',
})
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert(data.message);
            console.log(data.data); // Log the returned data if any
        } else {
            alert(data.message); // Show the error message
        }
    })
    .catch(error => {
        alert('An error occurred: ' + error.message);
    });
           
        }
    </script>