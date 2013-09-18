<?php
	require 'db_script.php';
	db_connection();
	
	if(preg_match('/[^a-z0-9\-\_\.]+/i',$_POST['c_name'])) {
		header("location:userPage.php?error=Your category name contains not allowed characters");
		exit;
	} else if(preg_match('/[^a-z0-9\-\_\.]+/i',$_POST['c_title'])) {
		header("location:userPage.php?error=Your title contains not allowed characters");
		exit;
	} else { 
		
		$_POST['c_name'] = mysql_real_escape_string($_POST['c_name']);
		$_POST['userEmail'] = mysql_real_escape_string($_SESSION['userEmail']);
		$_POST['c_title'] = mysql_real_escape_string($_POST['c_title']);
		$_POST['c_date'] = mysql_real_escape_string($_POST['c_date']);
		$_POST['c_desc'] = mysql_real_escape_string($_POST['c_desc']);
		
		db_connection();
		
		add($_POST['c_name'], $_POST['userEmail'], $_POST['c_title'], $_POST['c_date'], $_POST['c_desc']);
	}
	
?>