<?php
	require 'db_script.php';
	db_connection();
	if(!isset($_SESSION['admin'])){
		header("location:index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
   <head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
		<title>Admin</title>
		<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
		<script src="scripts/jquery-1.9.1.js"></script>
		<script src="scripts/jquery-ui.js"></script>	 
		<script src="scripts/functions.js"></script>
		<script>
			function showListUser(str) {
				if (str == "") {
					document.getElementById("txtHint").innerHTML = "";
					return;
				}
				if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET","listuser.php?q=" + str,true);
				xmlhttp.send();
				
				if (str == "listall") {
					xmlhttp.open("GET","listalluser.php?q=" + str,true);
					xmlhttp.send();
				}
			}
		</script>
		<script>
			function showListPost(str) {
				if (str == "") {
					document.getElementById("txtHint1").innerHTML = "";
					return;
				}
				if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("txtHint1").innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET","listpost.php?q=" + str,true);
				xmlhttp.send();
				
				if (str == "listall") {
					xmlhttp.open("GET","listallpost.php?q=" + str,true);
					xmlhttp.send();
				}
			}
		</script>
   </head>
	<body>
		<div id="wrapper">
			<div id="menu">
				<ul>
					<li><a href="index.php">Home</a></li>
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
						<div id="category">
							<ul><!--
								<li>
									<div id="category_form3">						
										<table align='center' >
											<h3>CATEGORY: </h3>
											<br/>
											<td>								
												<form method="get" action="addCategory" >
													<button type="submit" >Add Category</button>
												</form>
												<br/>												
												<form method="get" action="viewCategory">
													<button type="submit">View Category</button>
												</form>										
												<br/>			
												<form method="get" action="deleteCategory">
													<button type="submit">Delete Category</button>
												</form>
											</td>
										</table>							
									</div>
								</li>-->
						
								<li>
									<div id="category_formAdmin">
										<table align='center' >
											<h3>USER: </h3>
											<br/>
											<tr>
												<td>																		
													<?php														
																$conn = mysql_connect('localhost','root','') or die('Server Information is not Correct');
																mysql_select_db('web_project',$conn) or die('Database Information is not correct');
																$query = "SELECT userName FROM user"; 
																$res = mysql_query($query); 
																
																echo "<select name = 'selected' onchange='showListUser(this.value)'>";
																echo "<option name='selected' value=''> Select </option>";
																while ($row = mysql_fetch_array($res)) { 
																	echo "<option name='selected' value='" . $row['userName'] . "'>".$row['userName']."</option>";
																}
																echo "<option name='selected' value='listall'> List All </option>";
																echo " </select>";
													?>											
												</td>
											</tr>
											<tr>
												<td>
													<div id="txtHint"><b>Information will be listed here.</b></div>
												</td>
											</tr>
											
										</table>
									</div>
								</li>
								<!---->
								<li> 
									<div id="category_formAdmin">							
											<table align='center' >
												<h3>POST: </h3>
												<br/>
												<td>
													<?php														
																$conn = mysql_connect('localhost','root','') or die('Server Information is not Correct');
																mysql_select_db('web_project',$conn) or die('Database Information is not correct');
																$query = "SELECT userEmail FROM category"; 
																$res = mysql_query($query); 
																
																echo "<select name = 'selected' onchange='showListPost(this.value)'>";
																echo "<option name='selected' value=''> Select </option>";
																while ($row = mysql_fetch_array($res)) { 
																	echo "<option name='selected' value='" . $row['userEmail'] . "'>".$row['userEmail']."</option>";
																}
																echo "<option name='selected' value='listall'> List All </option>";
																echo " </select>";
													?>					
												</td>
												<tr>
												<td>
													<div id="txtHint1"><b>Information will be listed here.</b></div>
												</td>
											</tr>
											</table>											
									</div>
								</li>
								<li> 
									<div id="category_form1">							
											<table align='center' >
												<h3>NEWS: </h3>
												<p>
												
												[1] USERS: added 
													<?php													
														$res = mysql_query("SELECT COUNT(u_id) FROM user");
														$count = mysql_result($res,0);
														echo $count." ";													 
													?> new users.</br>
												
												[2] POSTS: added 
													<?php													
														$res = mysql_query("SELECT COUNT(c_id) FROM category");
														$count = mysql_result($res,0);
														echo $count." ";													 
													?> new posts.</br>
													
												[3] BANNED: </br>
												
												[4] B'Day: 
													<?php	/*												
														$res = mysql_query("SELECT * FROM user WHERE userBday = ");
														$count = mysql_result($res,0);
														echo $count." ";				*/									 
													?> </br>
													
												</p>
												
											</table>											
									</div>
								</li>
							</ul>									
						</div>	
					</li>
					<li>
						<div id="profile">
								<h1>Welcome, <?php	echo $_SESSION['admin'];	?></h1>		
								<?php
									$adminEmail = $_SESSION['adminEmail'];
									$query = "SELECT * FROM admin WHERE adminEmail = '$adminEmail'";
									$res = mysql_query($query) or die(mysql_error());
									while($row = mysql_fetch_array($res)){
										echo "<img border=\"0\" src=\"".$row['avatar']."\">";
										echo "</br>";
										echo "<h3 style='color: black;'>USER INFORMATION:</h3>";
										echo "</br>";
										echo "<p>";
										echo "Address: ".$row['adminAddress'];
										echo "</br>";
										echo "Phone: ".$row['adminPhone'];
										echo "</br>";
										echo "</p>";
									}
										 
								?>
							
						</div>
					</li>
				</ul>
			</div>
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