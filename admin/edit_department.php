<?php include '../includes/header.php'; ?>
<h2>Edit Department</h2>
<form method="post" action="process_edit_department.php">
    <input type="hidden" name="department_id" value="<?php echo $_GET['id']; ?>">
    <input type="text" name="department_name" value="<?php echo $_GET['name']; ?>" required>
    <input type="submit" value="Edit Department">
</form>
<?php include '../includes/footer.php'; ?>
