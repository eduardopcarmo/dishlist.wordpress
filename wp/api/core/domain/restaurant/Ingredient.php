<?php
class Ingredient{

    // Properties
    public $id;
    public $name;
 
    // Constructor
    public function __construct($id, $name){
        $this->id = $id;
        $this->name = $name;
    }
}
?>