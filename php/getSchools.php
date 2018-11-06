<?php
    echo "School: ";
    
    $_SESSION['conn'] = new mysqli("localhost", "root", "", "it_tools");
    $sql = "SELECT * FROM `schools`";
    $schools = $_SESSION['conn']->query($sql);
    
    if ($_SESSION["position"]  == "Student") {
        echo "<select class='form-input nav-item' name='school' disabled>";
    } else {
        echo "<select class='form-input nav-item' name='school' required>";
    }
    
    echo "<option value='none' selected>No school</option>";
    
    while ($scho = $schools->fetch_assoc()) {
        $school_name = $scho["name"];
        
        if ($update == 1 && $school == $school_name) {
            echo "<option value='$school_name' selected>$school_name</option>";             
        } else {
            echo "<option value='$school_name' readonly>$school_name</option>";  
        }      
    }
    echo "</select>";
?>