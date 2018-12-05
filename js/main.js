var editmode = true;



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
		console.log(editmode);
	} 
}