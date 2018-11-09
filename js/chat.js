
window.addEventListener("mousemove", function(event){
	resizeChatWindowMove(event);
});
window.addEventListener("mouseup", function(event){
	resizeChatWindowDrop(event);
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
				
				if (chattVisible) {			
					document.getElementById("chat-content").style.height = height + "px";
				} 
				if (document.getElementById("user-content") != null) {
					if (chattVisible) {			
						document.getElementById("user-content").style.height = "calc(100vh - " + height +"px)";
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
	xmlhttp.open("GET", "php/chatContent.php?firstName=" + firstName + "&lastName=" + lastName + "&position=" + position + "&school=" + school + "&mail=" + mail, true);
	xmlhttp.send();
};
var dragedChatWindow = null;
function resizeChatWindowUp(event, element) {
	if (dragedChatWindow == null) {
		dragedChatWindow = element;
	} 
}
function resizeChatWindowMove(event, element) {
	if (dragedChatWindow != null) {
		
		var screenCssPixelRatio = (window.outerHeight - 8) / window.innerHeight;
		console.log(screenCssPixelRatio);
		
		var positionElement = dragedChatWindow.getBoundingClientRect().top + 5;
		
		var height = document.getElementById("chat-content").offsetHeight;
		var newHeight = window.innerHeight - event.clientY + 10;
		
		if (newHeight < 300)
			newHeight = 300;
		if (newHeight > screen.height - 150)
			newHeight = screen.height - 150;
		
		if (dragedChatWindow.parentNode.id == "chat-content") {
			document.getElementById("user-content").style.height = (window.innerHeight - newHeight) + "px";
		}
		dragedChatWindow.parentNode.style.height = newHeight + "px";		
	}
}
function resizeChatWindowDrop(event) {
	if (dragedChatWindow != null) {
		dragedChatWindow = null;
	}
}

var activChatt = null;
var chattHovering = "false";
function displayChatInfo(name, state) {
	var hoverChat = document.getElementById(name+"-chat-dialog-info");
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
var chats = [];

function displayChat(name) {
	var clickedChat = document.getElementById(name+"-chat-dialog"); 
	if (clickedChat.getAttribute("stay") == "true") {
		clickedChat.setAttribute("stay", "false");
		clickedChat.style.display = "none";
		var removedPos = parseInt(clickedChat.getAttribute("pos"));
		chats[removedPos] = "none";
		document.getElementById(name+'-chat-list-item').style.transform = "scale(1.00, 1.00)";
		document.getElementById(name+'-chat-list-item').style.backgroundColor = "var(--nav-item-color)"; 
		document.getElementById(name+'-chat-arrow').setAttribute("class", "arrow back");
		
		
		for (var i = removedPos; i < chats.length; i++) {
			if (chats[i] != "none") {
				var right = 170 + 170 * (i-1);
				chats[i].firstElementChild.style.right = right + "px";
				chats[i - 1] = chats[i];

				chats[i - 1].setAttribute("pos", i-1);
				chats[i] = "none";
			} 
			
			/*if (chats[i] == "none" && i + 1 < chats.length) {
				console.log("larger");
				chats[i] = chats[i + 1];
				var right = 170 + 170 * i;
				chats[i].firstElementChild.style.right = right + "px";
				
				chats[i + 1] = "none";
			}*/
		}

		for (var i = 0; i < chats.length; i++) {
			console.log(i + " cool " + chats[i]);
		}
		
	} else {
		document.getElementById(name+'-chat-list-item').style.transform = "scale(1.05, 1.05)";
		document.getElementById(name+'-chat-list-item').style.backgroundColor = "black"; 
		document.getElementById(name+'-chat-arrow').setAttribute("class", "arrow");

		clickedChat.setAttribute("stay", "true");
		clickedChat.style.display = "block";
		var newPos; 
		if (chats.length > 0) {
			for (var i = 0; i < chats.length; i++) {
				if (chats[i] == "none")	{
					newPos = i; 
					break;
				} else {
					newPos = chats.length;
				}
			}
		} else {
			newPos = 0; 
		}
		clickedChat.setAttribute("pos", newPos);
		var right = 170 + 170 * newPos;
		chats[newPos] = clickedChat;
		clickedChat.firstElementChild.style.right = right + "px";
		
	}
	
}
