
console.log(localStorage.getItem('loggedIn'));
if (localStorage.getItem('loggedIn') == 'true') {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("user-cont").innerHTML = this.responseText;

			loggedIn(true);
			console.log("already logged in");
			toggleMenuBar(document.getElementById("loggin-button"), 'user');
		}
	};
	xmlhttp.open("GET", "php/userContent.php", true);
	xmlhttp.send();
} else {
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("user-cont").innerHTML = this.responseText;
			localStorage.setItem('loggedIn', 'false');		}
	};
	xmlhttp.open("GET", "php/userContent.php", true);
	xmlhttp.send();
}

window.addEventListener('storage' ,function(e){
	if(e.storageArea===localStorage){
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
			
		   
		}
	};
	xmlhttp.open("GET", "php/updateUser.php", true);
	xmlhttp.send();
	
}





var menuButton = document.getElementById("nav-menu-button");

function toggleMenuBar(menuElement, field) {
	menuElement.classList.toggle("toggle");
	if (field == "nav") {
		document.getElementById("course-navbar").classList.toggle("toggle");
	} 
	if (field == "user") {
		document.getElementById("user-cont").classList.toggle("toggle");
	}
	if (field == "chat") {
		document.getElementById("chat-cont").classList.toggle("toggle");
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
		document.getElementById('register-container').style.display = 'none';
	    document.getElementById('user-info').style.display = 'block';
	    
	    var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("user-stats").innerHTML = this.responseText;
			}
		};
		var firstName = localStorage.getItem('firstName');
		var lastName = localStorage.getItem('lastName');
		var birthdate = localStorage.getItem('birthdate');
		var position = localStorage.getItem('position');
		var school = localStorage.getItem('school');
		var mail = localStorage.getItem('mail');
		xmlhttp.open("GET", "php/updateUser.php?firstName=" + firstName + "&lastName=" + lastName + "&birthdate=" + birthdate + "&position=" + position + "&school=" + school + "&mail=" + mail, true);
		xmlhttp.send();
	}
}
function logout() {
	console.log("logged out");
	localStorage.setItem('loggedIn', 'false');
	localStorage.setItem('firstName', 'none');
	localStorage.setItem('lastName', 'none');
	localStorage.setItem('mail', 'none');
	localStorage.setItem('position', 'none');
	localStorage.setItem('school', 'none');
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			loggedIn(false);
		}
	};
	xmlhttp.open("GET", "php/logOut.php", true);
	xmlhttp.send();
}