<?php
include_once "../sql.php";

$result = getUsers($mail, $resip_course);

echo "<ul>";
    while ($res = $result->fetch_assoc()) {
        echo "<li class='nav-item'>".$res['firstname']. " ". $res['lastname']."</li>";
    }
echo "</ul>";

?>