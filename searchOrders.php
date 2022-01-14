<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <form action="" method="get">
        
    </form>
    <?php
    session_start();
    include "connectToDb.php";
    include "menu.php";

    $query = "SELECT * FROM orders";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        echo $row["orderID"];
        echo " ";
        echo $row["courseID"];
        echo " ";
        echo $row["learnerID"];
        echo '<br>';
    }
    ?>

</body>

</html>