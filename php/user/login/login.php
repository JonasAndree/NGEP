<?php
session_start();
$_SESSION['conn'] = new mysqli("localhost", "root", "", "it_tools");
$_SESSION['mail'] = $password = "";

/*echo "<script>
    document.getElementById('log-con').innerHTML = '';
</script>";*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alEnterd = true;
    if (!empty($_POST["mail"])) {
        $_SESSION['mail'] = test_input(strtolower($_POST["mail"]));
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
        $mail = strtolower($_SESSION['mail']);
        $sql = "SELECT * FROM `users` WHERE mail='$mail' AND password='$password'";
        $users = $_SESSION['conn']->query($sql);
        
        $user_array = $users->fetch_assoc();
        if (!empty($user_array)) {
            $firstName= ucfirst(strtolower($user_array['firstname']));
            $lastName= ucfirst(strtolower($user_array['lastname']));
            $position= ucfirst(strtolower($user_array['position']));
            ucfirst(strtolower($school = $user_array['school']));
            $image = $user_array['image'];
            
            include "../getUser.php";
        } else {
            echo "incorect";
            /*echo "<p style='color:var(--active-text-color); padding:10px; calc(100%-16px); height:calc(100%-16px);'>Login faild!<br>";
            echo "Mail or password was incorect!</p>";*/
        }
        $_SESSION['conn']->close();
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
        