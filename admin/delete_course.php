<?php
include('../includes/header.php');
include('../includes/db.php');

if (isset($_GET['id'])) {
    $course_id = $_GET['id'];

    try {
        $query = "DELETE FROM courses WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $course_id);

        if ($stmt->execute()) {
            echo "<div class='content'><p>Course deleted successfully.</p></div>";
        } else {
            echo "<div class='content'><p>Error: " . $stmt->errorInfo()[2] . "</p></div>";
        }
    } catch (PDOException $e) {
        echo "<div class='content'><p>Error: " . $e->getMessage() . "</p></div>";
    }

    $conn = null;
} else {
    echo "<div class='content'><p>No course ID provided.</p></div>";
}

include('../includes/footer.php');
?>
