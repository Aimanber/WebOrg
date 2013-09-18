<?php
	require 'db_script.php';
	db_connection();
	if(!isset($_SESSION['user'])){
		header("location:index.php");
	}
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
   <head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
		<title>Welcome</title>
		<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
		<script src="scripts/jquery-1.9.1.js"></script>
		<script src="scripts/jquery-ui.js"></script>	 
		<script src="scripts/functions.js"></script>
		<script>
				function CheckPassword(password) {
					var strength = new Array();
					strength[0] = "Blank";
					strength[1] = "Very Weak";
					strength[2] = "Weak";
					strength[3] = "Medium";
					strength[4] = "Strong";
					strength[5] = "Very Strong";
				 
					var score = 1;
					
					if (password.length < 6)
						return strength[0];
					
					if (password.length > 6)
						score++;
						
					if (password.match(/\d+/))
						score++;
					
					if (password.match(/[a-z]/) &&
						password.match(/[A-Z]/))
						score++;
					
					if (password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,?,(,)]/))
						score++;
					 
						//return strength[score];
					
					document.getElementById("passDesc").innerHTML = strength[score];					
		
				}
				/**/
		</script>
		
	</head>
	<body>
		<div id="wrapper">
			<div id="menu">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="userPage.php">Profile</a></li>
					<li><a href="logout.php">Logout</a></li>					
				</ul>				
			</div>
			<div id="header">
				<div id="logo">
					<h1><a href="index.php">Web Organizer</a></h1>			
				</div>				
			</div>
			<div id="content">				
				<ul>
					<li>
						<div id='category_form4'>
						<ul>
							<form method='POST' action='change.php' ENCTYPE='multipart/form-data'>	
									<h3>Change: </h3>
									<br/>																						
									<li>
										<div id='cat'>
											<table align='center'>	
												<tr>
													<td align='right'>												
														New password: <input type='password' name='npassword' size='20' onkeyup='CheckPassword(this.value)'>												
													</td>
												</tr>
												<td>
													<div id="passDesc"></div>
												</td>
												<tr>
													<td align='right'>												
														Confirm password: <input type='password' name='nc_password' size='20'>												
													</td>
													<td align='right'>												
														<input type='submit' name='changePass' value='Change Password'>												
													</td>
												</tr>
												<tr>
													<td align='right'>										
													</td>
												</tr>
												<tr>
													<td align='right'>										
													</td>
												</tr>
												<tr>
													<td>
														<?php
															if(isset($_GET['error1'])){
																echo "<p class='error'>".$_GET['error1']."</p>";
															}
														?>
														<?php
															if(isset($_GET['msg1'])){
																echo "<p class='msg'>".$_GET['msg1']."</p>";
															}
														?>
													</td>
												</tr>
												<tr>
													<td align='right'>												
														New name: <input type='text' name='nuserName' size='20'>												
													</td>
													<td align='right'>												
														<input type='submit' name='changeName' value='Change Name'>												
													</td>
												</tr>
												<tr>
													<td>
														<?php
															if(isset($_GET['error2'])){
																echo "<p class='error'>".$_GET['error2']."</p>";
															}
														?>
														<?php
															if(isset($_GET['msg2'])){
																echo "<p class='msg'>".$_GET['msg2']."</p>";
															}
														?>
													</td>
												</tr>
												<tr>
													<td align='right'>										
													</td>
												</tr>
												<tr>
													<td align='right'>										
													</td>
												</tr>
												<tr>
													<td align='right'>												
														New phone: <input type='text' name='nuserPhone' size='20'>												
													</td>
													<td align='right'>												
														<input type='submit' name='changePhone' value='Change Phone'>												
													</td>
												</tr>
												<tr>
													<td>
														<?php
															if(isset($_GET['error3'])){
																echo "<p class='error'>".$_GET['error3']."</p>";
															}
														?>
														<?php
															if(isset($_GET['msg3'])){
																echo "<p class='msg'>".$_GET['msg3']."</p>";
															}
														?>
													</td>
												</tr>
												<tr>
													<td align='right'>										
													</td>
												</tr>
												<tr>
													<td align='right'>										
													</td>
												</tr>
												<tr>
													<td align='right'>										
													</td>
												</tr>
												<tr>
													<td align='right'>										
													</td>
												</tr>
												<tr>
													<td align='right'>												
														New address: <input type='text' name='nuserAddress' size='20'>												
													</td>
													<td align='right'>												
														<input type='submit' name='changeAddress' value='Change Address'>												
													</td>
												</tr>
												<tr>
													<td>
														<?php
															if(isset($_GET['error4'])){
																echo "<p class='error'>".$_GET['error4']."</p>";
															}
														?>
														<?php
															if(isset($_GET['msg4'])){
																echo "<p class='msg'>".$_GET['msg4']."</p>";
															}
														?>
													</td>
												</tr>
													<tr>
													<td align='right'>												
														New avatar: <input type='file' name='navatar'>												
													</td>
													<td align='right'>												
														<input type='submit' name='upload' value='Upload'>												
													</td>
												</tr>
												<tr>
													<td>CONFIRMATION:</td>
												</tr>
												<tr>
													<td align='right'>
														Current email: <input type='email' name='userEmail' size='20'>
													</td>
												</tr>
												<tr>
													<td align='right'>												
														Current password: <input type='password' name='password' size='20'>												
													</td>
												</tr>
												<tr>
													<td>
														<?php
															if(isset($_GET['error'])){
																echo "<p class='error'>".$_GET['error']."</p>";
															}
														?>
														<?php
															if(isset($_GET['msg'])){
																echo "<p class='msg'>".$_GET['msg']."</p>";
															}
														?>
													</td>
												</tr>
											</table>
										</div>
									</li>													
								</form>
						</ul>
						</div>							
					</li>
					<li>
						<div id="profile">
								<h1>Welcome, <?php	echo $_SESSION['user'];	?></h1>		
								
								<?php
									$userEmail = $_SESSION['userEmail'];
									$query = "SELECT * FROM user WHERE userEmail = '$userEmail'";
									$res = mysql_query($query) or die(mysql_error());
									while($row = mysql_fetch_array($res)){
										echo "<img border=\"0\" src=\"".$row['avatar']."\">";
										echo "</br>";
										echo "<h3 style='color: black;'>USER INFORMATION:</h3>";										
										echo "</br>";
										echo "<p>";
										echo "Address: ".$row['userAddress'];
										echo "</br>";
										echo "Phone: ".$row['userPhone'];
										echo "</br>";
										echo "B'Day: ".$row['userBday'];
										/*echo "Social Netwoks:";
										echo "</br>";
										echo "Skype: ".$row['skype'];
										echo "</br>";
										echo "Twitter: ".$row['twitter'];
										echo "</br>";
										echo "VK: ".$row['vk'];
										echo "</br>";
										echo "LinkedIn: ".$row['linkedin'];
										echo "</br>";*/
										echo "</p>";										
									}										 
								?>							
						</div>
					</li>
				</ul>				
			</div>	
			
			<br/>
			<br/>
			<br/>
			<div id="link">		
				<ul>
					<li><a href="http://www.twitter.com"><img src="images/links/twitter.png" alt="twitter" width="80" height="80"/></a></li>
					<li><a href="http://www.vk.com"><img src="images/links/vk.png" alt="vk" width="80" height="80"/></a></li>
					<li><a href="http://www.facebook.com"><img src="images/links/facebook.png" alt="facebook" width="80" height="80"/></a></li>      			
				</ul>			
			</div>
			<div id="link1">
				<ul>
					<li><a href="about.html" class="bottom_lnk">About Us</a></li>
					<li><a href="contacts.html" class="bottom_lnk">Contacts</a></li>     			
				</ul>
			</div>
		</div>
		<div id="footer" align="center">
			Copyright (c) 2013. All rights reserved.		
		</div>
	</body>
<html>