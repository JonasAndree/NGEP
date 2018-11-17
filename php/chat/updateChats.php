<?php

include "createChat.php";

$course = $_REQUEST['course'];
$mail = $_REQUEST['mail'];

$_SESSION['conn'] = new mysqli("localhost", "root", "", "it_tools");

$sqlCourses = "SELECT `id`, `school` FROM `specificcourse` WHERE `teacher`='$mail' AND `course`='$course'";
$idAndSchool = $_SESSION['conn']->query($sqlCourses);
$idAndSchool = $idAndSchool->fetch_assoc();
$id = $idAndSchool['id'];
$school = $idAndSchool['school'];

$sqlStudents = "
CREATE TABLE STUDENTS_TEMPTABLE AS
SELECT `user`
FROM `students` WHERE `course`='$id'";
$_SESSION['conn']->query($sqlStudents);

$sqlCreateUserTable = "
CREATE TABLE USERS_TEMPTABLE AS
SELECT users.firstname, users.lastname, users.mail FROM users WHERE
users.active = 1 AND users.position = 'Student' AND users.school='$school';";
$_SESSION['conn']->query($sqlCreateUserTable);

$sqlStudentInfo = "
SELECT USERS_TEMPTABLE.firstname, USERS_TEMPTABLE.lastname, USERS_TEMPTABLE.mail
FROM
USERS_TEMPTABLE JOIN STUDENTS_TEMPTABLE ON USERS_TEMPTABLE.mail = STUDENTS_TEMPTABLE.user
ORDER BY USERS_TEMPTABLE.firstname;";
$result = $_SESSION['conn']->query($sqlStudentInfo);
    
$drop = "DROP TABLE USERS_TEMPTABLE, STUDENTS_TEMPTABLE;";
$_SESSION['conn']->query($drop);


findParent(true, '', '', $course, '', 'Teacher back', $mail);
while ($res = $result->fetch_assoc()) {
    findParent(false, $res['firstname'], $res['lastname'], $course, $res['mail'], 'Teacher', $mail);
}

findParent(false, 'Admin', '', 'Admin', 'Admin', '',  $mail);

?>