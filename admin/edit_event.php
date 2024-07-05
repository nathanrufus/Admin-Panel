<?php include '../includes/header.php'; ?>
<h2>Edit Event</h2>
<form method="post" action="process_edit_event.php">
    <input type="hidden" name="event_id" value="<?php echo $_GET['id']; ?>">
    <input type="text" name="event_name" value="<?php echo $_GET['name']; ?>" required>
    <input type="text" name="event_date" value="<?php echo $_GET['date']; ?>" required>
    <textarea name="event_description" required><?php echo $_GET['description']; ?></textarea>
    <input type="submit" value="Edit Event">
</form>
<?php include '../includes/footer.php'; ?>
