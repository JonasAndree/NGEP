

<?php 
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        $mail = $_REQUEST["mail"];
    } else {
        $mail = $_POST["mail"];
    }
    $_SESSION['conn'] = new mysqli("localhost", "root", "", "it_tools");
    
    $sql = "SELECT image FROM `users` WHERE mail='$mail'";
    $users = $_SESSION['conn']->query($sql);
    $result = $users->fetch_assoc();
    
    if (!empty($result['image'])) {
        echo "<img class='user-img nav-item' src='data:image/jpeg;base64," . base64_encode($result['image']) . "'/>";
    } else {
        echo "<img class='user-img nav-item' src='images/user1.png'/>";
    }
?>
