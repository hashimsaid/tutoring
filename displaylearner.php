<html>
<style>
    body {
        background-image: url("pictures/website/backgroundPattern.png");
    }

    .link {
        margin: 50px;
        text-decoration: none;
        background-color: #38968d;
        color: white;
        border-radius: 10%;
        padding: 6px;
        font-weight: bold;
    }

    .link:hover {
        text-decoration: none;
        background-color: #1b6145;
        color: white;
        border-radius: 10%;
        font-weight: bold;
    }

    .box {
        box-shadow: 10px 10px rgba(0, 0, 0, 0.5);
        margin: auto;
        margin-top: 5%;
        margin-bottom: 5%;
        padding: 50px;
        top: 10%;
        background-color: white;
        width: 40%;
        text-align: center;
    }

    #info{
        font-weight: bold;
    }
</style>

<?php
session_start();
include "connectToDb.php";
include "menu.php";

$query = "SELECT * FROM learners Where learnerID ='" . $_GET["id"] . "'";
$result = mysqli_query($conn, $query);
?>

<body>

    <?php $row = mysqli_fetch_array($result); ?>
    <div class="box">
        <img src="<?php echo $row['profilePicture']; ?>" alt="profile picture" width="200px" style="border-radius: 50%;"><br><br>
        <div id="info">
            ID: <?php echo $row["learnerID"] ?><br><br>
            Name: <?php echo $row["Fname"] ?>
            <?php echo $row["Lname"] ?><br><br>
            Email: <?php echo $row["Email"] ?><br><br>
            <a href="selectlearner.php" class="link">Back</a>
        </div>
    </div>

</body>

</html>