<?php include '../includes/header.php'; ?>
<h2>System Logs</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Log</th>
        <th>Date</th>
    </tr>
    <?php
    include '../includes/db.php';
    $query = "SELECT * FROM system_logs";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['log']}</td>
                <td>{$row['date']}</td>
              </tr>";
    }
    ?>
</table>
<?php include '../includes/footer.php'; ?>
