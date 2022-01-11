<?php

include "connectToDb.php";

$learnerID = 0;

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error) {
  exit('Could not connect');
}

$sql ="DELETE FROM cart WHERE courseID='".$_GET["courseID"]."'AND learnerID='".$learnerID."' ";

if ($conn->query($sql) === TRUE) {
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?> 