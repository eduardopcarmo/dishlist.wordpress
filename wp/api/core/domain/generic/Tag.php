<?php
class Tag{

    // Properties
    public $id;
    public $name;
    public $is_category;
 
    // Constructor
    public function __construct($id, $name, $isCategory){
        $this->id = $id;
        $this->name = $name;
        $this->is_category = $isCategory;
    }
}
?>