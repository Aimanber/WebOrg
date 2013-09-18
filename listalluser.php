<?php
	require 'db_script.php';
	$q = $_GET["q"];
	db_connection();
	
	$sql = "SELECT * FROM user";
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);
	echo "<form method='POST' action='checkbox.php'>";
	echo "<table border = '1'>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>B'Day</th>
				<th>Gender</th>
				<th>Address</th>
				<th></th>
			</tr>";

	while ($rowUser = mysql_fetch_array($result)) {
		echo "<tr>";
		echo "<td>" . $rowUser['u_id'] . "</td>";
		echo "<td>" . $rowUser['userName'] . "</td>";
		echo "<td>" . $rowUser['userEmail'] . "</td>";
		echo "<td>" . $rowUser['userPhone'] . "</td>";
		echo "<td>" . $rowUser['userBday'] . "</td>";
		echo "<td>" . $rowUser['sex'] . "</td>";
		echo "<td>" . $rowUser['userAddress'] . "</td>";
		echo "<td><input type='checkbox' name='rowUser[]' value='".$rowUser['u_id']."'></td>";		
		echo "</tr>";		
	}
		echo "<tr>";
		echo "<td><input type='submit' name='delete' id='delete' value='DELETE'></td>";
		echo "</tr>";
	echo "</table>";
	echo "</form>";
?> 