var menuButton = document.getElementById("nav-menu-button");
menuButton.classList.toggle("toggle");
toggleMenuBar(menuButton);

function toggleMenuBar(menuElement) {
	menuElement.classList.toggle("toggle");
	document.getElementById("course-navbar").classList.toggle("toggle");
}

var subjectList = document.getElementById("subject-list");

uppdateNavBarContent("null");

function uppdateNavBarContent(navBarParrent) {
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
		
		content.style.width = window.innerWidth / 10 + "px";
		content.style.left = (window.innerWidth / 10 + 5) * (i + 1) + "px";

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

function hoveringNavElement(element) {
	var heading =  element.innerHTML;
	heading = heading.trim();
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			showSubMenu(this.responseText);
		}
	};
	xmlhttp.open("GET", "php/getLevel.php?heading=" + heading, true);
	xmlhttp.send();
}

function showSubMenu(var level) {
	document.getElementById("") {
		
	}
}