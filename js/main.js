var menuButton = document.getElementById("nav-menu-button");
menuButton.classList.toggle("toggle");
toggleMenuBar(menuButton);

function toggleMenuBar(menuElement) {
	menuElement.classList.toggle("toggle");
	document.getElementById("course-navbar").classList.toggle("toggle");
}


uppdateNavBarContent("null", "level0");
var activeLevel = 0; 
function uppdateNavBarContentClick(navBarParrent) {
	uppdateNavBarContent(navBarParrent, "level0");
	activeLevel = document.getElementById("test").getAttribute("data-value") + 1;
}

function uppdateNavBarContent(navBarParrent, menu) {
	var subjectList = document.getElementById(menu);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			subjectList.innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "php/getPages.php?parrent=" + navBarParrent, true);
	xmlhttp.send();
}

var numbMenues = getMinNavLevel();
function addSubbMenues() {
	console.log(numbMenues);
	for (var i = 0; i < parseInt(numbMenues); i++) {
		var container = document.createElement("div");
		container.classList.add("sub-nav-conainer");
		container.setAttribute("id", "sub-nav-conainer-" + i);
		
		var content = document.createElement("div");
		content.classList.add("sub-nav-content");
		content.setAttribute("id", "sub-nav-content-" + i);
		var width = window.innerWidth / 10; 
		if (width < 125)
			width = 125;
		
		content.style.width = width + "px";
		content.style.left = (width + 5) * (i + 1) + "px";

		container.appendChild(content);
		document.getElementsByTagName("body")[0].appendChild(container);
	}
}


function getMinNavLevel() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			numbMenues = this.responseText;
			console.log(numbMenues);
			addSubbMenues();
		}
	};
	xmlhttp.open("GET", "php/getMinNavLevel.php", true);
	xmlhttp.send();
}
function hoveringNavElement(element, level) {
	
	console.log("level"+ level);
	console.log("active level" + activeLevel);
	console.log((level - activeLevel));
	
	document.getElementById("sub-nav-conainer-" + (level - activeLevel)).style.display = "block";
	var heading = element.innerHTML;
	heading = heading.trim();
	uppdateNavBarContent(heading, "sub-nav-content-" + (level - activeLevel));
		
	/*var levels = document.getElementById("test").getAttribute("data-value");
	console.log(levels);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			showSubMenu(this.responseText);
		}
	};
	xmlhttp.open("GET", "php/getLevel.php?heading=" + heading, true);
	xmlhttp.send();
	*/
}

function showSubMenu(level) {
	
}