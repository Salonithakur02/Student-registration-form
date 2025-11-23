<?php
include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <title>Student Records</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h2>Student Records</h2>
        <a href="create.php" class="btn btn-primary">Add New Student</a>
    </div>

    <?php if(isset($_GET['msg'])): ?>
        <div class="alert alert-success">
            <?= $_GET['msg']; ?>
        </div>
    <?php endif; ?>

    <table class="table table-bordered table-hover shadow">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $sql = "SELECT * FROM students";
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()):
            ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['course']; ?></td>

                <td>
                    <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('Are you sure?');">
                       Delete
                    </a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
