<?php
session_start();

include 'connectToDb.php';

$receiver = $_GET['receiver'];
?>

<table class="table table-striped">
	<tr> 
		<th> Name </th> 
		<th> Message</th> 
	</tr>

	<?php
	$getMessage = "SELECT  messages.* ,learners.Fname FROM messages INNER JOIN learners on sent_by=learners.learnerID  WHERE sent_by = '$receiver' AND received_by = ".$_SESSION['ID']." OR sent_by = ".$_SESSION['ID']." AND received_by = '$receiver' ORDER BY createdAt asc";
	$getMessageResult = mysqli_query($conn,$getMessage) or die(mysqli_error($conn));
	if(mysqli_num_rows($getMessageResult) > 0) {
		while($getMessageRow = mysqli_fetch_array($getMessageResult)) {	?>
		<tr><div style = "margin: 10;">
		<td>	<h4 style = "color: #007bff;display:inline"><?=$getMessageRow['Fname']?></h4></td>
		<td>	<p class="text-center" style = "display:inline"><?=$getMessageRow['message']?></p></td>
			</div>
			</tr>
	<?php } 
	} 
	else { 
		echo "<tr><td><p>No messages yet! Say 'Hi'</p></td></tr>";
	}
	?>		
</table>