<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            background-image: url("pictures/website/backgroundPattern.png");
        }

        .warning {
            color: red;
            text-align: center;
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
    </style>
</head>

<body>
    <?php
    session_start();
    include "connectToDb.php";
    include "menu.php";
    include "filters.php";
    ?>
    <div class="box">
        <img src="<?php echo $_SESSION['profilePicture']; ?>" alt="profile picture" width="200px" style="border-radius: 50%;"><br>
        <form action="" method="post" onsubmit="return validateEdit()" name="edit" enctype="multipart/form-data">
            <input type="file" name="profile" value="default.png"><br>
            <input type="text" name="fname" placeholder=" <?php echo $_SESSION['FirstName']; ?>"><br>
            <input type="text" name="lname" placeholder=" <?php echo $_SESSION['LastName']; ?>"><br>
            <input type="submit" value="Edit" name="edit">
        </form>

        <?php
        if (isset($_POST['edit'])) {
            $target_dir = "pictures/profile/";
            $target_file = $target_dir . basename($_FILES['profile']['name']);
            $tmp_name = $_FILES['profile']['tmp_name'];
            $name = basename($_FILES['profile']['name']);
            if ($_FILES['profile']['size'] == 0 && $_FILES['profile']['error'] == 0) {
                $target_file = $_SESSION["profilePicture"];
            }
            if ($_FILES['profile']['type'] == "image/jpeg" || $_FILES['profile']['type'] == "image/jpg" || $_FILES['profile']['type'] == "image/png") {
                move_uploaded_file($tmp_name, "$target_dir/$name");
            } else {
                $target_file = $_SESSION["profilePicture"];
            }



            if (filterText($_POST['fname']) && filterText($_POST['lname'])) {
                $sql = "update learners set Fname ='" . $_POST["fname"] . "', Lname='" . $_POST["lname"] . "', profilePicture='" . $target_file . "' where learnerID='" . $_SESSION['ID'] . "'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $_SESSION["FirstName"] = $_POST['fname'];
                    $_SESSION["LastName"] =  $_POST['lname'];
                    $_SESSION["profilePicture"] = $target_file;
                    echo "<script>window.location.href='home.php';</script>";
                }
            } else {
                echo "<div class='warning'><br>Please don't use special characters in names!</div>";
            }
        }
        ?>
    </div>
    <script>
        function validateEdit() {
            let x = "";
            if (document.forms["edit"]["fname"].value == "") {
                x += "First name must be filled out!\n";
            }
            if (document.forms["edit"]["lname"].value == "") {
                x += "Last Name must be filled out!";
            }
            if (x == "") {
                return true;
            } else {
                alert(x);
                return false;
            }
        }
    </script>
</body>

</html>