<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutoringdb";

try{
$conn = new mysqli($servername, $username, $password, $dbname);
}

catch(PDOException $e){die($e->getMessage ()); }
?>
