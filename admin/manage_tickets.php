<?php include '../includes/header.php'; ?>
<h2>Manage Tickets</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php
    include '../includes/db.php';
    $query = "SELECT * FROM tickets";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['title']}</td>
                <td>{$row['status']}</td>
                <td>
                    <a href='respond_ticket.php?id={$row['id']}'>Respond</a>
                    <a href='view_ticket_history.php?id={$row['id']}'>View History</a>
                </td>
              </tr>";
    }
    ?>
</table>
<?php include '../includes/footer.php'; ?>
