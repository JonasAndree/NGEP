<?php 
$conn = new mysqli("localhost", "root", "", "it_tools");

if ($conn->connect_error) {
    die("<div class='failed'>Connection failed: " . $conn->connect_error . "</div><br>");
}

?>