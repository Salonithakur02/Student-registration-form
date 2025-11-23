<?php
include "db.php";

$id = $_GET['id'];

$sql = "SELECT * FROM students WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $update = "UPDATE students SET name='$name', email='$email', course='$course' WHERE id=$id";

    if ($conn->query($update) === TRUE) {
        header("Location: index.php?msg=Record updated successfully");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow p-4">
        <h2 class="text-center mb-4">Edit Student</h2>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Student Name</label>
                <input type="text" class="form-control" name="name" value="<?= $row['name']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $row['email']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Course</label>
                <input type="text" class="form-control" name="course" value="<?= $row['course']; ?>" required>
            </div>

            <button name="update" class="btn btn-success w-100">Update</button>
            <a href="index.php" class="btn btn-secondary w-100 mt-2">Back</a>
        </form>
    </div>
</div>
</body>
</html>
