
<div id="up-con">
	
<?php 
    $mail = "";
    /* session_start(); */
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        $mail = $_REQUEST["mail"];
    } else {
        $mail = $_POST["mail"];
    }
    include "getImage.php"; 
?>

<form class="reg-log-form" 
    target="print_popup" 
    onsubmit="window.open('about:blank','print_popup','width=200px, height=200px');" 
    action="<?php echo htmlspecialchars('php/updateUser.php');?>" 
    method="post">
        
<?php
$firstName = $lastName = $position = 
$school = $mail = "";
/* session_start(); */
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $firstName = $_REQUEST["firstName"];
    $lastName = $_REQUEST["lastName"];
    $position = $_REQUEST["position"];
    $school = $_REQUEST["school"];
    $mail = $_REQUEST["mail"];
} else {
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $position = $_POST["position"];
    $school = $_POST["school"];
    $mail = $_POST["mail"];
}




echo "<br>
      <br>
      <div>Firstname: </div>";
if ($position == "Student") {
    echo "<input class='form-input nav-item' type='text' name='firstname' value='$firstName' placeholder='$firstName' readonly>";
} else {
    echo "<input class='form-input nav-item' type='text' name='firstname' value='$firstName' placeholder='$firstName'>";
}

echo "<div>Lastname: </div>";
if ($position == "Student") {
    echo "<input class='form-input nav-item' type='text' name='lastname' value='$lastName' placeholder='$lastName' readonly> ";
} else {
    echo "<input class='form-input nav-item' type='text' name='lastname' value='$lastName' placeholder='$lastName'> ";
}
echo "<div>Mail: </div>";
if ($position == "Student") {
    echo "<input class='form-input nav-item' type='text' name='mail' value='$mail' placeholder='$mail' readonly> ";
} else {
    echo "<input class='form-input nav-item' type='text' name='mail' value='$mail' placeholder='$mail' readonly> ";
}
$update = true;
include "getPositions.php";
include "getSchools.php";
if ($position != "Student") {
    echo "<button class='submit-form nav-item' type='submit'>Update</button>";
}
echo "</form>";
echo "</div>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<script>
        document.getElementById('up-con').innerHTML = '';
    </script>";
    if ($firstName != test_input2($_POST["firstname"]))
        update("users", "firstname", $data, $mail);
    
    $newfirstName = $_SESSION['firstName'] = test_input2($_POST["firstname"]);
    $newlastName = $_SESSION['lastName'] = test_input2($_POST["lastname"]);
    $newmail = $_SESSION['mail'] = test_input2($_POST["mail"]);
    $newposition = $_SESSION['position'] = test_input2($_POST["position"]);
    $newschool = $_SESSION['school'] = test_input2($_POST["school"]);
    
    update("users", "firstname", $firstName, $mail);
    update("users", "lastname", $lastName, $mail);
    update("users", "mail", $mail, $mail);
    update("users", "position", $position, $mail);
    update("users", "school", $school, $mail);

    print_r("<script>localStorage.setItem('loggedIn', 'true');
                 localStorage.setItem('firstName', '$newfirstName');
                 localStorage.setItem('lastName', '$newlastName');
                 localStorage.setItem('mail', '$newmail');
                 localStorage.setItem('position', '$newposition');
                 localStorage.setItem('school', '$newschool');
         </script>");
    /*echo "<script>window.close();</script>";*/
    
}

function update($table, $attribut, $data, $mail)
{   
    $sql = "UPDATE `$table` SET $attribut = '$data' WHERE mail = '$mail'";
    $_SESSION['conn'] = new mysqli("localhost", "root", "", "it_tools");
    
    if ($_SESSION['conn']->query($sql) === TRUE) {
        echo "$mail <- $table -> $attribut -> $data";
    }
    $_SESSION['conn']->close();
}

function test_input2($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>