<?php 
class Page
{
    public $parent = "root";
    public $parentType = "root";
    public $heading = "root";
    public $id = 0;
    public $children = array();
    public function __toString() {
        return "My parent is: $this->parent <br> " .
               "My parentType is: $this->parentType <br>" . 
               "My heading is: $this->heading <br>" . 
               "My id is: $this->id <br>" . 
               "My # children is:". count($this->children)."<br><br>  ";
    }
}
?>