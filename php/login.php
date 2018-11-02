
 <form class="reg-log-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"
	method="post">
	<!--<form class="reg-log-form" action="php/login.php" target="_blank"
	method="post"> -->
	<div class='nav-item nav-paranet'>Login</div><br>
	Mail: <br>
	<input class="form-input nav-item" type="email" name="mail" placeholder="Your email" required>
	<br> 
	Password: 
	<input class="nav-item form-input" type="password" name="password" placeholder="Your password" required><br> 
	<button id="submit" class="submit-form nav-item" type="submit">Login</button>
  	<button class="clear-form nav-item" type="reset">Clear</button>
</form>

<?php
session_start();
$_SESSION['conn'] = new mysqli("localhost", "root", "", "it_tools");
$_SESSION['mail'] = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alEnterd = true;
    if (!empty($_POST["mail"])) {
        $_SESSION['mail'] = test_input($_POST["mail"]);
    } else {
        $alEnterd = false;
        echo "Pleace select a mail! <br>";
    }
    if (! empty($_POST["password"])) {
        $password = test_input($_POST["password"]);
    } else {
        $alEnterd = false;
        echo "Pleace select a password! <br>";
    }
    
    if ($alEnterd == true) {
        $mail = $_SESSION['mail'];
        $sql = "SELECT * FROM `users` WHERE mail='$mail' AND password='$password'";
        $users = $_SESSION['conn']->query($sql);
        
        $user_array = $users->fetch_assoc();
        if (!empty($user_array)) {
            $firstName = $_SESSION['firstName'] = $user_array['firstname'];
            $lastName = $_SESSION['lastName'] = $user_array['lastname'];
            $birthdate = $_SESSION['birthdate'] = $user_array['birthdate'];
            $position = $_SESSION['position'] = $user_array['position'];
            $school = $_SESSION['school'] = $user_array['school'];
            print_r("<script>sessionStorage.setItem('loggedIn', 'true');
                             sessionStorage.setItem('firstName', '$firstName');
                             sessionStorage.setItem('lastName', '$lastName');
                             sessionStorage.setItem('birthdate', '$birthdate');
                             sessionStorage.setItem('position', '$position');
                             sessionStorage.setItem('school', '$school');</script>");
            echo "logged in";
        } 
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
        