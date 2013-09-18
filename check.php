<?php
	require 'db_script.php';
	session_start();
	db_connection();
	login($_POST['userEmail'], $_POST['password']);
	
?>