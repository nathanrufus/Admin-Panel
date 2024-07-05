<?php include '../includes/header.php'; ?>
<h2>Audit Logs</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Action</th>
        <th>Date</th>
    </tr>
    <?php
    include '../includes/db.php';
    $query = "SELECT * FROM audit_logs";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['action']}</td>
                <td>{$row['date']}</td>
              </tr>";
    }
    ?>
</table>
<?php include '../includes/footer.php'; ?>
