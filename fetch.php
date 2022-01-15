<?php

include 'connectToDb.php';

$output = '';

$sql = "SELECT * FROM learners WHERE Fname LIKE '%".$_POST['search']."%'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

   $output.= '<h4> Search Result </h4>';
   $output.= '<div class="table-responsive">
                <table class="table table bordered">
                    <tr>
                        <th> Name <th>
                        <th> Send <th>
                    <tr>';

    while($row = mysqli_fetch_array($result)){

        $output.= '<tr>
                        <td>'.$row["Fname"].'<td>
                        <td>'."<a href=".'message.php?receiver='.$row[0].'>'."> Send message </a>";'
                    <tr>
                    </table> 
                    </div>';                
    }

    echo $output;
}else{
    echo 'There is no matching';
}

?>