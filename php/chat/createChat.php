<?php
include_once "../sql.php";

function findParent($parent, $resip_name, $resip_Last_name, $resip_course, $resip_mail, $position, $mail)
{
    if ($parent == false) {
        createCourseChildeButton( $resip_name, $resip_Last_name, $resip_course, $resip_mail, $position);
        createChatDialog($resip_course, $resip_name, $resip_Last_name, $resip_mail, $mail);
        createChatDialogInfo($parent, $resip_course, $resip_name, $resip_Last_name, $resip_mail, $mail);
    } else {
        createCourseParentButton($resip_course, $resip_mail, $mail, $position);
        createChatDialogInfo($parent, $resip_course, '', '', $resip_mail, $mail);
    }
}

function createCourseChildeButton($resip_name, $resip_Last_name, $resip_course, $resip_mail, $position ) {
    
    if ($resip_course == 'Admin') {
        echo "<li id='$resip_course-$resip_name-$resip_Last_name-chat-list-item'
              class='nav-item admin-chat-button'
              onmouseover='displayChatInfo(\"$resip_course\", \"$resip_name\", \"$resip_Last_name\", \"over\", this)'
              onmouseout='displayChatInfo(\"$resip_course\", \"$resip_name\", \"$resip_Last_name\", \"out\", this)'
              onclick='displayChat(\"$resip_course\", \"$resip_name\", \"$resip_Last_name\", \"true\")'>
              
            <div class='animate-arrow'>
                <span id='$resip_course-$resip_name-$resip_Last_name-chat-arrow' class='arrow back'><span></span></span>";
        echo "<div class='chat-button'>Admin</div>";
    } else {
        echo "<li id='$resip_course-$resip_name-$resip_Last_name-chat-list-item'
              class='nav-item'
              onmouseover='displayChatInfo(\"$resip_course\", \"$resip_name\", \"$resip_Last_name\",\"over\", this)'
              onmouseout='displayChatInfo(\"$resip_course\", \"$resip_name\", \"$resip_Last_name\",\"out\", this)'
              onclick='displayChat(\"$resip_course\", \"$resip_name\", \"$resip_Last_name\", \"true\")'>
              
            <div class='animate-arrow'>
                <span id='$resip_course-$resip_name-$resip_Last_name-chat-arrow' class='arrow back'><span></span></span>";
        
        if($position == 'Teacher') {
            echo "<div class='chat-button'>$resip_name $resip_Last_name </div>";
        }else {
            echo "<div class='chat-button'>$resip_course </div>";
        }
    }
    echo "<div class='nav-button-parent chat-back'></div>";
    
    $users = getUserImage($resip_mail);
    
    
    $result = $users->fetch_assoc();
    
    if (! empty($result['image'])) {
        echo "<img id='$resip_course-$resip_name-$resip_Last_name-chat-button-img' class='chat-button-img right' src='data:image/jpeg;base64," . base64_encode($result['image']) . "'/>";
    } else {
        echo "<img id='$resip_course-$resip_name-$resip_Last_name-chat-button-img' class='chat-button-img right' src='images/user1.png'/>";
    }
 
    echo "</div>";
    echo " </li>";
}


function createCourseParentButton($resip_course, $resip_mail, $mail, $position){
    if ($position == "Teacher back") {
        echo "<li id='$resip_course---chat-list-item'
              class='nav-item nav-paranet'
              onmouseover='displayChatInfo(\"$resip_course\",
                                           \"\", 
                                           \"\",
                                           \"over\", 
                                           this)'
              onmouseout='displayChatInfo(\"$resip_course\",
                                          \"\", 
                                          \"\",
                                          \"out\", 
                                          this)'
              onclick='displayChildren(\"$resip_course\",
                                       \"$mail\", 
                                       \"$position\")'>";
            echo "<div class='animate-arrow'>
                <span id='$resip_course-chat-arrow' class='arrow rotate-back'><span></span></span>";
    } else {
        echo "<li id='$resip_course-chat-list-item'
              class='nav-item '
              onmouseover='displayChatInfo(\"$resip_course\", 
                                           \"\", 
                                           \"\", 
                                           \"over\", 
                                           this)'
              onmouseout='displayChatInfo(\"$resip_course\", 
                                          \"\", 
                                          \"\", 
                                          \"out\", 
                                          this)'
              onclick='displayChildren(\"$resip_course\",
                                       \"$mail\", 
                                       \"$position\")'>";
            echo "<div class='animate-arrow'>
                <span id='$resip_course-chat-arrow' class='arrow rotate back'><span></span></span>";
    }
            echo "<div class='chat-button'>$resip_course </div>";
            echo "<div class='nav-button-parent chat-back '></div>";
        echo "</div>";
    echo " </li>";
}



function createChatDialog($resip_course, $resip_name, $resip_Last_name, $resip_mail, $mail) {
    echo "<div id='$resip_course-$resip_name-$resip_Last_name-chat-dialog' class='chat-dialog-container '
                   flying='false' stay='false' pos='none' >
           <div id='$resip_course-$resip_name-$resip_Last_name-chat-dialog-content'
                class='chat-dialog-content resize-drag'
                onmousedown='borderUp(event, this)'
                onmouseover='borderOver(event, this)'
                onmouseout='borderOut(event, this)'>";
    
    echo "<div class='chat-dialog-line-container'
               onmousedown='resizeChatWindowUp(event, this)'>
               <div class='chat-dialog-line'> </div>
          </div>";
    
    echo "<div class='chat-move-container'
               onmousedown='moveChatWindowUp(event, this, \"$resip_course\", \"$resip_name\", \"$resip_Last_name\")'
               parent='$resip_course-$resip_name-$resip_Last_name'>
               <div class='chat-move-box'></div>
          </div>";
    
    echo "<div class='nav-item nav-paranet chat-header'
               onclick='displayChat(\"$resip_course\", \"$resip_name\", \"$resip_Last_name\")'>";
    
    if ($resip_course == "Admin") {
        echo " $resip_course";
    } else {
        echo "$resip_course<br> $resip_name $resip_Last_name";
    }
        echo " <div class='animate-arrow'>
                    <span class='arrow'><span></span></span>
               </div>";
            
        $users = getUserImage($resip_mail);

        $result = $users->fetch_assoc();
        if (! empty($result['image'])) {
            echo '<img class="chat-dialog-img" 
                       src="data:image/jpeg;base64,'.base64_encode($result['image']) . '"/>';
        } else {
            echo "<img class='chat-dialog-img right' 
                       src='images/user1.png'/>";
        }
            echo "</div>";
            echo "<div id='$resip_course-$resip_name-$resip_Last_name-chat-dialog-box' 
                       class='chat-dialog' >";
            include 'getChatDialog.php';
            echo "</div>
                <form>
                    <input class='chat-input form-input nav-item' 
                           type='text' 
                           placeholder='Enter message'>
                    </input>
                    <button class='chat-submit-button submit-form nav-item' 
                            type='submit'>
                                Send
                    </button>
                </form>
            </div>
        </div>";
}
function createChatDialogInfo($parent, $resip_course, $resip_name, $resip_Last_name, $resip_mail, $mail) {
    echo "<div id='$resip_course-$resip_name-$resip_Last_name-chat-dialog-info'
                   class='chat-dialog-container'
                   stay='false'>
            <div class='chat-dialog-content-info'>";
                echo "<div class='chat-dialog-info'>";
    
                if ($parent == false) {
                    include "getChatDialogInfo.php";
                } else {
                   include "getUsersInfo.php";
                }
            echo "</div>";
        echo "</div>";
    echo "</div>";
}
?>