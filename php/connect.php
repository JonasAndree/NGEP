<?php 
$_SESSION['conn'] = new mysqli("localhost", "root", "", "it_tools");

if ($_SESSION['conn']->connect_error) {
    die("<div class='failed'>Connection failed: " . $_SESSION['conn']->connect_error . "</div><br>");
}

?>