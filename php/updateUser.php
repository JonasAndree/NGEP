<?php
/*session_start();*/
    $firstName = $_SESSION['firstName'] = $_REQUEST["firstName"];
    $lastName = $_SESSION['lastName'] = $_REQUEST["lastName"];
    $birthdate = $_SESSION['birthdate'] = $_REQUEST["birthdate"];
    $position = $_SESSION['position'] = $_REQUEST["position"];
    $school = $_SESSION['school'] = $_REQUEST["school"];
    echo "<form class='reg-log-form' action='this' method='post'>";
    
    echo "<div class='nav-item nav-paranet tooltip' onclick='logout()'>";
    echo "<span class='tooltiptext'>Sign out</span>";
    echo "Logged in";
    echo "<div class='animate-arrow '>";
    echo "<span class='arrow back'><span></span></span>";
    echo "</div>";
    echo "</div>";
    echo "<br>";
    echo "<br>";
    
    echo "<div>Firstname: </div>";
    echo "<input class='form-input nav-item' type='text' name='firstname' placeholder='$firstName'>";
    echo "<div>Lastname: </div>";
    echo "<input class='form-input nav-item' type='text' name='lastname' placeholder='$lastName'>";
    echo "<div>Position: </div>";
    
    echo " <select class='form-input nav-item' name='position'>";
    if ($position == "Student") {
        echo "<option value='Student' selected>Student</option>";
        echo "<option value='Teacher'>Teacher</option>";
    } else if($position == "Teacher"){
        echo "<option value='Student' >Student</option>";
        echo "<option value='Teacher' selected>Teacher</option>";
    } else {
        echo "<option value='admin' >Admin</option>";
    }
    echo "</select>";
    
    echo "<div>School: </div>";
    echo "<select class='form-input nav-item' name='school'>";
    if ($school == "none") {
        echo "<option value='none' selected>No school</option>";
        echo "<option value='NTI Gymnasiet Sundbyberg'>NTI Gymnasiet Sundbyberg</option>";
    } else if ($school == "NTI Gymnasiet Sundbyberg") {
        echo "<option value='none' >No school</option>";
        echo "<option value='NTI Gymnasiet Sundbyberg' selected>NTI Gymnasiet Sundbyberg</option>";
    }
    echo "</select>";
    echo "<button class='submit-form nav-item' type='submit'>Update</button>";
    echo "</form>";
?>