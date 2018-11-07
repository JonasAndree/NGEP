
<div id="chat-container">
	<div id="chat-content">
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
        
        echo "<div class='event, chat-line-container' 
                onmousedown='resizeChatWindowUp(event, this)'>
                  <div class='chat-line'> </div>
              </div>";
        echo "<header class='chat-header'>";
        if (!empty($result['image'])) {
            echo '<img class="chat-img" src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';
        } else {
            /*echo "<img class='chat-img'></img>";*/
        }
        /*if (!empty($users)) {
            $img = $users["image"];
            echo " <img class='chat-img'></img>";
        } else {
            echo " ";
        }*/
        if ($firstName != "none") {
            echo  "<div class='chat-heading'>$firstName</div>
              </header>";
        } else {
            echo  "<div class='chat-heading'>Not logged in!</div>
              </header>";
        }
                    
        echo "<section class='chat-main'>
                
              </section>";
        ?>
	</div>
</div>