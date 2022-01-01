<html>
    <h2> Add courses </h2>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutoringdb";
$conn = new mysqli($servername, $username, $password, $dbname);
$query = INSERT INTO `courses`(`courseID`,`courseName`,`averageRating`,`price`,`description`,`picture`,`approved`) VALUES ('','','','','','','');;
$result = mysqli_query($conn ,$query);
?>

</html>