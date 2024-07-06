<?php include('../includes/header.php'); ?>

<div class="content">
    <h2>View Courses</h2>
    <?php
    include('../includes/db.php');

    try {
        $query = "SELECT * FROM courses";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($courses) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Description</th><th>Instructor ID</th><th>Created At</th><th>Actions</th></tr>";
            foreach ($courses as $course) {
                echo "<tr>";
                echo "<td>{$course['id']}</td>";
                echo "<td>{$course['course_name']}</td>";
                echo "<td>{$course['description']}</td>";
                echo "<td>{$course['instructor_id']}</td>";
                echo "<td>{$course['created_at']}</td>";
                echo "<td>";
                echo "<a href='edit_course.php?id={$course['id']}'>Edit</a> | ";
                echo "<a href='delete_course.php?id={$course['id']}' onclick='return confirm(\"Are you sure you want to delete this course?\");'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No courses found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
    ?>
</div>

<?php include('../includes/footer.php'); ?>
