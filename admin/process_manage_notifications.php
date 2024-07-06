<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $notification_type = $_POST['notification_type'];
    $notification_message = $_POST['notification_message'];
    $recipient_type = $_POST['recipient_type'];
    
    $recipients = [];

    if ($recipient_type == 'all_users') {
        $query = "SELECT email FROM users";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $recipients[] = $row['email'];
        }
    } elseif ($recipient_type == 'specific_users') {
        $specific_users = explode(',', $_POST['specific_users']);
        foreach ($specific_users as $user) {
            $recipients[] = trim($user);
        }
    } elseif ($recipient_type == 'user_roles') {
        $user_roles = $_POST['user_roles'];
        foreach ($user_roles as $role) {
            $query = "SELECT email FROM users WHERE role = '$role'";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $recipients[] = $row['email'];
            }
        }
    }

    if ($notification_type == 'email') {
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'your_email@example.com';
            $mail->Password = 'your_email_password';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('your_email@example.com', 'Admin Panel');

            foreach ($recipients as $email) {
                $mail->addAddress($email);
            }

            $mail->isHTML(true);
            $mail->Subject = 'Notification';
            $mail->Body = $notification_message;

            $mail->send();
            echo "Emails have been sent successfully.";
        } catch (Exception $e) {
            echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    // Handle other notification types (SMS, Push Notification) here

    mysqli_close($conn);
} else {
    echo "Invalid request method.";
}
?>
