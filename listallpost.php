<?php
	require 'db_script.php';
	$q = $_GET["q"];
	db_connection();
	
	$sql = "SELECT * FROM category";
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);
	echo "<form method='POST' action='checkbox.php'>";
	echo "<table border = '1'>
			<tr>
				<th>email</th>
				<th>ID</th>
				<th>Category Name</th>
				<th>Title</th>
				<th>Date</th>
				<th>Description</th>
				<th>Action</th>
			</tr>";

	while ($rowPost = mysql_fetch_array($result)) {
		echo "<tr>";
		echo "<td>" . $rowPost['userEmail'] . "</td>";
		echo "<td>" . $rowPost['c_id'] . "</td>";
		echo "<td>" . $rowPost['c_name'] . "</td>";
		echo "<td>" . $rowPost['c_title'] . "</td>";
		echo "<td>" . $rowPost['c_date'] . "</td>";
		echo "<td>" . $rowPost['c_desc'] . "</td>";
		echo "<td><input type='checkbox' name='rowPost[]' value='".$rowPost['c_id']."'></td>";		
		echo "</tr>";		
	}
		echo "<tr>";
		echo "<td><input type='submit' name='delete' id='delete' value='DELETE'></td>";
		echo "</tr>";
	echo "</table>";
	echo "</form>";
	
?> 