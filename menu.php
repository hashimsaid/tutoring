<html>

<head>
    <link rel="stylesheet" href="css/main.css">
    <style>
        .dropbtn {
            background-color: #135569;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            color: #000000;
            min-width: 160px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            background-color: white;
            color: red;
            text-decoration: none;
            display: block;
        }

        .dropdown a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #113355;
        }

        * {
            margin: 0;
        }

        .topnav {
            position: absolute;
            top: 10%;
            left: 35%;
        }

        .topnav a {
            color: #f2f2f2;
            padding: 5px;
            text-decoration: none;
            font-size: 20px;
        }

        a {
            margin: 20px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        #menuBar {
            top: 0%;
            width: 100%;
            box-shadow: 0px 15px rgba(10, 8, 8, 0.5);
        }

        #logo {
            margin: 1%;
            position: absolute;
            top: 0%;
            left: 0%;
        }
    </style>
</head>

<body>
    <img src="pictures/website/menuBar.jpeg" id="menuBar">
    <img src="pictures/website/logoWhite.png" id="logo">
    <div class="topnav">
        <a href="home.php">Home</a>
        <?php
        if (empty($_SESSION['ID'])) {
            echo '<a href="courses.php">Available courses</a>';
            echo '<a href="learnerSignup.php">Sign up</a>';
            echo '<a href="login.php">Log in</a>';
        } else {
            if ($_SESSION['Type'] == 'adminstrator') {
                echo '<a href="courses.php">My courses</a>';
        ?>
                <div class="dropdown">
                    <button class="dropbtn"><?php echo $_SESSION['FirstName'] . " " . $_SESSION['LastName']; ?></button>
                    <div class="dropdown-content">
                        <a href="manageAdmins.php">Manage adminstrators</a><br>
                        <a href="manageTutors.php">Manage tutors</a><br>
                        <a href="selectlearner.php">View learners</a><br>
                        <a href="searchOrders.php">Search orders</a><br>
                        <a href="signout.php">Sign out</a><br>
                    </div>
                </div>
            <?php
            } else if ($_SESSION['Type'] == 'learner') {
                echo '<a href="courses.php">Buy Courses</a>';
                echo '<a href="learnerCourses.php">My Courses</a>';
                echo '<a href="UserCart.php">Cart </a>';
                echo '<a href="messages.php">Chat</a>';
            ?>
                <div class="dropdown">
                    <button class="dropbtn"><?php echo $_SESSION['FirstName'] . " " . $_SESSION['LastName']; ?></button>
                    <div class="dropdown-content">
                        <a href="editProfile.php">Edit Profile</a>
                        <a href="signOut.php">Sign Out</a>
                    </div>
                </div>
        <?php
            } else if ($_SESSION['Type'] == 'tutor') {
                echo '<a href="courses.php">My courses</a>';
                echo '<a href="tutorProfile.php" >' . $_SESSION['FirstName'] . ' ' . $_SESSION['LastName'] . '</a>';
            } else if ($_SESSION['Type'] == 'auditor') {
                echo '<a href="courses.php">My courses</a>';
                echo '<a href="auditorProfile.php">' . $_SESSION['FirstName'] . ' ' . $_SESSION['LastName'] . '</a>';
            }
        }
        ?>

    </div>
</body>

</html>