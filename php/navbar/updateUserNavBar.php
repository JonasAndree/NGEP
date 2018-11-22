<?php
session_start();
include_once "../sql.php";
include_once "model/pageModel.php";

$rootPage = new Page();

$firstName = $_REQUEST["firstName"];
$lastName = $_REQUEST['lastName'];
$mail = $_REQUEST['mail'];
$school = $_REQUEST['school'];
$position = $_REQUEST['position'];

include "getSpecificCourses.php";

while ($course = $result->fetch_assoc()) {
    getRootPages($rootPage, $course);
}
if ($position == "Teacher") {
    $newPage = new Page();
    $newPage->parent = 0;
    $newPage->parentType = "root";
    $newPage->heading = "+ Create new course";
    $newPage->id = "none";
    array_push($rootPage->children, $newPage);
}

$_SESSION['rootPage'] = $rootPage;





function getRootPages($rootPage, $course)
{
    $parentId = $rootPage->id;
    $newPage = new Page();
    $newPage->parent = $parentId;
    $newPage->parentType = "root";
    $newPage->heading = $course["course"];
    $newPage->id = $course["id"];
    array_push($rootPage->children, $newPage);
    getPages($newPage);
}

function getPages($parent)
{
    $parentId = $parent->id;
    $children = getUserPageChilde($parent->parentType, $parentId);
    while ($child = $children->fetch_assoc()) {
        $newPage = new Page();
        $newPage->parent = $parentId;
        $newPage->parentType = $child["childeType"];
        $newPage->heading = $child["heading"];
        $newPage->id = $child["id"];
        array_push($parent->children, $newPage);
        getPages($newPage);
    }
    ;
    if ($GLOBALS["position"] == "Teacher") {
        $newPage = new Page();
        $newPage->parent = 0;
        $newPage->parentType = "root";
        $newPage->heading = "+ Create new page";
        $newPage->id = "none";
        array_push($parent->children, $newPage);
    }
}













?>