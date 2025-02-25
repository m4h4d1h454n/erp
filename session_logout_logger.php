<?php
$dbConfig = include 'db_config.php';

// Extract database credentials
$host = $dbConfig['host'];
$user = $dbConfig['user'];
$password = $dbConfig['password'];
$db = $dbConfig['db'];
$port = $dbConfig['port'];
$cookie_name = "user";
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
$uname = $_COOKIE[$cookie_name];
}
$conn = new mysqli($host, $user, $password, $db, $port);
        $logSql = "INSERT INTO erp.access_logs (user, log_details, login_status) VALUES (?, 'logout: success due to inactive session', 3)";
    $logStmt = $conn->prepare($logSql);
    if ($logStmt) {
        $logStmt->bind_param("s", $uname);
        $logStmt->execute();
        $logStmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to log login attempt: ' . $conn->error], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

         
?>
    <script>
        window.location.href = "logout.php";
        sessionStorage.removeItem('authenticated');
    </script>


