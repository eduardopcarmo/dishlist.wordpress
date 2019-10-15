<?php
// Domain
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/domain/restaurant/Menu.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/domain/restaurant/Restaurant.php";

// Database
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/Database.php";

class SRestaurant{
    // Database 
    private $database;

    // constructor 
    public function __construct(){
        // Load the Database class
        $this->database = new Database();
    }

    // Get Restaurant by Id
    public function Get($id){
        // Return value
        $restaurant = null;

        // Check if is a valide id
        if($id !== null && is_int($id)){
            // Execute the select
            $result = $this->database->Select("SELECT rest_id, rest_name, rest_description, rest_website, rest_thumbnail FROM api_restaurant WHERE rest_id = ?;"
                , array("rest_id" => $id));

            // Check if has found the restaurant
            if($result !== null && is_array($result) && count($result) > 0){
                $restaurant = new Restaurant();
                $restaurant->id = $result[0]['rest_id'];
                $restaurant->name = json_encode($result[0]['rest_name']);
                $restaurant->description = json_encode($result[0]['rest_description']);
                $restaurant->website = $result[0]['rest_website'];
                $restaurant->thumbnail = $result[0]['rest_thumbnail'];
            }
        }

        // Return "Restaurant"
        return $restaurant;
    }

    // Get Restaurants by Name
    public function List($name){
        // Return value
        $restaurants = null;

        // Check if is a valid name
        if($name !== null && trim($name) !== ""){
            // Execute the select
            $result = $this->database->Select("SELECT rest_id, rest_name, rest_description, rest_website, rest_thumbnail FROM api_restaurant WHERE rest_name LIKE '%" . $name .  "%';", null);

            // Check if has found restaurants
            if($result !== null && is_array($result) && count($result) > 0){
                $restaurants = array();

                // "Build"
                for($i = 0; $i < count($result); $i++){
                    $restaurant = new Restaurant();
                    $restaurant->id = $result[$i]["rest_id"];
                    $restaurant->name = $result[$i]["rest_name"];
                    $restaurant->description = $result[$i]["rest_description"];
                    $restaurant->website = $result[$i]["rest_website"];
                    $restaurant->thumbnail = $result[$i]['rest_thumbnail'];
                    $restaurants[] = $restaurant;
                }
            }
        }

        // Return "Restaurants"
        return $restaurants;
    }

    // Get Menu
    public function GetMenu($id){

        // Return value
        $menu = null;

        // Check if is a valide id
        if($id !== null && is_int($id)){
            // Get Restaurant
            $restaurant = $this->Get($id);
            
            // Check if exists
            if($restaurant !== null){
                // "Buil" Menu
                $menu = new Menu();
                $menu->place = $restaurant;
                $menu->featured = array();
                $menu->categories = array();

                // Categories / Dish
                $sql = "SELECT ";
                $sql .= "    M.menu_id ";
                $sql .= "    , M.menu_name ";
                $sql .= "    , MI.item_id ";
                $sql .= "    , MI.item_name ";
                $sql .= "    , MI.item_short_description ";
                $sql .= "    , MI.item_description ";
                $sql .= "    , MI.item_thumbnail ";
                $sql .= "    , MI.item_average_rating ";
                $sql .= "    , MI.item_price ";
                $sql .= "    , MI.item_average_time ";
                $sql .= "    , MI.item_to_people ";
                $sql .= "FROM ";
                $sql .= "	api_menu M  ";
                $sql .= "    INNER JOIN api_menu_item MI ON M.menu_id = MI.menu_id  ";
                $sql .= "WHERE ";
                $sql .= "	M.rest_id = ? ";
                $sql .= "ORDER BY ";
                $sql .= "	M.menu_display_order, ";
                $sql .= "	M.menu_name, ";
                $sql .= "   MI.item_name ";

                // Execute the select
                $result = $this->database->Select($sql, array("rest_id" => (int)$menu->place->id));
                if($result !== null && is_array($result) && count($result) > 0){
                    $category = null;
                    // "Build" category / Dish
                    for($i = 0; $i < count($result); $i++){
                        // Check if is a new one
                        if($category === null || $category->id !== $result[$i]["menu_id"]){
                            // Check if need to be "add"
                            if($category !== null){
                                $menu->categories[] = $category;
                            }
                            $category = new MenuCategory();
                            $category->id = $result[$i]["menu_id"];
                            $category->name = json_encode($result[$i]["menu_name"]);
                            $category->items = array();
                        }

                        // "Build" Item
                        $item = new MenuCategoryItem();
                        $item->id = $result[$i]["item_id"];
                        $item->name = json_encode($result[$i]["item_name"]);
                        $item->short_description = json_encode($result[$i]["item_short_description"]);
                        $item->thumbnail = $result[$i]["item_thumbnail"];
                        $item->rating = $result[$i]["item_average_rating"];
                        $item->price = $result[$i]["item_price"];
                        $item->average_time = $result[$i]["item_average_time"];
                        $item->people = $result[$i]["item_to_people"];
                        $item->tags = array();
                        
                        // Load Tags to Item
                        $sql_tags = "SELECT ";
                        $sql_tags .= "	MIT.tag_id, ";
                        $sql_tags .= "    T.tag_name, ";
                        $sql_tags .= "    T.tag_color ";
                        $sql_tags .= "FROM ";
                        $sql_tags .= "	api_menu_item_tag MIT ";
                        $sql_tags .= "    INNER JOIN api_tag T ON MIT.tag_id = T.tag_id ";
                        $sql_tags .= "WHERE ";
                        $sql_tags .= "	MIT.item_id = ? ";
                        $sql_tags .= "ORDER BY ";
                        $sql_tags .= "	T.tag_order ";
                        
                        // Execute the select
                        $result_tags = $this->database->Select($sql_tags, array("item_id" => (int)$item->id));
                        if($result_tags !== null && is_array($result_tags) && count($result_tags) > 0){
                            for($t = 0; $t < count($result_tags); $t++){
                                $tag = new MenuCategoryItemTag();
                                $tag->id = $result_tags[$t]["tag_id"];
                                $tag->name = json_encode($result_tags[$t]["tag_name"]);
                                $tag->color = $result_tags[$t]["tag_color"];
                                $item->tags[] = $tag;
                            }
                        }

                        // Add item to category
                        $category->items[] = $item;
                    }
                }
            }
        }
        
        // Return menu
        return $menu;
    }

    // Get Dish
    public function GetDish($id){
        // Return value
        $dish = null;

        // Check if is a valide id
        if($id !== null && is_int($id)){
            // Get Dish info
            $sql = "SELECT ";
            $sql .= "	MI.item_id, ";
            $sql .= "    MI.item_name, ";
            $sql .= "    MI.item_short_description, ";
            $sql .= "    MI.item_description, ";
            $sql .= "    MI.item_thumbnail, ";
            $sql .= "    MI.item_average_rating, ";
            $sql .= "    MI.item_price, ";
            $sql .= "    MI.item_average_time, ";
            $sql .= "    MI.item_to_people ";
            $sql .= "FROM ";
            $sql .= "	api_menu_item MI ";
            $sql .= "WHERE ";
            $sql .= "	MI.item_id = ? ;";
            
            // Execute the select
            $result = $this->database->Select($sql, array("item_id" => (int)$id));
            if($result !== null && is_array($result) && count($result) > 0){
                // "Build" Dish
                $dish = new Dish();
                $dish->id = $result[0]["item_id"];
                $dish->name = json_encode($result[0]["item_name"]);
                $dish->short_description = json_encode($result[0]["item_short_description"]);
                $dish->description = json_encode($result[0]["item_description"]);
                $dish->thumbnail = $result[0]["item_thumbnail"];
                $dish->rating = $result[0]["item_average_rating"];
                $dish->price = $result[0]["item_price"];
                $dish->average_time = $result[0]["item_average_time"];
                $dish->tags = array();
                $dish->ingredients = array();
                $dish->photos = array();

                // Get Tags
                $sql = "SELECT ";
                $sql .= "	MIT.tag_id, ";
                $sql .= "    T.tag_name, ";
                $sql .= "    T.tag_color ";
                $sql .= "FROM ";
                $sql .= "	api_menu_item_tag MIT ";
                $sql .= "    INNER JOIN api_tag T ON MIT.tag_id = T.tag_id ";
                $sql .= "WHERE ";
                $sql .= "	MIT.item_id = ? ";
                $sql .= "ORDER BY ";
                $sql .= "	T.tag_order; ";
                
                // Execute the select
                $result_tags = $this->database->Select($sql, array("item_id" => (int)$dish->id));
                if($result_tags !== null && is_array($result_tags) && count($result_tags) > 0){
                    for($t = 0; $t < count($result_tags); $t++){
                        $tag = new MenuCategoryItemTag();
                        $tag->id = $result_tags[$t]["tag_id"];
                        $tag->name = json_encode($result_tags[$t]["tag_name"]);
                        $tag->color = $result_tags[$t]["tag_color"];
                        $dish->tags[] = $tag;
                    }
                }

                // Get Ingredients
                $sql = "SELECT ";
                $sql .= "	MII.item_ingredient_id, ";
                $sql .= "    MII.item_ingredient_name ";
                $sql .= "FROM ";
                $sql .= "	api_menu_item_ingredient MII ";
                $sql .= "WHERE ";
                $sql .= "    MII.item_id = ?  ";
                $sql .= "ORDER BY ";
                $sql .= "	MII.item_ingredient_order, ";
                $sql .= "   MII.item_ingredient_name; ";
                
                // Execute the select
                $result_ingredients = $this->database->Select($sql, array("item_id" => (int)$dish->id));
                if($result_ingredients !== null && is_array($result_ingredients) && count($result_ingredients) > 0){
                    for($t = 0; $t < count($result_ingredients); $t++){
                        $ingredient = new DishIngredient();
                        $ingredient->id = $result_ingredients[$t]["item_ingredient_id"];
                        $ingredient->name = json_encode($result_ingredients[$t]["item_ingredient_name"]);
                        $dish->ingredients[] = $ingredient;
                    }
                }

                // Get Photos
                $sql = "SELECT ";
                $sql .= "	MIP.item_photo_id, ";
                $sql .= "    MIP.item_photo_url, ";
                $sql .= "    MIP.item_photo_description ";
                $sql .= "FROM ";
                $sql .= "	api_menu_item_photo MIP ";
                $sql .= "WHERE ";
                $sql .= "	MIP.item_id = ? ";
                $sql .= "ORDER BY ";
                $sql .= "	MIP.item_photo_order; ";
                
                // Execute the select
                $result_photos = $this->database->Select($sql, array("item_id" => (int)$dish->id));
                if($result_photos !== null && is_array($result_photos) && count($result_photos) > 0){
                    for($t = 0; $t < count($result_photos); $t++){
                        $photo = new DishPhoto();
                        $photo->id = $result_photos[$t]["item_photo_id"];
                        $photo->description = json_encode($result_photos[$t]["item_photo_description"]);
                        $photo->url = $result_photos[$t]["item_photo_url"];
                        $dish->photos[] = $photo;
                    }
                }
            }
        }

        // Return Dish
        return $dish;
    }
}
?>