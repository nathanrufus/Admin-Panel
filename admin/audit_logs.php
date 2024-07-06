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

    try {
        $query = "SELECT * FROM audit_logs";
        $stmt = $conn->query($query);
        $audit_logs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($audit_logs as $row) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['action']}</td>
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
