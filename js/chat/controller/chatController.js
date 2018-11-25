window.onresize = function(event) {
	if (dragedChatWindow != null) {
		var positionElement = dragedChatWindow.getBoundingClientRect().top + 5;
		var newHeight = window.innerHeight - event.clientY + 10;
		if (newHeight < 300)
			newHeight = 300;
		if (newHeight > window.innerHeight - 150)
			newHeight = window.innerHeight - 150;

		if (dragedChatWindow.parentNode.id == "chat-content") {
			document.getElementById("user-content").style.height = (window.innerHeight - newHeight)
					+ "px";
		}
		dragedChatWindow.parentNode.style.height = newHeight + "px";
	}
};
window.addEventListener("mousemove", function(event) {
	if (dragedChatWindow != null) {
		resizeChatWindowMove(event);
	}
	if (movedChatWindow != null) {
		moveChatWindowMove(event);
	}
	if (vertRezDirChatWindow != null) {
		borderMove(event);
	}
	
});
window.addEventListener("mouseup", function(event) {
	if (dragedChatWindow != null) {
		resizeChatWindowDrop(event);
	}
	if (movedChatWindow != null) {
		moveChatWindowDrop(event);
	}
	if (vertRezDirChatWindow != null) {
		borderDrop(event);
	}
});

function resizeChatWindowUp(event, element) {
	if (dragedChatWindow == null) {
		dragedChatWindow = element;
		dragedStartTop = dragedChatWindow.getBoundingClientRect().top;
		dragedStartPos = window.innerHeight - event.clientY- dragedChatWindow.parentNode.clientHeight;
		dragedChatWindow.parentNode.style.transition = "0.0s";
		document.body.setAttribute("class", "unselectable");
	}
}
function resizeChatWindowMove(event) {
	if (dragedChatWindow.parentNode.id == "chat-content") {
		var newHeight = window.innerHeight - event.clientY + 10;
		if (newHeight < 300)
			newHeight = 300;
		if (newHeight > window.innerHeight - 150)
			newHeight = window.innerHeight - 150;
			
		var headersHeight = document.getElementById("user-headers").clientHeight; 
		
		document.getElementById("user-content").style.height = (window.innerHeight - newHeight) + "px";
		dragedChatWindow.parentNode.style.height = newHeight + "px";
	} else {
		var y = event.clientY;
		if (y < 15) 
			y = 15; 
		var newPos = (window.innerHeight - y- dragedStartPos);
		if (newPos < 300)
			newPos = 300;
		dragedChatWindow.parentNode.style.height = newPos + "px";
	}
}
function resizeChatWindowDrop(event) {
	dragedChatWindow.parentNode.style.transition = "0.3s";
	dragedChatWindow = null;
	document.body.setAttribute("class", "");
}

function moveChatWindowUp(event, element, name, firstName, lastName) {
	if (movedChatWindow == null) {
		var clickedChat = document.getElementById(name + "-" + 
												  firstName + "-" + 
												  lastName + "-chat-dialog");
		document.body.setAttribute("class", "unselectable");
		movedChatWindow = element;
		if (clickedChat.getAttribute("pos") != "-1") {
			var removedPos = parseInt(clickedChat.getAttribute("pos"));
			chats[removedPos].setAttribute("pos", "-1");
			chats[removedPos].setAttribute("flying", "true");
			chats.splice(removedPos, 1);
			resetRightChatPositions();
		}
	}
}

function moveChatWindowMove(event) {
	var y = event.clientY;
	if (y < 15) 
		y = 15; 
	else if (y > window.innerHeight - 15)
		y = window.innerHeight - 15;
	
	var x = event.clientX;
	if (x < 15) 
		x = 15; 
	else if (x > window.innerWidth - 15)
		x = window.innerWidth - 15;
	
	var newBottom = window.innerHeight - y
			- movedChatWindow.parentNode.clientHeight + 10;
	var newRight = window.innerWidth - x
			- movedChatWindow.parentNode.clientWidth + 10;
	movedChatWindow.parentNode.style.transition = "0.0s";
	movedChatWindow.parentNode.style.bottom = newBottom + "px";
	movedChatWindow.parentNode.style.right = newRight + "px";
	createTempChatSpace();
}
function moveChatWindowDrop(event, element) {
	movedChatWindow.parentNode.style.transition = "0.3s";
	removeTempChatSpace();
	document.body.setAttribute("class", "");
	movedChatWindow = null;
}

function createTempChatSpace() {
	var spacePosRight = movedChatWindow.getBoundingClientRect().right;
	var addElement = document.getElementById(movedChatWindow
			.getAttribute("parent")
			+ "-chat-dialog");
	var spacePosHeight = addElement.firstElementChild.offsetHeight;
	var spacePosWidth = addElement.firstElementChild.offsetWidth;
	tempSpace.style.height = spacePosHeight + "px";
	tempSpace.style.width = spacePosWidth + "px";
	
	var newSpacePos = ((window.innerWidth - spacePosRight - spacePosWidth) / 170)
			.toFixed(0) - 1;
	
	if (newSpacePos < 0)
		newSpacePos = 0;
	if (newSpacePos >= chats.length)
		newSpacePos = chats.length - 1;

	if (spaceAdded == false) {
		spaceAdded = true;
		tempSpaceContainer.style.display = "block";
		document.getElementsByTagName('body')[0]
				.appendChild(tempSpaceContainer);
		spacePos = newSpacePos;
		chats.splice(spacePos, 0, tempSpaceContainer);
		resetRightChatPositions();

	} else if (newSpacePos != spacePos) {
		chats.splice(spacePos, 1);
		spacePos = newSpacePos;
		chats.splice(spacePos, 0, tempSpaceContainer);
		resetRightChatPositions();
	}
}
function removeTempChatSpace() {
	spaceAdded = false;
	tempSpaceContainer.style.display = "none";
	var spacePosBottom = movedChatWindow.getBoundingClientRect().bottom;
	tempSpaceContainer.style.display = "none";
	var addElement = document.getElementById(movedChatWindow.getAttribute("parent") + "-chat-dialog");
	var elementHeight = addElement.firstElementChild.offsetHeight;
	if (spacePosBottom > window.innerHeight - (elementHeight + 100)) {
		chats.splice(spacePos, 1);
		chats.splice(spacePos, 0, addElement);
		addElement.setAttribute("flying", "false");
		chats[spacePos].firstElementChild.style.bottom = "0px";
		resetRightChatPositions();
	} else {
		chats.splice(spacePos, 1);
		resetRightChatPositions();
	}
}

function displayChatInfo(name, firstName, lastName, state, hovedElement) {
	hoverChat = document.getElementById(name + "-" + firstName + "-" + lastName + "-chat-dialog-info");
	var hovedElementPosition = hovedElement.getBoundingClientRect().top;
	if (state == "over") {
		hoverChat.style.display = "block";	
		hoverChat.firstElementChild.style.top = 
			hovedElementPosition + hovedElement.offsetHeight - hoverChat.firstElementChild.offsetHeight + "px";
	} else {
		hoverChat.style.display = "none";
	}
}

function displayChat(course, firstName, lastName) {
	var clickedChat = document.getElementById(course + "-" + firstName + "-" + lastName + "-chat-dialog");
	var chatListItem = document.getElementById(course + "-" + firstName + "-" + lastName + '-chat-list-item');
	var chatArrow = document.getElementById(course + "-" + firstName + "-" + lastName  + '-chat-arrow');
	var chatImg = document.getElementById(course + "-" + firstName + "-" + lastName  + '-chat-button-img');
	
	if (clickedChat.getAttribute("stay") == "true") {
		clickedChat.setAttribute("stay", "false");
		clickedChat.style.display = "none";
		chatListItem.style.transform = "scale(1.00, 1.00)";
		chatListItem.style.backgroundColor = "var(--nav-item-color)";
		chatListItem.style.color = "var(--text-color)";
		chatArrow.setAttribute("class", "arrow back");
		chatImg.setAttribute("class", "chat-button-img right");
		if (clickedChat.getAttribute("flying") == "false") {
			var removedPos = parseInt(clickedChat.getAttribute("pos"));
			if (chats[removedPos] != "none") {
				chats[removedPos] = "none";
				chats.splice(removedPos, 1);
				resetRightChatPositions();
			}
		}
	} else {
		clickedChat.setAttribute("stay", "true");
		clickedChat.style.display = "block";
		chatListItem.style.transform = "scale(1.05, 1.05)";
		chatListItem.style.backgroundColor = "var(--chat-parent-childe-bg-color)";
		chatListItem.style.color = "var(--chat-pressed-color)";
		chatArrow.setAttribute("class", "arrow");
		chatImg.setAttribute("class", "chat-button-img left");
		if (clickedChat.getAttribute("flying") == "false") {
			var newPos = "none";
			if (chats.length > 0) {
				for (var i = 0; i < chats.length; i++) {
					if (chats[i] == "none") {
						newPos = i;
						break;
					}
				}
				if (newPos == "none") {
					newPos = chats.length;
				}
			} else {
				newPos = 0;
			}
			clickedChat.setAttribute("pos", newPos);
			var right = 170 + 170 * newPos;
			chats[newPos] = clickedChat;
			clickedChat.firstElementChild.style.right = right + "px";

			resetRightChatPositions();
			scrollToBottom(document.getElementById(course + "-" + firstName + "-" + lastName + "-chat-dialog-box"));
		}
	}
}

/* if(event.offsetY < 0 || 
    event.offsetY > (borderElement.clientHeight - (catBorderWidth * 2))){
     console.log("you clicked the border");
 } */
function borderUp(event, borderElement){
	if (vertRezChatWindow == null) {
	    if (event.offsetX < 0 || event.offsetX > (borderElement.clientWidth - (borderWidth * 2))) {
			vertRezChatWindow = borderElement;
			vertRezChatWindow.style.transition = "0.0s";
			document.body.setAttribute("class", "unselectable");

		    if (event.offsetX < 0) {
				dragedStartTop = vertRezChatWindow.getBoundingClientRect().left;
				dragedStartPos = window.innerWidth - event.clientX- vertRezChatWindow.clientWidth;
				vertRezDirChatWindow = "left";
		    } if (event.offsetX > (borderElement.clientWidth - (borderWidth * 2))) {
				dragedStartTop = vertRezChatWindow.getBoundingClientRect().right;
				dragedStartPos = window.innerWidth - event.clientX- vertRezChatWindow.clientWidth;
				vertRezDirChatWindow = "right";
				oldStartWidth = vertRezChatWindow.clientWidth;
				oldStartX = event.clientX;
		    }
			resetRightChatPositions();
	    }
	}
}

function borderMove(event) {
	var x = event.clientX;
	if (x < 15) 
		x = 15; 
	if (x > window.innerWidth - 15) 
		x = window.innerWidth - 15; 
	if (vertRezDirChatWindow == "left") {
		var newPos = (window.innerWidth - x - dragedStartPos);
		if (newPos < 160)
			newPos = 160;
		vertRezChatWindow.style.width = newPos + "px";
	} else if (vertRezDirChatWindow == "right") {
		var newPos = (window.innerWidth - x);
		var newWidth = (oldStartWidth - (oldStartX - x));
		if (newWidth < 160)
			newWidth = 160;
		if (newWidth > 160)
			vertRezChatWindow.style.right = newPos + "px";
			vertRezChatWindow.style.width = newWidth + "px";
	}
	resetRightChatPositions();
}
function borderDrop(event) {
	vertRezChatWindow.style.transition = "0.3s";
	vertRezChatWindow = null;
	vertRezDirChatWindow = null;
	resetRightChatPositions();
	document.body.setAttribute("class", "");
}


function scrollToBottom(element)	{
	element.scrollTop = element.scrollHeight;
}

function resetRightChatPositions() {
	var right = 180;
	for (var i = 0; i < chats.length; i++) {
		chats[i].setAttribute("pos", i);
		if (i != 0)
			right += (chats[i - 1].firstElementChild.clientWidth + 20);
		chats[i].firstElementChild.style.right = right + "px"; 
	}
}