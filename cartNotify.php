<?php 
include 'connectToDb.php';
$sql = "SELECT * FROM cart WHERE learnerID = '$_GET[id]' ";
$result = $conn->query($sql);
$check = $result->num_rows;
$coursesCount = 0;

if($check>0){
    while ($index = $result->fetch_array(MYSQLI_ASSOC)) { 
        $coursesCount++;
    }
}

echo $coursesCount;
?>