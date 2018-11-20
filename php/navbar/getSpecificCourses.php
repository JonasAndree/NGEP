<?php 
include_once "../sql.php";

if ($position == "Teacher") {
    $result = getCoursesForTeacher($mail);
} else {
    $result = getCoursesForStudent($mail);
}
?>