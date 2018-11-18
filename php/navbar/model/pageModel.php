<?php 
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
?>