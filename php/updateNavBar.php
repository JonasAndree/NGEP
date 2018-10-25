<?php
session_start();

$_SESSION['count'] += 1;

class Page {
    public $parent = "null";
    public $heading = "root";
    public $id = 0;
    public $children = array();
}

$rootPage = $_SESSION['rootPage'];

$newId = (int) $_REQUEST["id"];
$newParentId = (int) $_REQUEST["parent"];
$newHeading = $_REQUEST["heading"];


print_r("<p style='color: red;'> newId " . $newId . "</p>");
print_r("<p style='color: green;'> newParentId " . $newParentId . "</p>");
print_r("<p style='color: blue;'> newHeading " . $newHeading . "</p>");



uppdateView();

function uppdateView() {
    $parentPage = getPage($GLOBALS['rootPage'], 0, $GLOBALS['newId'], $GLOBALS['newParentId'], $GLOBALS['newHeading']);
    print_r("<p style='color: orange;'> parentPage ");
    print_r($parentPage);
    print_r("</p>");
    print_r("<p style='color: red;'> count ");
    print_r($_SESSION['count']);
    print_r("</p>");
    print_r("<p style='color: red;'> level ");
    print_r($parentPage[1]);
    print_r("</p>");
    
    
    
    populatePage($parentPage[0], $parentPage[1]);
}


function getPage($tempRootPage, $tempLevel, $id, $parentId, $parentHeading)
{
    if ($tempRootPage->id == $id && $tempRootPage->parent == $parentId) {
        return array(
            $tempRootPage,
            $tempLevel
        );
    } else {
        foreach ($tempRootPage->children as $child) {
            return getPage($child, $tempLevel++, $id, $parentId, $parentHeading);
        }
    }
}

function populatePage($parentPage, $level)
{
    $parentId = $parentPage->id;
    
    if ($level == 0) {
        echo "<section id='sub-nav-container-main' class='sub-nav-container'>";
    } else {
        echo "<section id='sub-nav-container-$level-$parentId' class='sub-nav-container'>";
    }
    
    echo "<div id='sub-nav-content-$level-$parentId' class='sub-nav-content'
                   style='left: calc(" . ($level * 10) . "vw  + " . (10 * $level) . "px )'>";
    
    if ($level == 0) {
        echo "<div id='page-logo' class='nav-item'><h1>IT Tools</h1></div>";
    } 
    if ($parentPage->heading != "root")
        echo "<li class='nav-item nav-paranet'>  $parentPage->heading  </li>";
    
    echo "<ul>";
    foreach ($parentPage->children as $child) {
        $nextLevel = $level + 1;
        $childHeading = $child->heading;
        $parentId = $child->id;
        $numberOfChildren = count($child->children);
        echo "<li id='nav-item-$parentId' class='nav-item one-line-nav-item'
                                onmouseover='navElementMouseOver(this, \"sub-nav-conainer-$nextLevel-$parentId\", \"sub-nav-content-$nextLevel-$parentId \", \"$nextLevel\")'
                                heading='$child->heading'
                                parentId='$child->parent'
                                childId='$child->id'
                                nrChildren='$numberOfChildren'
                                onclick='navElementClicked(this)'>";
        if ($numberOfChildren != 0) {
            echo "<div>";
            echo "<div class='nav-button-parent'>
                                $child->heading $child->parent</div>";
            echo "<span class='arrow'><span></span></span>";
            echo "</div>";
        } else {
            echo "<div class='nav-button-parent-not'>
                                    $child->heading $child->parent
                                </div>";
        }
        echo "</li>";
        if ($numberOfChildren > 0)
            populatePage($child, $nextLevel);
    }
    echo "</ul>";
    echo "</div>";
    echo "</section>";
}



?>