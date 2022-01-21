<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            background-image: url("pictures/website/backgroundPattern.png");
        }

        .box {
            box-shadow: 10px 10px rgba(0, 0, 0, 0.5);
            margin: auto;
            margin-top: 5%;
            margin-bottom: 5%;
            padding: 50px;
            top: 10%;
            background-color: white;
            width: 40%;
            text-align: center;

        }

        .warning {
            margin-top: 20px;
            color: red;
            font-weight: bold;
        }

        .link {
            margin: 50px;
            text-decoration: none;
            background-color: #38968d;
            color: white;
            border-radius: 10%;
            padding: 6px;
            font-weight: bold;
        }

        .link:hover {
            text-decoration: none;
            background-color: #1b6145;
            color: white;
            border-radius: 10%;
            padding: 6px;
            font-weight: bold;
        }

        table {
            margin: 50px;
            border-collapse: collapse;
            width: 70%;
        }

        td,
        th {
            border: 1px solid black;
            padding: 8px;
        }

        tr {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #38968d;
            color: white;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include "connectToDb.php";
    include "menu.php";

    $sql = "SELECT tutorID, Fname, Lname FROM tutors";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Delete</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["tutorID"] . "</td><td>" . $row["Fname"] . "</td><td>" . $row["Lname"] . "</td><td><a href=deleteTutor.php?id=" . $row["tutorID"] . " class='link'>Delete</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "
        <div class='box'><div class='warning'>0 results</div>";
    }
    ?>
    <a href='addTutor.php' class='link'>Add tutor</a></div>

</body>

</html>