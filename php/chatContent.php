
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
if (! empty($result['image'])) {
    echo '<img class="chat-img" src="data:image/jpeg;base64,' . base64_encode($result['image']) . '"/>';
}
if ($firstName != "none") {
    echo "<div class='chat-heading'>$firstName</div>
      </header>";
} else {
    echo "<div class='chat-heading'>Not logged in!</div>
      </header>";
}
/* echo "<section class='chat-main'> */
echo "<section> <ul>";
    findParent('Josefine', 'Andree', 'Josefine@Andree.se', $mail);
    findParent('Karl', 'Kenfors', 'kenfors@kth.se', $mail);
    findParent('Admin', '', 'Admin', $mail);
echo "</ul> </section>";



function findParent($resip_name, $resip_Last_name, $resip_mail, $mail)
{
    echo "<li id='$resip_mail-chat-list-item' class='nav-item'
              onmouseover='displayChatInfo(\"$resip_mail\",\"over\")'
              onmouseout='displayChatInfo(\"$resip_mail\",\"out\")'
              onclick='displayChat(\"$resip_mail\",\"true\")'>
    
        <div class='animate-arrow'>
            <span id='$resip_mail-chat-arrow' class='arrow back'><span></span></span>";
                if ($resip_mail == 'Admin') {
                    echo 'Admin';
                } else {
                    echo "$resip_name $resip_Last_name";
                }
            echo "<div class='nav-button-parent chat-back '></div>
        </div>
        <div id='$resip_mail-chat-dialog-info' class='chat-dialog-container' stay='false'>
            <div class='chat-dialog-content-info'>";
                        
            echo "<div class='chat-dialog-info'>";
            include 'getChatDialogInfo.php';
            echo " 
        </div>
    </li>
    <div id='$resip_mail-chat-dialog' class='chat-dialog-container ' flying='false' 
         stay='false' pos='none'>
        <div class='chat-dialog-content resize-drag'>";
            /*echo "<div class='chat-size-container'>";
                */echo "<div class='chat-dialog-line-container'
                     onmousedown='resizeChatWindowUp(event, this)'>
                     <div class='chat-dialog-line'> </div>
               </div>";
                echo "<div class='chat-move-container'
                           onmousedown='moveChatWindowUp(event, this, \"$resip_mail\")' parent='$resip_mail'>
                    <div class='chat-move-box'> </div>
               </div>";
            /*echo "</div>";*/
            
            echo "<div class='nav-item nav-paranet chat-header' 
                       onclick='displayChat(\"$resip_mail\",\"true\")'>
                            $resip_name $resip_Last_name
                    <div class='animate-arrow'>
                    <span class='arrow'><span></span></span>
                </div>
            </div>";
            
        
        echo "<div class='chat-dialog'>";
        include 'getChatDialog.php';
        echo "</div>
            <form>
                <input class='chat-input form-input nav-item' type='text' placeholder='Enter message'></input>
                <button class='chat-submit-button submit-form nav-item' type='submit'>Send</button>
            </form>
        </div> 
    </div>";
}
?>