<?php
session_start();

class Page
{
    public $parent = "root";
    public $level = 0;
    public $parentType = "root";
    public $heading = "Courses";
    public $id = 0;
    public $children = array();
    public function __toString()
    {
        return "My parent is: $this->parent <br> " . "My parentType is: $this->parentType <br>" . "My heading is: $this->heading <br>" . "My id is: $this->id <br>" . "My # children is:" . count($this->children) . "<br><br>";
    }
}
$bar = $_REQUEST['bar'];

if ($bar == "nav") 
    $activeSession = $_SESSION['activePage'];
else 
    $activeSession = $_SESSION['activeUserPage'];

$foundActivePage;
$found = findActivePage($activeSession, 
                        (int) $_REQUEST['id'], 
                        $_REQUEST['heading']);

if ($foundActivePage->heading != "Courses" && $foundActivePage->id != 0) {
    $parentPreviusId = ($foundActivePage->parent)->id;
    $parentPreviusHeading = ($foundActivePage->parent)->heading;
    echo "<li class='nav-item nav-paranet nav-back'
              style='list-style-type: none;'";
    if ($GLOBALS["bar"] == "nav") {
        echo "onclick='updateNavBar(\"$parentPreviusId\",
                                    \"$parentPreviusHeading\");
	                   updateUserNavBar(\"0\", \"Courses\");
                        '>";
    } else {
        echo "onclick='updateUserNavBar(\"$parentPreviusId\",
                                        \"$parentPreviusHeading\");
	                   updateNavBar(\"0\", \"Courses\");
                        '>";
    }
        echo "<div class='animate-arrow'>";
            echo "<span class='arrow back'><span></span></span>";
                echo "$parentPreviusHeading";
        echo "</div>";
    echo "</li>";
}
if ($foundActivePage->id == 0 && $foundActivePage->heading == "Courses") {
    createContainer($foundActivePage, 0);
} else {
    createPage($foundActivePage, 0);
}

function createContainer($page, $level)
{
    $level ++;
    $parentId = $page->id;
    $parentHeading = $page->heading;
    // $level = $page->level;
    if ($parentId != 0 && $page->heading != "Courses") {
        echo "<div id='sub-nav-container-$parentHeading-$parentId' 
                   class='sub-nav-container' level='$level'>";
            echo "<div id='sub-nav-content-$parentHeading-$parentId' 
                           class='sub-nav-content'>";
                echo "<ul id='sub-nav-ul-$parentHeading-$parentId'>";
                    foreach ($page->children as $child) {
                        createPage($child, $level);
                    }
                echo "</ul>";
            echo "</div>";
        echo "</div>";
    } else {
        echo "<ul id='sub-nav-ul-$parentHeading-$parentId'>";
            foreach ($page->children as $child) {
                createPage($child, $level);
            }
        echo "</ul>";
    }
}

function createPage($page, $level)
{
    echo "<li id='nav-item-$page->heading-$page->id'";
              echo "heading='$page->heading'";
    if ($page->heading == "Create new page" || $page->heading=="Create new course")
        echo "class='nav-item nav-add-item'"; 
    else 
        echo "class='nav-item'"; 
    
        $bar = $GLOBALS["bar"];
        echo "style='list-style-type: none;'";
        echo "onmouseover='navElementMouseOver(this,
                                              \"$page->heading\",
                                              \"$page->id\",
                                              $level,
                                              \"$bar\")'";
        if ($bar == "nav") {
            echo "onclick='updateNavBar(\"$page->id\", \"$page->heading\")
                           updateUserNavBar(\"0\", \"Courses\");
                           updateMainContent(\"$page->id\", \"$page->heading\", \"subject\");
                            '>";
                            
        } else {
            echo "onclick='updateUserNavBar(\"$page->id\", \"$page->heading\")
                           updateNavBar(\"0\", \"Courses\");
                           updateMainContent(\"$page->id\", \"$page->heading\", \"specificcourse\");
                           '>";
        }
    
    if (count($page->children) > 0) {
        echo "<div class='animate-arrow'>";
            echo "<div class='nav-button-parent'>";
                echo "$page->heading";
            echo "</div>";
            echo "<span class='arrow'><span></span></span>";
        echo "</div>";
    } else {
        echo "<div class='nav-button-parent-not'>";
            echo "$page->heading";
        echo "</div>";
    }
    echo "</li>";
    if (count($page->children) > 0)
        createContainer($page, $level);
}

function findActivePage($tempRootPage, $id, $heading)
{
    if ($tempRootPage->id == $id && $tempRootPage->heading == $heading) {
        $GLOBALS['foundActivePage'] = $tempRootPage;
        return true;
    } else {
        if ($tempRootPage->children != null) {
            foreach ($tempRootPage->children as $child) {
                if (findActivePage($child, $id, $heading)) {
                    return true;
                }
            }
        } else {
            return false;
        }
    }
}

?>