<?php
	session_start();
	unset($_SESSION['username']); 
	#echo "Welcome ".$_SESSION['username']."!<br>"; 
	echo "Session was destroyed";
	session_destroy();
?>