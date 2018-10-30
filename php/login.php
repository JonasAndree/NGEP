
<form class="reg-log-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"
	method="post">
	Mail: <br>
	<input class="form-input nav-item" type="email" name="mail" placeholder="Your email" required>
	<br> 
	Password: 
	<input class="nav-item form-input" type="password" name="password" placeholder="Your password" required><br> 
	<button id="submit" class="submit-form nav-item" type="submit">Login</button>
</form>

<?php
session_start();
$_SESSION['conn'] = new mysqli("localhost", "root", "", "it_tools");
$mail = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alEnterd = true;
    
    if (! empty($_POST["mail"])) {
        $mail = test_input($_POST["mail"]);
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
        
        $sql = "SELECT * FROM `users` WHERE mail='$mail' AND password='$password'";
        $users = $_SESSION['conn']->query($sql);
        
        $user_array = $users->fetch_assoc();
        if (! empty($user_array)) {
            echo "<br>The username and password is ok!<br>";
            echo "<script>document.getElementById('logedin-mail').innerHTML = ' " . $user_array["mail"] . "'</script>";
            echo "<script>document.getElementById('form-container').style.display = 'none';</script>";
            echo "<script>document.getElementById('log-out').style.display = 'inline-block';</script>";
        } else {
            echo "<br>Incorrect password or mail.";
        }
        $conn->close();
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
        