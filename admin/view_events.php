<?php include '../includes/header.php'; ?>
<h2>Events</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    <?php
    include '../includes/db.php';
    $query = "SELECT * FROM events";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['date']}</td>
                <td>{$row['description']}</td>
                <td>
                    <a href='edit_event.php?id={$row['id']}&name={$row['name']}&date={$row['date']}&description={$row['description']}'>Edit</a>
                    <a href='delete_event.php?id={$row['id']}'>Delete</a>
                </td>
              </tr>";
    }
    ?>
</table>
<?php include '../includes/footer.php'; ?>
