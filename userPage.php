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
			function showList(str) {
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
				xmlhttp.open("GET","list.php?q=" + str,true);
				xmlhttp.send();
				
				if (str == "listall") {
					xmlhttp.open("GET","listall.php?q=" + str,true);
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
					<li><a href="settings.php">Profile Settings</a></li>
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
							
								<ul>
									<li>
										<div id="category_form2">									
											<ul>
												<form method='POST' action="add.php">	
												<h3>ADD: </h3>
												<br/>																						
													<li>
														<div id="cat">															
															<table align='left' >
																<tr>
																	<td align='right' >
																		Category: <input type="text" name="c_name" size="20">
																	</td>
																</tr>
																<tr>
																	<td align='right'>
																		Title: <input type="text" name="c_title" size="20">
																	</td>
																</tr>
																<tr>
																	<td align='right'>												
																		Date: <input type="date" name="c_date" size="20">												
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
													<li>
														<div id="cat">
															<table align='right' >
																<tr>
																	<td align='left'>Description: </td>
																</tr>
																<tr>
																	<td>
																		<textarea name="c_desc" cols="40" rows="4"></textarea>
																	</td>
																</tr>
																<tr>
																	<td colspan='2' align='right'>
																	  <input type='submit' name='submit' value='ADD'>
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
										<div id="category_form3">
												<table align='center' >
													<h3>VIEW: </h3>
													<br/>
													<tr>
														<td>
														<?php														
															$conn = mysql_connect('localhost','root','') or die('Server Information is not Correct');
															mysql_select_db('web_project',$conn) or die('Database Information is not correct');
															$userEmail = $_SESSION['userEmail'];
															$query = "SELECT c_name FROM category WHERE userEmail = '$userEmail'"; 
															$res = mysql_query($query); 
															
															echo "<select name = 'selected' onchange='showList(this.value)'>";
															echo "<option name='selected' value=''> Select </option>";
															while ($row = mysql_fetch_array($res)) { 
																echo "<option name='selected' value='" . $row['c_name'] . "'>".$row['c_name']."</option>";
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
			</br>
			<div id="category">
				
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