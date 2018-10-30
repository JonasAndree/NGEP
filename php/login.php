<html>
    <head>
   		<link rel="stylesheet" type="text/css" href="./css/main.css"/>
	</head>
	<body>
		<div id="login-status">
		
    		<div id="form-container sub-nav-content">
        		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        			Mail:
        			<input class="form-input nav-item" type="email" name="mail" placeholder="Your email" required><br>
        			Password:
        			<input class="nav-item form-input" type="password" name="password" placeholder="Your password" required><br>
        			<input id="submit" class="submit-form nav-item" type="submit">
        		</form>
        		<div id="login-regiser" class="nav-item" onclick="showRegister()">Register</div>
        		
    		</div>
    		<div id="register-container">
    			<p>Register</p>
    		</div>
    	
    		<div id="log-out">
    			Mail:<b id="logedin-mail"></b>
    			<button onclick="logout()">Log out</button>
			</div>
		</div>
		
        <?php 
            session_start();
            $_SESSION['conn'] = new mysqli("localhost", "root", "", "it_tools");
            $mail = $password = "";
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $alEnterd = true;
                
                if (!empty($_POST["mail"])) {
                    $mail = test_input( $_POST["mail"] );
                } else {
                    $alEnterd = false;
                    echo "Pleace select a mail! <br>";
                }
                if (!empty($_POST["password"])) {
                    $password = test_input($_POST["password"]);
                } else {
                    $alEnterd = false;
                    echo "Pleace select a password! <br>";
                }
                
                
                
                if ($alEnterd == true) {
                    
                    $sql = "SELECT * FROM `users` WHERE mail='$mail' AND password='$password'";
                    $users = $_SESSION['conn']->query($sql);
                    
                    $user_array = $users->fetch_assoc();
                    if (!empty($user_array)) {
                        echo "<br>The username and password is ok!<br>";
                        echo "<script>document.getElementById('logedin-mail').innerHTML = ' ". $user_array["mail"]."'</script>";
                        echo "<script>document.getElementById('form-container').style.display = 'none';</script>";
                        echo "<script>document.getElementById('log-out').style.display = 'inline-block';</script>";
                    } else {
                        echo "<br>Incorrect password or mail.";
                    }                    
                    $conn->close();
                }
            }
            
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>
        
	</body>
</html>
        