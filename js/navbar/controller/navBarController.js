window.addEventListener("mouseup", function(event) {
	if (containerHoveredId[1] != null){
		for (var i = 1; i < containerHoveredId.length; i++){
			containerHoveredId[i].style.display = "none";
			elementHoveredId[i].style.transform = "scale(1.0, 1.0)";
			elementHoveredId[i].style.color = "var(--text-color)";
		}
	}
});

function navElementMouseOver(element, parentHeading, parentId ) {
	console.log("sub-nav-container-"+parentHeading+"-"+parentId);
	var newElement = document.getElementById("sub-nav-container-"+parentHeading+"-"+parentId);
	
	newElement.style.display = "block";
	/*if (containerHoveredId[level] != null) {
		containerHoveredId[level].style.display = "none";
	}
	if (elementHoveredId[level] != null) {
		elementHoveredId[level].style.transform = "scale(1.0, 1.0)";
		elementHoveredId[level].style.color = "var(--text-color)";
	}*/
	/*if (newElement != null) {
		containerHoveredId[level] = newElement;
		containerHoveredId[level].style.display = "block";
	}*//*
	if (element != null) {
		if (level < lastLevel) {
			elementHoveredId[lastLevel].style.transform = "scale(1.0, 1.0)";
			elementHoveredId[lastLevel].style.color = "var(--text-color)";
		}
		elementHoveredId[level] = element;
		elementHoveredId[level].style.transform = "scale(1.1, 1.1)";
		elementHoveredId[level].style.color = "var(--hover-text-color)";
		lastLevel = level;
	}*/
}