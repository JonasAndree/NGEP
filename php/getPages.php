<?php
    $currentUser;
    $parent = $_REQUEST["parrent"];
    $conn = new mysqli("localhost", "root", "", "it_tools");
    
    if ($conn->connect_error) {
        die("<div class='failed'>Connection failed: " . $conn->connect_error."</div><br>");
    }
    
    // Back button
    if ($parent != "null") {
        $grandParent = $conn->query("SELECT * FROM `pages` WHERE heading='$parent'");
        $grandParent = $grandParent->fetch_assoc();
        //$grandParent = current($grandParent);
        $grandParent = $grandParent["parent"];
        
        echo "<li class='nav-item nav-paranet' onclick='uppdateNavBarContent(\"$grandParent\")'>
                $parent
             </li>";
    } 
    
    
    // Add parrent
    $pages = $conn->query("SELECT * FROM `pages` WHERE parent='$parent'");
    while ($heading = $pages->fetch_assoc()) {
        $heading = $heading["heading"];
        if ($parent == "null") {
            echo "<li class='nav-item one-line-nav-item' onclick='uppdateNavBarContent(\"$heading\")' onmouseover='hoveringNavElement(this)'>
                       $heading
                 </li>";
        } else {
            echo "<li class='nav-item sub-nav-item one-line-nav-item' onclick='uppdateNavBarContent(\"$heading\")' onmouseover='hoveringNavElement(this)'>
                       $heading
                 </li>";
            
        }
    }
?>