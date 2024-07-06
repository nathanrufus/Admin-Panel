<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action == 'Backup') {
        // Backup the database
        $backup_file = '../backups/db_backup_' . date('Y-m-d_H-i-s') . '.sql';
        $command = "mysqldump -u " . DB_USER . " -p'" . DB_PASS . "' " . DB_NAME . " > " . $backup_file;

        system($command, $output);

        if ($output == 0) {
            echo "Database backup created successfully.";
        } else {
            echo "Error creating database backup.";
        }
    } elseif ($action == 'Restore' && isset($_FILES['backup_file'])) {
        // Restore the database
        $backup_file = $_FILES['backup_file']['tmp_name'];

        if (is_uploaded_file($backup_file)) {
            $command = "mysql -u " . DB_USER . " -p'" . DB_PASS . "' " . DB_NAME . " < " . $backup_file;

            system($command, $output);

            if ($output == 0) {
                echo "Database restored successfully.";
            } else {
                echo "Error restoring database.";
            }
        } else {
            echo "Error uploading backup file.";
        }
    } else {
        echo "Invalid action.";
    }
} else {
    echo "Invalid request method.";
}
?>
