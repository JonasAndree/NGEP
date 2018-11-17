
<?php
$firstName = $_REQUEST["firstName"];
$lastName = $_REQUEST["lastName"];
$position = $_REQUEST["position"];
$school = $_REQUEST["school"];
$mail = $_REQUEST["mail"];

$_SESSION['conn'] = new mysqli("localhost", "root", "", "it_tools");

$sql = "SELECT image FROM `users` WHERE mail='$mail'";
$result = $_SESSION['conn']->query($sql);
$result = $result->fetch_assoc();

echo "<div class='chat-line-container' 
        onmousedown='resizeChatWindowUp(event, this)'>
          <div class='chat-line'> </div>
      </div>";
echo "<header class='nav-item nav-paranet chat-header'>";
echo "<div id='chat-head'>";

if (! empty($result['image'])) {
    echo '<img class="chat-img" src="data:image/jpeg;base64,' . base64_encode($result['image']) . '"/>';
} else {
    echo "<img class='chat-img' src='images/user1.png'/>";
}

echo "</div>";
if ($firstName != "none") {
    echo "<div class='chat-heading'>$firstName $lastName</div>
      </header>";
} else {
    echo "<div class='chat-heading'>Not logged in!</div>
      </header>";
}
/* echo "<section class='chat-main'> */
echo "<section> <ul id='chat-headers-ul'>";
    include "getCourses.php";
    
echo "</ul> </section>";





?>