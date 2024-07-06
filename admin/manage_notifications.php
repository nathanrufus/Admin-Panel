<?php include '../includes/header.php'; ?>
<h2>Manage Notifications</h2>
<form method="post" action="process_manage_notifications.php">
    <!-- Notification Type -->
    <label for="notification_type">Notification Type:</label>
    <select id="notification_type" name="notification_type" required>
        <option value="email">Email</option>
        <option value="sms">SMS</option>
        <option value="push">Push Notification</option>
    </select>
    
    <!-- Notification Message -->
    <label for="notification_message">Notification Message:</label>
    <textarea id="notification_message" name="notification_message" placeholder="Enter your notification message" required></textarea>
    
    <!-- Notification Recipient -->
    <label for="recipient_type">Recipient Type:</label>
    <select id="recipient_type" name="recipient_type" required>
        <option value="all_users">All Users</option>
        <option value="specific_users">Specific Users</option>
        <option value="user_roles">User Roles</option>
    </select>
    
    <!-- Specific Users (if selected) -->
    <div id="specific_users_div" style="display:none;">
        <label for="specific_users">Specific Users (comma-separated emails):</label>
        <textarea id="specific_users" name="specific_users" placeholder="Enter emails of specific users"></textarea>
    </div>
    
    <!-- User Roles (if selected) -->
    <div id="user_roles_div" style="display:none;">
        <label for="user_roles">User Roles:</label>
        <select id="user_roles" name="user_roles[]" multiple>
            <option value="student">Student</option>
            <option value="faculty">Faculty</option>
            <option value="staff">Staff</option>
        </select>
    </div>
    
    <input type="submit" value="Save Settings">
</form>

<script>
    document.getElementById('recipient_type').addEventListener('change', function() {
        var recipientType = this.value;
        if (recipientType === 'specific_users') {
            document.getElementById('specific_users_div').style.display = 'block';
            document.getElementById('user_roles_div').style.display = 'none';
        } else if (recipientType === 'user_roles') {
            document.getElementById('specific_users_div').style.display = 'none';
            document.getElementById('user_roles_div').style.display = 'block';
        } else {
            document.getElementById('specific_users_div').style.display = 'none';
            document.getElementById('user_roles_div').style.display = 'none';
        }
    });
</script>
<?php include '../includes/footer.php'; ?>
