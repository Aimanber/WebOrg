 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

 <html xmlns="http://www.w3.org/1999/xhtml">

	 <head>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		<title>WebOrganizer</title>
		
		<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
		<script src="scripts/jquery-1.9.1.js"></script>
		<script src="scripts/jquery-ui.js"></script>
		<script src="scripts/functions.js"></script>
		<style type="text/css"></style>	
	</head>

	<body>
		<div id="wrapper">	
			<div id="menu">
				<ul>
					<li><a href="index.php">Home</a></li>				
					<li><a href="registration_form.php">Sign Up</a></li>
				</ul>		
			</div>		
			<div id="header">
				<div id="logo">
					<h1><a href="index.php">Web Organizer</a></h1>			
				</div>
			</div>
			<br/>
			<br/>
			<br/>
			<br/>
			<div id="login">							
				<div>
					<div id="log_form">
						<form action="check.php" method="POST">
																		
							<table align="center" cellspacing='0' cellpadding='10' border='0'>
								<tr>
									<td>									
										<table align="center" cellspacing='2' cellpadding='2' border='0'>
											<h3>Login Form: </h3>
											<tr>
												<td align='right' class='normal_field'>
													E-mail: <input type="text" name="userEmail"><br>
												</td>
											</tr>	
											<tr>
												<td align='right' class='normal_field'>
													Password: <input type="password" name="password">
												</td>
											</tr>
											<tr>
												<td align='right' class='normal_field'>
													<input type="submit" value="Login">
												</td>													
											</tr>											
											<tr>
												<td align="left"><a href="#" >Forgot password?</a></td>
											</tr>
											<tr>
												<td align="left"><a href="registration_form.php" >Registration</a></td>
											</tr>
											<tr>
												<td align='center' class='normal_field'>								
													<?php
														if(isset($_GET['error'])){
															echo "<p class=''>".$_GET['error']."</p>";
														}
													?>
												</td>
											</tr>
										</table>
										
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div>								
			</div>
			<br/>
			<br/>
			<br/>
			<br/>
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
</html>
