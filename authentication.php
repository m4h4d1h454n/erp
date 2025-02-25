<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Set the response content type
header('Content-Type: application/json');

// Include the configuration file
$dbConfig = include 'db_config.php';

// Extract database credentials
$host = $dbConfig['host'];
$user = $dbConfig['user'];
$password = $dbConfig['password'];
$db = $dbConfig['db'];
$port = $dbConfig['port'];

// Establish database connection
$conn = new mysqli($host, $user, $password, $db, $port);
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
}

// Retrieve JSON input and decode
$data = json_decode(file_get_contents('php://input'), true);
if (!isset($data['username']) || !isset($data['password'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid input data'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    $conn->close();
    exit;
}

$username = $data['username'];
$password = md5($data['password']); // Hash the password for matching
$cookie_name = "user";
setcookie($cookie_name, $username, time() + (86400 * 30), "/");

// Prepare and execute the SELECT statement
$sql = "SELECT * FROM users WHERE BINARY username = ? AND password = ? AND status = 1";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    $conn->close();
    exit;
}

$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Log successful login
    $logSql = "INSERT INTO erp.access_logs (user, log_details, login_status) VALUES (?, 'successful-login', 1)";
    $logStmt = $conn->prepare($logSql);
    if ($logStmt) {
        $logStmt->bind_param("s", $username);
        $logStmt->execute();
        $logStmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to log login attempt: ' . $conn->error], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    echo json_encode(['success' => true], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
} else {
        $logSql = "INSERT INTO erp.access_logs (user, log_details, login_status) VALUES (?, 'invalid-login with password: $password ', 0)";
    $logStmt = $conn->prepare($logSql);
    if ($logStmt) {
        $logStmt->bind_param("s", $username);
        $logStmt->execute();
        $logStmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to log login attempt: ' . $conn->error], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
    echo json_encode(['success' => false, 'message' => 'Invalid username or password'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
}

// Clean up resources
$stmt->close();
$conn->close();
?>
<?php
session_start();

// Set session timeout to 5 minutes (300 seconds)
$timeout = 60; 

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout) {
    // Destroy session and redirect to login or timeout page
    session_unset();
    session_destroy();
    header("Location: login.php?timeout=true");
    exit();
}

$_SESSION['LAST_ACTIVITY'] = time(); // Update last activity timestamp
?>
