<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../includes/db.php';
include '../includes/session_check.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_id = htmlspecialchars($_POST['event_id']);
    $event_name = htmlspecialchars($_POST['event_name']);
    $event_date = htmlspecialchars($_POST['event_date']);
    $event_description = htmlspecialchars($_POST['event_description']);

    try {
        $query = "UPDATE events SET event_name = :event_name, event_date = :event_date, description = :event_description WHERE id = :event_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':event_id', $event_id);
        $stmt->bindParam(':event_name', $event_name);
        $stmt->bindParam(':event_date', $event_date);
        $stmt->bindParam(':event_description', $event_description);

        if ($stmt->execute()) {
            echo "Event updated successfully.";
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
} else {
    echo "Invalid request method.";
}
?>
