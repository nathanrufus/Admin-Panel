<?php
include '../includes/db.php';
$department_id = $_GET['id'];
$query = "DELETE FROM departments WHERE id = $department_id";
mysqli_query($conn, $query);
header("Location: view_departments.php");
?>
