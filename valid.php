<?php
	require 'db_script.php';
	
	$isValidEmail = emailValid($_POST['userEmail']);
	if($_POST['password'] != $_POST['c_password']) {
		header("location:registration_form.php?error=Passwords do not match");
		exit;
	} else if(strlen($_POST['userName']) < 4 || strlen($_POST['userName']) > 20) {
		header("location:registration_form.php?error=Your name must be between 4 and 20 characters!");
		exit;
	} else if(strlen($_POST['userEmail']) < 4 || strlen($_POST['userEmail']) > 20) {
		header("location:registration_form.php?error=Your email must be between 4 and 20 characters!");
		exit;
	} else if(strlen($_POST['userPhone']) < 7 || strlen($_POST['userPhone']) > 20) {
		header("location:registration_form.php?error=Your phone must be between 7 and 20 characters!");
		exit;
	} else if(strlen($_POST['password']) < 6 || strlen($_POST['password']) > 16) {
		header("location:registration_form.php?error=Your password must be between 6 and 16 characters!");	
		exit;
	} else if(preg_match('/[^a-z0-9\-\_\.]+/i',$_POST['userName'])) {
		header("location:registration_form.php?error=Your name contains not allowed characters");
		exit;
	} else if(strlen($_POST['capture']) != 5) {
		header("location:registration_form.php?error=The number is wrong!");
		exit;
	} else if(!$isValidEmail) {
		header("location:registration_form.php?error=Email is not valid");
		exit;
	} else { 
	
		$_POST['userName'] = mysql_real_escape_string($_POST['userName']);
		$_POST['userEmail'] = mysql_real_escape_string($_POST['userEmail']);
		$_POST['userAddress'] = mysql_real_escape_string($_POST['userAddress']);
		$_POST['userPhone'] = mysql_real_escape_string($_POST['userPhone']);
		$_POST['userBday'] = mysql_real_escape_string($_POST['userBday']);
		$_POST['sex'] = mysql_real_escape_string($_POST['sex']);
		$_POST['password'] = mysql_real_escape_string($_POST['password']);
		$_POST['capture'] = mysql_real_escape_string($_POST['capture']);
		db_connection();
		registration($_POST['userName'], $_POST['userEmail'], $_POST['userAddress'], $_POST['userPhone'], $_POST['useBday'], $_POST['sex'], $_POST['password'],  $_POST['capture']);
	}
	
?>