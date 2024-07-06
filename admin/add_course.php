<?php include('../includes/header.php');
// include '../includes/session_check.php';
?>


<div class="content">
    <h2>Add Course</h2>
    <form action="add_course.php" method="POST">
        <label for="course_name">Course Name:</label>
        <input type="text" id="course_name" name="course_name" required>
        
        <label for="course_description">Course Description:</label>
        <textarea id="course_description" name="course_description" required></textarea>
        
        <label for="instructor_id">Instructor ID:</label>
        <input type="number" id="instructor_id" name="instructor_id" required>
        
        <input type="submit" name="submit" value="Add Course">
    </form>
</div>

<?php include('../includes/footer.php'); ?>

<?php
if (isset($_POST['submit'])) {
    include('../includes/db.php');

    $course_name = $_POST['course_name'];
    $description = $_POST['course_description'];
    $instructor_id = $_POST['instructor_id'];
    $created_at = date('Y-m-d H:i:s'); // Current timestamp

    try {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO courses (course_name, description, instructor_id, created_at) VALUES (:course_name, :description, :instructor_id, :created_at)");
        $stmt->bindParam(':course_name', $course_name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':instructor_id', $instructor_id);
        $stmt->bindParam(':created_at', $created_at);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Course added successfully.";
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close the connection
    $conn = null;
}
?>
