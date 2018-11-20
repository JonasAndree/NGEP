<?php
session_start();
include_once "../sql.php";
include_once "model/pageModel.php";

$currentUser;
function getPages($parent)
{
    $parentId = $parent->id;
    $children = getPageChildren($parentId);
    
    while ($child = $children->fetch_assoc()) {
        $newPage = new Page();
        $newPage->parent = $parentId;
        $newPage->heading = $child["heading"];
        $newPage->id = $child["id"];
        array_push($parent->children, $newPage);
        getPages($newPage);
    }
}

$rootPage = new Page();
getPages($rootPage);
$_SESSION['rootPage'] = $rootPage;
include "updateNavBar.php";
?>





