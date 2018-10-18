<?php
    $currentUser;
    $conn = new mysqli("localhost", "root", "", "it_tools");
    
    if ($conn->connect_error) {
        die("<div class='failed'>Connection failed: " . $conn->connect_error."</div><br>");
    }    
    
    // Add parrent
    $levels = $conn->query("SELECT MAX(level) FROM `pages`");
    $levels = $levels->fetch_assoc();
    $levels = $levels["MAX(level)"];
    
    echo $levels;
    
?>