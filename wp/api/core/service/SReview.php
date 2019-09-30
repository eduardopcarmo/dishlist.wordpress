<?php
// Domain
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/domain/review/review.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/domain/user/user.php";

class SReview{

    // Get List of Reviews by Dish Id
    public function Get($dishId, $page){
        if($dishId == 1){

            $reviews = array();

            // 1
            $review = new Review();
            $review->id = 1;
            $review->text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam accumsan congue. Etiam ornare pulvinar magna ac pellentesque. Aliquam ut erat quis dui tincidunt cursus non ac lacus. Sed a felis elit. Vestibulum rhoncus orci velit, eu tincidunt nisl dignissim sit amet. Duis consectetur ante nec magna vulputate porttitor.";
            $review->rating = 4;
            $review->photos = array(
                "https://cookieandkate.com/images/2017/01/vegetarian-pho-2.jpg",
                "https://cookieandkate.com/images/2017/01/vegetarian-pho-2.jpg");
            $review->user = new User();
            $review->user->id = 1;
            $review->user->name = "Eduardo Pereira do Carmo";
            $review->user->phone = "6048186303";
            $review->date = "2019-09-30T23:28:56.782Z";
            $review[] = $review;

            // 2
            $review2 = new Review();
            $review2->id = 2;
            $review2->text = "Lorem ipsum dolor sit amet";
            $review2->rating = 3;
            $review2->photos = array(
                "https://cookieandkate.com/images/2017/01/vegetarian-pho-2.jpg");
            $review2->user = new User();
            $review2->user->id = 1;
            $review2->user->name = "Eduardo Pereira do Carmo";
            $review2->user->phone = "6048186303";
            $review2->date = "2019-09-30T23:28:56.782Z";
            $review[] = $review2;

            return $reviews;
        }else{
            return null;
        }  
    }

    // Create new review
    public function Create($dishId, $review){
        $review->id = 3;
        return $review;
    }

    // Add one photo to on existent review
    public function AddPhoto($dishId, $path){

    }
}
?>