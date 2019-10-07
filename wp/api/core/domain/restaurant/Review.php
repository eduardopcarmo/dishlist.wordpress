<?php
class ReviewList{

    // Properties
    public $current_page;
    public $total_reviews;
    public $total_pages;
    public $reviews;

    // Constructor
    public function __construct(){
    }
}


class Review{

    // Properties
    public $id;
    public $rating;
    public $description;
    public $user;
    public $date_created;

    // Constructor
    public function __construct(){
    }
}
?>