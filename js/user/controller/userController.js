setUp();
function setUp() {
	if (localStorage.getItem('loggedIn') == 'true') {
		loggedIn(true);
		reactivateUser();
		updateUserNavBar();
	} else {
		localStorage.setItem('loggedIn', 'false');	
		createNavbar();
	}
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