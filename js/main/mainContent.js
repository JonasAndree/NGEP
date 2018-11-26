var dragedSplitter;
var splitterPos;
var leftMargin;
var rightMargin;
var windowWidth = window.innerWidth; 

function initPage() {
	
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


var leftDiv, rightDiv;
var startLeftWidth, startRightWidth; 
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
	if (id == "main-splitter-left") {
		leftDiv.style.width =  startLeftWidth - diff + "px";
		rightDiv.style.width =  startRightWidth + diff + "px";
		//resizeHeader("splitter");
	} else if (id == "main-splitter-center") {
		leftDiv.style.width =  startLeftWidth - diff + "px";
		rightDiv.style.width = startRightWidth + diff + "px";
	} else if (id == "main-splitter-right") {
		leftDiv.style.width = startLeftWidth - diff + "px";
		//resizeHeader("splitter");
	}
}

function mainSplitterDown(event, element) {
	document.body.setAttribute("class", "unselectable");
	dragedSplitter = element;
	splitterPos = event.clientX;
	var id = dragedSplitter.getAttribute("id");
	if (id == "main-splitter-left") {
		leftMargin = 60;
		leftDiv = document.getElementById("main-margin-left");
		startLeftWidth = leftDiv.offsetWidth;
		rightMargin = document.getElementById("main-splitter-center");
		rightMargin = rightMargin.getBoundingClientRect().left - 160;
		rightDiv = document.getElementById("main-left");
		startRightWidth = rightDiv.offsetWidth;
	} else if (id == "main-splitter-center") {
		leftMargin = document.getElementById("main-splitter-left");
		leftMargin = leftMargin.getBoundingClientRect().right + 160;
		leftDiv = document.getElementById("main-left");
		startLeftWidth = leftDiv.offsetWidth;
		rightMargin = document.getElementById("main-splitter-right");
		rightMargin = rightMargin.getBoundingClientRect().left - 160;
		rightDiv = document.getElementById("main-right");
		startRightWidth = rightDiv.offsetWidth;
	} else if (id == "main-splitter-right") {
		leftMargin = document.getElementById("main-splitter-center");
		leftMargin = leftMargin.getBoundingClientRect().left + 60;
		leftDiv = document.getElementById("main-right");
		startLeftWidth = leftDiv.offsetWidth;
		rightMargin = window.innerWidth - 60;
	}
}