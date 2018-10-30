<!DOCTYPE html>
<html>
<head>
	<title>IT Tools</title>
	<meta name="description" content="Startup Teching tool" />
	<meta name="author" content="Jonas Andrée" />
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<body>
	<header> 
		<div id="nav-menu-button" class="menu-button" onclick="toggleMenuBar(this, 'nav')">
		  	<div class="bar1"></div>
		  	<div class="bar2"></div>
		  	<div class="bar3"></div>
		</div>
		
		<nav id="course-navbar">
		
		</nav>
		<div id="loggin">
			<div id="loggin-button" class="loggin-button" onclick="toggleMenuBar(this, 'user')">
			  	<div class="loggin-bar-1"></div>
			  	<div class="loggin-bar-3"></div>
			</div>
		</div>
		<div id="user-cont">
	   		<div id="user-container">
	       		<div id="user-content">
					<div id="loggin-container">
						<?php include "php/login.php"; ?>
		  			</div>
	       		</div>
	   		</div>
	   	</div>
	</header>
	
	<header> </header>
	<main> </main>
	<footer> </footer>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>