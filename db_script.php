<?php 
	$conn;
	function db_connection() {
		session_start();
		$host        =    'localhost';
		$user        =    'root';
		$password    =    '';
		$database    =    'web_project';
		$conn        =    mysql_connect($host,$user,$password) or die('Server Information is not Correct');
		mysql_select_db($database,$conn) or die('Database Information is not correct');
	}

	//=============Starting Login Script==========
	function login($userEmail, $password) { 
		$check = mysql_query("SELECT * FROM user WHERE userEmail = '$userEmail' AND password ='$password'")or die(mysql_error());
		$row = mysql_fetch_array($check);
		$_SESSION['userEmail'] = $userEmail;
		$_SESSION['user'] = $row["userName"];
		if(mysql_num_rows($check)) {
			header("location:userPage.php");
		} else {
			$check = mysql_query("SELECT * FROM admin WHERE adminEmail = '$userEmail' AND password ='$password'")or die(mysql_error());
			$row = mysql_fetch_array($check);
			$_SESSION['adminEmail'] = $userEmail;
			$_SESSION['admin'] = $row["adminName"];
			if(mysql_num_rows($check)) {
				header("location:admin.php");
			} else {
				header("location:login.php?error=Email or password is wrong. Try again!");
			}
		}
	}
	 
	//=============Starting Registration Script==========
	function registration($userName, $userEmail, $userAddress, $userPhone, $userBday, $sex, $password, $capture) {
		
		$userName = stripslashes($userName);
		$userName = htmlspecialchars($userName);
		
		$userEmail = stripslashes($userEmail);
		$userEmail = htmlspecialchars($userEmail);
		
		$userAddress = stripslashes($userAddress);
		$userAddress = htmlspecialchars($userAddress);
		
		$userPhone = stripslashes($userPhone);
		$userPhone = htmlspecialchars($userPhone);
		
		$userBday = stripslashes($userBday);
		$userBday = htmlspecialchars($userBday);
		
		$sex = stripslashes($sex);
		$sex = htmlspecialchars($sex);
		
		$password = stripslashes($password);
		$password = htmlspecialchars($password);
		
		$userEmail = trim($userEmail);
		$userName = trim($userName);
		$userAddress = trim ($userAddress);
		$userPhone = trim($userPhone);
		$userBday = trim ($userBdays);
		$password = trim($password);
		
		$checkEmail = mysql_query("SELECT * FROM user WHERE userEmail='$userEmail'");
		$rowEmail = mysql_fetch_array($checkEmail);
		$checkPhone = mysql_query("SELECT * FROM user WHERE userPhone='$userPhone'");
		$rowPhone = mysql_fetch_array($checkPhone);
		
		if (!empty($rowEmail['userEmail'])) {
			header("location:registration_form.php?error=User with given e-mail is already existed");
			exit;
		}
		else if (!empty($rowPhone['userPhone'])) {
			header("location:registration_form.php?error=User with given telephone is already existed");
			exit;
		}
		else if ($_SESSION['control'] != $capture) {
			header("location:registration_form.php?error=The number is incorrect! Try again!");
			exit;
		}
		
		$userName    	=    mysql_real_escape_string($_POST['userName']);
		$userEmail    	=    mysql_real_escape_string($_POST['userEmail']);
		$userAddress    =    mysql_real_escape_string($_POST['userAddress']);
		$userPhone		=	 mysql_real_escape_string($_POST['userPhone']);
		$userBday		=	 mysql_real_escape_string($_POST['userBday']);
		$sex		=	 mysql_real_escape_string($_POST['sex']);
		$password   	=    mysql_real_escape_string($_POST['password']);
		//$password    	=    md5($password);  //===Encrypt Password
		$capture    	=    mysql_real_escape_string($_POST['capture']);
		
		
	
		
		$query    =    "insert into user(userName,userEmail,userAddress,userPhone,userBday,sex,password,capture)values('$userName','$userEmail','$userAddress','$userPhone','$userBday','$sex','$password', '$capture')";
		$res   	  =    mysql_query($query);
		
		if($res == 'TRUE') {
			header("location:registration_form.php?msg=Congrats with successfully registeration. Please confirm your registration!");
			exit;
		} else {
			header("location:registration_form.php?error=Error! Please, try again.");
			exit;
		}
		
		
	}
	
	
	function add($c_name, $userEmail, $c_title, $c_date, $c_desc) {
			
			$c_name    	=    mysql_real_escape_string($_POST['c_name']);
			//$userEmail  =    mysql_real_escape_string($_POST['userEmail']);
			$userEmail  =    mysql_real_escape_string($_SESSION['userEmail']);
			$c_title  	=    mysql_real_escape_string($_POST['c_title']);
			$c_date    	=    mysql_real_escape_string($_POST['c_date']);
			$c_desc    	=    mysql_real_escape_string($_POST['c_desc']);
			
			$query    =    "insert into category(c_name,userEmail,c_title,c_date,c_desc)values('$c_name','$userEmail','$c_title','$c_date','$c_desc')";
			$res   	  =    mysql_query($query);
			
			if($res == 'TRUE') {
				header("location:userPage.php?msg=Success!");
				exit;
			} else {
				header("location:userPage.php?error=Error!");
				exit;
			}
	} 
		
	function emailValid($userEmail) {
		$isValid = true;
		$atIndex = strrpos($userEmail, "@");
		if (is_bool($atIndex) && !$atIndex) {
			$isValid = false;
		} else {
			$domain = substr($userEmail, $atIndex+1);
			$local = substr($userEmail, 0, $atIndex);
			$localLength = strlen($local);
			$domainLength = strlen($domain);
			if ($localLength < 1 || $localLength > 64) {
				// local part length exceeded
				$isValid = false;
			}
			else if ($domainLength < 1 || $domainLength > 255) {
				// domain part length exceeded
				$isValid = false;
			}
			else if ($local[0] == '.' || $local[$localLength-1] == '.') {
				// local part starts or ends with '.'
				$isValid = false;
			}
			else if (preg_match('/\\.\\./', $local)) {
				// local part has two consecutive dots
				$isValid = false;
			}
			else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
				// character not valid in domain part
				$isValid = false;
			}
			else if (preg_match('/\\.\\./', $domain)) {
				// domain part has two consecutive dots
				$isValid = false;
			}
			else if	(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',str_replace("\\\\","",$local))) {
				// character not valid in local part unless 
				// local part is quoted
				 if (!preg_match('/^"(\\\\"|[^"])+"$/',str_replace("\\\\","",$local))) {
					$isValid = false;
				 }
			}
			if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A"))) {
				// domain not found in DNS
				$isValid = false;
			}
		}	
	   return $isValid;
	}
	
?>