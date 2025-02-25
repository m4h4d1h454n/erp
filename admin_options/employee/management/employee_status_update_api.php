<?php

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize POST data
    $user_name = htmlspecialchars(strip_tags($_POST['user_name']));
    $status = htmlspecialchars(strip_tags($_POST['status']));

    // Validate inputs
    if (empty($user_name) || $status === '') {
        echo json_encode(['status' => 'error', 'message' => 'User name and status are required.']);
        exit;
    }

    // Ensure the status is either '1' (active) or '0' (inactive)
    if (!in_array($status, ['0', '1'], true)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid status value. Use 1 for active or 0 for inactive.']);
        exit;
    }

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
    $sql = $conn->prepare("UPDATE users SET status=? WHERE username=?;");
    if ($sql === false) {
        echo json_encode(['status' => 'error', 'message' => 'Prepare failed: ' . $conn->error]);
        exit;
    }

    // Bind parameters
    if (!$sql->bind_param('ss', $status, $user_name)) {
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
        echo json_encode(['status' => 'error', 'message' => 'No user found or status already set to the specified value.']);
    } else {
        echo json_encode(['status' => 'success', 'message' => 'Status updated successfully!']);
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
