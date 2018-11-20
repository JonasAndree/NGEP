<?php
include_once "../sql.php";

$messages = getChatDialog($mail, $resip_mail, $resip_course);

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