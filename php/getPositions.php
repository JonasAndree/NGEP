<?php
    session_start();
    echo "Position: ";
    
    $_SESSION['conn'] = new mysqli("localhost", "root", "", "it_tools");
    $sql = "SELECT * FROM `positions`";
    $positions = $_SESSION['conn']->query($sql);
    
    
    if ($update == true) {
        
    }
    
    
    echo "<select class='form-input nav-item' name='position' required>";
    while ($position = $positions->fetch_assoc()) {
        $position_name = $position["name"];
        $position_selectable = $position["selectable"];
        if ($position_selectable == 1)
            echo "<option value='$position_name'>$position_name</option>";        
    }
    echo "</select>";
?>

