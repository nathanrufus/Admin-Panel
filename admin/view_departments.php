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
    $query = "SELECT * FROM departments";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>
                    <a href='edit_department.php?id={$row['id']}&name={$row['name']}'>Edit</a>
                    <a href='delete_department.php?id={$row['id']}'>Delete</a>
                </td>
              </tr>";
    }
    ?>
</table>
<?php include '../includes/footer.php'; ?>
