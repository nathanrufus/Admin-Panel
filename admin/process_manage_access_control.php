<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_role'])) {
        // Add a new role
        $role_name = $_POST['role_name'];

        if (empty($role_name)) {
            echo "Role name is required.";
            exit;
        }

        try {
            $stmt = $conn->prepare("INSERT INTO roles (role_name) VALUES (:role_name)");
            $stmt->bindParam(':role_name', $role_name);
            if ($stmt->execute()) {
                echo "New role added successfully";
            } else {
                $errorInfo = $stmt->errorInfo();
                echo "Error: " . $errorInfo[2];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } elseif (isset($_POST['assign_permissions'])) {
        // Assign permissions to a role
        $role_id = $_POST['role_id'];
        $permissions = $_POST['permissions'];

        if (empty($role_id) || empty($permissions)) {
            echo "Role and permissions are required.";
            exit;
        }

        try {
            $stmt = $conn->prepare("DELETE FROM role_permissions WHERE role_id = :role_id");
            $stmt->bindParam(':role_id', $role_id);
            $stmt->execute();

            foreach ($permissions as $permission) {
                $stmt = $conn->prepare("INSERT INTO role_permissions (role_id, permission) VALUES (:role_id, :permission)");
                $stmt->bindParam(':role_id', $role_id);
                $stmt->bindParam(':permission', $permission);
                $stmt->execute();
            }

            echo "Permissions assigned successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } elseif (isset($_POST['specify_access'])) {
        // Specify access control for a role
        $section_id = $_POST['section_id'];
        $access_role_id = $_POST['access_role_id'];

        if (empty($section_id) || empty($access_role_id)) {
            echo "Section and role are required.";
            exit;
        }

        try {
            $stmt = $conn->prepare("INSERT INTO access_control (section_id, role_id) VALUES (:section_id, :role_id)");
            $stmt->bindParam(':section_id', $section_id);
            $stmt->bindParam(':role_id', $access_role_id);
            if ($stmt->execute()) {
                echo "Access control specified successfully";
            } else {
                $errorInfo = $stmt->errorInfo();
                echo "Error: " . $errorInfo[2];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Close the connection
    $conn = null;
} else {
    echo "Invalid request method.";
}
?>
