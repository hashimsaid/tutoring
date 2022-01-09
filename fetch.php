<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab10";

$conn = new mysqli($servername, $username, $password, $dbname);

$output = '';

$sql = "SELECT * FROM user WHERE Name LIKE '%".$_POST['search']."%'";

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
                        <td>'.$row["Name"].'<td>
                        <td>'."<a href=".'/Study/Codes/LiveChat2/message.php?receiver='.$row['ID'].'>'."> Send message </a>";'
                    <tr>
                    </table> 
                    </div>';                
    }

    echo $output;
}else{
    echo 'There is no matching';
}

?>