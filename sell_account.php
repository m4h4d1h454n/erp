

<?php
$servername = "65.0.130.124";
$username = "erp";
$password = "Mahadi#96";
$dbname = "erp";
$conn = new MySQLi($host, $username, $password, $dbname);
 
if(!$conn){
    die("Database Connection failed. Error: ". $conn->error);
}