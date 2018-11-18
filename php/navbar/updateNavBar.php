<?php
session_start();

class Page
{
    public $parent = "null";
    public $heading = "root";
    public $id = 0;
    public $children = array();
    public function __toString() {
        return "My parent is: {$this->parent}<br> " . "My heading is: {$this->heading}<br>" . "My id is: {$this->id}<br><br> ";
    }
}

$rootPage = $_SESSION['rootPage'];

$newId = (int) $_REQUEST["id"];
$newParentId = (int) $_REQUEST["parent"];
$newHeading = $_REQUEST["heading"];

uppdateView();

$foundRootPage;
$foundLevel;
$itr = 0;

function uppdateView()
{
    $GLOBALS['itr'] = 0;
    getPage($GLOBALS['rootPage'], 0, $GLOBALS['newId'], $GLOBALS['newParentId'], $GLOBALS['newHeading']);
    populatePage($GLOBALS['foundRootPage'], $GLOBALS['foundLevel']);
}

function getPage($tempRootPage, $tempLevel, $id, $parentId, $parentHeading)
{
    $GLOBALS['itr'] ++;
    
    if ($tempRootPage->id == $id) {
        $GLOBALS['foundRootPage'] = $tempRootPage;
        $GLOBALS['foundLevel'] = $tempLevel;
        return true;
    } else {
        if ($tempRootPage->children != null) {
            foreach ($tempRootPage->children as $child) {
                if (getPage($child, ($tempLevel + 1), $id, $parentId, $parentHeading)) {
                    return true;
                }
            }
        } else {
            return false;
        }
    }
}

function populatePage($parentPage, $level)
{
    $parentId = $parentPage->id;
    
    if ($level == $GLOBALS['foundLevel']) {
        echo "<section id='sub-nav-container-main' class='sub-nav-container' >";
    } else {
        echo "<section id='sub-nav-container-$level-$parentId' class='sub-nav-container '>";
    }
    
    if ($level == $GLOBALS['foundLevel']) {
        echo "<div id='sub-nav-content-$level-$parentId' class=''>";
    } else  {
        echo "<div id='sub-nav-content-$level-$parentId' class='sub-nav-content' style='z-index:-$level;'>";
    }
    
    if ($parentPage->heading != "root") {
        findParent($GLOBALS['rootPage'], $parentPage->parent);
        $parrentHeadingId = $GLOBALS['parrentHeadingId'];
        $parrentHeadingHeading = $GLOBALS['parrentHeadingHeading'];
        $parrentHeadingParentId = $GLOBALS['parrentHeadingParentId'];
        
        if ($level == $GLOBALS['foundLevel']) {
            echo "<div class='nav-item nav-paranet nav-back' 
                       onclick='updateNavBar(\" $parrentHeadingId \", \" $parrentHeadingHeading \", \" $parrentHeadingParentId \");'> ";
            echo "<div class='animate-arrow'>";
            echo "<span class='arrow back'><span></span></span>";
            echo " $parentPage->heading ";
            echo "</div>";
            echo "</div>";
        }
    }
    
    echo "<ul>";
    foreach ($parentPage->children as $child) {
        $nextLevel = $level + 1;
        $childHeading = $child->heading;
        $parentId = $child->id;
        $numberOfChildren = count($child->children);
        echo "<li id='nav-item-$parentId' class='nav-item'
                                onmouseover='navElementMouseOver(this, \"sub-nav-container-$nextLevel-$parentId\", \"sub-nav-content-$nextLevel-$parentId \", \"$nextLevel\")'
                                nrChildren='$numberOfChildren'
                                onclick='updateNavBar(\"$child->id\", \"$child->parent\", \"$child->heading\")'>";
        if ($numberOfChildren != 0) {
            echo "<div class='animate-arrow'>";
                echo "<div class='nav-button-parent'>
                     $child->heading</div>";
                echo "<span class='arrow'><span></span></span>";
            echo "</div>";
        } else {
            echo "<div class='nav-button-parent-not'>
                      $child->heading 
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

$parrentHeadingId;
$parrentHeadingHeading;
$parrentHeadingParentId;

function findParent($tempRootPage, $id)
{
    if ($tempRootPage->id == $id) {
        $GLOBALS['parrentHeadingId'] = $id;
        $GLOBALS['parrentHeadingHeading'] = $tempRootPage->heading;
        $GLOBALS['parrentHeadingParentId'] = $tempRootPage->id;
        return true;
    } else {
        if ($tempRootPage->children != null) {
            foreach ($tempRootPage->children as $child) {
                if (findParent($child, $id)) {
                    return true;
                }
            }
        } else {
            return false;
        }
    }
}

?>