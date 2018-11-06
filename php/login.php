<head>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>	
</head>
<div id="log-con">
    <form class="reg-log-form" 
          target="print_popup" 
          onsubmit="window.open('about:blank','print_popup','width=200px, height=200');"
          action="<?php echo htmlspecialchars('php/login.php');?>"
    	  method="post">
    	<button class='nav-item nav-paranet' type="submit">Login</button><br>
    	Mail: <br>
    	<input class="form-input nav-item" type="email" name="mail" placeholder="Your email" required>
    	<br> 
    	Password: 
    	<input class="nav-item form-input" type="password" name="password" placeholder="Your password" required><br> 
    	<button id="submit" class="submit-form nav-item" type="submit">Login</button>
      	<button class="clear-form nav-item" type="reset">Clear</button>
    </form>
</div>
<?php
session_start();
$_SESSION['conn'] = new mysqli("localhost", "root", "", "it_tools");
$_SESSION['mail'] = $password = "";

echo "<script>
    document.getElementById('log-con').innerHTML = '';
</script>";

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
            print_r("<script>localStorage.setItem('loggedIn', 'true');
                             localStorage.setItem('firstName', '$firstName');
                             localStorage.setItem('lastName', '$lastName');
                             localStorage.setItem('birthdate', '$birthdate');
                             localStorage.setItem('position', '$position');
                             localStorage.setItem('school', '$school');
                             localStorage.setItem('mail', '$mail');
                     </script>");
            echo "logged in";
            echo "<script>window.close();</script>";
        } else {
            echo "<p style='color:var(--active-text-color); padding:10px; calc(100%-16px); height:calc(100%-16px);'>Login faild!<br>";
            echo "Mail or password was incorect!</p>";
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
        