<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include Dompdf autoloader
require '../vendor/autoload.php';
use Dompdf\Dompdf;

include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $report_type = $_POST['report_type'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $format = $_POST['format'];

    $data = [];

    try {
        // Fetch data based on report type
        if ($report_type == 'department_summary') {
            $query = "SELECT * FROM departments WHERE created_at BETWEEN :start_date AND :end_date";
        } elseif ($report_type == 'event_summary') {
            $query = "SELECT * FROM events WHERE event_date BETWEEN :start_date AND :end_date";
        } else {
            throw new Exception("Invalid report type.");
        }

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':end_date', $end_date);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($data)) {
            throw new Exception("No data found for the given criteria.");
        }

        // Generate report based on format
        if ($format == 'pdf') {
            // Generate PDF report
            $dompdf = new Dompdf();
            $html = '<h1>' . ucfirst($report_type) . ' Report</h1>';
            $html .= '<table border="1"><tr>';

            foreach ($data[0] as $key => $value) {
                $html .= '<th>' . $key . '</th>';
            }
            $html .= '</tr>';

            foreach ($data as $row) {
                $html .= '<tr>';
                foreach ($row as $cell) {
                    $html .= '<td>' . $cell . '</td>';
                }
                $html .= '</tr>';
            }
            $html .= '</table>';

            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream(ucfirst($report_type) . '_Report.pdf');
        } elseif ($format == 'excel') {
            // Generate Excel report
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename="' . ucfirst($report_type) . '_Report.xls"');
            
            echo '<table border="1"><tr>';
            foreach ($data[0] as $key => $value) {
                echo '<th>' . $key . '</th>';
            }
            echo '</tr>';
            
            foreach ($data as $row) {
                echo '<tr>';
                foreach ($row as $cell) {
                    echo '<td>' . $cell . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
        } elseif ($format == 'csv') {
            // Generate CSV report
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . ucfirst($report_type) . '_Report.csv"');
            
            $output = fopen('php://output', 'w');
            
            fputcsv($output, array_keys($data[0]));
            foreach ($data as $row) {
                fputcsv($output, $row);
            }
            fclose($output);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
} else {
    echo "Invalid request method.";
}
?>
