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
        echo $total;
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




