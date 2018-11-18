<?php


include "model/pageModel.php";

    $rootPage = new Page();
    
    $firstName = $_REQUEST["firstName"];
    $lastName = $_REQUEST['lastName'];
    $mail = $_REQUEST['mail'];
    $school = $_REQUEST['school'];
    $position = $_REQUEST['position'];
    
    include "getSpecificCourses.php";
    
    
    while ($course = $result->fetch_assoc()) {
        
    }
    
    
    
    
    echo "<section id='sub-nav-container-main' class='sub-nav-container' >";
    echo "<ul>";
    
    
    echo "</ul>";
    echo "</section>";
    


?>