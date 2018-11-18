if (localStorage.getItem('loggedIn') == 'true') {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("user-cont").innerHTML = this.responseText;
			loggedIn(true);
			toggleMenuBar(document.getElementById("loggin-button"), 'user');
			reactivateUser();
		}
	};
	xmlhttp.open("GET", "php/user/userContent.php", true);
	xmlhttp.send();
} else {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("user-cont").innerHTML = this.responseText;
			localStorage.setItem('loggedIn', 'false');		
		}
	};
	xmlhttp.open("GET", "php/user/userContent.php", true);
	xmlhttp.send();
}

function showRegister() {
	document.getElementById("loggin-container").style.display = "none";
	document.getElementById("register-container").style.display = "block";
	document.getElementById("user-login-header").style.display = "none";
	document.getElementById("user-register-header").style.display = "block";
}
function showLogin() {
	document.getElementById("loggin-container").style.display = "block";
	document.getElementById("register-container").style.display = "none";
	document.getElementById("user-login-header").style.display = "block";
	document.getElementById("user-register-header").style.display = "none";
}
function loggedIn(state) {
	if (!state) {
		document.getElementById('loggin-container').style.display = 'block';
	    document.getElementById('user-info').style.display = 'none';
		document.getElementById("user-login-header").style.display = "block";
		document.getElementById("user-register-header").style.display = "none";
		document.getElementById("user-user-header").style.display = "none";
	} else {
		document.getElementById('loggin-container').style.display = 'none';
		document.getElementById('register-container').style.display = 'none';
		document.getElementById("user-login-header").style.display = "none";
		document.getElementById("user-register-header").style.display = "none";
	    document.getElementById('user-info').style.display = 'block';
		document.getElementById("user-user-header").style.display = "block";
	}
}