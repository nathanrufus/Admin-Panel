<?php include '../includes/header.php'; ?>
<h2>User Roles and Permissions</h2>
<form method="post" action="process_roles_permissions.php">
    <!-- User Role -->
    <label for="role">Role:</label>
    <select id="role" name="role" required>
        <option value="admin">Admin</option>
        <option value="faculty">Faculty</option>
        <option value="student">Student</option>
        <option value="staff">Staff</option>
    </select>

    <!-- Permissions -->
    <fieldset>
        <legend>Permissions:</legend>
        <label><input type="checkbox" name="permissions[]" value="add_user"> Add User</label><br>
        <label><input type="checkbox" name="permissions[]" value="edit_user"> Edit User</label><br>
        <label><input type="checkbox" name="permissions[]" value="delete_user"> Delete User</label><br>
        <label><input type="checkbox" name="permissions[]" value="view_user_profiles"> View User Profiles</label><br>
        <label><input type="checkbox" name="permissions[]" value="add_course"> Add Course</label><br>
        <label><input type="checkbox" name="permissions[]" value="edit_course"> Edit Course</label><br>
        <label><input type="checkbox" name="permissions[]" value="delete_course"> Delete Course</label><br>
        <label><input type="checkbox" name="permissions[]" value="view_courses"> View Courses</label><br>
        <label><input type="checkbox" name="permissions[]" value="assign_instructors"> Assign Instructors</label><br>
        <label><input type="checkbox" name="permissions[]" value="manage_enrolments"> Manage Enrolments</label><br>
        <label><input type="checkbox" name="permissions[]" value="add_department"> Add Department</label><br>
        <label><input type="checkbox" name="permissions[]" value="edit_department"> Edit Department</label><br>
        <label><input type="checkbox" name="permissions[]" value="delete_department"> Delete Department</label><br>
        <label><input type="checkbox" name="permissions[]" value="view_departments"> View Departments</label><br>
        <label><input type="checkbox" name="permissions[]" value="add_event"> Add Event</label><br>
        <label><input type="checkbox" name="permissions[]" value="edit_event"> Edit Event</label><br>
        <label><input type="checkbox" name="permissions[]" value="delete_event"> Delete Event</label><br>
        <label><input type="checkbox" name="permissions[]" value="view_events"> View Events</label><br>
        <label><input type="checkbox" name="permissions[]" value="manage_tickets"> Manage Tickets</label><br>
        <label><input type="checkbox" name="permissions[]" value="respond_tickets"> Respond to Tickets</label><br>
        <label><input type="checkbox" name="permissions[]" value="view_ticket_history"> View Ticket History</label><br>
        <label><input type="checkbox" name="permissions[]" value="general_settings"> General Settings</label><br>
        <label><input type="checkbox" name="permissions[]" value="backup_restore"> Backup & Restore</label><br>
        <label><input type="checkbox" name="permissions[]" value="system_logs"> System Logs</label><br>
        <label><input type="checkbox" name="permissions[]" value="generate_reports"> Generate Reports</label><br>
        <label><input type="checkbox" name="permissions[]" value="view_analytics"> View Analytics</label><br>
        <label><input type="checkbox" name="permissions[]" value="send_emails"> Send Emails</label><br>
        <label><input type="checkbox" name="permissions[]" value="manage_notifications"> Manage Notifications</label><br>
        <label><input type="checkbox" name="permissions[]" value="manage_access_control"> Manage Access Control</label><br>
        <label><input type="checkbox" name="permissions[]" value="audit_logs"> Audit Logs</label><br>
    </fieldset>

    <input type="submit" value="Save Settings">
</form>
<?php include '../includes/footer.php'; ?>
