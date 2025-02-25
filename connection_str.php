<?php
// Include the configuration file
$dbConfig = include 'db_config.php';

// Extract database credentials
$host = $dbConfig['host'];
$user = $dbConfig['user'];
$password = $dbConfig['password'];
$db = $dbConfig['db'];
$port = $dbConfig['port'];
      
    $conn = mysqli_connect($host, $user, $password, $db, $port);  

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) as total_count FROM `netflix_stock`";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Fetch the result row as an associative array
    $row = $result->fetch_assoc();
    $total_count = $row['total_count'];
} else {
    $total_count = 0;
}

// Query to get the count of users
$sql = "SELECT COUNT(*) as active_count FROM `netflix_stock` where active = 1";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Fetch the result row as an associative array
    $row = $result->fetch_assoc();
    $active_count = $row['active_count'];
} else {
    $active_count = 0;
}



$sql = "SELECT COUNT(*) AS sold_count FROM `netflix_stock` WHERE is_sold = 1 AND active = 1 AND is_rplacement = 0";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Fetch the result row as an associative array
    $row = $result->fetch_assoc();
    $sold_count = $row['sold_count'];
} else {
    $sold_count = 0;
}


$sql = "SELECT COUNT(*) AS unsold_count FROM `netflix_stock` WHERE is_sold = 0 AND active = 1 AND is_rplacement = 0";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Fetch the result row as an associative array
    $row = $result->fetch_assoc();
    $unsold_count = $row['unsold_count'];
} else {
    $unsold_count = 0;
}


$sql = "SELECT COUNT(*) AS on_risk FROM `netflix_stock` WHERE Day_Left BETWEEN 0 AND 5 AND active = 1 AND is_rplacement = 0";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Fetch the result row as an associative array
    $row = $result->fetch_assoc();
    $on_risk = $row['on_risk'];
} else {
    $on_risk = 0;
}

$sql = "SELECT COUNT(*) AS expire FROM `netflix_stock` WHERE Day_Left <= 0";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Fetch the result row as an associative array
    $row = $result->fetch_assoc();
    $expire = $row['expire'];
} else {
    $expire = 0;
}


$sql = "SELECT COUNT(*) AS active_r FROM `netflix_stock` WHERE is_rplacement = 1 AND Day_Left > 0";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Fetch the result row as an associative array
    $row = $result->fetch_assoc();
    $active_r = $row['active_r'];
} else {
    $active_r = 0;
}


$sql = "SELECT COUNT(*) AS inactive_r FROM `netflix_stock` WHERE is_rplacement = 1 AND Day_Left <= 0";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Fetch the result row as an associative array
    $row = $result->fetch_assoc();
    $inactive_r = $row['inactive_r'];
} else {
    $inactive_r = 0;
}



$sql = "SELECT SUM(price*renew_count) AS total_buy  FROM `netflix_stock`";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Fetch the result row as an associative array
    $row = $result->fetch_assoc();
    $total_buy = $row['total_buy'];
} else {
    $total_buy = 0;
}

$sql = "SELECT SUM(price*renew_count) AS total_sell  FROM `netflix_user`";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Fetch the result row as an associative array
    $row = $result->fetch_assoc();
    $total_sell = $row['total_sell'];
} else {
    $total_sell = 0;
}


$sql = "SELECT count(*) as with_account_user FROM `netflix_user` AS u JOIN `netflix_stock` AS s ON u.`stock_id` = s.`id`";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Fetch the result row as an associative array
    $row = $result->fetch_assoc();
    $with_account_user = $row['with_account_user'];
} else {
    $with_account_user = 0;
}


$sql = "SELECT count(*) as without_account_user FROM `netflix_user` where `stock_id` = 0";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Fetch the result row as an associative array
    $row = $result->fetch_assoc();
    $without_account_user = $row['without_account_user'];
} else {
    $without_account_user = 0;
}


$sql = "SELECT id AS last_uid FROM `netflix_user` ORDER BY id DESC";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Fetch the result row as an associative array
    $row = $result->fetch_assoc();
    $last_uid = $row['last_uid'];
} else {
    $last_uid = 0;
}

// Close the connection
$conn->close();
?>
