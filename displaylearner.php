<html>
    <h1>learner profile</h1>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutoringdb";
$conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT * FROM learners Where learnerID ='".$_GET["id"]."'";
$result = mysqli_query($conn ,$query);
?>
<body>

<table border = "2">
    <tr>
        <th>ID</th>
        <th>Fname</th>
        <th>Lname</th>
        <th>Email</th>
        <th>Password</th>

    </tr>
    <?php while ($row = mysqli_fetch_array($result)) {?> 
        <tr>
             <td><?php echo $row["learnerID"]?></td>
             <td><?php echo $row["Fname"]?></td>
             <td><?php echo $row["Lname"]?></td>
             <td><?php echo $row["Email"] ?></td>
             <td><?php echo $row["Password"] ?></td>
        </tr>
    <?php } ?>

</table>

</body>