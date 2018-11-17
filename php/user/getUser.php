<?php 
    echo "<div id = 'user-image-container'>";
        echo "<form id='image-form'
                    class='reg-log-form'
                    action='php/user/uploadImage.php'
                    enctype='multipart/form-data'>";
            
            echo "<input name='mail' 
                         type='hidden' 
                         value='$mail'>";
            echo "<div class='image-upload'>";
                echo "<label id='for-input' for='file-input'>";
                    include "getImage.php"; 
                echo "</label>";
                echo "<input id='file-input'
                             name='fileToUpload'
                             type='file'
                             onchange='changeImage()' />";
            echo '</div>';
        echo "</form>"; 
    echo "</div>";
    
    echo "<div>Firstname: </div>";
    if ($position == "Student") {
        echo "<input id='firstname-user' 
                     class='form-input nav-item' 
                     type='text' name='firstname' 
                     value='$firstName' 
                     user-value='$firstName'
                     placeholder='$firstName' 
                     readonly>";
    } else {
        echo "<input id='firstname-user' 
                     class='form-input nav-item' 
                     type='text' 
                     name='firstname' 
                     value='$firstName' 
                     user-value='$firstName'
                     placeholder='$firstName'>";
    }
    echo "<div>Lastname: </div>";
    if ($position == "Student") {
        echo "<input id='lastname-user' 
                     class='form-input nav-item' 
                     type='text' 
                     name='lastname' 
                     value='$lastName' 
                     user-value='$lastName'
                     placeholder='$lastName' 
                     readonly> ";
    } else {
        echo "<input id='lastname-user' 
                     class='form-input nav-item' 
                     type='text' 
                     name='lastname' 
                     user-value='$lastName'
                     value='$lastName' 
                     placeholder='$lastName'> ";
    }
    echo "<div>Mail: </div>";
    $mail = strtolower($mail);
    if ($position == "Student") {
        echo "<input id='mail-user' 
                     class='form-input nav-item' 
                     type='text' 
                     name='mail' 
                     user-value='$mail'
                     value='$mail' 
                     placeholder='$mail' 
                     readonly> ";
    } else {
        echo "<input id='mail-user' 
                     class='form-input nav-item' 
                     type='text' 
                     name='mail' 
                     value='$mail'
                     user-value='$mail'
                     placeholder='$mail' 
                     readonly> ";
    }
    
    $update = true;
    include "getPositions.php";
    include "getSchools.php";
?>