
console.log(sessionStorage.getItem('loggedIn'));
if (sessionStorage.getItem('loggedIn') == 'true') {
	loggedIn(true);
	console.log("already logged in");
	toggleMenuBar(document.getElementById("loggin-button"), 'user')
} else {
	sessionStorage.setItem('loggedIn', 'false');
}
window.addEventListener('storage' ,function(e){
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
function setUp() {
    var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("user-cont").innerHTML = this.responseText;
			
		    var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("chat-cont").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "php/userContent.php", true);
			xmlhttp.send();
		}
	};
	xmlhttp.open("GET", "php/updateUser.php", true);
	xmlhttp.send();
	
}





var menuButton = document.getElementById("nav-menu-button");

function toggleMenuBar(menuElement, feild) {
	menuElement.classList.toggle("toggle");
	if (feild == "nav") {
		document.getElementById("course-navbar").classList.toggle("toggle");
	} 
	if (feild == "user") {
		document.getElementById("user-cont").classList.toggle("toggle");
	}
	if (feild == "chat") {
		document.getElementById("chat-cont").classList.toggle("toggle");
	}
}

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
	    
	    var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("user-stats").innerHTML = this.responseText;
			}
		};
		var firstName = sessionStorage.getItem('firstName');
		var lastName = sessionStorage.getItem('lastName');
		var birthdate = sessionStorage.getItem('birthdate');
		var position = sessionStorage.getItem('position');
		var school = sessionStorage.getItem('school');
		xmlhttp.open("GET", "php/updateUser.php?firstName=" + firstName + "&lastName=" + lastName + "&birthdate=" + birthdate + "&position=" + position + "&school=" + school, true);
		xmlhttp.send();
	}
}
function logout() {
	console.log("logged out");
	sessionStorage.setItem('loggedIn', 'false');
	var firstName = sessionStorage.getItem('none');
	var lastName = sessionStorage.getItem('none');
	var birthdate = sessionStorage.getItem('none');
	var position = sessionStorage.getItem('none');
	var school = sessionStorage.getItem('none');
	loggedIn(false)
}