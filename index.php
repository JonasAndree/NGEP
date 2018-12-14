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
    <link rel="stylesheet" type="text/css" href="css/logo.css" />
	
	
	<!-- codemirror  --> 
    <script src="js/lib/codemirror.js"></script>
    <link rel="stylesheet" href="css/lib/codemirror.css">
    <link rel="stylesheet" href="css/lib/monokai.css">
    
    <script src="js/lib/javascript.js"></script>
    <script src="js/lib/addon/selection/active-line.js"></script>
    <script src="js/lib/addon/edit/matchbrackets.js"></script>
	<script src="js/lib/addon/edit/closebrackets.js"></script>

    <script src="js/lib/addon/hint/show-hint.js"></script>
    <script src="js/lib/addon/hint/javascript-hint.js"></script>
    <script src="js/lib/mode/markdown.js"></script>
    
    
    <script src="js/lib/addon/fold/foldcode.js"></script>
    <script src="js/lib/addon/fold/foldgutter.js"></script>
    <script src="js/lib/addon/fold/brace-fold.js"></script>
    <script src="js/lib/addon/fold/xml-fold.js"></script>
    <script src="js/lib/addon/fold/indent-fold.js"></script>
    <script src="js/lib/addon/fold/markdown-fold.js"></script>
    <script src="js/lib/addon/fold/comment-fold.js"></script>

    <link rel="stylesheet" href="css/lib/fullscreen.css">
	<script src="js/lib/addon/fullscreen.js"></script>
	<style>
        .breakpoints { width: .8em; }
    </style>
    
</head>



<body class="" onload="setUp(); initPage(); getViewArsenalen();">
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
		<div id="edit-mode">
			<div id="edit-mode-button" class="edit-mode-button"
				onclick="toggleMenuBar(this, 'edit')">
				<div class="edit-mode-bar-1"></div>
				<div class="edit-mode-bar-2"></div>
				<div class="edit-mode-bar-3"></div>
				<div class="edit-mode-bar-4"></div>
			</div>
		</div>

		<nav id="navbar">
			<div id="page-logo-container">
				<div id="page-logo-content">
        			<div id='page-logo' class='nav-item' 
        				 onclick='updateNavBar("0", "Subjects"); updateUserNavBar("0", "My courses")' >				
		        			<!--<canvas id="canvas-logo-container">
		        			</canvas>-->
        				<!-- <h1>Ngep</h1> -->
        			</div>
    			</div>
			</div>
			<div id="course-navbar">
    			<div id="course-navbar-content" class='sub-nav-container'>
        			<div id="" class="nav-item nav-paranet">
        				My courses
    				</div>
    				<section id='user-nav-container-main' class="course-containers">
    				</section>
    				<div id="" class="nav-item nav-paranet">
        				Subjects
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
	<main id="main">
		<header id="page-heading" >
			<div id="page-image"></div>
			<h1 id="page-titel"  contenteditable="true">Page titel</h1>
		</header>
        <div id="main-margin-left"></div>
        <div id="main-splitter-left" 
        	 onmousedown="mainSplitterDown(event, this);"></div>
        <div id="main-left">
        	<section id="arsenalen-header" class="main-header-item"
    			 onclick="toggleMainContent('left');">
    				<div id="arsenalen-header-text">Arsenalen</div>
    				<div id="arsenalen-header-hidden-text">...</div>
                <div class="animate-arrow">
                	<span id="arsenalen-header-arrow" class="arrow back"><span></span></span>
            	</div>
			</section>
    		<section id="arsenalen-main">
    			<div id="arsenalen-main-container">
        			<div id="arsenalen-main-content" class="main-content">
        				<div id="arsenalen-lefti">
            				<div class="content-div content-header"  contenteditable="true">
            					<h1 id="arsenalen-content-id-1">Arsenalen</h1>
            				</div>
            				<div id="content-div"
            					 class="content-div content-code"
            					 contenteditable="true" 
            					 >
            				</div>
            				
            				<div id="arsenalen-content-id-2" class="content-div" contenteditable="true" onblur="saveText(this)">
                				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ullamcorper 
                				laoreet sem, vel fringilla sem dictum ut. Nullam tincidunt luctus purus, 
                				sed pellentesque magna venenatis laoreet. Nunc in bibendum sem. 
                				Sed commodo ligula ac fringilla laoreet. Duis aliquam leo ut dolor 
                				consequat cursus. Nulla pharetra eros quis porta maximus.
                				Morbi laoreet eros eu eros ultricies tempor. Maecenas non dolor orci.
                                Vestibulum vel urna ut lacus rhoncus sagittis congue ut nibh. Donec ac 
                                ornare justo, non faucibus elit. 
                                Mauris pulvinar lobortis dapibus. Morbi eu quam id neque imperdiet 
                                dictum. Donec id accumsan ligula. Sed et iaculis nisi, nec malesuada 
                                purus. Nullam aliquet enim nec semper posuere. Quisque dictum leo eget 
                                tellus dapibus, nec faucibus urna condimentum.
                                Aenean fermentum est in orci iaculis, eget mollis metus egestas. 
                                Pellentesque a dolor neque. Praesent sit amet urna eu orci efficitur 
                                volutpat. Nam sed tincidunt felis. Nulla tempus quis diam ut 
                                sollicitudin. 
                            </div>
                            <div id="arsenalen-content-id-3" class="content-div" contenteditable="true" onblur="saveText(this)">
                                Aenean efficitur mi tortor, ut mollis ex elementum ac. Duis bibendum
                                 mattis purus, vel viverra nulla ullamcorper quis.
                                In posuere turpis sit amet mi tincidunt, vitae tempor nulla ullamcorper.
                                 Fusce lacus ante, maximus commodo nulla vitae, auctor sollicitudin 
                                 nulla. Sed varius luctus mauris. Duis iaculis nibh sit amet enim egestas, 
                                 vel volutpat libero posuere. Etiam sodales in dolor eget mattis. 
                                 Ut ante tellus, varius vitae ullamcorper at, elementum vel turpis. 
                                 Integer commodo justo ut orci venenatis, vel imperdiet massa imperdiet. 
                                 In mattis vulputate ligula ac malesuada.
                                Nam quis augue ac libero molestie efficitur ut nec velit. Integer 
                                efficitur rhoncus velit, eu vehicula dui ultrices sit amet. In sit 
                                amet gravida metus. Maecenas eu vulputate mi, eget tempus felis. 
                                Cras eu laoreet ante. Fusce nec leo laoreet mauris accumsan luctus 
                                vitae non mi. Nulla facilisi. Maecenas laoreet odio a sem fringilla, 
                                a lobortis felis tristique. Nulla consectetur lacinia magna, id dapibus 
                                ligula aliquam pretium.
                            </div>
                            <div id="arsenalen-content-id-4" class="content-div" contenteditable="true" onblur="saveText(this)">
                				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ullamcorper 
                				laoreet sem, vel fringilla sem dictum ut. Nullam tincidunt luctus purus, 
                				sed pellentesque magna venenatis laoreet. Nunc in bibendum sem. 
                				Sed commodo ligula ac fringilla laoreet. Duis aliquam leo ut dolor 
                				consequat cursus. Nulla pharetra eros quis porta maximus.
                				Morbi laoreet eros eu eros ultricies tempor. Maecenas non dolor orci.
                                Vestibulum vel urna ut lacus rhoncus sagittis congue ut nibh. Donec ac 
                                ornare justo, non faucibus elit. 
                                Mauris pulvinar lobortis dapibus. Morbi eu quam id neque imperdiet 
                                dictum. Donec id accumsan ligula. Sed et iaculis nisi, nec malesuada 
                                purus. Nullam aliquet enim nec semper posuere. Quisque dictum leo eget 
                                tellus dapibus, nec faucibus urna condimentum.
                                Aenean fermentum est in orci iaculis, eget mollis metus egestas. 
                                Pellentesque a dolor neque. Praesent sit amet urna eu orci efficitur 
                                volutpat. Nam sed tincidunt felis. Nulla tempus quis diam ut 
                                sollicitudin. 
                            </div>
                            <div id="arsenalen-content-id-5" class="content-div" contenteditable="true" onblur="saveText(this)">
                                Aenean efficitur mi tortor, ut mollis ex elementum ac. Duis bibendum
                                 mattis purus, vel viverra nulla ullamcorper quis.
                                In posuere turpis sit amet mi tincidunt, vitae tempor nulla ullamcorper.
                                 Fusce lacus ante, maximus commodo nulla vitae, auctor sollicitudin 
                                 nulla. Sed varius luctus mauris. Duis iaculis nibh sit amet enim egestas, 
                                 vel volutpat libero posuere. Etiam sodales in dolor eget mattis. 
                                 Ut ante tellus, varius vitae ullamcorper at, elementum vel turpis. 
                                 Integer commodo justo ut orci venenatis, vel imperdiet massa imperdiet. 
                                 In mattis vulputate ligula ac malesuada.
                                Nam quis augue ac libero molestie efficitur ut nec velit. Integer 
                                efficitur rhoncus velit, eu vehicula dui ultrices sit amet. In sit 
                                amet gravida metus. Maecenas eu vulputate mi, eget tempus felis. 
                                Cras eu laoreet ante. Fusce nec leo laoreet mauris accumsan luctus 
                                vitae non mi. Nulla facilisi. Maecenas laoreet odio a sem fringilla, 
                                a lobortis felis tristique. Nulla consectetur lacinia magna, id dapibus 
                                ligula aliquam pretium.
                				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ullamcorper 
                				laoreet sem, vel fringilla sem dictum ut. Nullam tincidunt luctus purus, 
                				sed pellentesque magna venenatis laoreet. Nunc in bibendum sem. 
                				Sed commodo ligula ac fringilla laoreet. Duis aliquam leo ut dolor 
                				consequat cursus. Nulla pharetra eros quis porta maximus.
                				Morbi laoreet eros eu eros ultricies tempor. Maecenas non dolor orci.
                                Vestibulum vel urna ut lacus rhoncus sagittis congue ut nibh. Donec ac 
                                ornare justo, non faucibus elit. 
                                Mauris pulvinar lobortis dapibus. Morbi eu quam id neque imperdiet 
                                dictum. Donec id accumsan ligula. Sed et iaculis nisi, nec malesuada 
                                purus. Nullam aliquet enim nec semper posuere. Quisque dictum leo eget 
                                tellus dapibus, nec faucibus urna condimentum.
                                Aenean fermentum est in orci iaculis, eget mollis metus egestas. 
                                Pellentesque a dolor neque. Praesent sit amet urna eu orci efficitur 
                                volutpat. Nam sed tincidunt felis. Nulla tempus quis diam ut 
                                sollicitudin. 
                            </div>
                            <div id="arsenalen-content-id-6" class="content-div" contenteditable="true" onblur="saveText(this)">
                                Aenean efficitur mi tortor, ut mollis ex elementum ac. Duis bibendum
                                 mattis purus, vel viverra nulla ullamcorper quis.
                                In posuere turpis sit amet mi tincidunt, vitae tempor nulla ullamcorper.
                                 Fusce lacus ante, maximus commodo nulla vitae, auctor sollicitudin 
                                 nulla. Sed varius luctus mauris. Duis iaculis nibh sit amet enim egestas, 
                                 vel volutpat libero posuere. Etiam sodales in dolor eget mattis. 
                                 Ut ante tellus, varius vitae ullamcorper at, elementum vel turpis. 
                                 Integer commodo justo ut orci venenatis, vel imperdiet massa imperdiet. 
                                 In mattis vulputate ligula ac malesuada.
                                Nam quis augue ac libero molestie efficitur ut nec velit. Integer 
                                efficitur rhoncus velit, eu vehicula dui ultrices sit amet. In sit 
                                amet gravida metus. Maecenas eu vulputate mi, eget tempus felis. 
                                Cras eu laoreet ante. Fusce nec leo laoreet mauris accumsan luctus 
                                vitae non mi. Nulla facilisi. Maecenas laoreet odio a sem fringilla, 
                                a lobortis felis tristique. Nulla consectetur lacinia magna, id dapibus 
                                ligula aliquam pretium.
                            </div>
                            <div id="arsenalen-content-id-7" class="content-div" contenteditable="true" onblur="saveText(this)">
                				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ullamcorper 
                				laoreet sem, vel fringilla sem dictum ut. Nullam tincidunt luctus purus, 
                				sed pellentesque magna venenatis laoreet. Nunc in bibendum sem. 
                				Sed commodo ligula ac fringilla laoreet. Duis aliquam leo ut dolor 
                				consequat cursus. Nulla pharetra eros quis porta maximus.
                				Morbi laoreet eros eu eros ultricies tempor. Maecenas non dolor orci.
                                Vestibulum vel urna ut lacus rhoncus sagittis congue ut nibh. Donec ac 
                                ornare justo, non faucibus elit. 
                                Mauris pulvinar lobortis dapibus. Morbi eu quam id neque imperdiet 
                                dictum. Donec id accumsan ligula. Sed et iaculis nisi, nec malesuada 
                                purus. Nullam aliquet enim nec semper posuere. Quisque dictum leo eget 
                                tellus dapibus, nec faucibus urna condimentum.
                                Aenean fermentum est in orci iaculis, eget mollis metus egestas. 
                                Pellentesque a dolor neque. Praesent sit amet urna eu orci efficitur 
                                volutpat. Nam sed tincidunt felis. Nulla tempus quis diam ut 
                                sollicitudin. 
                            </div>
                            <div id="arsenalen-content-id-8" class="content-div" contenteditable="true" onblur="saveText(this)">
                                Aenean efficitur mi tortor, ut mollis ex elementum ac. Duis bibendum
                                 mattis purus, vel viverra nulla ullamcorper quis.
                                In posuere turpis sit amet mi tincidunt, vitae tempor nulla ullamcorper.
                                 Fusce lacus ante, maximus commodo nulla vitae, auctor sollicitudin 
                                 nulla. Sed varius luctus mauris. Duis iaculis nibh sit amet enim egestas, 
                                 vel volutpat libero posuere. Etiam sodales in dolor eget mattis. 
                                 Ut ante tellus, varius vitae ullamcorper at, elementum vel turpis. 
                                 Integer commodo justo ut orci venenatis, vel imperdiet massa imperdiet. 
                                 In mattis vulputate ligula ac malesuada.
                                Nam quis augue ac libero molestie efficitur ut nec velit. Integer 
                                efficitur rhoncus velit, eu vehicula dui ultrices sit amet. In sit 
                                amet gravida metus. Maecenas eu vulputate mi, eget tempus felis. 
                                Cras eu laoreet ante. Fusce nec leo laoreet mauris accumsan luctus 
                                vitae non mi. Nulla facilisi. Maecenas laoreet odio a sem fringilla, 
                                a lobortis felis tristique. Nulla consectetur lacinia magna, id dapibus 
                                ligula aliquam pretium. 
                            </div>
                            <div id="arsenalen-content-id-9" class="content-div" contenteditable="true" onblur="saveText(this)">
                				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ullamcorper 
                				laoreet sem, vel fringilla sem dictum ut. Nullam tincidunt luctus purus, 
                				sed pellentesque magna venenatis laoreet. Nunc in bibendum sem. 
                				Sed commodo ligula ac fringilla laoreet. Duis aliquam leo ut dolor 
                				consequat cursus. Nulla pharetra eros quis porta maximus.
                				Morbi laoreet eros eu eros ultricies tempor. Maecenas non dolor orci.
                                Vestibulum vel urna ut lacus rhoncus sagittis congue ut nibh. Donec ac 
                                ornare justo, non faucibus elit. 
                                Mauris pulvinar lobortis dapibus. Morbi eu quam id neque imperdiet 
                                dictum. Donec id accumsan ligula. Sed et iaculis nisi, nec malesuada 
                                purus. Nullam aliquet enim nec semper posuere. Quisque dictum leo eget 
                                tellus dapibus, nec faucibus urna condimentum.
                                Aenean fermentum est in orci iaculis, eget mollis metus egestas. 
                                Pellentesque a dolor neque. Praesent sit amet urna eu orci efficitur 
                                volutpat. Nam sed tincidunt felis. Nulla tempus quis diam ut 
                                sollicitudin. 
                            </div>
                            <div id="arsenalen-content-id-10" class="content-div" contenteditable="true" onblur="saveText(this)">
                                Aenean efficitur mi tortor, ut mollis ex elementum ac. Duis bibendum
                                 mattis purus, vel viverra nulla ullamcorper quis.
                                In posuere turpis sit amet mi tincidunt, vitae tempor nulla ullamcorper.
                                 Fusce lacus ante, maximus commodo nulla vitae, auctor sollicitudin 
                                 nulla. Sed varius luctus mauris. Duis iaculis nibh sit amet enim egestas, 
                                 vel volutpat libero posuere. Etiam sodales in dolor eget mattis. 
                                 Ut ante tellus, varius vitae ullamcorper at, elementum vel turpis. 
                                 Integer commodo justo ut orci venenatis, vel imperdiet massa imperdiet. 
                                 In mattis vulputate ligula ac malesuada.
                                Nam quis augue ac libero molestie efficitur ut nec velit. Integer 
                                efficitur rhoncus velit, eu vehicula dui ultrices sit amet. In sit 
                                amet gravida metus. Maecenas eu vulputate mi, eget tempus felis. 
                                Cras eu laoreet ante. Fusce nec leo laoreet mauris accumsan luctus 
                                vitae non mi. Nulla facilisi. Maecenas laoreet odio a sem fringilla, 
                                a lobortis felis tristique. Nulla consectetur lacinia magna, id dapibus 
                                ligula aliquam pretium.
                            </div>
                            <div id="arsenalen-content-id-11" class="content-div content-header" contenteditable="true" onblur="saveText(this)">
    							<h1>Arsenalen22</h1>
    						</div>
    						<div id="arsenalen-content-id-12" class="content-div" contenteditable="true" onblur="saveText(this)">
                				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ullamcorper 
                				laoreet sem, vel fringilla sem dictum ut. Nullam tincidunt luctus purus, 
                				sed pellentesque magna venenatis laoreet. Nunc in bibendum sem. 
                				Sed commodo ligula ac fringilla laoreet. Duis aliquam leo ut dolor 
                				consequat cursus. Nulla pharetra eros quis porta maximus.
                				Morbi laoreet eros eu eros ultricies tempor. Maecenas non dolor orci.
                                Vestibulum vel urna ut lacus rhoncus sagittis congue ut nibh. Donec ac 
                                ornare justo, non faucibus elit. 
                                Mauris pulvinar lobortis dapibus. Morbi eu quam id neque imperdiet 
                                dictum. Donec id accumsan ligula. Sed et iaculis nisi, nec malesuada 
                                purus. Nullam aliquet enim nec semper posuere. Quisque dictum leo eget 
                                tellus dapibus, nec faucibus urna condimentum.
                                Aenean fermentum est in orci iaculis, eget mollis metus egestas. 
                                Pellentesque a dolor neque. Praesent sit amet urna eu orci efficitur 
                                volutpat. Nam sed tincidunt felis. Nulla tempus quis diam ut 
                                sollicitudin. 
                            </div>
    
    						<div id="arsenalen-content-id-13" class="content-div" contenteditable="true" onblur="saveText(this)">
                                Aenean efficitur mi tortor, ut mollis ex elementum ac. Duis bibendum
                                 mattis purus, vel viverra nulla ullamcorper quis.
                                In posuere turpis sit amet mi tincidunt, vitae tempor nulla ullamcorper.
                                 Fusce lacus ante, maximus commodo nulla vitae, auctor sollicitudin 
                                 nulla. Sed varius luctus mauris. Duis iaculis nibh sit amet enim egestas, 
                                 vel volutpat libero posuere. Etiam sodales in dolor eget mattis. 
                                 Ut ante tellus, varius vitae ullamcorper at, elementum vel turpis. 
                                 Integer commodo justo ut orci venenatis, vel imperdiet massa imperdiet. 
                                 In mattis vulputate ligula ac malesuada.
                                Nam quis augue ac libero molestie efficitur ut nec velit. Integer 
                                efficitur rhoncus velit, eu vehicula dui ultrices sit amet. In sit 
                                amet gravida metus. Maecenas eu vulputate mi, eget tempus felis. 
                                Cras eu laoreet ante. Fusce nec leo laoreet mauris accumsan luctus 
                                vitae non mi. Nulla facilisi. Maecenas laoreet odio a sem fringilla, 
                                a lobortis felis tristique. Nulla consectetur lacinia magna, id dapibus 
                                ligula aliquam pretium.
            				</div>
        				</div>
    				</div>
    			</div>
    			<div id="arsenalen-main-nav-content" class="main-nav-content">
    				<div class="content-div content-header content-nav" onclick="goToContent('arsenalen-content-id-1')">
        				<h1>Arsenalen</h1>
        			</div>
        			<div class="content-div content-nav" onclick="goToContent('arsenalen-content-id-2')">
        				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ullamcorper 
        				laoreet sem, vel fringilla sem dictum ut. Nullam tincidunt luctus purus, 
        				sed pellentesque magna venenatis laoreet. Nunc in bibendum sem. 
        				Sed commodo ligula ac fringilla laoreet. Duis aliquam leo ut dolor 
        				consequat cursus. Nulla pharetra eros quis porta maximus.
        				Morbi laoreet eros eu eros ultricies tempor. Maecenas non dolor orci.
                        Vestibulum vel urna ut lacus rhoncus sagittis congue ut nibh. Donec ac 
                        ornare justo, non faucibus elit. 
                        Mauris pulvinar lobortis dapibus. Morbi eu quam id neque imperdiet 
                        dictum. Donec id accumsan ligula. Sed et iaculis nisi, nec malesuada 
                        purus. Nullam aliquet enim nec semper posuere. Quisque dictum leo eget 
                        tellus dapibus, nec faucibus urna condimentum.
                        Aenean fermentum est in orci iaculis, eget mollis metus egestas. 
                        Pellentesque a dolor neque. Praesent sit amet urna eu orci efficitur 
                        volutpat. Nam sed tincidunt felis. Nulla tempus quis diam ut 
                        sollicitudin. 
                     </div>
                     <div class="content-div content-nav" onclick="goToContent('arsenalen-content-id-3')">
                        Aenean efficitur mi tortor, ut mollis ex elementum ac. Duis bibendum
                         mattis purus, vel viverra nulla ullamcorper quis.
                        In posuere turpis sit amet mi tincidunt, vitae tempor nulla ullamcorper.
                         Fusce lacus ante, maximus commodo nulla vitae, auctor sollicitudin 
                         nulla. Sed varius luctus mauris. Duis iaculis nibh sit amet enim egestas, 
                         vel volutpat libero posuere. Etiam sodales in dolor eget mattis. 
                         Ut ante tellus, varius vitae ullamcorper at, elementum vel turpis. 
                         Integer commodo justo ut orci venenatis, vel imperdiet massa imperdiet. 
                         In mattis vulputate ligula ac malesuada.
                        Nam quis augue ac libero molestie efficitur ut nec velit. Integer 
                        efficitur rhoncus velit, eu vehicula dui ultrices sit amet. In sit 
                        amet gravida metus. Maecenas eu vulputate mi, eget tempus felis. 
                        Cras eu laoreet ante. Fusce nec leo laoreet mauris accumsan luctus 
                        vitae non mi. Nulla facilisi. Maecenas laoreet odio a sem fringilla, 
                        a lobortis felis tristique. Nulla consectetur lacinia magna, id dapibus 
                        ligula aliquam pretium.
                    </div>
                    <div class="content-div content-nav" onclick="goToContent('arsenalen-content-id-4')">
        				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ullamcorper 
        				laoreet sem, vel fringilla sem dictum ut. Nullam tincidunt luctus purus, 
        				sed pellentesque magna venenatis laoreet. Nunc in bibendum sem. 
        				Sed commodo ligula ac fringilla laoreet. Duis aliquam leo ut dolor 
        				consequat cursus. Nulla pharetra eros quis porta maximus.
        				Morbi laoreet eros eu eros ultricies tempor. Maecenas non dolor orci.
                        Vestibulum vel urna ut lacus rhoncus sagittis congue ut nibh. Donec ac 
                        ornare justo, non faucibus elit. 
                        Mauris pulvinar lobortis dapibus. Morbi eu quam id neque imperdiet 
                        dictum. Donec id accumsan ligula. Sed et iaculis nisi, nec malesuada 
                        purus. Nullam aliquet enim nec semper posuere. Quisque dictum leo eget 
                        tellus dapibus, nec faucibus urna condimentum.
                        Aenean fermentum est in orci iaculis, eget mollis metus egestas. 
                        Pellentesque a dolor neque. Praesent sit amet urna eu orci efficitur 
                        volutpat. Nam sed tincidunt felis. Nulla tempus quis diam ut 
                        sollicitudin. 
                    </div>
                    <div class="content-div content-nav" onclick="goToContent('arsenalen-content-id-5')">
                        Aenean efficitur mi tortor, ut mollis ex elementum ac. Duis bibendum
                         mattis purus, vel viverra nulla ullamcorper quis.
                        In posuere turpis sit amet mi tincidunt, vitae tempor nulla ullamcorper.
                         Fusce lacus ante, maximus commodo nulla vitae, auctor sollicitudin 
                         nulla. Sed varius luctus mauris. Duis iaculis nibh sit amet enim egestas, 
                         vel volutpat libero posuere. Etiam sodales in dolor eget mattis. 
                         Ut ante tellus, varius vitae ullamcorper at, elementum vel turpis. 
                         Integer commodo justo ut orci venenatis, vel imperdiet massa imperdiet. 
                         In mattis vulputate ligula ac malesuada.
                        Nam quis augue ac libero molestie efficitur ut nec velit. Integer 
                        efficitur rhoncus velit, eu vehicula dui ultrices sit amet. In sit 
                        amet gravida metus. Maecenas eu vulputate mi, eget tempus felis. 
                        Cras eu laoreet ante. Fusce nec leo laoreet mauris accumsan luctus 
                        vitae non mi. Nulla facilisi. Maecenas laoreet odio a sem fringilla, 
                        a lobortis felis tristique. Nulla consectetur lacinia magna, id dapibus 
                        ligula aliquam pretium.
        				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ullamcorper 
        				laoreet sem, vel fringilla sem dictum ut. Nullam tincidunt luctus purus, 
        				sed pellentesque magna venenatis laoreet. Nunc in bibendum sem. 
        				Sed commodo ligula ac fringilla laoreet. Duis aliquam leo ut dolor 
        				consequat cursus. Nulla pharetra eros quis porta maximus.
        				Morbi laoreet eros eu eros ultricies tempor. Maecenas non dolor orci.
                        Vestibulum vel urna ut lacus rhoncus sagittis congue ut nibh. Donec ac 
                        ornare justo, non faucibus elit. 
                        Mauris pulvinar lobortis dapibus. Morbi eu quam id neque imperdiet 
                        dictum. Donec id accumsan ligula. Sed et iaculis nisi, nec malesuada 
                        purus. Nullam aliquet enim nec semper posuere. Quisque dictum leo eget 
                        tellus dapibus, nec faucibus urna condimentum.
                        Aenean fermentum est in orci iaculis, eget mollis metus egestas. 
                        Pellentesque a dolor neque. Praesent sit amet urna eu orci efficitur 
                        volutpat. Nam sed tincidunt felis. Nulla tempus quis diam ut 
                        sollicitudin. 
                    </div>
                    <div class="content-div content-nav" onclick="goToContent('arsenalen-content-id-6')">
                        Aenean efficitur mi tortor, ut mollis ex elementum ac. Duis bibendum
                         mattis purus, vel viverra nulla ullamcorper quis.
                        In posuere turpis sit amet mi tincidunt, vitae tempor nulla ullamcorper.
                         Fusce lacus ante, maximus commodo nulla vitae, auctor sollicitudin 
                         nulla. Sed varius luctus mauris. Duis iaculis nibh sit amet enim egestas, 
                         vel volutpat libero posuere. Etiam sodales in dolor eget mattis. 
                         Ut ante tellus, varius vitae ullamcorper at, elementum vel turpis. 
                         Integer commodo justo ut orci venenatis, vel imperdiet massa imperdiet. 
                         In mattis vulputate ligula ac malesuada.
                        Nam quis augue ac libero molestie efficitur ut nec velit. Integer 
                        efficitur rhoncus velit, eu vehicula dui ultrices sit amet. In sit 
                        amet gravida metus. Maecenas eu vulputate mi, eget tempus felis. 
                        Cras eu laoreet ante. Fusce nec leo laoreet mauris accumsan luctus 
                        vitae non mi. Nulla facilisi. Maecenas laoreet odio a sem fringilla, 
                        a lobortis felis tristique. Nulla consectetur lacinia magna, id dapibus 
                        ligula aliquam pretium.
                    </div>
                    <div class="content-div content-nav" onclick="goToContent('arsenalen-content-id-7')">
        				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ullamcorper 
        				laoreet sem, vel fringilla sem dictum ut. Nullam tincidunt luctus purus, 
        				sed pellentesque magna venenatis laoreet. Nunc in bibendum sem. 
        				Sed commodo ligula ac fringilla laoreet. Duis aliquam leo ut dolor 
        				consequat cursus. Nulla pharetra eros quis porta maximus.
        				Morbi laoreet eros eu eros ultricies tempor. Maecenas non dolor orci.
                        Vestibulum vel urna ut lacus rhoncus sagittis congue ut nibh. Donec ac 
                        ornare justo, non faucibus elit. 
                        Mauris pulvinar lobortis dapibus. Morbi eu quam id neque imperdiet 
                        dictum. Donec id accumsan ligula. Sed et iaculis nisi, nec malesuada 
                        purus. Nullam aliquet enim nec semper posuere. Quisque dictum leo eget 
                        tellus dapibus, nec faucibus urna condimentum.
                        Aenean fermentum est in orci iaculis, eget mollis metus egestas. 
                        Pellentesque a dolor neque. Praesent sit amet urna eu orci efficitur 
                        volutpat. Nam sed tincidunt felis. Nulla tempus quis diam ut 
                        sollicitudin. 
                    </div>
                    <div class="content-div content-nav" onclick="goToContent('arsenalen-content-id-8')">
                        Aenean efficitur mi tortor, ut mollis ex elementum ac. Duis bibendum
                         mattis purus, vel viverra nulla ullamcorper quis.
                        In posuere turpis sit amet mi tincidunt, vitae tempor nulla ullamcorper.
                         Fusce lacus ante, maximus commodo nulla vitae, auctor sollicitudin 
                         nulla. Sed varius luctus mauris. Duis iaculis nibh sit amet enim egestas, 
                         vel volutpat libero posuere. Etiam sodales in dolor eget mattis. 
                         Ut ante tellus, varius vitae ullamcorper at, elementum vel turpis. 
                         Integer commodo justo ut orci venenatis, vel imperdiet massa imperdiet. 
                         In mattis vulputate ligula ac malesuada.
                        Nam quis augue ac libero molestie efficitur ut nec velit. Integer 
                        efficitur rhoncus velit, eu vehicula dui ultrices sit amet. In sit 
                        amet gravida metus. Maecenas eu vulputate mi, eget tempus felis. 
                        Cras eu laoreet ante. Fusce nec leo laoreet mauris accumsan luctus 
                        vitae non mi. Nulla facilisi. Maecenas laoreet odio a sem fringilla, 
                        a lobortis felis tristique. Nulla consectetur lacinia magna, id dapibus 
                        ligula aliquam pretium. 
                    </div>
                    <div class="content-div content-nav" onclick="goToContent('arsenalen-content-id-9')">
        				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ullamcorper 
        				laoreet sem, vel fringilla sem dictum ut. Nullam tincidunt luctus purus, 
        				sed pellentesque magna venenatis laoreet. Nunc in bibendum sem. 
        				Sed commodo ligula ac fringilla laoreet. Duis aliquam leo ut dolor 
        				consequat cursus. Nulla pharetra eros quis porta maximus.
        				Morbi laoreet eros eu eros ultricies tempor. Maecenas non dolor orci.
                        Vestibulum vel urna ut lacus rhoncus sagittis congue ut nibh. Donec ac 
                        ornare justo, non faucibus elit. 
                        Mauris pulvinar lobortis dapibus. Morbi eu quam id neque imperdiet 
                        dictum. Donec id accumsan ligula. Sed et iaculis nisi, nec malesuada 
                        purus. Nullam aliquet enim nec semper posuere. Quisque dictum leo eget 
                        tellus dapibus, nec faucibus urna condimentum.
                        Aenean fermentum est in orci iaculis, eget mollis metus egestas. 
                        Pellentesque a dolor neque. Praesent sit amet urna eu orci efficitur 
                        volutpat. Nam sed tincidunt felis. Nulla tempus quis diam ut 
                        sollicitudin. 
                    </div>
                    <div class="content-div content-nav" onclick="goToContent('arsenalen-content-id-10')">
                        Aenean efficitur mi tortor, ut mollis ex elementum ac. Duis bibendum
                         mattis purus, vel viverra nulla ullamcorper quis.
                        In posuere turpis sit amet mi tincidunt, vitae tempor nulla ullamcorper.
                         Fusce lacus ante, maximus commodo nulla vitae, auctor sollicitudin 
                         nulla. Sed varius luctus mauris. Duis iaculis nibh sit amet enim egestas, 
                         vel volutpat libero posuere. Etiam sodales in dolor eget mattis. 
                         Ut ante tellus, varius vitae ullamcorper at, elementum vel turpis. 
                         Integer commodo justo ut orci venenatis, vel imperdiet massa imperdiet. 
                         In mattis vulputate ligula ac malesuada.
                        Nam quis augue ac libero molestie efficitur ut nec velit. Integer 
                        efficitur rhoncus velit, eu vehicula dui ultrices sit amet. In sit 
                        amet gravida metus. Maecenas eu vulputate mi, eget tempus felis. 
                        Cras eu laoreet ante. Fusce nec leo laoreet mauris accumsan luctus 
                        vitae non mi. Nulla facilisi. Maecenas laoreet odio a sem fringilla, 
                        a lobortis felis tristique. Nulla consectetur lacinia magna, id dapibus 
                        ligula aliquam pretium.
                    </div>
                    <div class="content-div content-header content-nav" onclick="goToContent('arsenalen-content-id-11')">
						<h1>Arsenalen22</h1>
					</div>
					<div class="content-div content-nav" onclick="goToContent('arsenalen-content-id-12')" onblur="saveText(this)">
        				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ullamcorper 
        				laoreet sem, vel fringilla sem dictum ut. Nullam tincidunt luctus purus, 
        				sed pellentesque magna venenatis laoreet. Nunc in bibendum sem. 
        				Sed commodo ligula ac fringilla laoreet. Duis aliquam leo ut dolor 
        				consequat cursus. Nulla pharetra eros quis porta maximus.
        				Morbi laoreet eros eu eros ultricies tempor. Maecenas non dolor orci.
                        Vestibulum vel urna ut lacus rhoncus sagittis congue ut nibh. Donec ac 
                        ornare justo, non faucibus elit. 
                        Mauris pulvinar lobortis dapibus. Morbi eu quam id neque imperdiet 
                        dictum. Donec id accumsan ligula. Sed et iaculis nisi, nec malesuada 
                        purus. Nullam aliquet enim nec semper posuere. Quisque dictum leo eget 
                        tellus dapibus, nec faucibus urna condimentum.
                        Aenean fermentum est in orci iaculis, eget mollis metus egestas. 
                        Pellentesque a dolor neque. Praesent sit amet urna eu orci efficitur 
                        volutpat. Nam sed tincidunt felis. Nulla tempus quis diam ut 
                        sollicitudin. </div>
                        
					<div class="content-div content-nav" onclick="goToContent('arsenalen-content-id-13')">
                        Aenean efficitur mi tortor, ut mollis ex elementum ac. Duis bibendum
                         mattis purus, vel viverra nulla ullamcorper quis.
                        In posuere turpis sit amet mi tincidunt, vitae tempor nulla ullamcorper.
                         Fusce lacus ante, maximus commodo nulla vitae, auctor sollicitudin 
                         nulla. Sed varius luctus mauris. Duis iaculis nibh sit amet enim egestas, 
                         vel volutpat libero posuere. Etiam sodales in dolor eget mattis. 
                         Ut ante tellus, varius vitae ullamcorper at, elementum vel turpis. 
                         Integer commodo justo ut orci venenatis, vel imperdiet massa imperdiet. 
                         In mattis vulputate ligula ac malesuada.
                        Nam quis augue ac libero molestie efficitur ut nec velit. Integer 
                        efficitur rhoncus velit, eu vehicula dui ultrices sit amet. In sit 
                        amet gravida metus. Maecenas eu vulputate mi, eget tempus felis. 
                        Cras eu laoreet ante. Fusce nec leo laoreet mauris accumsan luctus 
                        vitae non mi. Nulla facilisi. Maecenas laoreet odio a sem fringilla, 
                        a lobortis felis tristique. Nulla consectetur lacinia magna, id dapibus 
                        ligula aliquam pretium.
    				</div>
    			</div>
    			<div id="arsenalen-viewer"></div>
    		</section>
    	</div>
        <div id="main-splitter-center" 
        	 onmousedown="mainSplitterDown(event, this);"></div>
        <div id="main-right">
            <section id="trials-header" class="main-header-item"
        			 onclick="toggleMainContent('right');">
    			<div id="trials-header-text">Trials</div>
    			<div id="trials-header-hidden-text">...</div>
                <div class="animate-arrow">
                	<span id="trials-header-arrow" class="arrow"><span></span></span>
            	</div>
    		</section>
    		<section id="trials-main">
    			<div id="trials-main-nav-content" class="main-nav-content">
    				<div class="content-div content-header content-nav">
    					<h1>Trials</h1>
    				</div>
                    <div class="content-div content-nav">
    					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ullamcorper 
        				laoreet sem, vel fringilla sem dictum ut. Nullam tincidunt luctus purus, 
        				sed pellentesque magna venenatis laoreet. Nunc in bibendum sem. 
        				Sed commodo ligula ac fringilla laoreet. Duis aliquam leo ut dolor 
        				consequat cursus. Nulla pharetra eros quis porta maximus.
        				Morbi laoreet eros eu eros ultricies tempor. Maecenas non dolor orci.
                        Vestibulum vel urna ut lacus rhoncus sagittis congue ut nibh. Donec ac 
                        ornare justo, non faucibus elit. 
                        Mauris pulvinar lobortis dapibus. Morbi eu quam id neque imperdiet 
                        dictum. Donec id accumsan ligula. Sed et iaculis nisi, nec malesuada 
                        purus. Nullam aliquet enim nec semper posuere. Quisque dictum leo eget 
                        tellus dapibus, nec faucibus urna condimentum.
                        Aenean fermentum est in orci iaculis, eget mollis metus egestas. 
                        Pellentesque a dolor neque. Praesent sit amet urna eu orci efficitur 
                        volutpat. Nam sed tincidunt felis. Nulla tempus quis diam ut 
                        sollicitudin. </div>
                    <div class="content-div content-nav">
                        Aenean efficitur mi tortor, ut mollis ex elementum ac. Duis bibendum
                         mattis purus, vel viverra nulla ullamcorper quis.
                        In posuere turpis sit amet mi tincidunt, vitae tempor nulla ullamcorper.
                         Fusce lacus ante, maximus commodo nulla vitae, auctor sollicitudin 
                         nulla. Sed varius luctus mauris. Duis iaculis nibh sit amet enim egestas, 
                         vel volutpat libero posuere. Etiam sodales in dolor eget mattis. 
                         Ut ante tellus, varius vitae ullamcorper at, elementum vel turpis. 
                         Integer commodo justo ut orci venenatis, vel imperdiet massa imperdiet. 
                         In mattis vulputate ligula ac malesuada.
                        Nam quis augue ac libero molestie efficitur ut nec velit. Integer 
                        efficitur rhoncus velit, eu vehicula dui ultrices sit amet. In sit 
                        amet gravida metus. Maecenas eu vulputate mi, eget tempus felis. 
                        Cras eu laoreet ante. Fusce nec leo laoreet mauris accumsan luctus 
                        vitae non mi. Nulla facilisi. Maecenas laoreet odio a sem fringilla, 
                        a lobortis felis tristique. Nulla consectetur lacinia magna, id dapibus 
                        ligula aliquam pretium.
                    </div>
    			</div>
    			<div id="trials-main-container">
        			<div id="trials-main-content" class="main-content">
    					<div class="content-div content-header">
    						<h1>Trials</h1>
    					</div>
        				<div class="content-div" contenteditable="true" onfocus="showEditableBar(this)" onblur="saveText(this)">
            				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ullamcorper 
            				laoreet sem, vel fringilla sem dictum ut. Nullam tincidunt luctus purus, 
            				sed pellentesque magna venenatis laoreet. Nunc in bibendum sem. 
            				Sed commodo ligula ac fringilla laoreet. Duis aliquam leo ut dolor 
            				consequat cursus. Nulla pharetra eros quis porta maximus.
            				Morbi laoreet eros eu eros ultricies tempor. Maecenas non dolor orci.
                            Vestibulum vel urna ut lacus rhoncus sagittis congue ut nibh. Donec ac 
                            ornare justo, non faucibus elit. 
                            Mauris pulvinar lobortis dapibus. Morbi eu quam id neque imperdiet 
                            dictum. Donec id accumsan ligula. Sed et iaculis nisi, nec malesuada 
                            purus. Nullam aliquet enim nec semper posuere. Quisque dictum leo eget 
                            tellus dapibus, nec faucibus urna condimentum.
                            Aenean fermentum est in orci iaculis, eget mollis metus egestas. 
                            Pellentesque a dolor neque. Praesent sit amet urna eu orci efficitur 
                            volutpat. Nam sed tincidunt felis. Nulla tempus quis diam ut 
                            sollicitudin. 
                        </div>
                        <div class="content-div" contenteditable="true" onfocus="showEditableBar(this)" onblur="saveText(this)">
                            Aenean efficitur mi tortor, ut mollis ex elementum ac. Duis bibendum
                             mattis purus, vel viverra nulla ullamcorper quis.
                            In posuere turpis sit amet mi tincidunt, vitae tempor nulla ullamcorper.
                             Fusce lacus ante, maximus commodo nulla vitae, auctor sollicitudin 
                             nulla. Sed varius luctus mauris. Duis iaculis nibh sit amet enim egestas, 
                             vel volutpat libero posuere. Etiam sodales in dolor eget mattis. 
                             Ut ante tellus, varius vitae ullamcorper at, elementum vel turpis. 
                             Integer commodo justo ut orci venenatis, vel imperdiet massa imperdiet. 
                             In mattis vulputate ligula ac malesuada.
                            Nam quis augue ac libero molestie efficitur ut nec velit. Integer 
                            efficitur rhoncus velit, eu vehicula dui ultrices sit amet. In sit 
                            amet gravida metus. Maecenas eu vulputate mi, eget tempus felis. 
                            Cras eu laoreet ante. Fusce nec leo laoreet mauris accumsan luctus 
                            vitae non mi. Nulla facilisi. Maecenas laoreet odio a sem fringilla, 
                            a lobortis felis tristique. Nulla consectetur lacinia magna, id dapibus 
                            ligula aliquam pretium.
                       	</div>
        			</div>
    			</div>
    		</section>
		</div>
        <div id="main-splitter-right" 
        	 onmousedown="mainSplitterDown(event, this);"></div>
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



   	<!-- <script type="text/javascript" src="js/three.min.js"></script>
	<script type="text/javascript" src="js/logo.js"></script>
	 -->
</body>
</html>