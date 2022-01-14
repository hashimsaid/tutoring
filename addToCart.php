<?php

include "connectToDb.php";
session_start();
$learnerID = $_SESSION["ID"];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  exit('Could not connect');
}

$sql = "INSERT INTO cart(courseID, learnerID) VALUES ('" . $_GET["courseID"] . "','" . $learnerID . "' )";

if ($conn->query($sql) === TRUE) {
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
