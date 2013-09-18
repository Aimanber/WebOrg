<?php

require 'db_script.php';
db_connection();

// Passkey that got from link
$passkey=$_GET['passkey'];

$tbl_name1="temp";

// Retrieve data from table where row that match this passkey
$sql1="SELECT * FROM $tbl_name1 WHERE confirm_code ='$passkey'";
$result1=mysql_query($sql1);

// If successfully queried
if($result1){

	// Count how many row has this passkey
	$count=mysql_num_rows($result1);

	// if found this passkey in our database, retrieve data from table "temp_user"
	if($count==1){

		$rows=mysql_fetch_array($result1);
		$userName=$rows['userName'];
		$userEmail=$rows['userEmail'];
		$userAddress=$rows['userAddress'];
		$userPhone=$rows['userPhone'];
		$password=$rows['pass'];
		$capture=$rows['capture'];

		$tbl_name2="user";

		// Insert data that retrieves from "temp_user" into table "user"
		$sql2="INSERT INTO $tbl_name2 VALUES('$userName','$userEmail','$userAddress','$userPhone','$password','$capture')";
		$result2=mysql_query($sql2);
	}

	// if not found passkey, display message "Wrong Confirmation code"
	else {
		header("location:registration_form.php?msg=Wrong confirmation code!");
		exit;
	}

	// if successfully moved data from table"temp_user" to table "user" displays message "Your account has been activated" and don't forget to delete confirmation code from table "temp_user"
	if($result2){
	
		// Delete information of this user from table "tempuser" that has this passkey
		$sql3="DELETE FROM $tbl_name1 WHERE confirm_code = '$passkey'";
		$result3=mysql_query($sql3);

		header("location:registration_form.php?msg=Your account has been activated! Now you can login!");
		exit;

	}

}
?>