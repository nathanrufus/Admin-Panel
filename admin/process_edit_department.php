<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../includes/db.php';
include '../includes/session_check.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department_id = htmlspecialchars($_POST['department_id']);
    $department_name = htmlspecialchars($_POST['department_name']);

    try {
        $query = "UPDATE departments SET department_name = :department_name WHERE id = :department_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':department_id', $department_id);
        $stmt->bindParam(':department_name', $department_name);

        if ($stmt->execute()) {
            echo "Department updated successfully.";
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
