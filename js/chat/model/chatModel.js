var chats = [];


var dragedChatWindow = null;
var dragedStartPos; 
var dragedStartTop; 


var movedChatWindow = null;


var tempSpaceContainer = document.createElement('div');
var tempSpace = document.createElement('div');
tempSpaceContainer.appendChild(tempSpace);
tempSpace.id = 'temp-space';
tempSpace.setAttribute("stay", "true");
var spaceAdded = false;
var spacePos = 0;


var hoverChat = null;
var chattHovering = "false";


var vertRezChatWindow = null;
var vertRezDirChatWindow = null;
var oldStartX = null;
var oldStartWidth = null;
var borderWidth = 10;


var catBorderWidth = 5;