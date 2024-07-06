<?php include('../includes/header.php'); ?>

<div class="content">
    <h2>Assign Instructors to Courses</h2>
    <form action="assign_instructors.php" method="POST">
        <label for="course_id">Course ID:</label>
        <input type="text" id="course_id" name="course_id" required>
        
        <label for="instructor_id">Instructor ID:</label>
        <input type="text" id="instructor_id" name="instructor_id" required>
        
        <input type="submit" name="submit" value="Assign Instructor">
    </form>
</div>

<?php include('../includes/footer.php'); ?>

<?php
if (isset($_POST['submit'])) {
    include('../includes/db.php');

    $course_id = $_POST['course_id'];
    $instructor_id = $_POST['instructor_id'];

    try {
        $query = "INSERT INTO course_instructors (course_id, instructor_id) VALUES (:course_id, :instructor_id)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':course_id', $course_id);
        $stmt->bindParam(':instructor_id', $instructor_id);

        if ($stmt->execute()) {
            echo "Instructor assigned successfully.";
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
?>
