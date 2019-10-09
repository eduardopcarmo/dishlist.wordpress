<?php
    // Domain
    include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/domain/ErrorMessage.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/domain/restaurant/Review.php";

    // Service
    include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/service/SReview.php";

    // Headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");

    // Check HTTP Method
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // ID
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;

        // Page
        $page = isset($_GET["page"]) ? $_GET["page"] : 1;
        
        // Check if is a "Valid" request
        if($id > 0)
        {

            // Get Restaurant
            $sReview = new SReview();
            $reviews = null;

            // Get Reviews by Dish ID
            $reviews = $sReview->GetList($id, $page);

            // Check if has review exists
            if($reviews != null){
                // set response code - 200 OK
                http_response_code(200);
            
                // User in json format
                echo json_encode($reviews);

                // Stop execution
                return;
            }
        }

        // Set response code - 404 Not found
        http_response_code(404);

        // Erro Message in json format
        echo json_encode(new ErrorMessage(404, "Reviews does not exist."));
        
        // Stop execution
        return;
    }

    // Set response code - 403 Forbidden
    http_response_code(403);
?>