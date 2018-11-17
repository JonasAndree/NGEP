<!DOCTYPE html>
<html>
<head>
    <title>IT Tools</title>
    <meta name="description" content="Startup Teching tool" />
    <meta name="author" content="Jonas Andrée" />
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/nextgen.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/mainMenu.css" />
    <link rel="stylesheet" type="text/css" href="css/mainNav.css" />
    <link rel="stylesheet" type="text/css" href="css/userContent.css" />
    <link rel="stylesheet" type="text/css" href="css/chat.css" />
</head>
<body class="" onload="">
	<header>
		<div id="background-field">
			<div id="logo" >
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

		<nav id="course-navbar"></nav>
		<div id="user-cont"></div>
		<div id="chat-cont">
			<div id="chat-container">
				<div id="chat-content"></div>
			</div>
		</div>
	</header>

	<header id="main"> </header>
	<main> </main>
	<footer> </footer>

	<script type="text/javascript" src="js/chat/model/chatModel.js"></script>
	<script type="text/javascript" src="js/chat/controller/chatController.js"></script>
	<script type="text/javascript" src="js/chat/view/chatView.js"></script>
	
	<script type="text/javascript" src="js/navBar/model/navBarModel.js"></script>
	<script type="text/javascript" src="js/navBar/controller/navBarController.js"></script>
	<script type="text/javascript" src="js/navBar/view/navBarView.js"></script>
	
	<script type="text/javascript" src="js/user/model/userModel.js"></script>
	<script type="text/javascript" src="js/user/controller/userController.js"></script>
	<script type="text/javascript" src="js/user/view/userView.js"></script>
	
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>