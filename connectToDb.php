<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutoringdb";

try{
$conn = new mysqli($servername, $username, $password, $dbname);
}

catch(Exception $e){die($e->getMessage ()); }
?>
