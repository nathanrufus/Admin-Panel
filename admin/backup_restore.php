<?php include '../includes/header.php'; ?>
<h2>Backup and Restore</h2>
<form method="post" action="process_backup_restore.php" enctype="multipart/form-data">
    <!-- Backup Section -->
    <h3>Backup</h3>
    <p>Click the button below to backup the database:</p>
    <input type="submit" name="action" value="Backup">

    <!-- Restore Section -->
    <h3>Restore</h3>
    <p>Select a backup file to restore the database:</p>
    <input type="file" name="backup_file" accept=".sql" required>
    <input type="submit" name="action" value="Restore">
</form>
<?php include '../includes/footer.php'; ?>
