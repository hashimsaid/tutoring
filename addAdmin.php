<html>

<head>
    <link rel="stylesheet" href="css/main.css">
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
            width: 35%;
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
        <h2>Add an admin!</h2><br>
        <form name="signup" action="" method="post" onsubmit="return validateSignup()">
            <input type="text" name="fname" placeholder="First Name"><br>
            <input type="text" name="lname" placeholder="Last Name"><br>
            <input type="text" name="email" placeholder="Email"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="submit" value="Add admin" name="signup"><br>
        </form>

        <?php
        if (!empty($_POST['signup'])) {
            if (filterText($_POST['fname']) && filterText($_POST['lname']) && filterText($_POST['password']) && filterEmail($_POST['email'])) {
                $available = true;
                $sql = "Select * from learners where Email ='" . $_POST["email"] . "' ";
                $result = mysqli_query($conn, $sql);
                if ($row = mysqli_fetch_array($result)) {
                    echo "<div class='warning'><br>Someone else is using that email!</div>";
                    $available = false;
                }
                $sql = "Select * from adminstrators where Email ='" . $_POST["email"] . "' ";
                $result = mysqli_query($conn, $sql);
                if ($row = mysqli_fetch_array($result)) {
                    echo "<div class='warning'><br>Someone else is using that email!</div>";
                    $available = false;
                }
                $sql = "Select * from tutors where Email ='" . $_POST["email"] . "' ";
                $result = mysqli_query($conn, $sql);
                if ($row = mysqli_fetch_array($result)) {
                    echo "<div class='warning'><br>Someone else is using that email!</div>";
                    $available = false;
                }
                $sql = "Select * from auditor where Email ='" . $_POST["email"] . "' ";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<div class='warning'><br>Someone else is using that email!</div>";
                    $available = false;
                }
                if ($available == true) {
                    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $sql = "insert into adminstrators(Fname,Lname,Email,Password,Type) values('" . $_POST['fname'] . "','" . $_POST['lname'] . "','"  . $_POST['email'] . "','" . $hashed_password . "','adminstrator'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        header("Location:manageAdmins.php");
                    } else {
                        echo "<div class='warning'><br>Error inserting into database!</div>";
                    }
                }
            } else {
                echo "<div class='warning'><br>Please make sure the email is valid and don't use special characters in the password!</div>";
            }
        }

        ?>
    </div>
    <script>
        function validateSignup() {
            let x = "";
            if (document.forms["signup"]["fname"].value == "") {
                x += "First Name must be filled out!\n";
            }
            if (document.forms["signup"]["lname"].value == "") {
                x += "Last Name must be filled out!\n";
            }
            if (document.forms["signup"]["email"].value == "") {
                x += "Email must be filled out!\n";
            }
            if (document.forms["signup"]["password"].value == "") {
                x += "Password must be filled out!";
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