<?php include('../includes/header.php'); ?>

<div class="content">
    <h2>Edit Course</h2>
    <form action="edit_course.php" method="POST">
        <label for="course_id">Course ID:</label>
        <input type="text" id="course_id" name="course_id" required>
        
        <label for="course_name">Course Name:</label>
        <input type="text" id="course_name" name="course_name" required>
        
        <label for="course_description">Course Description:</label>
        <textarea id="course_description" name="course_description" required></textarea>
        
        <input type="submit" name="submit" value="Edit Course">
    </form>
</div>

<?php include('../includes/footer.php'); ?>

<?php
if (isset($_POST['submit'])) {
    include('../includes/db.php');

    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $course_description = $_POST['course_description'];

    try {
        $query = "UPDATE courses SET course_name = :course_name, description = :course_description WHERE id = :course_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':course_id', $course_id);
        $stmt->bindParam(':course_name', $course_name);
        $stmt->bindParam(':course_description', $course_description);

        if ($stmt->execute()) {
            echo "Course updated successfully.";
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
?>
