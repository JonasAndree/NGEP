<?php 
$_SESSION['conn'] = new mysqli("localhost", "root", "", "it_tools");

// Used to 
include "createChat.php";
$position;
$mail;
if (!isset($position)) {
    $course = $_REQUEST['course'];
    $position = $_REQUEST['position'];
    $mail = strtolower($_REQUEST['mail']);
}

if ($position == "Student") {
    
    $sql1 = "SELECT users.mail, users.firstname, users.lastname, specificcourse.course FROM 
            	(students LEFT JOIN 
                 	(specificcourse LEFT JOIN users
                     	ON specificcourse.teacher=users.mail) 
                 ON specificcourse.id=students.course )
            WHERE user='$mail'";
    
    $result = $_SESSION['conn']->query($sql1);
    
    while ($res = $result->fetch_assoc()) {
        findParent(false, $res['firstname'], $res['lastname'], $res['course'], $res['mail'], $position, $mail);
    } 
    
} else if ($position == "Teacher") {
    
    $sqlCourses = "SELECT `course` FROM `specificcourse` WHERE `teacher`='$mail'";
    $result = $_SESSION['conn']->query($sqlCourses);
    
    while ($res = $result->fetch_assoc()) {
        findParent(true, '', '', $res['course'], '',$position , $mail);
    }
}
findParent(false, 'Admin', '', 'Admin', 'Admin', '', $mail);


?>