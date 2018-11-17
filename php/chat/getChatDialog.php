<?php
$_SESSION['conn'] = new mysqli("localhost", "root", "", "it_tools");

$sql = "SELECT * FROM `messages` WHERE touser='$mail' AND fromuser='$resip_mail' AND course='$resip_course'
            UNION
            SELECT * FROM `messages` WHERE touser='$resip_mail' AND fromuser='$mail' AND course='$resip_course'
            ORDER BY sent";
$messages = $_SESSION['conn']->query($sql);
if (! empty($messages)) {
    while ($message = $messages->fetch_assoc()) {
        if ($mail == $message['fromuser']) {
            echo "<div class='chat-speech-bubble-container'>";
            echo "<div class='chat-speech-bubble-container2 left'>";
                echo "<div class='chat-speech-bubble left' > " . $message['message'];
                    echo "</div>";
                        echo "<p class='chat-speech-date left'>" . $message['sent'] . "<p>";
                    echo "</div>";
                echo "</div>";
        } else {
            echo "<div class='chat-speech-bubble-container'>";
                echo "<div class='chat-speech-bubble-container2 right'>";
                    echo "<div class='chat-speech-bubble right' >" . $message['message'];
                    echo "</div>";
                    echo "<p class='chat-speech-date right'>" . $message['sent'] . "<p>";
                echo "</div>";
            echo "</div>";
        }
    }
}
?>