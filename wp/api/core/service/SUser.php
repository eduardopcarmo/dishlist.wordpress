<?php
// Domain
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/domain/User/User.php";

// Database
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/Database.php";

class SUser{

    // Database 
    private $database;

    // constructor 
    public function __construct(){
        // Load the Database class
        $this->database = new Database();
    }

    // Get by Id
    public function Get($id){
        // Return value
        $user = null;

        // Check if is a valide id
        if($id !== null && is_int($id)){
            
            // Execute the select
            $result = $this->database->Select("SELECT user_id, user_name, user_phone FROM api_user WHERE user_id = ?;", 
                array("user_id" => $id));

            // Check if has found the user
            if($result !== null && is_array($result) && count($result) > 0){
                $user = new User();
                $user->id = $result[0]['user_id'];
                $user->name = json_encode($result[0]['user_name']);
                $user->phone = json_encode($result[0]['user_phone']);
            }
        }
        
        // Return the user
        return $user;
    }

    // Create new user
    public function Create($name, $phone){
        // Return value
        $user = null;

        try{
            // Exec insert and get ID
            $user = new User();
            $user->id = $this->database->Insert("INSERT INTO api_user (user_name, user_phone) VALUES (?, ?); ", array(
                "user_name" => $name,
                "user_phone" => $phone,
            ));
            $user->name = $name;
            $user->phone = $phone;
        }
        catch (Exception $e) {
            // Error! Don't return user
            $user = null;
        }

        // Return the user
        return $user;
    }
}
?>