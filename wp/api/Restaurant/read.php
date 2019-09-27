<?php
    // Domain
    include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/domain/ErrorMessage.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/domain/restaurant/Restaurant.php";

    // Service
    include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/service/SRestaurant.php";

    // Headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");

    // Check HTTP Method
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // ID
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;

        //Name
        $name = isset($_GET["name"]) ? urldecode($_GET["name"]) : null;
        
        // Check if is a "Valid" ID
        if($id > 0 || $name != null)
        {
            // Get Restaurant
            $sRestaurant = new SRestaurant();
            $restaurant = null;

            // Get Restaurant by ID
            if($id > 0){
                $restaurant = $sRestaurant->Get($id);
            }else{
                $restaurant = $sRestaurant->GetByName($name);
            }

            // Check if Restaurant exists
            if($restaurant != null){
                // set response code - 200 OK
                http_response_code(200);
            
                // User in json format
                echo json_encode($restaurant);

                // Stop execution
                return;
            }
        }

        // Set response code - 404 Not found
        http_response_code(404);

        // Erro Message in json format
        echo json_encode(new ErrorMessage(404, "User does not exist."));
        
        // Stop execution
        return;
    }

    // Set response code - 403 Forbidden
    http_response_code(403);
?>