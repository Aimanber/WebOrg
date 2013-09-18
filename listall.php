<?php
	require 'db_script.php';
	$q = $_GET["q"];
	db_connection();
	
	$sql = "SELECT * FROM category WHERE userEmail = '".$_SESSION['userEmail']."'";
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);
	echo "<form method='POST' action='checkbox.php'>";
	echo "<table border = '1'>
			<tr>
				<th>ID</th>
				<th>Category Name</th>
				<th>Title</th>
				<th>Date</th>
				<th>Description</th>
				<th>Action</th>
			</tr>";

	while ($row = mysql_fetch_array($result)) {
		echo "<tr>";
		echo "<td>" . $row['c_id'] . "</td>";
		echo "<td>" . $row['c_name'] . "</td>";
		echo "<td>" . $row['c_title'] . "</td>";
		echo "<td>" . $row['c_date'] . "</td>";
		echo "<td>" . $row['c_desc'] . "</td>";
		echo "<td><input type='checkbox' name='row[]' value='".$row['c_id']."'></td>";		
		echo "</tr>";		
	}
		echo "<tr>";
		echo "<td><input type='submit' name='delete' id='delete' value='DELETE'></td>";
		echo "</tr>";
	echo "</table>";
	echo "</form>";
	
?> 