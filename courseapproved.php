<html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutoringdb";
$conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT * FROM courses WHERE approved = '0'";
$results = $conn->query($query);

// if(isset ($_POST['Approve'])){
//     var_dump($_POST['check']);
//     foreach ($_POST['check'] as $value) {

//         // $updatePending="update courses set approved='1' where courseID = courseID"; 
//         // $result2=mysqli_query($conn, $updatePending);   
//         $res = "UPDATE courses SET approved='1' WHERE courseID = '$value'";  
//         $res = mysqli_query($conn,$res);
//         // $stmt->bindParam('courseID',$value);
//         // $stmt->execute();
//     }
// }
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"
></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#form1 #select-all").click(function() {
        $("#form1 input[type='checkbox']").prop('checked',this.checked);
   }); 

   
var timer, delay = 1000;

$('#s').on('click', function () {  
    var array = []
var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')

for (var i = 0; i < checkboxes.length; i++) {
  array.push(checkboxes[i].value)
}
     $.ajax({
       type: "POST",
       url: "pending.php", 
       data: {search:array},            
       dataType: "html",         
       success: function(response){                    
           $("#display").html(response); 
       }
});
});

});
</script>
<form id="form1" method="post">
    <div id = "display">

<table border="1" cellpadding="5" cellspacing="0">
    <th><input type="checkbox" id="select-all" /></th>

        <th>Name</th>
        <th>Price</th>
        <th>Description</th>

        <?php
        while ($row = $results->fetch_array(MYSQLI_ASSOC)){
        $f = $row ['courseName'];
        $l = $row['price'];
        $t = $row['description'];
        $courseID = $row['courseID'];
                
        echo "<tr>
        <td><input type='checkbox' name='check[]' value='$courseID' id = 'e'
        /></td>
        <td>$f</td>
        <td>$l</td>
        <td>$t</td>
        
        
        </tr>";
                 } 
        ?>
</table>
                </div>
                </p>
  <input type="submit" name='Approve' value="Approve " id= "s" >


</form>
</html>