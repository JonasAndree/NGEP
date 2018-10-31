if (sessionStorage.getItem('loggedIn') == 'true') {
	loggedIn(true);
} else {
	sessionStorage.setItem('loggedIn', 'false');
}
window.addEventListener('storage',function(e){
	if(e.storageArea===sessionStorage){
		console.log(e);
		if(e.key == "loggedIn") {
			if (e.newValue == 'true') {
				loggedIn(true);
			} else {
				loggedIn(false);
			}
		}
	} 
});



var menuButton = document.getElementById("nav-menu-button");

function toggleMenuBar(menuElement, feild) {
	menuElement.classList.toggle("toggle");
	if (feild == "nav") {
		document.getElementById("course-navbar").classList.toggle("toggle");
	} 
	if (feild == "user") {
		document.getElementById("user-cont").classList.toggle("toggle");
	}
}

var containerHoveredId = [null];
var elementHoveredId = [null];
var activeMinLevel = 0;
var lastLevel = 0;

function navElementMouseOver(element, containerId, contentId, level) {
	var newElement = document.getElementById(containerId);
	if (containerHoveredId[level] != null) {
		containerHoveredId[level].style.display = "none";
	}
	if (elementHoveredId[level] != null) {
		elementHoveredId[level].style.transform = "scale(1.0, 1.0)";
		elementHoveredId[level].style.color = "var(--text-color)";
	}
	if (newElement != null) {
		containerHoveredId[level] = newElement;
		containerHoveredId[level].style.display = "block";
	}
	if (element != null) {
		if (level < lastLevel) {
			elementHoveredId[lastLevel].style.transform = "scale(1.0, 1.0)";
			elementHoveredId[lastLevel].style.color = "var(--text-color)";
		}
		elementHoveredId[level] = element;
		elementHoveredId[level].style.transform = "scale(1.1, 1.1)";
		elementHoveredId[level].style.color = "var(--hover-text-color)";
		lastLevel = level;
	}
}


function updateNavBar(id, parent, heading) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("course-navbar").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "php/updateNavBar.php?id=" + id + "&parent=" + parent + "&heading=" + heading, true);
	xmlhttp.send();
}


function createNavbar() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			updateNavBar("0", "null", "root");
		}
	};
	xmlhttp.open("GET", "php/createNavBar.php", true);
	xmlhttp.send();
}

createNavbar();

function showRegister() {
	document.getElementById("loggin-container").style.display = "none";
	document.getElementById("register-container").style.display = "block";
}
function showLogin() {
	document.getElementById("loggin-container").style.display = "block";
	document.getElementById("register-container").style.display = "none";
}
function loggedIn(state) {
	console.log("loggin " + state);
	if (!state) {
		document.getElementById('loggin-container').style.display = 'block';
	    document.getElementById('user-info').style.display = 'none';
	} else {
		document.getElementById('loggin-container').style.display = 'none';
	    document.getElementById('user-info').style.display = 'block';
	}
}
function logout() {
	console.log("logged out");
	sessionStorage.setItem('loggedIn', 'false');
	loggedIn(false)
}