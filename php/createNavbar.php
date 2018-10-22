<?php
    $maxLevel = 0; 
    class Page {
        public $heading = "root";
        public $id = 0;
        public $children = array();
    }
    
    function getPages($parent, $conn) {
        $parentId = $parent->id;
        $children = $conn->query("SELECT * FROM `pages` WHERE parent='$parentId'");
        while ($child = $children->fetch_assoc()) {
            $newPage = new Page();
            $newPage->heading = $child["heading"];
            $newPage->id = $child["id"];
            array_push($parent->children, $newPage);
            getPages($newPage, $conn);
        }
    }
    
    function populatePage($parentPage, $level) {
        $parentHeading = $parentPage->heading;
        $parentId = $parentPage->id;
        
        global $maxLevel;
        if ($maxLevel < $level)
            $maxLevel = $level;
        
            echo "<section id='sub-nav-conainer-$level-$parentId' class='sub-nav-container'>";
            echo "<div id='sub-nav-content-$level-$parentId' class='sub-nav-content'  
                   style='left: calc(" . ($level * 10) . "vw  + " . (5 * $level) . "px )'>";
                echo "<ul>";
                    foreach ($parentPage->children as $child) {
                        $nextLevel = ($level + 1);
                        $childHeading = $child->heading;
                        $parentId = $child->id;
                        echo "<li id='nav-item-$parentId' class='nav-item one-line-nav-item' 
                                onmouseover='navElementMouseOver(this, \"sub-nav-conainer-$nextLevel-$parentId\", \"sub-nav-content-$nextLevel-$parentId \", \"$nextLevel\")' 
                                level='$level' parent='sub-nav-conainer-$nextLevel-$parentId' 
                                onclick='navElementClicked(this)'>" . $child->heading . 
                             "</li>";
                        if (count($child->children) > 0)
                            populatePage($child, $nextLevel);
                    }
                echo "</ul>";
            echo "</div>";
        echo "</section>";
    }
    
    /* to optimice we are getting al the pages at once and greate the page */
    $currentUser;
    $conn = new mysqli("localhost", "root", "", "it_tools");
    
    if ($conn->connect_error) {
        die("<div class='failed'>Connection failed: " . $conn->connect_error . "</div><br>");
    }
    
    $rootPage = new Page();
    getPages($rootPage, $conn);
    print_r($rootPage);
    populatePage($rootPage, 0);

?>