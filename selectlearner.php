<html>

<?php
session_start();
include "connectToDb.php";
include "menu.php";
$conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT * FROM learners";
$results = $conn->query($query);
?>
<h1> current learners  </h1>
<body>

<table border = "2">
    <tr>
        <th>Fname</th>
        <th>Lname</th>
        <th>Profile</th>
    </tr>
    <?php while ($row = $results->fetch_array(MYSQLI_ASSOC)) {?> 
        <tr>
             <td><?php echo $row["Fname"]?></td>
             <td><?php echo $row["Lname"]?></td>
             <td><a href = displaylearner.php?id=<?php echo $row["learnerID"] ?>  > View </a> </td>
        </tr>
    <?php } ?>

</table>

</body>

</html>