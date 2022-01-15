<html>
    <h2> Materials added </h2>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutoringdb";
$conn = new mysqli($servername, $username, $password, $dbname);

$path= $_POST['path'];
$cID = $_POST['courseID'];

$query = "INSERT INTO materials (courseID,materialPath) VALUES ('$cID','$path')";
$result = mysqli_query($conn ,$query);

?>

</html>
