<?php 

include "connectToDb.php";

$learnerID = 0;

$query = "UPDATE selectedCourses SET rating='".$_GET["rating"]."' , review='".$_GET["review"]."' WHERE learnerID='".$learnerID."' AND courseID='".$_GET["courseID"]."'";

if($conn->query($query)){
    
}
else{
    echo "Error updating review";
}

        $query1 = "SELECT * FROM selectedCourses WHERE courseID='".$_GET["courseID"]."' AND rating=1 ";
        $results1 = $conn->query($query1);
        $rating_1 = $results1->num_rows;

        $query2 = "SELECT * FROM selectedCourses WHERE courseID='".$_GET["courseID"]."' AND rating=2 ";
        $results2 = $conn->query($query2);
        $rating_2 = $results2->num_rows;

        $query3 = "SELECT * FROM selectedCourses WHERE courseID='".$_GET["courseID"]."' AND rating=3 ";
        $results3 = $conn->query($query3);
        $rating_3 = $results3->num_rows;

        $query4 = "SELECT * FROM selectedCourses WHERE courseID='".$_GET["courseID"]."' AND  rating=4 ";
        $results4 = $conn->query($query4);
        $rating_4 = $results4->num_rows;

        $query5 = "SELECT * FROM selectedCourses WHERE courseID='".$_GET["courseID"]."' AND rating=5 ";
        $results5 = $conn->query($query5);
        $rating_5 = $results5->num_rows;

        $queryTotal = "SELECT * FROM selectedCourses WHERE courseID='".$_GET["courseID"]."' AND rating IS NOT NULL";
        $totalResults = $conn->query($queryTotal);
        $total = $totalResults->num_rows;
        if($total !== 0){
         $averageRating = (1*$rating_1+2*$rating_2+3*$rating_3+4*$rating_4+5*$rating_5)/$total;
        
         $renewAverage = "UPDATE courses SET averageRating='".$averageRating."' WHERE courseID='".$_GET["courseID"]."'  ";

         if($conn->query($renewAverage)){
            
        }
        else{
            console.log("Error updating average review of course");
        }

        }
?>
<?php
        $query = "SELECT learners.Fname,learners.Lname,rating,review,profilePicture  FROM selectedCourses INNER JOIN learners on selectedCourses.learnerID=learners.learnerID AND selectedCourses.courseID='".$_GET["courseID"]."' AND selectedCourses.rating IS NOT NULL";
        $results = $conn->query($query);
        $output = $results->num_rows;
        if($output===0){
            echo "<h5> No Reviews yet for this course</h5>";
        }
        while ($row = $results->fetch_array(MYSQLI_ASSOC)) {
            ?>
            <div class="card"style="border:none;">
                <div class="d-flex">
            <img class="avatar" style="vertical-align: middle; width: 60px; height: 60px; border-radius: 50%;" src="pictures/profile/<?php echo $row["profilePicture"]?>"> 
        <div>
            <h5 class="pt-2 mx-2"><?php echo $row["Fname"]; echo "  ".$row["Lname"];?></h5>
        <div class="px-3 d-flex">
        <?php 
            $rating = $row["rating"];
           $count = 0;
           while($count<5){
            if($rating > $count){
                ?>
                <span class="fa fa-star checked"style="font-size: 18px;"></span>
                <?php
            }
            else{
                ?><span class="fa fa-star" style="font-size: 18px;"></span>
                <?php
            }
            $count=$count+1;
           } 
           ?>
        </div>
        </div>
        </div>
        <textarea readonly class="form-control m-2"style="overflow: hidden; background-color: #f9f9f9 outline: none; border:none;"> <?php echo $row["review"]?></textarea>
           <hr style="background-color:gold; height:2px">
<?php
        }
        ?>




