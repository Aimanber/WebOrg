<html>
   <head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
		<title>Reg</title>
		<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
		<script src="scripts/jquery-1.9.1.js"></script>
		<script src="scripts/jquery-ui.js"></script>	 
		<script src="scripts/functions.js"></script>
   </head>
	<body>
		<div id="wrapper">
			<div id="menu">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="login.php" >Log in</a></li>					
				</ul>		
			</div>
			<div id="header">
				<div id="logo">
					<h1><a href="index.php">Web Organizer</a></h1>			
				</div>
			</div>
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

	
			<div id="reg_form">
				<form method='POST' action="valid.php" id="registration_form" ENCTYPE="multipart/form-data">
				
					<table align="center">
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
					
					<table align="center" cellspacing='0' cellpadding='10' border='0'>
					   <tr>
						  <td>
							 <table cellspacing='2' cellpadding='2' border='0'>
								<h2>Registration Form: </h2>
								<tr>
								   <td align='right' class='normal_field'>Name: </td>
								   <td class='element_label'>
									  <input type='text' name='userName' id="userName" size='20'>
								   </td>
								</tr>
								<tr>
								   <td align='right' class='normal_field'>Email: </td>
								   <td class='element_label'>
									  <input type='email' name='userEmail' id="userEmail" size='20'>
								   </td>
								</tr>
								<tr>
								   <td align='right' class='normal_field'>Address: </td>
								   <td class='element_label'>
									  <input type='text' name='userAddress' id="userAddress" size='20'>
								   </td>
								</tr>
								<tr>
								   <td align='right' class='normal_field'>Phone: </td>
								   <td class='element_label'>
									  <input type='text' name='userPhone' id="userPhone" size='20'>
								   </td>
								</tr>
								<tr>
									<td align='right' >Gender: </td>
									<td>
										<form>
											<input type="radio" name="sex" value="male">Male
											<input type="radio" name="sex" value="female">Female
										</form> 
									</td>
								</tr>
								<tr>
									<td align='right' >B'Day: </td>
									<td>
										<input type="date" name="userBday">
									</td>
								</tr>
								<tr>
									<td align='right' class='normal_field'>Password: </td>
									<td class='element_label'>
									   <input type="password" name="password" id="password" size='20' onkeyup='CheckPassword(this.value)'>
									</td>
									<td>
										<div id="passDesc"></div>
									</td>
								</tr>
								<tr>
									<td align='right' class='normal_field'>Confirm password: </td>
									<td class='element_label'>
									   <input type="password" name="c_password" id="c_password" size='20'>
									</td>
								</tr>
								<!--<tr>
									<td align='right' class='normal_field'>Avatar: </td>
									<td class='element_label'>
									   <input type='file' name='avatar' size='20'">
									</td>
								</tr>-->
								<tr>
									<td><img src="image.php"></img></td>
									<td><input type='text' name='capture' size='20'/></td>
								</tr>
								<tr>
								   <td colspan='2' align='right'>
									  <input type='submit' name='submit' value='Submit'>
								   </td>
								</tr>								
							 </table>							 
						  </td>
					   </tr>					  
					</table>
					
				</form>
			</div>
			<br/>
			<br/>
			<br/>
			<br/>
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
<html>