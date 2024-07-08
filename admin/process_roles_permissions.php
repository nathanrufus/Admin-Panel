<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $role = $_POST['role'];
    $permissions = isset($_POST['permissions']) ? $_POST['permissions'] : [];

    // Convert permissions array to JSON
    $permissions_json = json_encode($permissions);

    try {
        // Check if the role already exists in the database
        $stmt = $conn->prepare("SELECT COUNT(*) FROM role_permissions WHERE role = :role");
        $stmt->bindParam(':role', $role);
        $stmt->execute();
        $role_exists = $stmt->fetchColumn();

        if ($role_exists) {
            // Update the existing role's permissions
            $stmt = $conn->prepare("UPDATE role_permissions SET permissions = :permissions WHERE role = :role");
        } else {
            // Insert new role with permissions
            $stmt = $conn->prepare("INSERT INTO role_permissions (role, permissions) VALUES (:role, :permissions)");
        }

        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':permissions', $permissions_json);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Role permissions saved successfully.";
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
