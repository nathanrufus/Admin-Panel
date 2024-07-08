<?php
include('../includes/header.php');
include('../includes/db.php');
include('../includes/session_check.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = htmlspecialchars($_POST['course_id']);
    $course_name = htmlspecialchars($_POST['course_name']);
    $course_description = htmlspecialchars($_POST['course_description']);

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
} else {
    // Fetch course details to prefill the form
    if (isset($_GET['id'])) {
        $course_id = $_GET['id'];
        $query = "SELECT * FROM courses WHERE id = :course_id LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':course_id', $course_id);
        $stmt->execute();
        $course = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$course) {
            echo "Course not found.";
            exit;
        }
    } else {
        echo "No course ID specified.";
        exit;
    }
?>
    <div class="content">
        <h2>Edit Course</h2>
        <form action="edit_course.php" method="POST">
            <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
            <label for="course_name">Course Name:</label>
            <input type="text" id="course_name" name="course_name" value="<?php echo $course['course_name']; ?>" required>

            <label for="course_description">Course Description:</label>
            <textarea id="course_description" name="course_description" required><?php echo $course['description']; ?></textarea>

            <input type="submit" name="submit" value="Edit Course">
        </form>
    </div>
<?php
}
include('../includes/footer.php');
?>
