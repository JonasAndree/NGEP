var editmode = true;
/**
 * hasiofhasiodhfiosah
 * 
 * @param menuElement
 * @param field
 * @returns
 */
document.getElementById("navbar").classList.toggle("toggle");

function toggleMenuBar(menuElement, field) {
	menuElement.classList.toggle("toggle");
	if (field == "nav") {
		document.getElementById("navbar").classList.toggle("toggle");
	}
	if (field == "user" || field == "chat") {
		if (field == "user") {
			document.getElementById("user-cont").classList.toggle("toggle");
		}
		if (field == "chat") {
			pupulateChat();
			chattVisible = !chattVisible;
			document.getElementById("chat-cont").classList.toggle("toggle");
		}
	}
	if (field == "edit") {
		editmode = !editmode;
		toggleEditmode();
	}
}
function toggleEditmode() {
	var editableContent = document.querySelectorAll('[contenteditable]');
	for (var i = 0; i < editableContent.length; i++) {
		editableContent[i].setAttribute("contenteditable", editmode);
		if(editmode == true) { 
			editableContent[i].setAttribute("onfocus", "showEditableBar(this)");
			editableContent[i].setAttribute("onblur", "saveText(this)");
		} else {
			editableContent[i].setAttribute("onfocus", "");
			editableContent[i].setAttribute("onblur", "");
		}
	}
}