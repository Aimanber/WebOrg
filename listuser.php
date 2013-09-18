<?php
	require 'db_script.php';
	$q = $_GET["q"];
	db_connection();
	
	$sql = "SELECT * FROM user WHERE userName = '".$q."'";
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);
	
	echo "<form method='POST' action='rowUser.php'>";
	echo "<table border = '1'>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>B'Day</th>
				<th>Gender</th>
				<th>Address</th>
				<th></th>
				
			</tr>";

	while ($row = mysql_fetch_array($result)) {
		echo "<tr>";
		echo "<td>" . $row['userName'] . "</td>";
		echo "<td>" . $row['userEmail'] . "</td>";
		echo "<td>" . $row['userPhone'] . "</td>";
		echo "<td>" . $row['userBday'] . "</td>";
		echo "<td>" . $row['sex'] . "</td>";
		echo "<td>" . $row['userAddress'] . "</td>";
		echo "<td><input type='checkbox' name='row[]' value='".$row['u_id']."'></td>";
		echo "</tr>";		
	}
		echo "<tr>";
		echo "<td><input type='submit' name='delete' id='delete' value='DELETE'></td>";
		echo "</tr>";
	echo "</table>";
	echo "</form>";
?> 