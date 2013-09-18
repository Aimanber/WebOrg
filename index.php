 <?php
session_start();
?>
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
	<script src="scripts/slides.js"></script>
	<style type="text/css"></style>	
	
	<script>
			$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'images/slide/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true,
				animationStart: function(current){
					$('.caption').animate({
						bottom:-35
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.caption').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.caption').animate({
						bottom:0
					},200);
				}
			});
		});
		</script>
</head>

<body>
	<div id="wrapper">	
		<div id="menu">				
			<ul>
				<li><a href="index.php">Home</a></li>
				<?php
					if(isset($_SESSION['user'])){
				?>
					<li><a href="userPage.php">My Page</a></li>
					<li><a href="logout.php">Logout</a></li>					
				<?php
					} else if(isset($_SESSION['admin'])){
				?>
					<li><a href="admin.php">Admin Page</a></li>
					<li><a href="logout.php">Logout</a></li>					
				<?php					
					} else {
				?>
					<li><a href="login.php" >Log in</a></li>				
					<li><a href="registration_form.php">Sign Up</a></li>
				<?php
					}
				?>
			</ul>		
		</div>		
		<div id="header">
			<div id="logo">
				<h1><a href="index.php">Web Organizer</a></h1>			
			</div>
		</div>	
			
			<div id="welcome">
				<div id="gallery">
					<img src="images/slide/new-ribbon.png" width="112" height="112" id="ribbon">
					<div id="slides">
						<div class="slides_container">
							<div class="slide">
								<a href="action.html" target="_blank"><img src="images/slide/pics03.png" width="570" height="270" alt="Slide 1"></a>
									<div class="caption" style="bottom:0">
										<p>schedule creating</p>
									</div>
							</div>
							<div class="slide">
								<a href="action.html" target="_blank"><img src="images/slide/pics05.jpg" width="570" height="270" alt="Slide 2"></a>
									<div class="caption" style="bottom:0">
										<p>planning</p>
									</div>
							</div>
							<div class="slide">
								<a href="action.html" target="_blank"><img src="images/slide/pics04.jpg" width="570" height="270" alt="Slide 3"></a>
								<div class="caption" style="bottom:0">
									<p>deadlines</p>
								</div>
							</div>
								   
						</div>
						<a href="#" class="prev"><img src="images/slide/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
						<a href="#" class="next"><img src="images/slide/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
					</div>
						<img src="images/slide/example-frame.png" width="739" height="341" alt="Example Frame" id="frame">
				</div>
			</div>
			
			<div id="tabs">			
					<div id="themes">
					<h3>Welcome to WebOrganizer! Before starting work you may read some tutorial materials!</h3>
						<div id="column1">
							<p>How to create plan?</p>
							<img src="images/slide/pics05.jpg" width="300" height="200" alt="" /></br>
							<a href="http://www.wikihow.com/Create-an-Effective-Action-Plan" class="link-style">Read More</a>
						</div>
						<div id="column2">
							<p>Time managment!</p>
							<img src="images/slide/time.jpg" width="300" height="200" alt="" /></br>
							<a href="http://www.studygs.net/timman.htm" class="link-style">Read More</a>
						</div>
						<div id="column3">
							<p>What does mean deadline?</p>
							<img src="images/slide/pics04.jpg" width="300" height="200" alt="" /></br>
							<a href="http://www.writechangegrow.com/2010/09/the-importance-of-hitting-deadlines/" class="link-style">Read More</a>
						</div>
					</div>
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
</html>
