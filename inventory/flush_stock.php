<?php
// Database connection parameters
$host = 'localhost'; // Change to your DB host
$dbName = 'erp'; // Replace with your database name
$username = 'erp'; // Replace with your DB username
$password = 'Polin#96';

header('Content-Type: application/json'); // Set response type to JSON

try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Call the stored procedure without parameters
    $stmt = $pdo->prepare("CALL update_end_date()");
    $stmt->execute();

    // Fetch results if the procedure returns a result set
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Construct response
    $response = [
        'status' => 'success',
        'message' => 'ERP Inventory Flushed.',
        'data' => $results
    ];
} catch (PDOException $e) {
    // Handle database errors
    $response = [
        'status' => 'error',
        'message' => 'Database error: ' . $e->getMessage()
    ];
} catch (Exception $e) {
    // Handle other errors
    $response = [
        'status' => 'error',
        'message' => 'Error: ' . $e->getMessage()
    ];
}

// Send JSON response back to the page
echo json_encode($response);
