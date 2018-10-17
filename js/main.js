
var menuButton = document.getElementById("nav-menu-button");
menuButton.classList.toggle("toggle");
toggleMenuBar(menuButton);

function toggleMenuBar(menuElement) {
	menuElement.classList.toggle("toggle");
	document.getElementById("course-navbar").classList.toggle("toggle");
}
