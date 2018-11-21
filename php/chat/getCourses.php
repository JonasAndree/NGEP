<?php
include_once "../sql.php";
include "createChat.php";
$position;
$mail;
if (!isset($position)) {
    $course = $_REQUEST['course'];
    $position = $_REQUEST['position'];
    $mail = strtolower($_REQUEST['mail']);
}

if ($position == "Student") {
    $result = getCoursesForStudent($mail);
    while ($res = $result->fetch_assoc()) {
        findParent(false, $res['firstname'], $res['lastname'], $res['course'], $res['mail'], $position, $mail);
    } 
    
} else if ($position == "Teacher") {
    $result = getCoursesForTeacher($mail);
    while ($res = $result->fetch_assoc()) {
        findParent(true, '', '', $res['course'], '', $position , $mail);
    }
}
findParent(false, 'Admin', '', 'Admin', 'Admin', '', $mail);


?>