<?php

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize POST data
    $user_name = htmlspecialchars(strip_tags($_POST['user_name']));
    $password = htmlspecialchars(strip_tags($_POST['pass']));

    // Validate inputs
    if (empty($user_name) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'User name and password are required.']);
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
    $sql = $conn->prepare("UPDATE users SET password=? WHERE username=?;");
    if ($sql === false) {
        echo json_encode(['status' => 'error', 'message' => 'Prepare failed: ' . $conn->error]);
        exit;
    }

    // Bind parameters
    if (!$sql->bind_param('ss', $hashed_password, $user_name)) {
        echo json_encode(['status' => 'error', 'message' => 'Binding parameters failed: ' . $sql->error]);
        exit;
    }

    // Execute query
    if (!$sql->execute()) {
        echo json_encode(['status' => 'error', 'message' => 'Execution failed: ' . $sql->error]);
        exit;
    }

    // Check if any rows were updated
    if ($sql->affected_rows === 0) {
        echo json_encode(['status' => 'error', 'message' => 'No user found or password already up-to-date.']);
    } else {
        echo json_encode(['status' => 'success', 'message' => 'Password updated successfully!']);
    }

    // Close the statement and connection
    $sql->close();
    $conn->close();
    exit;
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit;
}
?>
