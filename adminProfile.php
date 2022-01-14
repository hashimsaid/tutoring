<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <?php
    session_start();
    include "connectToDb.php";
    include "menu.php";
    ?>
    <a href="signout.php">Sign out</a><br>
    <a href="manageAdmins.php">Manage adminstrators</a><br>
    <a href="manageTutors.php">Manage tutors</a><br>
    <a href="selectlearner.php">View learners</a><br>
    <a href="searchOrders.php">Search orders</a><br>
</body>

</html>