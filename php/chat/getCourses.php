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
    /*$school = "NextGen Education";
    
    $getSchool = "SELECT school FROM users WHERE
    active = 1 AND mail='$mail';";
    $result = $_SESSION['conn']->query($getSchool);
    $result = $result->fetch_assoc();
    $school = $result['school'];*/
    
    $sql1 = "CREATE TABLE USERS_TEMPTABLE2 AS
    SELECT users.firstname, users.lastname, users.mail FROM users WHERE 
        users.active = 1 AND users.position = 'Teacher';";
    /*
    $sql2 = "CREATE TABLE COURSES_TEMPTABLE AS
    SELECT specificcourse.course, specificcourse.teacher FROM specificcourse WHERE 
    specificcourse.school = '$school';";*/
    
    $CREATE = "CREATE TABLE SELECTED_COURSES_TEMPTABLE2 (
         course varchar(256), teacher varchar(256), `id` varchar(256))";
    $_SESSION['conn']->query($CREATE);

    $SELECT_course = "SELECT course FROM students WHERE user='$mail' ";
    
    $courseIds = $_SESSION['conn']->query($SELECT_course);
    while ($id = $courseIds->fetch_assoc()) {
        $id = $id['course'];
        $sqlInsert = "INSERT INTO SELECTED_COURSES_TEMPTABLE2 (course, teacher, id)
            SELECT `course`, teacher, `id` FROM `specificcourse` WHERE id='$id'
        ";
        $_SESSION['conn']->query($sqlInsert);
    }    
    
    //$sql2 = "SELECT * FROM SELECTED_COURSES_TEMPTABLE;";

    //$drop = "DROP TABLE SELECTED_COURSES_TEMPTABLE;";
    //$conn->query($drop);
    //$result = $conn->query($sql2);
    
    
    
    $sql3 = "SELECT USERS_TEMPTABLE2.firstname, USERS_TEMPTABLE2.lastname, 
           USERS_TEMPTABLE2.mail, SELECTED_COURSES_TEMPTABLE2.course FROM 
           USERS_TEMPTABLE2 JOIN COURSES_TEMPTABLE2 ON USERS_TEMPTABLE2.mail = SELECTED_COURSES_TEMPTABLE2.teacher;";
    
    //$drop = "DROP TABLE USERS_TEMPTABLE2, SELECTED_COURSES_TEMPTABLE2;";

    $_SESSION['conn']->query($sql1);
    $result = $_SESSION['conn']->query($sql3);
    //$_SESSION['conn']->query($drop);
    
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