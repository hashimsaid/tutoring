<html>

<head>
    <link rel="stylesheet" href="css/main.css">
    <style>
        .topnav {
            background-color: #333;
            overflow: hidden;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>

<body>
    <img src="pictures/website/logo.png">
    <div class="topnav">
        <a href="home.php">Home</a>
        <?php
        if (empty($_SESSION['ID'])) {
            echo '<a href="courses.php">Available courses</a>';
            echo '<a href="learnerSignup.php" style="float:right;">Sign up</a>';
            echo '<a href="login.php" style="float:right;">Log in</a>';
        } else {
            if ($_SESSION['Type'] == 'adminstrator') {
                echo '<a href="courses.php">My courses</a>';
                echo '<a href="adminProfile.php" style="float:right;">' . $_SESSION['FirstName'] . ' ' . $_SESSION['LastName'] . '</a>';
            } else if ($_SESSION['Type'] == 'learner') {
                echo '<a href="courses.php">Buy Courses</a>';
                echo '<a href="learnerCourses.php">My Courses</a>';
                echo '<a href="UserCart.php">Cart </a>';
                echo '<a href="messages.php">Chat</a>';
                echo '<a href="learnerProfile.php" style="float:right;">' . $_SESSION['FirstName'] . ' ' . $_SESSION['LastName'] . '</a>';
            } else if ($_SESSION['Type'] == 'tutor') {
                echo '<a href="courses.php">My courses</a>';
                echo '<a href="tutorProfile.php" style="float:right;">' . $_SESSION['FirstName'] . ' ' . $_SESSION['LastName'] . '</a>';
            } else if ($_SESSION['Type'] == 'auditor') {
                echo '<a href="courses.php">My courses</a>';
                echo '<a href="auditorProfile.php" style="float:right;">' . $_SESSION['FirstName'] . ' ' . $_SESSION['LastName'] . '</a>';
            }
        }
        ?>
    </div>
</body>

</html>
