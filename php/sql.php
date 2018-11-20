<?php
include "connect.php";

/**
 * Get al registred schools
 *
 * @return "sql_table"
 */
function getSchools()
{
    return $GLOBALS['conn']->query("SELECT * FROM `schools`");
}

/**
 * Get the diferent user positions
 *
 * @return "sql_table"
 */
function getPositions()
{
    return $GLOBALS['conn']->query("SELECT * FROM `positions`");
}

/**
 * Get a users image
 *
 * @param String $mail
 * @return "sql_table"
 */
function getUserImage($mail)
{
    return $GLOBALS['conn']->query("SELECT image FROM `users` WHERE mail='$mail'");
}

/**
 * Registers a user
 *
 * @param String $firstName
 * @param String $lastName
 * @param String $mail
 * @param String $password
 * @param String $position
 * @param String $school
 * @return TRUE || FALSE
 */
function registerUser($firstName, $lastName, $mail, $password, $position, $school)
{
    return $GLOBALS['conn']->query("INSERT INTO `users`(`firstname`, `lastname`, `mail`, `password`, `position`, `school`) VALUES
              ('$firstName', '$lastName', '$mail', '$password','$position','$school')");
}

/**
 * Loggin
 *
 * @param String $mail
 * @param String $password
 * @return "user_array"
 */
function login($mail, $password)
{
    return $GLOBALS['conn']->query("SELECT * 
                                    FROM `users` 
                                    WHERE mail='$mail' AND password='$password'");
}

/**
 * Update user image
 *
 * @param "BLOB" $image
 *            // String is only to remove error it is a blob
 * @param String $mail
 * @return TRUE || FALSE
 */
function updateUserImage($image, $mail)
{
    return $GLOBALS['conn']->query("UPDATE `users`
                                    SET image = '$image' 
                                    WHERE mail = '$mail'");
}

/**
 * Get under pages to page
 *
 * @param int $parentId
 */
function getPageChildren($parentId)
{
    return $GLOBALS['conn']->query("SELECT * FROM `pages` WHERE parent='$parentId'");
}

function getCoursesForTeacher($mail)
{
    return $GLOBALS['conn']->query("SELECT `course`, `id` FROM `specificcourse` WHERE `teacher`= '$mail'");
}

function getCoursesForStudent($mail)
{
    $sql1 = "SELECT users.mail, users.firstname, users.lastname, specificcourse.course, specificcourse.id FROM
            	(students LEFT JOIN
                 	(specificcourse LEFT JOIN users
                     	ON specificcourse.teacher=users.mail)
                 ON specificcourse.id=students.course )
            WHERE user='$mail'";
    return $GLOBALS['conn']->query($sql1);
}

function getUserPageChilde($parentType, $parentId)
{
    if ($parentType == "root")
        return $GLOBALS['conn']->query("SELECT * FROM `specificpage` WHERE parent='$parentId' AND childeType='course'");
    else
        return $GLOBALS['conn']->query("SELECT * FROM `specificpage` WHERE parent='$parentId' AND childeType='page'");
}

function updateChat($mail, $course)
{
    $sqlCourses = "SELECT `id`, `school` FROM `specificcourse` WHERE `teacher`='$mail' AND `course`='$course'";
    $idAndSchool = $GLOBALS['conn']->query($sqlCourses);
    
    $idAndSchool = $idAndSchool->fetch_assoc();
    $id = $idAndSchool['id'];
    $school = $idAndSchool['school'];
    
    $sqlStudents = "
        CREATE TABLE STUDENTS_TEMPTABLE AS
        SELECT `user`
        FROM `students` WHERE `course`='$id'";
    $GLOBALS['conn']->query($sqlStudents);
    
    $sqlCreateUserTable = "
        CREATE TABLE USERS_TEMPTABLE AS
        SELECT users.firstname, users.lastname, users.mail FROM users WHERE
        users.active = 1 AND users.position = 'Student' AND users.school='$school';";
    $GLOBALS['conn']->query($sqlCreateUserTable);
    
    $sqlStudentInfo = "
        SELECT USERS_TEMPTABLE.firstname, USERS_TEMPTABLE.lastname, USERS_TEMPTABLE.mail
        FROM
        USERS_TEMPTABLE JOIN STUDENTS_TEMPTABLE ON USERS_TEMPTABLE.mail = STUDENTS_TEMPTABLE.user
        ORDER BY USERS_TEMPTABLE.firstname;";
    $result = $GLOBALS['conn']->query($sqlStudentInfo);
    
    $drop = "DROP TABLE USERS_TEMPTABLE, STUDENTS_TEMPTABLE;";
    $GLOBALS['conn']->query($drop);
    
    return $result;
}

function getUserInfo($mail, $resip_course)
{
    $sqlCourses = "SELECT `id`, `school` FROM `specificcourse`
               WHERE
              `teacher`='$mail' AND `course`='$resip_course'";
    $idAndSchool = $GLOBALS['conn']->query($sqlCourses);
    $idAndSchool = $idAndSchool->fetch_assoc();
    $id = $idAndSchool['id'];
    $school = $idAndSchool['school'];
    
    $sqlStudents = "
        CREATE TABLE STUDENTS_TEMPTABLE AS
        SELECT `user`
        FROM `students` WHERE `course`='$id'";
    $GLOBALS['conn']->query($sqlStudents);
    
    $sqlCreateUserTable = "
        CREATE TABLE USERS_TEMPTABLE AS
        SELECT users.firstname, users.lastname, users.mail FROM users
        WHERE
        users.active = 1 AND users.position = 'Student'
        AND users.school='$school';";
    $GLOBALS['conn']->query($sqlCreateUserTable);
    
    $sqlStudentInfo = "
        SELECT USERS_TEMPTABLE.firstname, USERS_TEMPTABLE.lastname, USERS_TEMPTABLE.mail
        FROM
        USERS_TEMPTABLE JOIN STUDENTS_TEMPTABLE ON USERS_TEMPTABLE.mail = STUDENTS_TEMPTABLE.user
        ORDER BY USERS_TEMPTABLE.firstname; ";
    $result = $GLOBALS['conn']->query($sqlStudentInfo);
    
    $drop = "DROP TABLE USERS_TEMPTABLE, STUDENTS_TEMPTABLE;";
    $GLOBALS['conn']->query($drop);
    
    return $result;
}


function getChatDialogInfo($mail, $resip_mail, $resip_course) {
    $sql = "SELECT * FROM `messages` WHERE touser='$mail' AND fromuser='$resip_mail' AND course='$resip_course'
            UNION
            SELECT * FROM `messages` WHERE touser='$resip_mail' AND fromuser='$mail' AND course='$resip_course'
            ORDER BY sent DESC LIMIT 3";
    return $GLOBALS['conn']->query($sql);
}
function getChatDialog($mail, $resip_mail, $resip_course) {
    $sql = "SELECT * FROM `messages` WHERE touser='$mail' AND fromuser='$resip_mail' AND course='$resip_course'
            UNION
            SELECT * FROM `messages` WHERE touser='$resip_mail' AND fromuser='$mail' AND course='$resip_course'
            ORDER BY sent";
    return $GLOBALS['conn']->query($sql);
}


?>