 <?php
    session_start();
    include "connectToDb.php";
    include "menu.php";

    $sql = "DELETE FROM adminstrators WHERE adminID ='" . $_GET['id'] . "'";

    if ($conn->query($sql) === TRUE) {
        header("Location:manageAdmins.php");
    } else {
        header("Location:manageAdmins.php");
        echo "Error deleting record.";
    }

    ?>
