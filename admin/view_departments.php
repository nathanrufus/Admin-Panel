<?php include '../includes/header.php'; ?>
<h2>Departments</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    <?php
    include '../includes/db.php';

    try {
        $query = "SELECT * FROM departments";
        $stmt = $conn->query($query);
        $departments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($departments as $row) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['department_name']}</td>
                    <td>
                        <a href='edit_department.php?id={$row['id']}&name={$row['department_name']}'>Edit</a>
                        <a href='delete_department.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this department?\");'>Delete</a>
                    </td>
                  </tr>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
    ?>
</table>
<?php include '../includes/footer.php'; ?>
