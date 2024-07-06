<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ticket_id = $_POST['ticket_id'];
    $response = $_POST['response'];

    if (empty($ticket_id) || empty($response)) {
        echo "Ticket ID and response are required.";
        exit;
    }

    try {
        // Insert the response into the ticket_responses table
        $stmt = $conn->prepare("INSERT INTO ticket_responses (ticket_id, response) VALUES (:ticket_id, :response)");
        $stmt->bindParam(':ticket_id', $ticket_id, PDO::PARAM_INT);
        $stmt->bindParam(':response', $response, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            echo "Response sent successfully.";
            // Redirect to the ticket history page for this ticket
            header("Location: view_ticket_history.php?id=" . $ticket_id);
            exit;
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Error: " . $errorInfo[2];
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
