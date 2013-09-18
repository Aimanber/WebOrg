<?
	require 'db_script.php';
	$isValidEmail = emailValid($_POST['userEmail']);
	if(preg_match('/[^a-z0-9\-\_\.]+/i',$_POST['title'])) {
		header("location:userPage.php?error=Your title contains not allowed characters");
		exit;	
	} else { 
		$_POST['userEmail'] = mysql_real_escape_string($_POST['userEmail']);
		$_POST['title'] = mysql_real_escape_string($_POST['title']);
		$_POST['ddate'] = mysql_real_escape_string($_POST['ddate']);
		$_POST['ddesc'] = mysql_real_escape_string($_POST['ddesc']);
		db_connection();
		if ($_GET["value"] == )
		function add($userEmail, $deadlineTitle, $deadlineDate, $deadlineDesc) {
		
			$userEmail = stripslashes($userEmail);
			$userEmail = htmlspecialchars($userEmail);
			$deadlineTitle = stripslashes($deadlineTitle);
			$deadlineTitle = htmlspecialchars($deadlineTitle);
			$deadlineDate = stripslashes($deadlineDate);
			$deadlineDate = htmlspecialchars($deadlineDate);
			$deadlineDesc = stripslashes($deadlineDesc);
			$deadlineDesc = htmlspecialchars($deadlineDesc);
			
			$userEmail = trim($userEmail);
			$deadlineTitle = trim($deadlineTitle);
			$deadlineDate = trim($deadlineDate);
			$deadlineDesc = trim($deadlineDesc);
				
			$userEmail    	=    mysql_real_escape_string($_POST['userEmail']);
			$deadlineTitle    	=    mysql_real_escape_string($_POST['title']);
			$deadlineDate    	=    mysql_real_escape_string($_POST['ddate']);
			$deadlineDesc    	=    mysql_real_escape_string($_POST['ddesc']);
					
			$query    =    "insert into deadline(userEmail,title,ddate,ddesc)values('$userEmail','$deadlineTitle','$deadlineDate','$deadlineDesc')";
			$res   	  =    mysql_query($query);
			
			
			if($res == 'TRUE') {
				
				header("location:userPage.php?msg=Success!");
				exit;
			} else {
				header("location:userPage.php?error=Error!");
				exit;
			}
			
			
		}
	?>

	
	
	