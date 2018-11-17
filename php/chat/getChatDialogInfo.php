<?php
$mail = $_REQUEST['mail'];
$_SESSION['conn'] = new mysqli("localhost", "root", "", "it_tools");

$sql = "SELECT * FROM `messages` WHERE touser='$mail' AND fromuser='$resip_mail' AND course='$resip_course'
            UNION
            SELECT * FROM `messages` WHERE touser='$resip_mail' AND fromuser='$mail' AND course='$resip_course'
            ORDER BY sent DESC LIMIT 3
";
$messages = $_SESSION['conn']->query($sql);
if (!empty($messages)) {
    $messagesArray = array();
    while ($message = $messages->fetch_assoc()) {
        if ($mail == $message['fromuser']) {
            array_push($messagesArray,""
                 ."<div class='chat-speech-bubble-container'>"
                     ."<div class='chat-speech-bubble-container2 left'>"
                         ."<div class='chat-speech-bubble left' > " . $message['message']
                         ."</div>"
                         ."<p class='chat-speech-date left'>" . $message['sent'] . "<p>"
                     ."</div>"
                 ."</div>"
            );
        } else {
            array_push($messagesArray,""
            . "<div class='chat-speech-bubble-container'>"
                . "<div class='chat-speech-bubble-container2 right'>"
                    . "<div class='chat-speech-bubble right' >" . $message['message']
                    . "</div>"
                    . "<p class='chat-speech-date right'>" . $message['sent'] . "<p>"
                . "</div>"
            . "</div>"
            );
        }
        
    }
    $messagesArray = array_reverse($messagesArray);
    if(count($messagesArray) > 2)
        echo "...";
    for  ($i = 0; $i < count($messagesArray); $i++) {
        if(count($messagesArray) > 2)
            if ($i == 0)
                continue;
        echo $messagesArray[$i];
    }
    
    if(count($messagesArray) == 0)
        echo "No message history!";
}
?>