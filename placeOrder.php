<?php

include "connectToDb.php";
session_start();
$learnerID = $_SESSION["ID"];

if ($conn->connect_error) {
  exit('Could not connect');
}

$unique = false;
$random = 1;

while (!$unique) {
  $random = rand();

  $checkIfFound = "SELECT * FROM orders WHERE orderID='" . $random . "' ";

  $results = $conn->query($checkIfFound);

  $cols = $results->num_rows;

  if ($cols < 1) {
    $unique = true;
  }
}

if ($unique) {
  $query = "SELECT * FROM cart WHERE learnerID='" . $learnerID . "' ";
  $data = $conn->query($query);

  while ($row = $data->fetch_array(MYSQLI_ASSOC)) {

    $sql = "INSERT INTO orders (orderID,courseID,learnerID,total) VALUES ('" . $random . "','" . $row["courseID"] . "','" . $learnerID . "' , '".$_GET["total"]."' )";

    if ($conn->query($sql) === TRUE) {
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $sql2 = "INSERT INTO selectedCourses (courseID,learnerID) VALUES ('" . $row["courseID"] . "','" . $learnerID . "' )";

    if ($conn->query($sql2) === TRUE) {
    } else {
      echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
  }


  $sql3 = "DELETE FROM cart WHERE learnerID='" . $learnerID . "' ";

  if ($conn->query($sql3) === TRUE) {
  } else {
    echo "Error: " . $sql3 . "<br>" . $conn->error;
  }
}
