<!DOCTYPE html>
<html>
<head>
    <title>Add Subject</title>
</head>
<body>
    <h1>Add Subject</h1>

    <form action="save_subject.php" method="POST">
        <label for="subject_code">Subject Code:</label>
        <input type="text" id="subject_code" name="subject_code" required><br><br>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required><br><br>

        <label for="unit">Unit:</label>
        <input type="number" id="unit" name="unit" required><br><br>

        <input type="submit" value="Add Subject">
    </form>
</body>
</html>
