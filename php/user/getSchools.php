<?php
    echo "School:";
    
    $_SESSION['conn'] = new mysqli("localhost", "root", "", "it_tools");
    $sql = "SELECT * FROM `schools`";
    $schools = $_SESSION['conn']->query($sql);
    
    if (isset($position) ) {
        if ($position == "Student") {
            echo "<select class='form-input nav-item' 
                          name='school' 
                          disabled>";
        } else {
            echo "<select class='form-input nav-item' 
                          name='school' 
                          required>";
        }
    } else {
        echo "<select class='form-input nav-item' 
                      name='school' 
                      required>";
    }
    
    while ($scho = $schools->fetch_assoc()) {
        $school_name = $scho["name"];
        if ($school == $school_name) {
            echo "<option id='school-user'
                          value='$school_name' 
                          user-value='$school_name'
                          selected>
                      $school_name 
                  </option>";             
        } else {
            echo "<option value='$school_name' readonly>$school_name</option>";  
        }      
    }
    echo "</select>";
?>