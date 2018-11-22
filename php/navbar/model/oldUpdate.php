<?php 
    /*$parentId = $parentPage->id;
    
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
        $foundPar = $GLOBALS['foundParent'];
        $foundParPar = $foundPar->parent;
        
        if ($level == $GLOBALS['foundLevel']) {
            echo "<div class='nav-item nav-paranet nav-back'
                       onclick='updateNavBar($foundPar->id,
                                             $foundPar->heading,
                                             $foundParPar->id);'> ";
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
        $parentPageHeading = $parentPage->heading;
        $parentId = $child->id;
        $numberOfChildren = count($child->children);
        if ($child->heading != "+ Create new course" && $child->heading != "+ Create new page") {
            echo "<li id='nav-item-$parentId-$childHeading-$nextLevel'
                      class='nav-item'
                      onmouseover='navElementMouseOver(this,
                                 \"sub-nav-container-$nextLevel-$parentId\",
                                 \"sub-nav-content-$nextLevel-$parentId \",
                                 \"$nextLevel\")'
                      nrChildren='$numberOfChildren'
                      onclick='updateNavBar(\"$child->id\",
                                            \"$child->parent\",
                                            \"$child->heading\")'>";
            
        } else {
            echo "<li id='nav-item-$parentId-$parentPageHeading-$nextLevel'
                      class='nav-item nav-add-item'
                      onmouseover='navElementMouseOver(this,
                                                       \"sub-nav-container-$nextLevel-$parentId\",
                                                       \"sub-nav-content-$nextLevel-$parentId \",
                                                       \"$nextLevel\")'
                      nrChildren='$numberOfChildren'
                      onclick='updateNavBar(\"$child->id\",
                                            \"$child->parent\",
                                            \"$child->heading\")
                              alert(\"NEW\") '>";
        }
        if ($numberOfChildren != 0) {
            echo "<div class='animate-arrow'>";
            echo "<div class='nav-button-parent'>";
            echo "$child->heading";
            echo "</div>";
            echo "<span class='arrow'><span></span></span>";
            echo "</div>";
        } else {
            echo "<div class='nav-button-parent-not'>";
            echo "$child->heading";
            echo "</div>";
        }
        echo "</li>";
        if ($numberOfChildren > 0)
            populatePage($child, $nextLevel);
    }
    echo "</ul>";
    echo "</div>";
    echo "</section>";
    
    
}


/*
$foundRootPage;
$foundLevel;

getPage($rootPage, 0, $newId, $GLOBALS['newParentId'], );
populatePage($GLOBALS['foundRootPage'], $GLOBALS['foundLevel']);


function getPage($tempRootPage, $tempLevel, $id, $parentId, $parentHeading)
{    
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
        $foundPar = $GLOBALS['foundParent'];
        $foundParPar = $foundPar->parent;
        
        if ($level == $GLOBALS['foundLevel']) {
            echo "<div class='nav-item nav-paranet nav-back' 
                       onclick='updateNavBar($foundPar->id, 
                                             $foundPar->heading, 
                                             $foundParPar->id);'> ";
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
        $parentPageHeading = $parentPage->heading;
        $parentId = $child->id;
        $numberOfChildren = count($child->children);
        if ($child->heading != "+ Create new course" && $child->heading != "+ Create new page") {
            echo "<li id='nav-item-$parentId-$childHeading-$nextLevel' 
                      class='nav-item'
                      onmouseover='navElementMouseOver(this, 
                                 \"sub-nav-container-$nextLevel-$parentId\", 
                                 \"sub-nav-content-$nextLevel-$parentId \", 
                                 \"$nextLevel\")'
                      nrChildren='$numberOfChildren'
                      onclick='updateNavBar(\"$child->id\", 
                                            \"$child->parent\", 
                                            \"$child->heading\")'>";
            
        } else {
            echo "<li id='nav-item-$parentId-$parentPageHeading-$nextLevel' 
                      class='nav-item nav-add-item'
                      onmouseover='navElementMouseOver(this, 
                                                       \"sub-nav-container-$nextLevel-$parentId\", 
                                                       \"sub-nav-content-$nextLevel-$parentId \", 
                                                       \"$nextLevel\")'
                      nrChildren='$numberOfChildren'
                      onclick='updateNavBar(\"$child->id\", 
                                            \"$child->parent\", 
                                            \"$child->heading\")
                              alert(\"NEW\") '>";
        }   
        if ($numberOfChildren != 0) {
            echo "<div class='animate-arrow'>";
                echo "<div class='nav-button-parent'>";
                    echo "$child->heading";
                    echo "</div>";
                echo "<span class='arrow'><span></span></span>";
            echo "</div>";
        } else {
            echo "<div class='nav-button-parent-not'>";
                echo "$child->heading"; 
            echo "</div>";
        }
        echo "</li>";
        if ($numberOfChildren > 0)
            populatePage($child, $nextLevel);
    }
    echo "</ul>";
    echo "</div>";
    echo "</section>";
}

$foundParent;
$parrentHeadingHeading;
$parrentHeadingParentId;

function findParent($tempRootPage, $parent)
{
    if ($tempRootPage->id == $parent->id && $tempRootPage->heading == $parent->heading) {
        $GLOBALS['foundParent'] = $parent;
        return true;
    } else {
        if ($tempRootPage->children != null) {
            foreach ($tempRootPage->children as $child) {
                if (findParent($child, $parent)) {
                    return true;
                }
            }
        } else {
            return false;
        }
    }
}
*/
?>