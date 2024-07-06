<?php include '../includes/header.php'; ?>
<h2>Ticket History</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Response</th>
        <th>Date</th>
    </tr>
    <?php
    include '../includes/db.php';
    $ticket_id = $_GET['id'];

    try {
        $query = "SELECT * FROM ticket_responses WHERE ticket_id = :ticket_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':ticket_id', $ticket_id, PDO::PARAM_INT);
        $stmt->execute();
        $responses = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($responses as $row) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['response']}</td>
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
