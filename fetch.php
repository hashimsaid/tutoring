<style>
    #no-match{
        font-weight: bold;
        color: red;
        
    }

    .box {
            box-shadow: 10px 10px rgba(0, 0, 0, 0.5);
            margin-top: 5%;
            margin-bottom: 5%;
            padding: 30px;
            top: 10%;
            background-color: white;
            width: 50%;
        }

        #send{
		text-decoration: none;
		background-color: #38968d;
		color: white;
		border-radius: 10%;
		padding: 6px;
		font-weight: bold;
	   }

       #table1 {
        border-collapse: separate;
        border-spacing: 15px
        
    }

 
</style>
<?php
session_start();
include 'connectToDb.php';

$output = '';

$sql = "SELECT * FROM adminstrators WHERE Fname LIKE '%" . $_POST['search'] . "%'";
$sql2 = "SELECT * FROM learners WHERE Fname LIKE '%" . $_POST['search'] . "%'";

if($_SESSION['Type']=='learner'){
    $result = mysqli_query($conn, $sql);
}else{
    $result = mysqli_query($conn, $sql2);
}


if (mysqli_num_rows($result) > 0) {

    $output .= '<div class="box"><h4> Search Result </h4>';
    $output .= '<div class="table">
                <table id="table1" class="table table bordered">
                    <tr>
                        <th><th>
                        <th><th>
                    </tr>';

    while ($row = mysqli_fetch_array($result)) {

        $output .= '<tr>
                        <td>' . $row["Fname"] . '</td>
                        <td>' . "<a id='send' href=" . 'message.php?receiver=' . $row[0] . '>' . "Send message </a></td>";
        '
                    </tr>
                    </table> 
                    </div></div>';
    }

    echo $output;
} else {
    echo '<div id="no-match">There is no matching User</div>';
}
