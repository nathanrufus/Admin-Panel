<?php include '../includes/header.php'; ?>
<h2>Send Emails</h2>
<form method="post" action="process_send_emails.php">
    <input type="text" name="subject" placeholder="Email Subject" required>
    <textarea name="message" placeholder="Email Message" required></textarea>
    <input type="submit" value="Send Email">
</form>
<?php include '../includes/footer.php'; ?>
