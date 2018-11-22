function updateNavBar(id, parent, heading) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("course-navbar").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "php/navbar/updateNavBar.php?id=" + id + " &parent=" + parent + " &heading=" + heading, true);
	xmlhttp.send();
}

function createNavbar() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			updateNavBar("0", "null", "root");
			//document.getElementById("main").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "php/navbar/createNavBar.php", true);
	xmlhttp.send();
}
