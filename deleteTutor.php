<?php
    session_start();
    include "connectToDb.php";
    include "menu.php";

    $sql = "DELETE FROM tutors WHERE tutorID ='" . $_GET['id'] . "'";

    if ($conn->query($sql) === TRUE) {
        header("Location:manageTutors.php");
    } else {
        header("Location:manageTutors.php");
        echo "Error deleting record.";
    }

    ?>
