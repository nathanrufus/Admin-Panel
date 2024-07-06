<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $analytics_type = $_POST['analytics_type'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $data = [];

    try {
        // Fetch data based on analytics type
        if ($analytics_type == 'user_activity') {
            $query = "SELECT * FROM users WHERE date BETWEEN :start_date AND :end_date";
        } elseif ($analytics_type == 'course_performance') {
            $query = "SELECT * FROM courses WHERE date BETWEEN :start_date AND :end_date";
        } elseif ($analytics_type == 'department_summary') {
            $query = "SELECT * FROM departments WHERE created_at BETWEEN :start_date AND :end_date";
        } elseif ($analytics_type == 'event_summary') {
            $query = "SELECT * FROM events WHERE event_date BETWEEN :start_date AND :end_date";
        } elseif ($analytics_type == 'login_statistics') {
            $query = "SELECT * FROM admins WHERE login_date BETWEEN :start_date AND :end_date";
        }

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':end_date', $end_date);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<h2>" . ucfirst(str_replace('_', ' ', $analytics_type)) . " Analytics</h2>";
        if (!empty($data)) {
            echo "<table border='1'>";
            echo "<tr>";
            foreach ($data[0] as $key => $value) {
                echo "<th>$key</th>";
            }
            echo "</tr>";

            foreach ($data as $row) {
                echo "<tr>";
                foreach ($row as $cell) {
                    echo "<td>$cell</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No data found for the selected criteria.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close the connection
    $conn = null;
} else {
    echo "Invalid request method.";
}
?>
