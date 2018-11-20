<?php 
if ($position == "Teacher") {
    $sql ="SELECT `course`, `id` FROM `specificcourse` WHERE `teacher`= '$mail'";
    $result = $conn->query($sql);
    
} else {
    $sql1 = "SELECT specificcourse.course, specificcourse.id FROM
            	(students LEFT JOIN
                 	(specificcourse LEFT JOIN users
                     	ON specificcourse.teacher=users.mail)
                 ON specificcourse.id=students.course )
            WHERE user='$mail'";
    
    $result = $conn->query($sql1);
}
?>