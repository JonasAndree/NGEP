function updateNavBar(id, heading) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var navBar = document.getElementById("sub-nav-container-main");
			navBar.innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "php/navbar/updateNavBar.php?id=" + id + 
												   "&heading=" + heading + 
												   "&bar=" + "nav" 
												   , true);
	xmlhttp.send();
}

function createNavbar() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			updateNavBar("0", "Subjects");
		}
	};
	xmlhttp.open("GET", "php/navbar/createNavBar.php", true);
	xmlhttp.send();
}
