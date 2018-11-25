
function reactivateUser() {
	
    var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("up-con").innerHTML = this.responseText;
			createUserNavBar();
			createNavbar();
			pupulateChat();
		}
	};
	var firstName = localStorage.getItem('firstName');
	var lastName = localStorage.getItem('lastName');
	var position = localStorage.getItem('position');
	var school = localStorage.getItem('school');
	var mail = localStorage.getItem('mail');
	xmlhttp.open("GET", "php/user/updateUser.php?firstName=" + firstName + 
											   "&lastName=" + lastName + 
											   "&position=" + position + 
											   "&school=" + school + 
											   "&mail=" + mail, true);
	xmlhttp.send();

}




function logMeIn() {
	var form = document.getElementById('loggin-form');
	var formData = new FormData(form);
	
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText != "incorect") {
				var userContent = document.getElementById("up-con");
				userContent.innerHTML = this.responseText;
				loggedIn(true);
				var temp;
				localStorage.setItem("loggedIn", "true");
				temp = document.getElementById("firstname-user").getAttribute("user-value");
				localStorage.setItem("firstName", temp);
				temp = document.getElementById("lastname-user").getAttribute("user-value");
				localStorage.setItem("lastName", temp);
				temp = document.getElementById("mail-user").getAttribute("user-value").toLowerCase();
				localStorage.setItem("mail", temp);
				temp = document.getElementById("position-user").getAttribute("user-value");
				localStorage.setItem("position", temp);
				temp = document.getElementById("school-user").getAttribute("user-value");
				localStorage.setItem("school", temp);
				createUserNavBar();
				pupulateChat();
			}
		}
	};
	xhr.open('POST', form.getAttribute('action'), true);
	xhr.send(formData);
}


function logout() {
	localStorage.setItem('loggedIn', 'false');
	localStorage.setItem('firstName', 'none');
	localStorage.setItem('lastName', 'none');
	localStorage.setItem('mail', 'none');
	localStorage.setItem('position', 'none');
	localStorage.setItem('school', 'none');
	pupulateChat();
	document.getElementById("user-nav-container-main").innerHTML = "";
	document.getElementById("sub-nav-container-main").style.top = "160px";

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			loggedIn(false);
		}
	};
	xmlhttp.open("GET", "php/user/login/logOut.php", true);
	xmlhttp.send();
}

function updateUserImage() {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var image = this.responseText;
			document.getElementById("for-input").innerHTML = image;
			document.getElementById("chat-head").innerHTML = image;
			document.getElementById("chat-head").firstElementChild.setAttribute("class", "chat-img");
		}
	};
	xhr.open('GET', "php/user/getImage.php?mail="+ localStorage.getItem('mail'), true);
	xhr.send();
}
function changeImage() {
	var form = document.getElementById('image-form');
	var formData = new FormData(form);
	
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			updateUserImage();
		}
	};
	xhr.open('POST', form.getAttribute('action'), true);
	xhr.send(formData);
}

function updateUserNavBar(id, heading) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			console.log("Add userNavBar");
			var userNavBar = document.getElementById("user-nav-container-main");
			userNavBar.innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "php/navbar/updateNavBar.php?id=" + id + 
												   "&heading=" + heading + 
												   "&bar=" + "user"
												   , true);
	xmlhttp.send();
}

function createUserNavBar() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			updateUserNavBar("0", "Courses");
		}
	};
	var firstName = localStorage.getItem('firstName');
	var lastName = localStorage.getItem('lastName');
	var position = localStorage.getItem('position');
	var school = localStorage.getItem('school');
	var mail = localStorage.getItem('mail');
		xmlhttp.open("GET", "php/navbar/createUserNavBar.php?firstName=" + firstName + 
									"&lastName=" + lastName + 
									"&position=" + position + 
									"&school=" + school + 
									"&mail=" + mail, true);
	xmlhttp.send();
	pupulateChat();
}
