<html>
<style>
    body {
        background-image: url("pictures/website/backgroundPattern.png");
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

<?php
session_start();
include "connectToDb.php";
include "menu.php";
$conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT * FROM learners";
$results = $conn->query($query);
?>

<body>

    <table border="0">
        <tr>
            <th>First Nname</th>
            <th>Last Name</th>
            <th>Profile</th>
        </tr>
        <?php while ($row = $results->fetch_array(MYSQLI_ASSOC)) { ?>
            <tr>
                <td><?php echo $row["Fname"] ?></td>
                <td><?php echo $row["Lname"] ?></td>
                <td><a class="link" href=displaylearner.php?id=<?php echo $row["learnerID"] ?>> View </a> </td>
            </tr>
        <?php } ?>

    </table>

</body>

</html>