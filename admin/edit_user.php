<?php
include '../includes/header.php';
include '../includes/db.php';
include '../includes/session_check.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = htmlspecialchars($_POST['id']);
    $username = htmlspecialchars($_POST['username']);
    $role = htmlspecialchars($_POST['role']);

    $query = "UPDATE users SET username = :username, role = :role WHERE id = :id";
    $stmt = $conn->prepare($query);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':role', $role);

    if ($stmt->execute()) {
        echo "User updated successfully.";
    } else {
        echo "Error updating user.";
    }
} else {
    // Fetch user details to prefill the form
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM users WHERE id = :id LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            echo "User not found.";
            exit;
        }
    } else {
        echo "No user ID specified.";
        exit;
    }
?>
    <h2>Edit User</h2>
    <form action="edit_user.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>

        <label for="role">Role:</label>
        <select id="role" name="role">
            <option value="student" <?php if ($user['role'] == 'student') echo 'selected'; ?>>Student</option>
            <option value="faculty" <?php if ($user['role'] == 'faculty') echo 'selected'; ?>>Faculty</option>
            <option value="staff" <?php if ($user['role'] == 'staff') echo 'selected'; ?>>Staff</option>
        </select>

        <input type="submit" value="Update User">
    </form>
<?php
}
include '../includes/footer.php';
?>
