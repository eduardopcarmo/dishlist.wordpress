<?php
// Domain
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/domain/User/User.php";

class SUser{

    // Get by Id
    public function Get($id){
        if($id == 1){
            $user = new User();
            $user->id = 1;
            $user->name = "Eduardo Pereira do Carmo";
            $user->phone = "6048186303";
            return $user;
        }else{
            return null;
        }        
    }

    // Create new user
    public function Create($user){
        $user->id = 1;
        return $user;
    }

    public function Update($user){
        if($user->id == 1){
            return true;
        }else{
            return false;
        }
    }
}
?>