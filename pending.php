
<?php
// session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutoringdb";
$conn = new mysqli($servername, $username, $password, $dbname);

foreach ($_POST['search'] as $value) {

     $res = "UPDATE courses SET approved='1' WHERE courseID = '$value'";
     $res = mysqli_query($conn, $res);
}

$query = "SELECT * FROM courses WHERE approved = '0'";
$results = $conn->query($query);

?>

