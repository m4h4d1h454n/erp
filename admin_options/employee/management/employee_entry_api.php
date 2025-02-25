<?php

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize POST data
    $seller = htmlspecialchars(strip_tags($_POST['seller']));
    $user_name = htmlspecialchars(strip_tags($_POST['user_name']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars(strip_tags($_POST['pass']));

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email format.']);
        exit;
    }

    // Hash the password for security
    $hashed_password = md5($password);

    // Include database configuration
    $dbConfig = include '../../../db_config.php';

    // Extract database credentials
    $host = $dbConfig['host'];
    $user = $dbConfig['user'];
    $password = $dbConfig['password'];
    $db = $dbConfig['db'];
    $port = $dbConfig['port'];

    // Establish database connection
    $conn = new mysqli($host, $user, $password, $db, $port);

    // Check connection
    if ($conn->connect_error) {
        echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]);
        exit;
    }

    // Set the character set to utf8mb4
    if (!$conn->set_charset("utf8mb4")) {
        echo json_encode(['status' => 'error', 'message' => 'Error setting character set: ' . $conn->error]);
        exit;
    }

    // Prepare SQL statement
    $sql = $conn->prepare("INSERT INTO users (employee_type, username, password, email, status) VALUES (?, ?, ?, ?, ?)");
    if ($sql === false) {
        echo json_encode(['status' => 'error', 'message' => 'Prepare failed: ' . $conn->error]);
        exit;
    }

    $status = 1; // Assuming '1' represents active

    // Bind parameters
    if (!$sql->bind_param('ssssi', $seller, $user_name, $hashed_password, $email, $status)) {
        echo json_encode(['status' => 'error', 'message' => 'Binding parameters failed: ' . $sql->error]);
        exit;
    }

    // Execute query
    if (!$sql->execute()) {
        echo json_encode(['status' => 'error', 'message' => 'Execution failed: ' . $sql->error]);
        exit;
    }

    // Success response
    echo json_encode(['status' => 'success', 'message' => 'New employee created successfully!']);

    // Close the statement and connection
    $sql->close();
    $conn->close();
    exit;
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit;
}
?>

	<script>
        if (sessionStorage.getItem('authenticated') !== 'true') {
            echo json_encode(['status' => 'error', 'message' => 'You are not authenticated.']);
        }

        function logout() {
            window.location.href = "logout_logger.php";
        }
    </script>