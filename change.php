<?php
	require 'db_script.php';
	db_connection();
	
	if(isset($_POST['changePass'])){
		if($_POST['npassword'] != $_POST['nc_password']) {
			header("location:settings.php?error1=Passwords do not match");
		exit;
	}
		else if(strlen($_POST['npassword']) < 6 || strlen($_POST['npassword']) > 16) {
			header("location:settings.php?error1=Your password must be between 6 and 16 characters!");	
			exit;
		}
		mysql_query("UPDATE user SET password = '".$_POST['npassword']."' WHERE userEmail='".$_POST['userEmail']."' AND password='".$_POST['password']."'");
		header("location:settings.php?msg1=Successfully changed!");
	}
	
	if(isset($_POST['changeName'])){
		if(strlen($_POST['nuserName']) < 3 || strlen($_POST['nuserName']) > 20) {
		header("location:settings.php?error2=Your name must be between 4 and 20 characters!");
		exit;
	} else if(preg_match('/[^a-z0-9\-\_\.]+/i',$_POST['nuserName'])) {
				header("location:settings.php?error2=Your name contains not allowed characters");
				exit;
			}
		mysql_query("UPDATE user SET userName = '".$_POST['nuserName']."' WHERE userEmail='".$_POST['userEmail']."' AND password='".$_POST['password']."'");
		header("location:settings.php?msg2=Successfully changed!");
	}
	
	if(isset($_POST['changePhone'])){
		if(strlen($_POST['nuserPhone']) < 7 || strlen($_POST['nuserPhone']) > 20) {
			header("location:settings.php?error3=Your phone must be between 7 and 20 characters!");
			exit;
		}  
		mysql_query("UPDATE user SET userPhone = '".$_POST['nuserPhone']."' WHERE userEmail='".$_POST['userEmail']."' AND password='".$_POST['password']."'");
		header("location:settings.php?msg3=Successfully changed!");
		
	}
	
	if(isset($_POST['changeAddress'])){
		mysql_query("UPDATE user SET userAddress = '".$_POST['nuserAddress']."' WHERE userEmail='".$_POST['userEmail']."' AND password='".$_POST['password']."'");
		header("location:settings.php?msg4=Successfully changed!");
	}
	
	if(isset($_POST['upload'])){
		$uploaddirection = 'images/avatar/';
		$apend=date('YmdHis').rand(100,1000).'.jpg';
		$uploadfile = "$uploaddirection$apend";
		if($_FILES['navatar']['size'] != 0 and $_FILES['navatar']['size']<=1024000) { 
			if (move_uploaded_file($_FILES['navatar']['tmp_name'], $uploadfile)) { 
				$size = getimagesize($uploadfile); 
				//if ($size[0] < 601 && $size[1]<5001) { 
					header("location:settings.php");
				} else  {
					header("location:settings.php");
					unlink($uploadfile);
				//}
			}			
		}
		mysql_query("UPDATE user SET avatar = '$uploadfile' WHERE userEmail='".$_POST['userEmail']."' AND password='".$_POST['password']."'");
		header("location:settings.php");
	}
?>