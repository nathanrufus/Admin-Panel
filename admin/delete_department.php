<?php
include '../includes/db.php';

if (isset($_GET['id'])) {
    $department_id = $_GET['id'];

    try {
        $query = "DELETE FROM departments WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $department_id);

        if ($stmt->execute()) {
            header("Location: view_departments.php");
            exit();
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
} else {
    echo "Invalid request.";
}
?>
