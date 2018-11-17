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
    $school = "NextGen Education";
    $getSchool = "SELECT school FROM users WHERE
    active = 1 AND mail='$mail';";
    $result = $_SESSION['conn']->query($getSchool);
    $result = $result->fetch_assoc();
    $school = $result['school'];
    
    $sql1 = "CREATE TABLE USERS_TEMPTABLE AS
    SELECT users.firstname, users.lastname, users.mail FROM users WHERE 
        users.active = 1 AND users.position = 'Teacher';";
    
    $sql2 = "CREATE TABLE COURSES_TEMPTABLE AS
    SELECT specificcourse.course, specificcourse.teacher FROM specificcourse WHERE 
    specificcourse.school = '$school';";
    
    $sql3 = "SELECT USERS_TEMPTABLE.firstname, USERS_TEMPTABLE.lastname, 
           USERS_TEMPTABLE.mail, COURSES_TEMPTABLE.course FROM 
           USERS_TEMPTABLE JOIN COURSES_TEMPTABLE ON USERS_TEMPTABLE.mail = COURSES_TEMPTABLE.teacher;";
    
    $drop = "DROP TABLE USERS_TEMPTABLE, COURSES_TEMPTABLE;";

    $_SESSION['conn']->query($sql1);
    $_SESSION['conn']->query($sql2);
    $result = $_SESSION['conn']->query($sql3);
    $_SESSION['conn']->query($drop);
    
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