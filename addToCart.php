<?php

include "connectToDb.php";
session_start();
$learnerID = $_SESSION["ID"];
$courseID = $_GET["courseID"];


  $sql = "INSERT INTO cart(courseID, learnerID) VALUES ('" . $_GET["courseID"] . "','" . $learnerID . "' )";
  echo "Added";
if ($conn->query($sql) === TRUE) {
} else {
  die("Error inserting to database");
}

?>
