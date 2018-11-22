pupulateChat();
function pupulateChat() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("chat-content").innerHTML = this.responseText;
			chats = [];
			if (document.getElementById("chat-content") != null) {
				var height = document.getElementById("chat-content").style.height;
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

var courseChats = {};

function displayChildren(course, mail, position) {
    if (position == "Teacher") {
	    var xhr = new XMLHttpRequest();
	    xhr.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	            document.getElementById("chat-headers-ul").innerHTML = this.responseText;
	        }
	    };
	    if (chats.length > 0) {
    		console.log(chats);
    	}
	    
/*
    	console.log("courseChats");
    	console.log("chats-" + course);
    	console.log(courseChats);
	    
    	if (courseChats["chats-" + course] !== undefined) {
        	console.log("SHOW SHATS AGAIN");
        	console.log(courseChats["chats-" + course]);
        	console.log(courseChats["chats-" + course][0]);
			var courseName = courseChats["chats-" + course][0].getAttribute("course"); 
			var firstName = courseChats["chats-" + course][0].getAttribute("firstName");
			var lastName = courseChats["chats-" + course][0].getAttribute("lastName");
			console.log(courseName + " " + firstName + " " + lastName);
			displayChat(courseName, firstName, lastName);
        	
        	for (var i = courseChats["chats-" + course].length - 1; i >= 0; i--)  {
	    		console.log("loop");
				var courseName = courseChats["chats-" + course][i].getAttribute("course"); 
				var firstName = courseChats["chats-" + course][i].getAttribute("firstName");
				var lastName = courseChats["chats-" + course][i].getAttribute("lastName");
				console.log(courseName + " " + firstName + " " + lastName);
				displayChat(courseName, firstName, lastName);
			}
    	}*/
	    xhr.open("GET", "php/chat/updateChats.php?course="+course+"&mail="+mail, true);
	    xhr.send();
    } else {
	    var xhr = new XMLHttpRequest();
	    xhr.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	            document.getElementById("chat-headers-ul").innerHTML = this.responseText;
	        }
	    };
	    if (position == "Teacher back") {
	    	courseChats["chats-" + course] = {};
	    	for (var i = 0; i < chats.length; i++) {
	    		courseChats["chats-" + course][i] = chats[i];
	    	}
	    	for (var i = chats.length - 1; i >= 0; i--)  {
				var courseName = chats[i].getAttribute("course"); 
				var firstName = chats[i].getAttribute("firstName");
				var lastName = chats[i].getAttribute("lastName");
				console.log(courseName + " " + firstName + " " + lastName);
				displayChat(courseName, firstName, lastName);
			}
	    	position = "Teacher";
	    }
	    
	    xhr.open("GET", "php/chat/getCourses.php?mail=" + mail +
	    								       "&position=" + position +
	    								       "&course=" + course
	    								       , true);
	    xhr.send();
    }
}


