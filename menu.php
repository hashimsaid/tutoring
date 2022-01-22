<html>

<head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/main.css">
    <style>
        * {
            margin: 0;
        }

        .topnav {
            position: absolute;
            top: 10%;
            left: 30%;
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

        .notification {
        text-decoration: none;
        margin: 15px 26px;
        position: relative;
        display: inline-block;
        border-radius: 2px;
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
                echo '<a href="viewOrders.php">View orders</a>';
                echo '<a href="messages.php">Chat</a>';
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
                include 'connectToDb.php';
                $sql = "SELECT * FROM selectedCourses WHERE learnerID = '$_SESSION[ID]' AND survey=1";
                $result = $conn->query($sql) or die("Error running sql statement");
                $check = $result->num_rows;
                if($check>0){?>
                <a href="surveyList.php" class="position-relative">Survey
                <span class="position-absolute bottom-2 start-100 translate-middle bg-danger  rounded-circle"  style="padding:10px; bottom:10px"></span>
               </a>    
                <?php
                }
                ?>
              <a href="userCart.php" class="position-relative">Cart
                <span id="cartNotification" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">0</span>
               </a>
            <?php
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
                echo '<a href="getcourses.php">Upload Course</a>';
                echo '<a href="viewTutorCourses.php">My Courses</a>';
                echo '<a href="selectSurvey.php">Send Survey</a>';
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
                echo '<a href="auditorComments.php">Chats Review</a>'
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

<script type="text/javascript">

	var timer, delay = 100;
    <?php 
    if($_SESSION['Type'] == 'learner'){
        ?>
	timer = setInterval(function(){
		$.ajax({
		type: "GET",
		url: "cartNotify.php?id=<?php echo $_SESSION["ID"]; ?>",
		dataType: "html",
		success: function(response){
			$("#cartNotification").html(response); 
		}
	});
	},delay);
<?php }
    ?>

</script>

</html>
