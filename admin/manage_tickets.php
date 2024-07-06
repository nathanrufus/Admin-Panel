<?php include '../includes/header.php'; ?>
<h2>Manage Tickets</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Status</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>
    <?php
    include '../includes/db.php';

    try {
        $query = "SELECT * FROM tickets";
        $stmt = $conn->query($query);
        $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tickets as $row) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['subject']}</td>
                    <td>{$row['message']}</td>
                    <td>{$row['status']}</td>
                    <td>{$row['created_at']}</td>
                    <td>
                        <a href='respond_ticket.php?id={$row['id']}'>Respond</a>
                        <a href='view_ticket_history.php?id={$row['id']}'>View History</a>
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
