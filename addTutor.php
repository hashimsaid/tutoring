<html>

<head>
    <link rel="stylesheet" href="css/main.css">
    <style>
        .signup {
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
    include "connectToDb.php";
    include "menu.php";
    include "filters.php";
    ?>

    <div class="signup">
        <h2>Add a tutor!</h2>
        <form name="signup" action="" method="post" onsubmit="return validateSignup()">
            <input type="text" name="fname" placeholder="First Name"><br>
            <input type="text" name="lname" placeholder="Last Name"><br>
            <input type="text" name="email" placeholder="Email"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="submit" value="Add" name="signup"><br>
            <a href="manageTutors.php">Back</a>
        </form>
    </div>
    <?php
    if (!empty($_POST['signup'])) {
        if (filterText($_POST['fname']) && filterText($_POST['lname']) && filterText($_POST['password']) && filterEmail($_POST['email'])) {

            $available = true;
            $sql = "Select * from learners where Email ='" . $_POST["email"] . "' ";
            $result = mysqli_query($conn, $sql);
            if ($row = mysqli_fetch_array($result)) {
                echo "Someone else is using that email!";
                $available = false;
            }
            $sql = "Select * from adminstrators where Email ='" . $_POST["email"] . "' ";
            $result = mysqli_query($conn, $sql);
            if ($row = mysqli_fetch_array($result)) {
                echo "Someone else is using that email!";
                $available = false;
            }
            $sql = "Select * from tutors where Email ='" . $_POST["email"] . "' ";
            $result = mysqli_query($conn, $sql);
            if ($row = mysqli_fetch_array($result)) {
                echo "Someone else is using that email!";
                $available = false;
            }
            $sql = "Select * from auditor where Email ='" . $_POST["email"] . "' ";
            $result = mysqli_query($conn, $sql);
            if ($row = mysqli_fetch_array($result)) {
                echo "Someone else is using that email!";
                $available = false;
            }
            if ($available == true) {
                $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $sql = "insert into tutors(Fname,Lname,Email,Password,Type) values('" . $_POST['fname'] . "','" . $_POST['lname'] . "','"  . $_POST['email'] . "','" . $hashed_password . "','tutor')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    header("Location:manageTutors.php");
                } else {
                    echo "error";
                }
            }
        } else {
            echo "Please make sure the email is valid and don't use special characters in names or passwords!";
        }
    }

    ?>
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