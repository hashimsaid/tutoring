<html>

<head>
    <link rel="stylesheet" href="css/main.css">
    <style>
        .login {
            display: flex;
            margin-top: 30px;
            flex-direction: column;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include "menu.php";
    include "connectToDb.php";
    include "filters.php";
    ?>
    <div class="login">
        <h2>Log in to your account!</h2>
        <form action="" name="signup" method="post" onsubmit="return validateLogin()">
            <input type="text" name="email" placeholder="Email"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="submit" name="login" value="Log in"><br>
            Don't have an account? <a href="learnerSignup.php">Sign up!</a>
        </form>
    </div>
    <?php
    if (isset($_POST['login'])) {
        if (filterText($_POST['password']) && filterEmail($_POST['email'])) {
            $sql = "Select * from learners where Email ='" . $_POST["email"] . "' and Password='" . $_POST["password"] . "'";
            $result = mysqli_query($conn, $sql);
            if ($row = mysqli_fetch_array($result)) {
                $_SESSION["ID"] = $row[0];
                $_SESSION["FirstName"] = $row["Fname"];
                $_SESSION["LastName"] = $row["Lname"];
                $_SESSION["Email"] = $row["Email"];
                $_SESSION["Password"] = $row["Password"];
                $_SESSION["Type"] = $row["Type"];
                $_SESSION["profilePicture"] = $row["profilePicture"];
                header("Location:learnerProfile.php");
            } else {
                $sql = "Select * from adminstrators where Email ='" . $_POST["email"] . "' and Password='" . $_POST["password"] . "'";
                $result = mysqli_query($conn, $sql);
                if ($row = mysqli_fetch_array($result)) {
                    $_SESSION["ID"] = $row[0];
                    $_SESSION["FirstName"] = $row["Fname"];
                    $_SESSION["LastName"] = $row["Lname"];
                    $_SESSION["Email"] = $row["Email"];
                    $_SESSION["Password"] = $row["Password"];
                    $_SESSION["Type"] = $row["Type"];
                    header("Location:adminProfile.php");
                } else {
                    $sql = "Select * from tutors where Email ='" . $_POST["email"] . "' and Password='" . $_POST["password"] . "'";
                    $result = mysqli_query($conn, $sql);
                    if ($row = mysqli_fetch_array($result)) {
                        $_SESSION["ID"] = $row[0];
                        $_SESSION["FirstName"] = $row["Fname"];
                        $_SESSION["LastName"] = $row["Lname"];
                        $_SESSION["Email"] = $row["Email"];
                        $_SESSION["Password"] = $row["Password"];
                        $_SESSION["Type"] = $row["Type"];
                        header("Location:tutorProfile.php");
                    } else {
                        $sql = "Select * from auditor where Email ='" . $_POST["email"] . "' and Password='" . $_POST["password"] . "'";
                        $result = mysqli_query($conn, $sql);
                        if ($row = mysqli_fetch_array($result)) {
                            $_SESSION["ID"] = $row[0];
                            $_SESSION["FirstName"] = $row["Fname"];
                            $_SESSION["LastName"] = $row["Lname"];
                            $_SESSION["Email"] = $row["Email"];
                            $_SESSION["Password"] = $row["Password"];
                            $_SESSION["Type"] = $row["Type"];
                            header("Location:auditorProfile.php");
                        } else {
                            echo "Invalid email or password!";
                        }
                    }
                }
            }
        }else {
            echo "Please make sure the email is valid and don't use special characters in the password!";
        }
    }
    ?>
    <script>
        function validateLogin() {
            let x = "";
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