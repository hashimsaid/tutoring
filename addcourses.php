<html>
    <h2> Request submitted </h2>
    <br> 
    <h4> course has been sent to admin<h4>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutoringdb";
$conn = new mysqli($servername, $username, $password, $dbname);

//variables gotten

$cName=$_POST['courseName'];
$price=$_POST['price'];
$desc=$_POST['desc'];
$picture=$_POST['picture'];
$notapproved = 0;
$query = "INSERT INTO courses (courseName,price,description,picture,approved) 
VALUES ('$cName','$price','$desc','$picture','$notapproved')";
$result = mysqli_query($conn ,$query);

?>

</html>