<?php
include "../connect.php";
include "model/pageModel.php";

session_start();
$rootPage = new Page();

$firstName = $_REQUEST["firstName"];
$lastName = $_REQUEST['lastName'];
$mail = $_REQUEST['mail'];
$school = $_REQUEST['school'];
$position = $_REQUEST['position'];

include "getSpecificCourses.php";

while ($course = $result->fetch_assoc()) {
    getRootPages($rootPage, $course, $conn);
}

$_SESSION['rootPage'] = $rootPage;



function getRootPages($rootPage, $course, $conn)
{
    $parentId = $rootPage->id;
    $newPage = new Page();
    $newPage->parent = $parentId;
    $newPage->parentType = "root";
    $newPage->heading = $course["course"];
    $newPage->id = $course["id"];
    echo "<li id='$newPage->heading-$newPage->id-nav-item ' class='nav-item'>$newPage->heading</li>";
    
   // echo $course["course"];
    array_push($rootPage->children, $newPage);
    
    
    //getPages($newPage, $conn);
    
}

function getPages($parent, $conn)
{
    $parentId = $parent->id;
    if ($parent->parentType == "root")
        $children = $conn->query("SELECT * FROM `specificpage` WHERE parent='$parentId' AND childeType='course'");
    else
        $children = $conn->query("SELECT * FROM `specificpage` WHERE parent='$parentId' AND childeType='page'");
        
    while ($child = $children->fetch_assoc()) {
        $newPage = new Page();
        $newPage->parent = $parentId;
        $newPage->parentType = $child["childeType"];
        $newPage->heading = $child["heading"];
        $newPage->id = $child["id"];
        array_push($parent->children, $newPage);
        getPages($newPage, $conn);
         
    }
}













?>