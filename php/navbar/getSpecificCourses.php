<?php 

    $_SESSION['conn'] = new mysqli("localhost", "root", "", "it_tools");
    
    
    $sql ="SELECT `course` FROM `specificcourse` WHERE `teacher`= '$mail'";
    $result = $_SESSION['conn']->query($sql);
    $_SESSION['conn']->close();

?>