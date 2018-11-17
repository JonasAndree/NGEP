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
					document.getElementById("chat-content").style.height = height + "px";
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
	xmlhttp.open("GET", "php/chat/chatContent.php?firstName=" + firstName
			+ "&lastName=" + lastName + "&position=" + position + "&school="
			+ school + "&mail=" + mail, true);
	xmlhttp.send();
};



function borderOver(event, borderElement){
    if(event.offsetX < 0) {
    	borderElement.style.borderLeftColor = "var(--hover-text-color)";
    } else if (event.offsetX > (borderElement.clientWidth - (catBorderWidth * 2))) {
    	borderElement.style.borderRightColor = "var(--hover-text-color)";
    } else {
    	borderElement.style.borderLeftColor = "var(--nav-color)";
    	borderElement.style.borderRightColor = "var(--nav-color)";
    	borderElement.style.borderTopColor = "var(--nav-color)";
    }
}

function borderOut(event, borderElement) {
    if(event.offsetX < 0) {
    	borderElement.style.borderLeftColor = "var(--nav-color)";
    } else if (event.offsetX > (borderElement.clientWidth - (catBorderWidth * 2))) {
    	borderElement.style.borderRightColor = "var(--nav-color)";
    } 
}


function displayChildren(course, mail, position) {
    if (position == "Teacher") {
	    var xhr = new XMLHttpRequest();
	    xhr.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	            document.getElementById("chat-headers-ul").innerHTML = this.responseText;
	        }
	    };
	    xhr.open("GET", "php/chat/updateChats.php?course="+course+" &mail="+mail, true);
	    xhr.send();
    } else {
	    var xhr = new XMLHttpRequest();
	    xhr.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	            document.getElementById("chat-headers-ul").innerHTML = this.responseText;
	        }
	    };
	    if (position == "Teacher back")
	    	position = "Teacher";
	    
	    xhr.open("GET", "php/chat/getCourses.php?mail=" + mail +
	    								       "&position=" + position +
	    								       "&course=" + course
	    								       , true);
	    xhr.send();
    }
}


