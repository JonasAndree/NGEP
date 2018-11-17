<?php
echo "Position: ";

$_SESSION['conn'] = new mysqli("localhost", "root", "", "it_tools");
$sql = "SELECT * FROM `positions`";
$positions = $_SESSION['conn']->query($sql);

if (isset($position) ) {
    if ($position == "Student") {
        echo "<select class='form-input nav-item' name='position' disabled> ";
    } else {
        echo "<select class='form-input nav-item' name='position'>";
    }
} else {
    echo "<select class='form-input nav-item' name='position'>";
}
while ($pos = $positions->fetch_assoc()) {
    $position_name = $pos["name"];
    $position_selectable = $pos["selectable"];
    echo "<br>$position_name";
    if ($update == true && $position == $position_name) {
        echo "<option id='position-user'
                      value='$position_name'
                      user-value='$position_name'
                      selected>
                    $position_name
              </option>";
    } else if ($position_selectable == 1) {
        echo "<option value='$position_name'>$position_name</option>";
    }
}
echo "</select>";
?>

