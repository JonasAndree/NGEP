<?php
    $currentUser;
    $heading = $_REQUEST["heading"];
    $conn = new mysqli("localhost", "root", "", "it_tools");
    
    if ($conn->connect_error) {
        die("<div class='failed'>Connection failed: " . $conn->connect_error."</div><br>");
    }    
    
    // Add parrent
    $level = $conn->query("SELECT * FROM `pages` WHERE parent='$heading'");
    $level = $level->fetch_assoc();
    $level = $level["level"];
    
    echo $level;
    
?>