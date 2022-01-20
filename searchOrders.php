<?php
session_start();
include "connectToDb.php";

$searchFilter = $_POST["type"];

if($searchFilter =="id"){
    $sql = "SELECT DISTINCT orderID,learnerID,total FROM orders WHERE orderID LIKE '%" . $_POST['search'] . "%'";
    $results = $conn->query($sql) or die(mysqli_error($conn));
}
else if($searchFilter =="amount"){
    $sql = "SELECT DISTINCT orderID,learnerID,total FROM orders WHERE total LIKE '%" . $_POST['search'] . "%'";
    $results = $conn->query($sql) or die(mysqli_error($conn));
}
else if($searchFilter =="learnerName"){
    $sql = "SELECT DISTINCT orderID,learnerID,total FROM orders WHERE learnerID IN(Select learnerID from learners WHERE CONCAT(Fname,Lname) LIKE '%" . $_POST['search'] . "%') ";
    $results = $conn->query($sql) or die(mysqli_error($conn));   
}
$cols  = $results->num_rows;
if ($cols < 1) {
    echo '<div class="warning">No results found</div>';
} else { ?>
    <div class="mx-auto" style="width: 75%;">
            <?php while ($row = $results->fetch_array(MYSQLI_ASSOC)) { 
                
                $orderID = $row["orderID"];
                $sql = "SELECT DISTINCT courseID FROM  orders WHERE orderID = '$orderID'";
                $result = $conn->query($sql);
                $coursesCount = 0;
                while ($index = $result->fetch_array(MYSQLI_ASSOC)) { 
                    $coursesCount++;
                }
                
                $learnerID = $row["learnerID"];

                $namesSQL = "SELECT Fname,Lname FROM learners WHERE learnerID = '$learnerID' ";
                $namesResult = $conn->query($namesSQL);
               
                $firstName = "NoName";
                $lastName = "NoName";
                while ($i = $namesResult->fetch_array(MYSQLI_ASSOC)) { 
                   $firstName = $i["Fname"];
                   $lastName = $i["Lname"];
                }
                ?>
                <div class="p-2 row  bg-light position-relative" style="box-shadow: 10px 10px rgba(0, 0, 0, 0.5);">
                    <div class=" p-4 ">
                        <h2>Order ID : <?php echo $row["orderID"]?></h2>
                        <h4>Courses Count : <?php echo $coursesCount?></h4>
                        <br><Br><br>
                        <h5>Ordered By : <?php echo $firstName." ".$lastName?></h5>
                        <div class="d-flex flex-row-reverse">
                        <h5>Total : <?php echo $row["total"]?></h5>
                        </div> 
                </div>

            <?php } ?>


        </div>
    <?php
        }
    ?>
    <style>
        .warning {
            color: red;
            text-align: center;
            font-weight: bold;
        }
    </style>