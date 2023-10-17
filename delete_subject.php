<?php
$servername = "localhost";
$username = 'root';
$password = '';
$dbname = 'subjects_db';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $subjectId = $_GET['id'];

    $sql = "SELECT * FROM subjects WHERE id = $subjectId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $subjectCode = $row["subject_code"];
        $description = $row["description"];
        $unit = $row["unit"];
    } else {
        header("Location: subjects.php");
        exit();
    }
} else {
    header("Location: subjects.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "DELETE FROM subjects WHERE id = $subjectId";
    if ($conn->query($sql) === TRUE) {
        header("Location: subjects.php");
        exit();
    } else {
        echo "Error deleting subject: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Subject</title>
</head>
<body>
    <h1>Delete Subject</h1>

    <p>Are you sure you want to delete the following subject?</p>

    <table>
        <tr>
            <th>Subject Code</th>
            <th>Description</th>
            <th>Unit</th>
        </tr>
        <tr>
            <td><?php echo $subjectCode; ?></td>
            <td><?php echo $description; ?></td>
            <td><?php echo $unit; ?></td>
        </tr>
    </table>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $subjectId; ?>">
        <input type="submit" value="Delete">
    </form>
</body>
</html>
