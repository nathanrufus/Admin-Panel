<?php include '../includes/header.php'; ?>
<h2>View Analytics</h2>
<form method="post" action="process_view_analytics.php">
    <!-- Analytics Type -->
    <label for="analytics_type">Analytics Type:</label>
    <select id="analytics_type" name="analytics_type" required>
        <option value="department_summary">Department Summary</option>
        <option value="event_summary">Event Summary</option>
    </select>
    
    <!-- Date Range -->
    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date" required>
    
    <label for="end_date">End Date:</label>
    <input type="date" id="end_date" name="end_date" required>
    
    <input type="submit" value="View Analytics">
</form>
<?php include '../includes/footer.php'; ?>
