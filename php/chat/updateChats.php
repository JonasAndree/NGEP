<?php
include_once "../sql.php";
include "createChat.php";

$course = $_REQUEST['course'];
$mail = $_REQUEST['mail'];

$result = getUsers($mail, $course);

findParent(true, '', '', $course, '', 'Teacher back', $mail);
while ($res = $result->fetch_assoc()) {
    findParent(false, $res['firstname'], $res['lastname'], $course, $res['mail'], 'Teacher', $mail);
}

findParent(false, 'Admin', '', 'Admin', 'Admin', '',  $mail);

?>