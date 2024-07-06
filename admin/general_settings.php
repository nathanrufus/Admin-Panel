<?php include '../includes/header.php'; ?>
<h2>General Settings</h2>
<form method="post" action="process_general_settings.php">
    <!-- Site Name -->
    <label for="site_name">Site Name:</label>
    <input type="text" id="site_name" name="site_name" placeholder="Enter site name" required>

    <!-- Admin Email -->
    <label for="admin_email">Admin Email:</label>
    <input type="email" id="admin_email" name="admin_email" placeholder="Enter admin email" required>

    <!-- Contact Number -->
    <label for="contact_number">Contact Number:</label>
    <input type="tel" id="contact_number" name="contact_number" placeholder="Enter contact number" required>

    <!-- Timezone -->
    <label for="timezone">Timezone:</label>
    <select id="timezone" name="timezone" required>
        <?php
        $timezones = timezone_identifiers_list();
        foreach ($timezones as $timezone) {
            echo "<option value=\"$timezone\">$timezone</option>";
        }
        ?>
    </select>

    <!-- Maintenance Mode -->
    <label for="maintenance_mode">Maintenance Mode:</label>
    <select id="maintenance_mode" name="maintenance_mode" required>
        <option value="enabled">Enabled</option>
        <option value="disabled">Disabled</option>
    </select>

    <input type="submit" value="Save Settings">
</form>
<?php include '../includes/footer.php'; ?>
