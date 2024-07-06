<?php include '../includes/header.php'; ?>
<h2>Manage Access Control</h2>
<form method="post" action="process_manage_access_control.php">
    <h3>Add New Role</h3>
    <label for="role_name">Role Name:</label>
    <input type="text" id="role_name" name="role_name" required>
    <input type="submit" name="add_role" value="Add Role">

    <h3>Assign Permissions to Role</h3>
    <label for="role_select">Select Role:</label>
    <select id="role_select" name="role_id" required>
        <!-- Populate this with roles from the database -->
        <?php
        include '../includes/db.php';
        try {
            $query = "SELECT * FROM roles";
            $stmt = $conn->query($query);
            $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($roles as $row) {
                echo "<option value='{$row['id']}'>{$row['role_name']}</option>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </select>

    <fieldset>
        <legend>Select Permissions:</legend>
        <input type="checkbox" id="manage_users" name="permissions[]" value="manage_users">
        <label for="manage_users">Manage Users</label><br>
        <input type="checkbox" id="manage_courses" name="permissions[]" value="manage_courses">
        <label for="manage_courses">Manage Courses</label><br>
        <input type="checkbox" id="manage_departments" name="permissions[]" value="manage_departments">
        <label for="manage_departments">Manage Departments</label><br>
        <input type="checkbox" id="manage_events" name="permissions[]" value="manage_events">
        <label for="manage_events">Manage Events</label><br>
        <input type="checkbox" id="view_reports" name="permissions[]" value="view_reports">
        <label for="view_reports">View Reports</label><br>
    </fieldset>
    <input type="submit" name="assign_permissions" value="Assign Permissions">

    <h3>Specify Access Control</h3>
    <label for="section_select">Select Section:</label>
    <select id="section_select" name="section_id" required>
        <option value="user_management">User Management</option>
        <option value="course_management">Course Management</option>
        <option value="department_management">Department Management</option>
        <option value="event_management">Event Management</option>
        <option value="support_management">Support Management</option>
        <option value="settings_configuration">Settings and Configuration</option>
        <option value="reports_analytics">Reports and Analytics</option>
        <option value="communication">Communication</option>
        <option value="security">Security</option>
    </select>

    <label for="access_role_select">Select Role:</label>
    <select id="access_role_select" name="access_role_id" required>
        <!-- Populate this with roles from the database -->
        <?php
        try {
            $query = "SELECT * FROM roles";
            $stmt = $conn->query($query);
            $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($roles as $row) {
                echo "<option value='{$row['id']}'>{$row['role_name']}</option>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </select>
    <input type="submit" name="specify_access" value="Specify Access">
</form>
<?php include '../includes/footer.php'; ?>
