<?php
include '../includes/db.php';
$event_id = $_GET['id'];
$query = "DELETE FROM events WHERE id = $event_id";
mysqli_query($conn, $query);
header("Location: view_events.php");
?>
