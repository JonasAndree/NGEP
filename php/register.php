
<form class="reg-log-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
	<div class='nav-item nav-paranet'>Register</div><br>
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
	Birthdate: 
	<input class="form-input nav-item" type="date" name="birthdate">
	<br> 
	<button class="submit-form nav-item" type="submit">Register</button>
</form>
<?php
$firstName = $lastName = $mail = $password = $birthdate = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alEnterd = true;
    
    $firstName = test_input($_POST["firstname"]);
    $lastName = test_input($_POST["lastname"]);
    $mail = test_input($_POST["mail"]);
    $password = test_input($_POST["password"]);
    
    $birthdate = $_POST["birthdate"];
    
    if (! empty($_POST["firstname"])) {
        $firstName = $_POST["firstname"];
    } else {
        $alEnterd = false;
        echo "Pleace select a firstname! <br>";
    }
    if (! empty($_POST["lastname"])) {
        $lastName = $_POST["lastname"];
    } else {
        $alEnterd = false;
        echo "Pleace select a lastname! <br>";
    }
    if (! empty($_POST["mail"])) {
        $mail = $_POST["mail"];
    } else {
        $alEnterd = false;
        echo "Pleace select a mail! <br>";
    }
    if (! empty($_POST["password"])) {
        $password = $_POST["password"];
    } else {
        $alEnterd = false;
        echo "Pleace select a password! <br>";
    }
    
    if ($alEnterd == true) {
        $serverName = "localhost";
        $userName = "Jonas";
        $serverPassword = "r32bsW6XvAMhEVrA";
        $dbName = "tek15";
        
        // Create connection
        $conn = new mysqli($serverName, $userName, $serverPassword, $dbName);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            echo "Connection successful";
        }
        // Quary
        $sql = "INSERT INTO `users`(`firstname`, `lastname`, `mail`, `password`, `birthdate`) VALUES 
                                               ('" . $firstName . "', '" . $lastName . "','" . $mail . "','" . $password . "','" . $birthdate . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    }
}

?>
        