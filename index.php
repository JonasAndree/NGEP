<!DOCTYPE html>
<html>
<head>
    <title>NGEP:NextGen Education Platform</title>
    <meta name="description" content="Startup Teching tool" />
    <meta name="author" content="Jonas Andrée" />
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/colors.css" />
    <link rel="stylesheet" type="text/css" href="css/nextgen.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/mainMenu.css" />
    <link rel="stylesheet" type="text/css" href="css/mainNav.css" />
    <link rel="stylesheet" type="text/css" href="css/userContent.css" />
    <link rel="stylesheet" type="text/css" href="css/chat.css" />
    <link rel="stylesheet" type="text/css" href="css/mainContent.css" />
</head>
<body class="" onload="setUp(); initPage();">
	<header>
	<div id="background-field">
		<div id="logo">
			<div id="NGE">Nge</div>
			<!-- <div id="NextGen">
				<font size="5" >N</font> <font>ext </font>
				<font size="5" >G</font> <font>en</font>
			</div>
			<div id="education">
				<font size="5">E</font> <font>ducation</font>
			</div> -->
		</div>
	</div>
		<div id="nav-menu-button" class="menu-button"
			onclick="toggleMenuBar(this, 'nav')">
			<div class="bar1"></div>
			<div class="bar2"></div>
			<div class="bar3"></div>
		</div>
		<div id="loggin">
			<div id="loggin-button" class="loggin-button"
				onclick="toggleMenuBar(this, 'user')">
				<div class="loggin-bar-1"></div>
				<div class="loggin-bar-3"></div>
			</div>
		</div>
		<div id="chat">
			<div id="chat-button" class="loggin-button"
				onclick="toggleMenuBar(this, 'chat')">
				<div class="speech-bubble">
					<div></div>
				</div>
			</div>
		</div>

		<nav id="navbar">
			<div id="page-logo-container">
				<div id="page-logo-content">
        			<div id='page-logo' class='nav-item' 
        				 onclick='updateNavBar("0", "Courses"); updateUserNavBar("0", "Courses")' >
        				<h1>Ngep</h1>
        			</div>
    			</div>
			</div>
			<div id="course-navbar">
    			<div id="course-navbar-content" class='sub-nav-container'>
        			<div id="" class="loggin-button">
        				My courses
    				</div>
    				<section id='user-nav-container-main' class="course-containers">
    				</section>
    				<div id="" class="loggin-button">
        				Courses
    				</div>
    				<section id='sub-nav-container-main' class="course-containers">
    				</section>
    			</div>
			</div>
		</nav>
		<div id="user-cont">
            <?php include "php/user/userContent.php"; ?>
		</div>
		<div id="chat-cont">
			<div id="chat-container">
				<div id="chat-content">
				</div>
			</div>
		</div>
	</header>
	<div id="background-field">
		<div id="logo">
			<div id="NGE">Nge</div>
			<!-- <div id="NextGen">
				<font size="5" >N</font> <font>ext </font>
				<font size="5" >G</font> <font>en</font>
			</div>
			<div id="education">
				<font size="5">E</font> <font>ducation</font>
			</div> -->
		</div>
	</div>
	<main id="main">
		<header id="page-heading" >
			<h1 id="page-titel">Page titel</h1>
		</header>
        <div id="main-margin-left"></div>
        <div id="main-splitter-left" 
        	 onmousedown="mainSplitterDown(event, this);"></div>
        <div id="main-left">
        	<section id="arsenalen-header" class="main-header-item">
				Arsenalen
			</section>
    		<section id="arsenalen-main">
    			Arsenalen
    		</section>
    	</div>
        <div id="main-splitter-center" 
        	 onmousedown="mainSplitterDown(event, this);"></div>
        <div id="main-right">
            <section id="trials-header" class="main-header-item">
    			Trials
    		</section>
    		<section id="trials-main">
    			Trials
    		</section>
		</div>
        <div id="main-splitter-right" 
        	 onmousedown="mainSplitterDown(event, this);"></div>
      
	<!--  
		-->
	</main>
	<footer> </footer>
	<script type="text/javascript" src="js/chat/model/chatModel.js"></script>
	<script type="text/javascript" src="js/chat/controller/chatController.js"></script>
	<script type="text/javascript" src="js/chat/view/chatView.js"></script>
	
	<script type="text/javascript" src="js/navBar/model/navBarModel.js"></script>
	<script type="text/javascript" src="js/navBar/controller/navBarController.js"></script>
	<script type="text/javascript" src="js/navBar/view/navBarView.js"></script>
	
	<script type="text/javascript" src="js/user/model/userModel.js"></script>
	<script type="text/javascript" src="js/user/view/userView.js"></script>
	<script type="text/javascript" src="js/user/controller/userController.js"></script>
	
	<script type="text/javascript" src="js/main/mainContent.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>