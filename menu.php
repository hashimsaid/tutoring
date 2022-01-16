<html>

<head>
    <link rel="stylesheet" href="css/main.css">
    <style>
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
            margin: 20px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .dropbtn {
            background-color: #135569;
            color: white;
            font-weight: bold;
            padding: 14px;
            font-size: 20px;
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
            right: 0;
            background-color: #f9f9f9;
            min-width: 200px;
            z-index: 1;
        }

        .dropdown-content a {
            text-align: center;
            color: black;
            margin: 0;
            font-weight: bold;
            font-size: 15px;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #113355;
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
                echo '<a href="selectlearner.php">View learners</a>';
                echo '<a href="searchOrders.php">Search orders</a>';
        ?>
                <div class="dropdown">
                    <button class="dropbtn"><?php echo $_SESSION['FirstName'] . " " . $_SESSION['LastName']; ?></button>
                    <div class="dropdown-content">
                        <a href="manageAdmins.php">Manage adminstrators</a><br>
                        <a href="manageTutors.php">Manage tutors</a><br>
                        <a href="courseapproved.php">Approve Courses</a>
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
                echo '<a href="getmaterials.php">Upload Material</a>';
            ?>
                <div class="dropdown">
                    <button class="dropbtn"><?php echo $_SESSION['FirstName'] . " " . $_SESSION['LastName']; ?></button>
                    <div class="dropdown-content">
                        <a href="signOut.php">Sign Out</a>
                    </div>
                </div>
            <?php
            } else if ($_SESSION['Type'] == 'auditor') {
                echo '<a href="courses.php">My courses</a>';
            ?>
                <div class="dropdown">
                    <button class="dropbtn"><?php echo $_SESSION['FirstName'] . " " . $_SESSION['LastName']; ?></button>
                    <div class="dropdown-content">
                        <a href="signOut.php">Sign Out</a>
                    </div>
                </div>
        <?php
            }
        }
        ?>

    </div>
</body>

</html>