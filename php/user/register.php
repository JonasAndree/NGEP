

<?php
$password = $passwordv = 
$_SESSION['firstName'] = $_SESSION['lastName'] = $_SESSION['mail'] = 
$_SESSION['birthdate'] = $_SESSION['position'] = $_SESSION['school'] = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alEnterd = true;
    $_SESSION['firstName'] = test_input2($_POST["firstname"]);
    $_SESSION['lastName'] = test_input2($_POST["lastname"]);
    $_SESSION['mail'] = test_input2($_POST["mail"]);
    $_SESSION['position'] = test_input2($_POST["position"]);
    $_SESSION['school'] = test_input2($_POST["school"]);
    
    
    $password = test_input2($_POST["password"]);
    $passwordv = test_input2($_POST["passwordv"]);
    
    echo "<script> document.getElementById('reg-con').innerHTML = ''; </script>";
    
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
        $sql = "INSERT INTO `users`(`firstname`, `lastname`, `mail`, `password`, `position`, `school`) VALUES 
              ('" . $_SESSION['firstName'] . "', '" . $_SESSION['lastName'] . "','" . $_SESSION['mail'] . "','" . 
              $password . "','" . $_SESSION['position'] . "','" . $_SESSION['school'] . "')";
        
        if ($_SESSION['conn']->query($sql) === TRUE) {
            
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

function test_input2($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
        