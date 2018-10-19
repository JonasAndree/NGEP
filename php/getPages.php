<?php
    $currentUser;
    $parent = $_REQUEST["parrent"];
    $conn = new mysqli("localhost", "root", "", "it_tools");
    
    if ($conn->connect_error) {
        die("<div class='failed'>Connection failed: " . $conn->connect_error."</div><br>");
    }
    echo "<ul>";
    // Back button
    if ($parent != "null") {
        $grandParent = $conn->query("SELECT * FROM `pages` WHERE heading='$parent'");
        $grandParent = $grandParent->fetch_assoc();
        //$grandParent = current($grandParent);
        $grandParent = $grandParent["parent"];  
        echo "<li class='nav-item nav-paranet' onclick='uppdateNavBarContentClick(\"$grandParent\")'>
                $parent
             </li>";
    } 
    $pages = $conn->query("SELECT * FROM `pages` WHERE parent='$parent'");
    $head  = $pages->fetch_assoc();
    $level = $head["level"];
    echo "<div id='test' data-value='$level' style='displaye:none;'></div>";
    
    // Add parrent
    $pages = $conn->query("SELECT * FROM `pages` WHERE parent='$parent'");    
    while ($heading = $pages->fetch_assoc()) {
        $level = $heading["level"];
        $heading = $heading["heading"];
        if ($parent == "null") {
            echo "<li class='nav-item one-line-nav-item' onclick='uppdateNavBarContentClick(\"$heading\")' onmouseover='hoveringNavElement(this, $level)'>
                       $heading
                 </li>";
        } else {
            echo "<li class='nav-item sub-nav-item one-line-nav-item' onclick='uppdateNavBarContentClick(\"$heading\")' onmouseover='hoveringNavElement(this, $level)'>
                       $heading
                 </li>";        
        }
    }
    echo "</ul>"
    
?>