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

    try {
        $query = "SELECT * FROM system_logs";
        $stmt = $conn->query($query);
        $logs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($logs as $row) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['log']}</td>
                    <td>{$row['date']}</td>
                  </tr>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
    ?>
</table>
<?php include '../includes/footer.php'; ?>
