<?php 
if ($position == "Teacher") {
    $sql ="SELECT `course`, `id` FROM `specificcourse` WHERE `teacher`= '$mail'";
    $result = $conn->query($sql);
    
} else {
    $sql1 = "CREATE TABLE SELECTED_COURSES_TEMPTABLE (
         course varchar(256), `id` varchar(256))";
    $conn->query($sql1);

    $sql2 = "SELECT course FROM students WHERE user='$mail' ";
    
    $courseIds = $conn->query($sql2);
    while ($id = $courseIds->fetch_assoc()) {
        $id = $id['course'];
        $sqlInsert = "INSERT INTO SELECTED_COURSES_TEMPTABLE (course, id)
            SELECT `course`, `id` FROM `specificcourse` WHERE id='$id'
        ";
        $conn->query($sqlInsert);
    }    
    
    
    $sql2 = "SELECT * FROM SELECTED_COURSES_TEMPTABLE";
    $result = $conn->query($sql2);
    
    $drop = "DROP TABLE SELECTED_COURSES_TEMPTABLE;";
    $conn->query($drop);
}
?>