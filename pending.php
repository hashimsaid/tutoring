
<?php
// session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutoringdb";
$conn = new mysqli($servername, $username, $password, $dbname);

foreach ($_POST['search'] as $value) {

    //         // $updatePending="update courses set approved='1' where courseID = courseID"; 
    //         // $result2=mysqli_query($conn, $updatePending);   
            $res = "UPDATE courses SET approved='1' WHERE courseID = '$value'";  
            $res = mysqli_query($conn,$res);
    //         // $stmt->bindParam('courseID',$value);
    //         // $stmt->execute();
       }

$query = "SELECT * FROM courses WHERE approved = '0'";
$results = $conn->query($query);

?>

