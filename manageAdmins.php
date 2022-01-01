<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
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
        echo "<table><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Delete</th></tr>";
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