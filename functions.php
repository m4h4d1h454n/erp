

<?php

if (isset($_GET['action']) && $_GET['action'] === 'full_stock') {
	
    getFullStock();
	
}

function getFullStock() {
    // Third-party API URL
    $apiUrl = "http://127.0.0.1:82/stock_full"; // Replace with actual API URL

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);
    $response = json_decode($response);
    // Pass data to the view
    require 'inventory/fullstock.php';
}
?>

<?php
if (isset($_GET['action']) && $_GET['action'] === 'sold_stock') {
    getNetflixStock();
}

function getNetflixStock() {
 
    // Third-party API URL
    $apiUrl = "http://127.0.0.1:82/stock_sold"; // Replace with actual API URL

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);
    $response = json_decode($response);

    // Pass data to the view
    require 'inventory/stock_sold.php';
}
?>

<?php
if (isset($_GET['action']) && $_GET['action'] === 'unsold_stock') {
    getunsoldStock();
}

function getunsoldStock() {
 
    // Third-party API URL
    $apiUrl = "http://127.0.0.1:82/stock_unsold"; // Replace with actual API URL

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);
    $response = json_decode($response);

    // Pass data to the view
    require 'inventory/stock_unsold.php';
}
?>

<?php
if (isset($_GET['action']) && $_GET['action'] === 'stock_on_replace') {
    getStockonReplace();
}

function getStockonReplace() {
 
    // Third-party API URL
    $apiUrl = "http://127.0.0.1:82/stock_on_replace"; // Replace with actual API URL

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);
    $response = json_decode($response);
    // Pass data to the view
    require 'inventory/stock_on_replace.php';
}
?>


<?php
if (isset($_GET['action']) && $_GET['action'] === 'stock_on_risk') {
    stock_on_risk();
}

function stock_on_risk() {
 
    // Third-party API URL
    $apiUrl = "http://127.0.0.1:82/stock_on_risk"; // Replace with actual API URL

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);
    $response = json_decode($response);
    // Pass data to the view
    require 'inventory/stock_on_risk.php';
}
?>


<?php
if (isset($_GET['action']) && $_GET['action'] === 'stock_expire') {
    stock_expire();
}

function stock_expire() {
 
    // Third-party API URL
    $apiUrl = "http://127.0.0.1:82/stock_expire"; // Replace with actual API URL
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);
    $response = json_decode($response);
    // Pass data to the view
    require 'inventory/stock_expire.php';
}
?>


<?php
if (isset($_GET['action']) && $_GET['action'] === 'Employee_Activity') {
    Employee_Activity();
}

function Employee_Activity() {
 
    // Third-party API URL
    $apiUrl = "http://127.0.0.1:82/Employee_Activity"; // Replace with actual API URL
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);
    $response = json_decode($response);
    // Pass data to the view
    require 'admin_options/employee/Employee_Activity.php';
}
?>

<?php
if (isset($_GET['action']) && $_GET['action'] === 'Employee_list') {
    Employee_list();
}

function Employee_list() {
 
    // Third-party API URL
    $apiUrl = "http://127.0.0.1:82/employee_list"; // Replace with actual API URL
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);
    $response = json_decode($response);
    // Pass data to the view
    require 'admin_options/employee/employee_list.php';
}
?>

<?php
if (isset($_GET['action']) && $_GET['action'] === 'Employee_entry') {
    Employee_entry();
}

function Employee_entry() {
    require 'admin_options/employee/Employee_entry.php';
}

?>

<?php
if (isset($_GET['action']) && $_GET['action'] === 'Employee_management') {
    Employee_management();
}

function Employee_management() {
    require 'admin_options/employee/employee_management.php';
}

?>


<?php
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    logout();
}

function logout() {
 
 include 'logout.php';

}
?>

