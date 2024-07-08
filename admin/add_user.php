<?php include '../includes/header.php'; 
include '../includes/session_check.php';
?>
<h2>Add New User</h2>
<form action="add_user.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="role">Role:</label>
    <select id="role" name="role">
        <option value="student">Student</option>
        <option value="faculty">Faculty</option>
        <option value="staff">Staff</option>
    </select>

    <input type="submit" value="Add User">
</form>
<?php include '../includes/footer.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../includes/db.php';

    $username = htmlspecialchars($_POST['username']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT);
    $role = htmlspecialchars($_POST['role']);

    $query = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
    $stmt = $conn->prepare($query);
    
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':role', $role);

    if ($stmt->execute()) {
        echo "User added successfully.";
    } else {
        echo "Error adding user.";
    }
}
?>
