var dragedSplitter;
var splitterPos, leftSplitterDiv, centerSplitterDiv;
var leftMargin;
var rightMargin;
var windowWidth = window.innerWidth; 
var rightHeaderStartWidth;
var leftHeaderStartWidth;
var leftMarginDiv, leftDiv, rightDiv;
var startleftMarginWidth, startLeftWidth, startRightWidth; 

var minHeaderWidth = 90;
var maxHeaderWidth = 160;
var rightVisible = true; 
var leftVisible = true; 

document.getElementById("trials-header-hidden-text").style.display = "none";
document.getElementById("arsenalen-header-hidden-text").style.display = "none";

function initPage() {
	document.getElementById("arsenalen-main-content").style.width = 
		document.getElementById("main-left").offsetWidth;
}
window.addEventListener("mousemove", function(event){
	if (dragedSplitter != null) {
		moveSplitter(event);
	}
});

window.addEventListener("mouseup", function(event){
	dragedSplitter = null;
	document.body.setAttribute("class", "");
});

window.addEventListener("resize", function(event){
	var diff = window.innerWidth / windowWidth;
	var mainMarginLeftDiv = document.getElementById("main-margin-left");
	var mainLeftDiv = document.getElementById("main-left");
	var mainRightDiv = document.getElementById("main-right");
	var mainMarginRightDiv = document.getElementById("main-margin-right");
	mainMarginLeftDiv.style.width = mainMarginLeftDiv.offsetWidth * diff + "px";
	mainLeftDiv.style.width = mainLeftDiv.offsetWidth * diff + "px";
	mainRightDiv.style.width = mainRightDiv.offsetWidth * diff + "px";

	windowWidth = window.innerWidth;
	//resizeHeader("resize");
});


function resizeHeader(caller) {
	var pageHeading = document.getElementById("page-heading");
	var mainMRight = document.getElementById("main-margin-left").offsetWidth;
	var mainRight = document.getElementById("main-right").offsetWidth;
	var mainLeft = document.getElementById("main-left").offsetWidth;
	
	if (caller == "splitter") {
		var id = dragedSplitter.getAttribute("id");
		if (id == "main-splitter-left") {
			pageHeading.style.marginLeft =  mainMRight + 2 + "px";
			pageHeading.style.width =  mainRight + mainLeft + 2 + "px";
		} else if (id == "main-splitter-right") {
			pageHeading.style.width =  mainRight + mainLeft + 2 + "px";
		}
	} else {
		pageHeading.style.marginLeft =  mainMRight + 2 + "px";
		pageHeading.style.width =  mainRight + mainLeft + 2 + "px";
	}
	
}

function moveSplitter(event) {
	var newPos = event.clientX;
	var id = dragedSplitter.getAttribute("id");
	if (newPos <= leftMargin)
		newPos = leftMargin;
	if (newPos >= rightMargin)
		newPos = rightMargin;
	var diff = splitterPos - newPos;
	var leftHeader = document.getElementById("arsenalen-header");
	var rightHeader = document.getElementById("trials-header");
	if (id == "main-splitter-left") {
		if (!leftVisible) {
			leftDiv.style.width =  startLeftWidth - diff + "px";
			rightDiv.style.width =  startRightWidth + diff + "px";
		} else {
			leftDiv.style.width =  startLeftWidth - diff + "px";
			rightDiv.style.width =  startRightWidth + diff + "px";
		}
	} else if (id == "main-splitter-center") {
		if (newPos <= leftMargin + (maxHeaderWidth - minHeaderWidth)) {
			leftHeader.style.width = leftHeaderStartWidth - (leftMargin - newPos + (maxHeaderWidth - minHeaderWidth))+"px";
			leftVisible = false;
			document.getElementById("arsenalen-header-hidden-text").style.display = "block";
			document.getElementById("arsenalen-header-text").style.display = "none";
			document.getElementById("arsenalen-header-arrow").classList.remove("back");
			document.getElementById("trials-header-arrow").classList.remove("back");
			document.getElementById("arsenalen-main-container").style.display = "none";
			document.getElementById("trials-main-container").style.display = "block";
			document.getElementById("trials-header-hidden-text").style.display = "none";
			document.getElementById("trials-header-text").style.display = "block";

		} else if (newPos >= rightMargin - (maxHeaderWidth - minHeaderWidth)) {
			rightHeader.style.width = rightHeaderStartWidth - (newPos - rightMargin + (maxHeaderWidth - minHeaderWidth))+"px";
			rightVisible = false;
			document.getElementById("trials-header-text").style.display = "none";
			document.getElementById("trials-header-hidden-text").style.display = "block";
			document.getElementById("trials-header-arrow").classList.add("back");
			document.getElementById("arsenalen-header-arrow").classList.add("back");
			document.getElementById("trials-main-container").style.display = "none";
			document.getElementById("arsenalen-main-container").style.display = "block";
			document.getElementById("arsenalen-header-hidden-text").style.display = "none";
			document.getElementById("arsenalen-header-text").style.display = "block";

		} else {
			document.getElementById("trials-header-hidden-text").style.display = "none";
			document.getElementById("arsenalen-header-hidden-text").style.display = "none";
			document.getElementById("trials-header-text").style.display = "block";
			document.getElementById("trials-header-arrow").classList.remove("back");
			document.getElementById("arsenalen-header-arrow").classList.add("back");
			document.getElementById("arsenalen-header-text").style.display = "block";
			document.getElementById("trials-main-container").style.display = "block";
			document.getElementById("arsenalen-main-container").style.display = "block";
			rightVisible = true; 
			leftVisible = true;
			leftHeader.style.width = maxHeaderWidth+"px";
			rightHeader.style.width = maxHeaderWidth+"px";
		}
		leftDiv.style.width =  startLeftWidth - diff + "px";
		rightDiv.style.width = startRightWidth + diff + "px";
	} else if (id == "main-splitter-right") {
		if (!rightVisible) {
			console.log("startLeftWidth: " + startLeftWidth);
			console.log("startRightWidth: " + startRightWidth);
			leftDiv.style.width = startLeftWidth - diff + "px";
		} else {
			leftDiv.style.width = startLeftWidth - diff + "px";
		}
	}
}

function mainSplitterDown(event, element) {
	document.body.setAttribute("class", "unselectable");
	dragedSplitter = element;
	splitterPos = event.clientX;
	var id = dragedSplitter.getAttribute("id");
	if (id == "main-splitter-left") {
		leftMargin = 60;
		if (!leftVisible) {
			leftDiv = document.getElementById("main-margin-left");
			startLeftWidth = leftDiv.offsetWidth;
			rightDiv = document.getElementById("main-right");
			startRightWidth = rightDiv.offsetWidth;
			var leftHeaderWidth = document.getElementById("arsenalen-header").offsetWidth;
			rightMargin = document.getElementById("main-splitter-right");
			rightMargin = rightMargin.getBoundingClientRect().left - maxHeaderWidth - maxHeaderWidth;
		} else {
			leftDiv = document.getElementById("main-margin-left");
			startLeftWidth = leftDiv.offsetWidth;
			rightMargin = document.getElementById("main-splitter-center");
			rightMargin = rightMargin.getBoundingClientRect().left - maxHeaderWidth;
			rightDiv = document.getElementById("main-left");
			startRightWidth = rightDiv.offsetWidth;
		}
	} else if (id == "main-splitter-center") {
		leftMargin = document.getElementById("main-splitter-left");
		leftMargin = leftMargin.getBoundingClientRect().right + minHeaderWidth;
		leftDiv = document.getElementById("main-left");
		startLeftWidth = leftDiv.offsetWidth;
		rightMargin = document.getElementById("main-splitter-right");
		rightMargin = rightMargin.getBoundingClientRect().left - minHeaderWidth;
		rightDiv = document.getElementById("main-right");
		startRightWidth = rightDiv.offsetWidth;
		var rightHeader = document.getElementById("trials-header");
		rightHeaderStartWidth = rightHeader.offsetWidth;
		if (rightHeaderStartWidth < maxHeaderWidth)
			rightHeaderStartWidth = maxHeaderWidth;
		var leftHeader = document.getElementById("arsenalen-header");
		leftHeaderStartWidth = leftHeader.offsetWidth;
		if (leftHeaderStartWidth < maxHeaderWidth)
			leftHeaderStartWidth = maxHeaderWidth;
	} else if (id == "main-splitter-right") {
		if (!rightVisible) {
			leftDiv = document.getElementById("main-left");
			startLeftWidth = leftDiv.offsetWidth;
			console.log("startLeftWidth: " + startLeftWidth);
			rightDiv = document.getElementById("main-right");
			startRightWidth = rightDiv.offsetWidth;
			console.log("startRightWidth: " + startRightWidth);
			leftMargin = document.getElementById("main-splitter-left");
			leftMargin = leftMargin.getBoundingClientRect().left + maxHeaderWidth + maxHeaderWidth;
			rightMargin = window.innerWidth - 60;
		} else {
			leftMargin = document.getElementById("main-splitter-center");
			leftMargin = leftMargin.getBoundingClientRect().left + maxHeaderWidth;
			leftDiv = document.getElementById("main-right");
			startLeftWidth = leftDiv.offsetWidth;
			rightMargin = window.innerWidth - 60;
		} 
	}
}
function toggleMainContent(side) {
	var center = document.getElementById("main-splitter-center");
	var leftHeader = document.getElementById("arsenalen-header");
	var rightHeader = document.getElementById("trials-header");
	var rightContent = document.getElementById("main-right");
	var leftContent = document.getElementById("main-left");
	var leftContentWidth = leftContent.offsetWidth;
	var rightContentWidth = rightContent.offsetWidth;
	if (side == "left") {
		if (leftVisible) {
			leftHeader.style.width = minHeaderWidth + "px";
			leftVisible = false;			
			leftContent.style.width = minHeaderWidth + "px";
			rightHeader.style.width = maxHeaderWidth + "px";
			rightVisible = true;
			rightContent.style.width = rightContentWidth + leftContentWidth - minHeaderWidth + "px";
			document.getElementById("arsenalen-header-text").style.display = "none";
			document.getElementById("arsenalen-header-arrow").classList.toggle("back");
			document.getElementById("trials-header-text").style.display = "block";
			document.getElementById("arsenalen-main-container").style.display = "none";
			document.getElementById("trials-main-container").style.display = "block";	
			
			document.getElementById("trials-header-hidden-text").style.display = "none";
			document.getElementById("arsenalen-header-hidden-text").style.display = "block";


		} else {
			center.style.display = "block";
			leftHeader.style.width = maxHeaderWidth + "px";
			leftVisible = true;			
			leftContent.style.width = (rightContentWidth + leftContentWidth)/2 - 2 + "px";
			rightContent.style.width = (rightContentWidth + leftContentWidth)/2 - 2 + "px";
			document.getElementById("arsenalen-header-text").style.display = "block";
			document.getElementById("arsenalen-header-arrow").classList.toggle("back");
			document.getElementById("arsenalen-main-container").style.display = "block";
			
			document.getElementById("trials-header-hidden-text").style.display = "none";
			document.getElementById("arsenalen-header-hidden-text").style.display = "none";


		}
	} else {
		if (rightVisible) {
			leftContent.style.width = rightContentWidth + leftContentWidth - minHeaderWidth + "px";
			rightContent.style.width = minHeaderWidth + "px";
			leftHeader.style.width = maxHeaderWidth + "px";
			rightHeader.style.width = minHeaderWidth + "px";
			leftVisible = true;			
			rightVisible = false;
			document.getElementById("trials-header-text").style.display = "none";
			document.getElementById("trials-header-arrow").classList.toggle("back");
			document.getElementById("arsenalen-header-text").style.display = "block";
			document.getElementById("trials-main-container").style.display = "none";
			document.getElementById("arsenalen-main-container").style.display = "block";

			document.getElementById("trials-header-hidden-text").style.display = "block";
			document.getElementById("arsenalen-header-hidden-text").style.display = "none";
		} else {
			center.style.display = "block";
			leftContent.style.width = (rightContentWidth + leftContentWidth)/2 - 2 + "px";
			rightContent.style.width = (rightContentWidth + leftContentWidth)/2 - 2 + "px";
			rightHeader.style.width = maxHeaderWidth + "px";
			rightVisible = true;
			document.getElementById("trials-header-text").style.display = "block";
			document.getElementById("trials-header-arrow").classList.toggle("back");
			document.getElementById("trials-main-container").style.display = "block";
			document.getElementById("trials-header-hidden-text").style.display = "none";
			document.getElementById("arsenalen-header-hidden-text").style.display = "none";
		}
	}
}


function goToContent(id) {
	console.log(id);
}

function saveText(element) {
	//console.log(element);
	//console.log(element.innerHTML);
	element.classList.toggle("save-indicator");
	
	element.getElementsByClassName("edit-tool-container")[0].style.display = "none";

	
	setTimeout(function () {
		removeSaveIndicator(element);
	}, 2000, element);
}
function removeSaveIndicator(element) {
	element.classList.toggle("save-indicator");
}
function showEditableBar(element) {
	console.log(element);
	console.log(element.getElementsByClassName("edit-tool-container")[0]);
	element.getElementsByClassName("edit-tool-container")[0].style.display = "block";
}








