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

$editmode = $_REQUEST['editmode'];


include "getSpecificCourses.php";

$newPageId = 500000000;
while ($course = $result->fetch_assoc()) {
    getRootPages($rootPage, $course, $newPageId);
}
if ($position == "Teacher" && $GLOBALS["editmode"] == "true") {
    $newPage = new Page();
    $newPage->parent = $rootPage;
    $newPage->parentType = "root";
    $newPage->heading = "Create new course";
    $newPage->id = "" + $newPageId;
    array_push($rootPage->children, $newPage);
}

function getRootPages($rootPage, $course, $newPageId)
{
    $parentId = $rootPage->id;
    $newPage = new Page();
    $newPage->parent = $rootPage;
    $newPage->parentType = "root";
    $newPage->heading = $course["course"];
    $newPage->id = $course["id"];
    array_push($rootPage->children, $newPage);
    getPages($newPage, $newPageId);
}

function getPages($parent, $newPageId)
{
    $parentId = $parent->id;
    $children = getUserPageChilde($parent->parentType, $parentId);
    while ($child = $children->fetch_assoc()) {
        $newPage = new Page();
        $newPage->parent = $parent;
        $newPage->parentType = $child["childeType"];
        $newPage->heading = $child["heading"];
        $newPage->id = $child["id"];
        array_push($parent->children, $newPage);
        getPages($newPage, $newPageId--);
    }
    
    if ($GLOBALS["position"] == "Teacher" && $GLOBALS["editmode"] == "true") {
        $newPageId--;
        $newPage = new Page();
        $newPage->parent = $parent;
        $newPage->parentType = "root";
        $newPage->heading = "Create new page";
        $newPage->id = "" + $newPageId;
        array_push($parent->children, $newPage);
    }
}
$_SESSION['rootPage'] = $rootPage;
$_SESSION['activeUserPage'] = $rootPage;

?>