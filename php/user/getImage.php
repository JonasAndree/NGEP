<?php
include_once dirname(__FILE__, 2) . "\sql.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $mail = $_REQUEST["mail"];
} else {
    $mail = $_POST["mail"];
}

$users = getUserImage($mail);
$result = $users->fetch_assoc();

if (! empty($result['image'])) {
    echo "<img class='user-img nav-item' src='data:image/jpeg;base64," . base64_encode($result['image']) . "'/>";
} else {
    echo "<img class='user-img nav-item' src='images/user1.png'/>";
}
?>
