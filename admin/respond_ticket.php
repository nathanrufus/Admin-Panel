<?php include '../includes/header.php'; ?>
<h2>Respond to Ticket</h2>
<form method="post" action="process_respond_ticket.php">
    <input type="hidden" name="ticket_id" value="<?php echo $_GET['id']; ?>">
    <textarea name="response" placeholder="Response" required></textarea>
    <input type="submit" value="Send Response">
</form>
<?php include '../includes/footer.php'; ?>
