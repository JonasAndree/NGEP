
<form class="reg-log-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
	
	<div class='nav-item nav-paranet tooltip' onclick='showLogin()'>
		Register		
			<span class='tooltiptext'>Go back to loggin.</span>
		
			<div class='animate-arrow'>
			<span class='arrow back'><span></span></span>
		</div>
	</div>
	
	Firstname: 
	<input class="form-input nav-item" type="text" name="firstname" required>
	<br> 
	Lastname:
	<input class="form-input nav-item" type="text" name="lastname" required>
	<br> 
	Mail: 
	<input class="form-input nav-item" type="email" name="mail" required>
	<br> 
	Password: 
	<input class="form-input nav-item" type="password" name="password" required>
	<br> 
	Verify password: 
	<input class="form-input nav-item" type="password" name="passwordv" required>
	<br> 
	Position
	<select class="form-input nav-item" name="position" required>
        <option value="Student" selected>Student</option>
        <option value="Teacher">Teacher</option>
    </select>
	<br> 
	School
	<select class="form-input nav-item" name="school" required>
        <option value="none" selected>No school</option>
        <option value="ntisundbyberg">NTI Gymnasiet Sundbyberg</option>
    </select>
    <br> 
	<br>
	<button class="submit-form nav-item" type="submit">Register</button>
  	<button class="clear-form nav-item" type="reset">Clear</button>

</form>
<?php
error_reporting(0);
$password = $passwordv = 
$_SESSION['firstName'] = $_SESSION['lastName'] = $_SESSION['mail'] = 
$_SESSION['birthdate'] = $_SESSION['position'] = $_SESSION['school'] = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alEnterd = true;
    $_SESSION['firstName'] = test_input($_POST["firstname"]);
    $_SESSION['lastName'] = test_input($_POST["lastname"]);
    $_SESSION['mail'] = test_input($_POST["mail"]);
    $_SESSION['birthdate'] = test_input($_POST["birthdate"]);
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
    if (! empty($_POST["mail"])) {
        $_SESSION['mail'] = $_POST["mail"];
    } else {
        $alEnterd = false;
    }
    if (! empty($_POST["password"]) && !empty($_POST["passwordv"]) && 
        $_POST["password"] == $_POST["passwordv"] ) {
        $password = $_POST["password"];
    } else {
        $alEnterd = false;
    }
    
    
    if ($alEnterd == true) {
        $sql = "INSERT INTO `users`(`firstname`, `lastname`, `mail`, `password`, `position`, `school`) VALUES 
              ('" . $_SESSION['firstName'] . "', '" . $_SESSION['lastName'] . "','" . $_SESSION['mail'] . "','" . 
              $password . "','" . $_SESSION['position'] . "','" . $_SESSION['school'] . "')";
        if ($_SESSION['conn']->query($sql) === TRUE) {
            //print_r("<script>sessionStorage.setItem('loggedIn', 'true');</script>");
        } 
    }
}

?>
        