<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_description = $_POST['event_description'];

    if (empty($event_name) || empty($event_date) || empty($event_description)) {
        echo "All fields are required.";
        exit;
    }

    try {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO events (event_name, event_date, description) VALUES (:event_name, :event_date, :description)");
        $stmt->bindParam(':event_name', $event_name);
        $stmt->bindParam(':event_date', $event_date);
        $stmt->bindParam(':description', $event_description);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New event added successfully";
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
