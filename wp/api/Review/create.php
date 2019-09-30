<?php
    // Domain
    include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/domain/ErrorMessage.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/domain/review/Review.php";

    // Service
    include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/service/SReview.php";

    // Headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    // Check HTTP Method
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // ID
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;

        // Review
        $review = json_decode(file_get_contents("php://input"));

        // Check values
        if(!empty($user->text)){
            
            // Create new user user
            $sReview = new SReview();
            $review = $sReview->Create($id, $review);

            // Check if user was created
            if($review != null && $review->id > 0){
                // set response code - 201 Created
                http_response_code(201);
            
                // User in json format
                echo json_encode($review);

                // Stop execution
                return;
            }
        }

        // Set response code - 404 Not found
        http_response_code(404);

        // Erro Message in json format
        echo json_encode(new ErrorMessage(404, "Reviews does not created."));
        
        // Stop execution
        return;
    }

    // Set response code - 403 Forbidden
    http_response_code(403);
?>