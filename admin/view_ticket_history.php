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
    $query = "SELECT * FROM ticket_responses WHERE ticket_id = $ticket_id";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['response']}</td>
                <td>{$row['date']}</td>
              </tr>";
    }
    ?>
</table>
<?php include '../includes/footer.php'; ?>
