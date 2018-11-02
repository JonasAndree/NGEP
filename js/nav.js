
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