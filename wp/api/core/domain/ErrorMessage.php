<?php
// Default Error Message
class ErrorMessage{

    // Properties
    public $id;
    public $description;
 
    // Constructor
    public function __construct($id, $description){
        $this->id = $id;
        $this->description = $description;
    }
}
?>