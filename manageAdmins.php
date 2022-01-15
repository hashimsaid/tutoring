<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-image: url("pictures/website/backgroundPattern.png");
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include "connectToDb.php";
    include "menu.php";

    $sql = "SELECT adminID, Fname, Lname FROM adminstrators";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table'><tr><th class='thead-dark'>ID</th><th>First Name</th><th>Last Name</th><th>Delete</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["adminID"] . "</td><td>" . $row["Fname"] . "</td><td>" . $row["Lname"] . "</td><td><a href=deleteAdmin.php?id=" . $row["adminID"] . ">Delete</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    ?>
    <a href="addAdmin.php">Add adminstrator</a>

</body>

</html>