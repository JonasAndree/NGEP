
var chats = [];

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
});
window.addEventListener("mouseup", function(event) {
	if (dragedChatWindow != null) {
		resizeChatWindowDrop(event);
	}
	if (movedChatWindow != null) {
		moveChatWindowDrop(event);
	}
});

pupulateChat();
function pupulateChat() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("chat-content").innerHTML = this.responseText;
			chats = [];
			if (document.getElementById("chat-content") != null) {
				var height = document.getElementById("chat-content").offsetHeight;

				if (height < 300)
					height = 300;
				if (height > window.innerHeight - 150)
					height = window.innerHeight - 150;

				if (chattVisible) {
					document.getElementById("chat-content").style.height = height
							+ "px";
				}
				if (document.getElementById("user-content") != null) {
					if (chattVisible) {
						document.getElementById("user-content").style.height = "calc(100vh - "
								+ height + "px)";
					} else {
						document.getElementById("user-content").style.height = "100vh";
					}
				}

			}
		}
	};
	var firstName = localStorage.getItem('firstName');
	var lastName = localStorage.getItem('lastName');
	var position = localStorage.getItem('position');
	var school = localStorage.getItem('school');
	var mail = localStorage.getItem('mail');
	xmlhttp.open("GET", "php/chatContent.php?firstName=" + firstName
			+ "&lastName=" + lastName + "&position=" + position + "&school="
			+ school + "&mail=" + mail, true);
	xmlhttp.send();
};
var dragedChatWindow = null;
function resizeChatWindowUp(event, element) {
	if (dragedChatWindow == null) {
		dragedChatWindow = element;
		document.body.setAttribute("class", "unselectable");
	}
}
function resizeChatWindowMove(event, element) {
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
function resizeChatWindowDrop(event) {
	dragedChatWindow = null;
	document.body.setAttribute("class", "");
}

var movedChatWindow = null;
function moveChatWindowUp(event, element, name) {
	if (movedChatWindow == null) {
		var clickedChat = document.getElementById(name + "-chat-dialog");
		document.body.setAttribute("class", "unselectable");
		movedChatWindow = element;
		console.log(movedChatWindow);
		
		if (clickedChat.getAttribute("pos") != "-1") {
			
			var removedPos = parseInt(clickedChat.getAttribute("pos"));
			chats[removedPos].setAttribute("pos", "none");
			chats[removedPos].setAttribute("flying", "true");
			
			for (var i = removedPos; i < chats.length; i++) {
				if (chats[i] != "none") {
					var right = 170 + 170 * (i - 1);
					chats[i].firstElementChild.style.right = right + "px";
					chats[i].setAttribute("pos", i - 1);
					chats[i - 1] = chats[i];
					chats[i] = "none";
				}
			}
			if (chats[chats.length - 1] = "none")
				chats.splice(chats.length - 1, 1);
		}
	}
}

function moveChatWindowMove(event, element) {
	var positionElementBottom = movedChatWindow.getBoundingClientRect().top + 5;
	var positionElementRight = movedChatWindow.getBoundingClientRect().left + 5;
	var newBottom = event.clientY - 10;
	var newRight = event.clientX - 10;

	movedChatWindow.parentNode.style.top = newBottom + "px";
	movedChatWindow.parentNode.style.left = newRight + "px";
	createTempChatSpace();
}
function moveChatWindowDrop(event, element) {
	removeTempChatSpace();
	document.body.setAttribute("class", "");
	movedChatWindow = null;
}

var tempSpaceContainer = document.createElement('div');
var tempSpace = document.createElement('div');
tempSpaceContainer.appendChild(tempSpace);
tempSpace.id = 'temp-space';
tempSpace.setAttribute("stay", "true");
var spaceAdded = false; 
var spacePos = 0;
function createTempChatSpace() {
	var spacePosRight = movedChatWindow.getBoundingClientRect().right;
	//console.log(((window.innerHeight - spacePosRight-170) / 170).toFixed(0) - 2);
	
	
	var newSpacePos = ((window.innerHeight - spacePosRight-170) / 170).toFixed(0) - 2;
	if (newSpacePos < 0) 
		newSpacePos = 0; 
	if (newSpacePos >= chats.length) 
		newSpacePos = chats.length - 1;
	console.log(newSpacePos); 
	
	if (spaceAdded == false) {
		spaceAdded = true; 
		tempSpaceContainer.style.display = "block";
		document.getElementsByTagName('body')[0].appendChild(tempSpaceContainer);
		spacePos = newSpacePos; 
		chats.splice(spacePos, 0, tempSpaceContainer);
		for (var i = 0; i < chats.length; i++) {
			var right = 170 + 170 * (i);
			chats[i].firstElementChild.style.right = right + "px";
		}
	} else if (newSpacePos != spacePos) {
		chats.splice(spacePos, 1);
		spacePos = newSpacePos; 
		chats.splice(spacePos, 0, tempSpaceContainer);
		for (var i = 0; i < chats.length; i++) {
			var right = 170 + 170 * (i);
			chats[i].firstElementChild.style.right = right + "px";
		}
	}
}
function addTempChatSpace() {
	
}
function removeTempChatSpace() {
	spaceAdded = false; 
	tempSpaceContainer.style.display = "none";
	var spacePosBottom = movedChatWindow.getBoundingClientRect().bottom;
		tempSpaceContainer.style.display = "none";
	if (spacePosBottom > 300) {
		chats.splice(spacePos, 1);
		
		var addElement = document.getElementById(movedChatWindow.getAttribute("parent")+"-chat-dialog");
		
		chats.splice(spacePos, 0, movedChatWindow);
		
		addElement.setAttribute("flying", "false");
		addElement.setAttribute("pos", spacePos);
		addElement.firstElementChild.style.bottom = "5px";
		for (var i = spacePos + 1; i < chats.length; i++) {
			chats[i].setAttribute("pos", i);
		}
		for (var i = 0; i < chats.length; i++) {
			var right = 170 + 170 * (i);
			chats[i].firstElementChild.style.right = right + "px";
		}

		
	} else {
		chats.splice(spacePos, 1);
		for (var i = 0; i < chats.length; i++) {
			var right = 170 + 170 * (i);
			chats[i].firstElementChild.style.right = right + "px";
		}
	}
}





var activChatt = null;
var chattHovering = "false";
function displayChatInfo(name, state) {
	var hoverChat = document.getElementById(name + "-chat-dialog-info");
	if (state == "over") {
		if (activChatt != null) {
			activChatt.setAttribute("stay", "false");
			activChatt.style.display = "none";
		}
		hoverChat.style.display = "block";
	} else {
		if (activChatt != null) {
			activChatt.setAttribute("stay", "true");
			activChatt.style.display = "block";
		}
		hoverChat.style.display = "none";
	}
}

function displayChat(name) {
	var clickedChat = document.getElementById(name + "-chat-dialog");
	var chatListItem = document.getElementById(name + '-chat-list-item');
	var chatArrow = document.getElementById(name + '-chat-arrow');
	
	if (clickedChat.getAttribute("stay") == "true") {
		
		clickedChat.setAttribute("stay", "false");
		clickedChat.style.display = "none";
		chatListItem.style.transform = "scale(1.00, 1.00)";
		chatListItem.style.backgroundColor = "var(--nav-item-color)";
		
		chatArrow.setAttribute("class", "arrow back");


		if (clickedChat.getAttribute("flying") == "false") {
			var removedPos = parseInt(clickedChat.getAttribute("pos"));
			console.log(removedPos);
			if (chats[removedPos] != "none") {
				chats[removedPos] = "none";
	
				for (var i = removedPos; i < chats.length; i++) {
					if (chats[i] != "none") {
						var right = 170 + 170 * (i - 1);
						chats[i].firstElementChild.style.right = right + "px";
						chats[i - 1] = chats[i];
						chats[i - 1].setAttribute("pos", i - 1);
						chats[i] = "none";
					}
				}
	
				if (chats[chats.length - 1] = "none")
					chats.splice(chats.length - 1, 1);
			}
		}
	} else {
		clickedChat.setAttribute("stay", "true");
		clickedChat.style.display = "block";
		chatListItem.style.transform = "scale(1.05, 1.05)";
		chatListItem.style.backgroundColor = "black";
		
		chatArrow.setAttribute("class", "arrow");


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
		}
		console.log(chats);
	}
}
