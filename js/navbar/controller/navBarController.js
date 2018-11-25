
var containerHoveredId = [null];

var elementHovered = [null];
var allActiveContainers = [null];
var allParentHeadings = [null];
var allParentIds = [null];

var activeMinLevel = 0;
var lastLevel = 0;

function resetNav() {
	for (var i = 0; i < elementHovered.length; i++) {
		if (allActiveContainers[i] != null) {
			allActiveContainers[i].style.display = "none";
			if (elementHovered[i].getAttribute("heading") == "Create new page" || 
		    		elementHovered[i].getAttribute("heading") == "Create new course") {
		    	elementHovered[i].style.color = "var(--hover-text-color)";
		    } else {
				elementHovered[i].style.color = "var(--text-color)";
		    }
		    elementHovered[i].style.transform = "scale(1.0, 1.0)";
		}
	}
}


window.addEventListener("mouseup", function(event) {
	resetNav();
});

var activeBar = null; 

function navElementMouseOver(element, parentHeading, parentId, level, bar) {
	if (activeBar == null)
		activeBar = bar; 
	if (activeBar != bar) {
		activeBar = bar;
		resetNav();
	}
	var newElement = document.getElementById("sub-nav-container-"+parentHeading+"-"+parentId);
	
	for (var i = level; i < elementHovered.length; i++) {
		if (allActiveContainers[i] != null) {
			allActiveContainers[i].style.display = "none";
		}
	}
	if (elementHovered[level] != null) {
		if (level <= lastLevel) {
			for (var i = level; i < elementHovered.length; i++){				
			    if (elementHovered[i].getAttribute("heading") == "Create new page" || 
			    		elementHovered[i].getAttribute("heading") == "Create new course") {
			    	elementHovered[i].style.color = "var(--hover-text-color)";
			    } else {
					elementHovered[i].style.color = "var(--text-color)";
			    }
				
			    elementHovered[i].style.transform = "scale(1.0, 1.0)";

			}
		}
	}
	if (newElement != null) {
		newElement.style.display = "block";
		allActiveContainers[level] = newElement;
		allParentHeadings[level] = parentHeading;
		allParentIds[level] = parentId;
	}
	elementHovered[level] = element;
	elementHovered[level].style.transform = "scale(1.1, 1.1)";
	elementHovered[level].style.color = "var(--hover-text-color)";
	lastLevel = level;
}