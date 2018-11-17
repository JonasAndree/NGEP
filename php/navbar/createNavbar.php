<?php
session_start();
$currentUser;

$_SESSION['conn'] = new mysqli("localhost", "root", "", "it_tools");

if ($_SESSION['conn'] ->connect_error) {
    die("<div class='failed'>Connection failed: " . $_SESSION['conn']->connect_error . "</div><br>");
}

class Page {
    public $parent = "null";
    public $heading = "root";
    public $id = 0;
    public $children = array();
}

function getPages($parent) {
    $parentId = $parent->id;
    $children = $_SESSION['conn']->query("SELECT * FROM `pages` WHERE parent='$parentId'");
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

?>