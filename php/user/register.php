<?php
session_start();
include_once "../sql.php";
include_once "../../testInput.php";
$password = $passwordv = 
$_SESSION['firstName'] = $_SESSION['lastName'] = $_SESSION['mail'] = 
$_SESSION['birthdate'] = $_SESSION['position'] = $_SESSION['school'] = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alEnterd = true;
    $_SESSION['firstName'] = test_input($_POST["firstname"]);
    $_SESSION['lastName'] = test_input($_POST["lastname"]);
    $_SESSION['mail'] = test_input($_POST["mail"]);
    $_SESSION['position'] = test_input($_POST["position"]);
    $_SESSION['school'] = test_input($_POST["school"]);
    
    $password = test_input($_POST["password"]);
    $passwordv = test_input($_POST["passwordv"]);
    
    if (! empty($_POST["firstname"])) {
        $_SESSION['firstName']  = $_POST["firstname"];
    } else {
        $alEnterd = false;
    }
    if (! empty($_POST["lastname"])) {
        $_SESSION['lastName'] = $_POST["lastname"];
    } else {
        $alEnterd = false;
    }
    if (!empty($_POST["mail"])) {
        $_SESSION['mail'] = $_POST["mail"];
    } else {
        $alEnterd = false;
    }
    if (! empty($_POST["password"]) && !empty($_POST["passwordv"]) && 
        $_POST["password"] == $_POST["passwordv"] ) {
            $password = $_POST["password"];
    } else {
        echo "<p style='color:var(--active-text-color); padding:10px;'>password != retyped password<br>";
        echo "Registration not done!</p>";
        $alEnterd = false;
    }
    
    if ($alEnterd == true) {
       if (registerUser($_SESSION['firstName'], 
                        $_SESSION['lastName'], 
                        $_SESSION['mail'], 
                        $password, 
                        $_SESSION['position'], 
                        $_SESSION['school']) === TRUE) {
            
            $firstName = $_SESSION['firstName'];
            $lastName = $_SESSION['lastName'];
            $birthdate = $_SESSION['birthdate'];
            $position = $_SESSION['position'];
            $school = $_SESSION['school'];
            $mail = $_SESSION['mail'];
            print_r("<script>localStorage.setItem('loggedIn', 'true');
                             localStorage.setItem('firstName', '$firstName');
                             localStorage.setItem('lastName', '$lastName');
                             localStorage.setItem('birthdate', '$birthdate');
                             localStorage.setItem('position', '$position');
                             localStorage.setItem('school', '$school');
                             localStorage.setItem('mail', '$mail');
                     </script>");
            echo "Registration done!";
            echo "<script>window.close();</script>";
        } else {
            echo "<p style='color:var(--active-text-color); padding:10px;'>mail already taken!<br>";
            echo "Registration not done!</p>";
        }
    }
}
?>
        