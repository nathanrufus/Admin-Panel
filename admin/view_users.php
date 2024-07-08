<?php
include '../includes/header.php';
// include '../includes/session_check.php';
?>
<h2>View Users</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>
    <?php
    include '../includes/db.php';
    try {
        $query = "SELECT * FROM users";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>{$user['id']}</td>";
            echo "<td>{$user['username']}</td>";
            echo "<td>{$user['role']}</td>";
            echo "<td>
                <a href='edit_user.php?id={$user['id']}'>Edit</a> |
                <a href='delete_user.php?id={$user['id']}'>Delete</a>
                </td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</table>
<?php include '../includes/footer.php'; ?>
