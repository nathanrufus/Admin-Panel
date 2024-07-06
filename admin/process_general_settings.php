<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $site_name = $_POST['site_name'];
    $admin_email = $_POST['admin_email'];
    $contact_number = $_POST['contact_number'];
    $timezone = $_POST['timezone'];
    $maintenance_mode = $_POST['maintenance_mode'];

    try {
        // Prepare and bind
        $stmt = $conn->prepare("UPDATE settings SET site_name = :site_name, admin_email = :admin_email, contact_number = :contact_number, timezone = :timezone, maintenance_mode = :maintenance_mode WHERE id = 1");
        $stmt->bindParam(':site_name', $site_name);
        $stmt->bindParam(':admin_email', $admin_email);
        $stmt->bindParam(':contact_number', $contact_number);
        $stmt->bindParam(':timezone', $timezone);
        $stmt->bindParam(':maintenance_mode', $maintenance_mode);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Settings updated successfully";
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
