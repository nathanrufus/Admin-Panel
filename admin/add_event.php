<?php include '../includes/header.php'; ?>
<h2>Add Event</h2>
<form method="post" action="process_add_event.php">
    <input type="text" name="event_name" placeholder="Event Name" required>
    <input type="text" name="event_date" placeholder="Event Date (YYYY-MM-DD)" required>
    <textarea name="event_description" placeholder="Event Description" required></textarea>
    <input type="submit" value="Add Event">
</form>
<?php include '../includes/footer.php'; ?>
