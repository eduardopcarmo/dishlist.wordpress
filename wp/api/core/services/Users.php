<?php
class User{
 
    // database connection
    private $conn;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    /**
    * Create a new user.
    *
    * @param string $phoneNumber User Phone Name.
    * @param string $name User Name.
    * @return User new user with Id.
    */
    public function Create($phoneNumber, $name){

    }

    /**
    * Update an existent user.
    *
    * @param User $user User with ID.
    * @return bool Success = true / Fail = false.
    */
    public function Update($user){

    }

    /**
    * Get an existent user.
    *
    * @param string $id User id.
    * @return User User with the same Id.
    */
    public function Get($id){

    }
}