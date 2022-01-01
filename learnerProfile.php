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
    <img src="<?php echo $_SESSION['profilePicture']; ?>" alt="profile picture" width="200px"><br>
    <a href="signout.php">Sign out</a>
    <a href="editProfile.php">Edit profile</a>
</body>

</html>