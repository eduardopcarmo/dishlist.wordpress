<?php
// Domain
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/domain/restaurant/Review.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/domain/user/User.php";

// Database
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/Database.php";

class SReview{

    // Database 
    private $database;

    // constructor 
    public function __construct(){
        // Load the Database class
        $this->database = new Database();
    }

    // Get an existent Review
    public function Get($id){
        // Return value
        $review = null;

        // Check if is a valide id
        if($id !== null && is_int($id)){
            // Get Dish info
            $sql = "SELECT ";
            $sql .= "    MIR.review_id ";
            $sql .= "    , MIR.item_id ";
            $sql .= "    , U.user_name ";
            $sql .= "    , MIR.review_rating ";
            $sql .= "    , MIR.review_description ";
            $sql .= "    , MIR.review_date_created ";
            $sql .= "FROM ";
            $sql .= "	api_menu_item_review MIR ";
            $sql .= "   INNER JOIN api_user U ON MIR.user_id = U.user_id ";
            $sql .= "WHERE ";
            $sql .= "	review_id = ?;";

             // Execute the select
            $result = $this->database->Select($sql, array("review_id" => (int)$id));
            if($result !== null && is_array($result) && count($result) > 0){
                // "Build" Review
                $review = new Review();
                $review->id = $result[0]["review_id"];
                $review->rating = $result[0]["review_rating"];
                $review->description = $result[0]["review_description"];
                $review->date_created = $result[0]["review_date_created"];
                $review->user = new User();
                $review->user->name = $result[0]["user_name"];
            }
        }

        // Return Review 
        return $review;
    }

    // Get List of Reviews by Dish Id and Page
    public function GetList($itemId, $page){
        return null;
    }

    // Create new review
    public function Create($itemId, $review){
        // Check the information
        $isValid = true;

        // Check if the Dish exists
        try{
            // Execute the select
            $result = $this->database->Select("SELECT item_id FROM api_menu_item WHERE item_id = ?;", array("item_id" => $itemId));
            $isValid = ($result !== null && is_array($result) && count($result) > 0);
        }catch (Exception $e) {
            // Error! Don't create review
            return null;
        }

        // Check if the user exists
        if($isValid){
            try{
                // Execute the select
                $result = $this->database->Select("SELECT user_id FROM api_user WHERE user_id = ?;", array("user_id" => $review->user->id));
                $isValid = ($result !== null && is_array($result) && count($result) > 0);
            }catch (Exception $e) {
                // Error! Don't create review
                return null;
            }
        }

        // Exec insert and get ID
        if($isValid){
            $reviewId = 0;
            try{
                // Exec insert and get ID
                $reviewId = $this->database->Insert("INSERT INTO api_menu_item_review (item_id, user_id, review_rating, review_description) VALUES (?, ?, ?, ?);", 
                array(
                    "item_id" => $itemId,
                    "user_id" => $review->user->id,
                    "review_rating" => (int)$review->rating,
                    "review_description" => $review->description
                ));
            }
            catch (Exception $e) {
                // Error! Don't return user
                $reviewId = 0;
                $review = null;
            }

            // Check if review was created
            if($reviewId > 0){
                // Update average review
                $this->UpdateAverageRating($itemId);
                
                // Get review
                $review = $this->Get((int)$reviewId);
            }else{
                $review = null;
            }
        }else{
            $review = null; 
        }

        // Return the user
        return $review;
    }

    // Update average rating for an existent dish
    public function UpdateAverageRating($id){
        // Return success indication
        $success = false; 
        
        // Average Raging
        $averageRating = 0.00;

        // Do the Math
        $result = $this->database->Select("SELECT ROUND(AVG(review_rating), 2) AS item_average_rating FROM api_menu_item_review WHERE item_id = ?", array("item_id" => (int)$id));
        if($result !== null && is_array($result) && count($result) > 0){
            $averageRating = $result[0]["item_average_rating"];
        }

        if(is_numeric($averageRating) && $averageRating > 0){
            $success = $this->database->Update("UPDATE api_menu_item SET item_average_rating = ? WHERE item_id = ?;", 
                array(
                    "item_average_rating" => $averageRating,
                    "item_id" =>(int)$id
                ));
        }

        // True if update
        return $success;


    }
}
?>