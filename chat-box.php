<?php
session_start();

include 'connectToDb.php';

$receiver = $_GET['receiver'];
?>

<div class="m-5">
	<table class="table table-striped">
		<tr>
			<th> Name </th>
			<th> Message</th>
		</tr>

		<?php

		$getMessage = "SELECT * FROM messages WHERE sent_by = '$receiver' AND received_by = '$_SESSION[ID]'
	 OR sent_by ='$_SESSION[ID]' AND received_by ='$receiver' ORDER BY createdAt asc";

		$getMessageResult = mysqli_query($conn, $getMessage) or die(mysqli_error($conn));
		if (mysqli_num_rows($getMessageResult) > 0) {
			while ($getMessageRow = mysqli_fetch_array($getMessageResult)) {
				if ($_SESSION['Type'] == "learner") {			
					$sql = "UPDATE messages SET seen=1 WHERE seen=0 AND sent_by = '$receiver' AND received_by = '$_SESSION[ID]'
					OR sent_by ='$_SESSION[ID]' AND received_by ='$receiver' ";
					$updateTest = mysqli_query($conn, $sql);
				} ?>

				<tr>
					<div style="margin: 10;">
						<td>
							<h4 style="color: #007bff;display:inline"><?= $getMessageRow['sent_by'] ?></h4>
						</td>
						<td>
							<p class="text-center" style="display:inline;<?php
																			if ($_SESSION['Type'] == "adminstrator") {
																				if ($getMessageRow['seen'] == 0) {
																					echo "font-weight: bold; text-decoration:underline;";
																				} else {
																					echo "font-style: italic;";
																				}
																			}


																			?>"><?= $getMessageRow['message']?></p>
						</td>
					</div>
				</tr>
		<?php }
		} else {
			echo "<tr><td><p>No messages yet! Say 'Hi'</p></td></tr>";
		}
		?>
	</table>
</div>