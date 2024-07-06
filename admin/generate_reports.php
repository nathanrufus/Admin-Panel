<?php include '../includes/header.php'; ?>
<h2>Generate Reports</h2>
<form method="post" action="process_generate_reports.php">
    <!-- Report Type -->
    <label for="report_type">Report Type:</label>
    <select id="report_type" name="report_type" required>
        <option value="user_activity">User Activity</option>
        <option value="course_performance">Course Performance</option>
        <option value="department_summary">Department Summary</option>
        <option value="event_summary">Event Summary</option>
    </select>
    
    <!-- Date Range -->
    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date" required>
    
    <label for="end_date">End Date:</label>
    <input type="date" id="end_date" name="end_date" required>
    
    <!-- Format -->
    <label for="format">Report Format:</label>
    <select id="format" name="format" required>
        <option value="pdf">PDF</option>
        <option value="excel">Excel</option>
        <option value="csv">CSV</option>
    </select>
    
    <input type="submit" value="Generate Report">
</form>
<?php include '../includes/footer.php'; ?>
