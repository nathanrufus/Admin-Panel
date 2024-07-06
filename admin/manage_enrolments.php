<?php include('../includes/header.php'); ?>

<div class="content">
    <h2>Manage Enrolments</h2>
    <form action="manage_enrolments.php" method="POST">
        <label for="course_id">Course ID:</label>
        <input type="text" id="course_id" name="course_id" required>
        
        <label for="student_id">Student ID:</label>
        <input type="text" id="student_id" name="student_id" required>
        
        <input type="submit" name="submit" value="Enroll Student">
    </form>
</div>

<?php include('../includes/footer.php'); ?>

<?php
if (isset($_POST['submit'])) {
    include('../includes/db.php');

    $course_id = $_POST['course_id'];
    $student_id = $_POST['student_id'];

    try {
        $query = "INSERT INTO course_enrollments (course_id, student_id) VALUES (:course_id, :student_id)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':course_id', $course_id);
        $stmt->bindParam(':student_id', $student_id);

        if ($stmt->execute()) {
            echo "Student enrolled successfully.";
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
?>
