
function reactivateUser() {
    var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("up-con").innerHTML = this.responseText;
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
	pupulateChat();
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
				console.log("Logg me in ");
				loggedIn(true);
				var temp;
				localStorage.setItem("loggedIn", "true");
				temp = document.getElementById("firstname-user").getAttribute("user-value");
				console.log(temp);
				localStorage.setItem("firstName", temp);
				temp = document.getElementById("lastname-user").getAttribute("user-value");
				localStorage.setItem("lastName", temp);
				temp = document.getElementById("mail-user").getAttribute("user-value").toLowerCase();
				localStorage.setItem("mail", temp);
				temp = document.getElementById("position-user").getAttribute("user-value");
				localStorage.setItem("position", temp);
				temp = document.getElementById("school-user").getAttribute("user-value");
				localStorage.setItem("school", temp);
				pupulateChat();
				updateUserNavBar();
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
			/*chat-img*/
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
			document.getElementById("main").innerHTML = this.responseText;
			updateUserImage();
		}
	};
	xhr.open('POST', form.getAttribute('action'), true);
	xhr.send(formData);
}

function updateUserNavBar() {/*
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("sub-nav-content-0-0").innerHTML = this.responseText;
		}
	};
	var firstName = localStorage.getItem('firstName');
	var lastName = localStorage.getItem('lastName');
	var position = localStorage.getItem('position');
	var school = localStorage.getItem('school');
	var mail = localStorage.getItem('mail');
	xmlhttp.open("GET", "php/navbar/updateUserNavBar.php?firstName=" + firstName + 
										  			   "&lastName=" + lastName + 
										  			   "&position=" + position + 
										  			   "&school=" + school + 
										  			   "&mail=" + mail, true);
	xmlhttp.send();
	pupulateChat();*/
}


