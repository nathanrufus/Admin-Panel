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

    try {
        $query = "SELECT * FROM events";
        $stmt = $conn->query($query);
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($events as $row) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['event_name']}</td>
                    <td>{$row['event_date']}</td>
                    <td>{$row['description']}</td>
                    <td>
                        <a href='edit_event.php?id={$row['id']}&name={$row['event_name']}&date={$row['event_date']}&description={$row['description']}'>Edit</a>
                        <a href='delete_event.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this event?\");'>Delete</a>
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
