<?php
    echo "School: ";
    
    $_SESSION['conn'] = new mysqli("localhost", "root", "", "it_tools");
    $sql = "SELECT * FROM `schools`";
    $schools = $_SESSION['conn']->query($sql);
    
    echo "<select class='form-input nav-item' name='school' required>";
    echo "<option value='none' selected>No school</option>";
    while ($school = $schools->fetch_assoc()) {
        $school_name = $school["name"];
        echo "<option value='$school_name'>$school_name</option>";        
    }
    echo "</select>";
?>