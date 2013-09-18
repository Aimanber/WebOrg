<?php
	require 'db_script.php';
	if(preg_match('/[^a-z0-9\-\_\.]+/i',$_POST['title'])) {
		header("location:registration_form.php?error=Your title contains not allowed characters");
		exit;	
	} else { 
		$_POST['title'] = mysql_real_escape_string($_POST['title']);
		$_POST['date'] = mysql_real_escape_string($_POST['date']);
		$_POST['desc'] = mysql_real_escape_string($_POST['desc']);
		db_connection();
	
		$valueTextMap = array("5" => "Text");

		$value = $_POST['make'];  //equals 5
		$text = $valueTextMap[$value];  //equals "Text"

		if  
	}
	
?>