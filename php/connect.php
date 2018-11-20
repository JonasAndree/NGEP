<?php 
$GLOBALS['conn'] = new mysqli("localhost", "root", "", "it_tools");

if ($GLOBALS['conn']->connect_error) {
    die("<div class='failed'>Connection failed: " . $GLOBALS['conn']->connect_error . "</div><br>");
}

?>