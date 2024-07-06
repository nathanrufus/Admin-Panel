<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $department_name = $_POST['department_name'];

    if (empty($department_name)) {
        echo "Department name is required.";
        exit;
    }

    try {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO departments (department_name) VALUES (:department_name)");
        $stmt->bindParam(':department_name', $department_name);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New department added successfully";
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Error: " . $errorInfo[2];
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close the connection
    $conn = null;
} else {
    echo "Invalid request method.";
}
?>
