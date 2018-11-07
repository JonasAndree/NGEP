
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
			document.getElementById("chat-cont").innerHTML = this.responseText;
			if (document.getElementById("chat-content") != null) {
				
				var height = document.getElementById("chat-content").offsetHeight;

				if (height < 200)
					height = 200; 

				if (chattVisible) {			
					document.getElementById("chat-content").style.height = height + "px";
					document.getElementById("user-content").style.height = "calc(100vh - " + height + "px)";
				} else { 
					document.getElementById("user-content").style.height = "100vh";
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
function resizeChatWindowMove(event) {
	if (dragedChatWindow != null) {
		console.log("reg");
		var height = document.getElementById("chat-content").offsetHeight;
		var newHeight = screen.height - event.clientY;
		if (newHeight > screen.height - 150)
			newHeight = screen.height - 150;
		if (newHeight < screen.height - (screen.height - 150))
			newHeight = screen.height - (screen.height - 150);
		if (dragedChatWindow.parentNode.id == "chat-content") {
			document.getElementById("user-content").style.height = (screen.height - newHeight + 15) + "px";
		}
		dragedChatWindow.parentNode.style.height = newHeight + "px";
	}
}
function resizeChatWindowDrop(event) {
	if (dragedChatWindow != null) {
		dragedChatWindow = null;
	}
}



