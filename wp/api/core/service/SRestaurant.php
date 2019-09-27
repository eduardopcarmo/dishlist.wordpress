<?php
// Domain
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/domain/restaurant/Restaurant.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/domain/generic/Address.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/domain/generic/City.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/domain/generic/Province.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/domain/restaurant/Menu.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/domain/restaurant/Dish.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/domain/generic/Tag.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/api/core/domain/restaurant/Ingredient.php";


class SRestaurant{

    // Get by Id
    public function Get($id){
        if($id == 1){
            $restaurant = new Restaurant();
            $restaurant->id = 1;
            $restaurant->name = "Veggie Bowl";
            $restaurant->description = "Amazing vegetarian Vietnamese food without the pretentiousness of that OTHER veggie Vietnamese place";
            $restaurant->address = new Address();
            $restaurant->address->street = new AddressStreet();
            $restaurant->address->street->name = "Kingsway";
            $restaurant->address->street->number = "2222";
            $restaurant->address->street->extra = "Unit 1";
            $restaurant->address->postal_code = "V5N2T7W";
            $restaurant->address->latitude = 49.242863;
            $restaurant->address->longitude = -123.060518;
            $restaurant->address->city = new City();
            $restaurant->address->city->id = 1;
            $restaurant->address->city->name = "Vancouver";
            $restaurant->address->city->province = new Province();
            $restaurant->address->city->province->id = 1;
            $restaurant->address->city->province->name = "British Columbia";
            $restaurant->address->city->province->abbreviation = "BC";
            $restaurant->phones = array("9999999999", "8888888888");
            $restaurant->website = "http://veggiebowl.ca";
            return $restaurant;
        }else{
            return null;
        }        
    }

    // Get by Name
    public function GetByName($name){
        return array($this->Get(1), $this->Get(1), $this->Get(1));
    }

    // Get Menu
    public function GetMenu($restaurantid, $userId){
        $menu = new Menu();
        $menu->restaurant = $this->Get(1);
        $menu->dishes = $this->GetDishes(1);
        $menu->top_3_dishes = $menu->dishes[0];
        $menu->categories = array(new Tag(1, "Vegetarian", true), new Tag(1, "Soup", true));
        return $menu;
    }

    public function GetDishes($restaurantid){
        $dishes = array();

        $dish1 = new Dish();
        $dish1->id = 1;
        $dish1->name = "Phò / Vegetarian Pho";
        $dish1->description = "Rice noodles, five spiced broth, vegan ham, ginger in broth, assorted tofu, broccoli, lotus root, zucchini, snap peas, enoki mushrooms, carrots, cauliflower";
        $dish1->short_description = "Rice noodles, five specide broth, vegan ham";
        $dish1->price = 10.5;
        $dish1->photos = array(
            "https://cookieandkate.com/images/2017/01/vegetarian-pho-2.jpg",
            "https://cookieandkate.com/images/2017/01/vegetarian-pho-2.jpg");
        $dish1->rating = 5;
        $dish1->average_time = "00:15";
        $dish1->tags = array(
            new Tag(1, "Vegetarian", true),
            new Tag(1, "Soup", false),
            new Tag(1, "Spice", false),
        );
        $dish1->ingredients = array(
            new Ingredient(1, "Rice noodles"),
            new Ingredient(2, "vegan ham"), 
            new Ingredient(3, "ginger in broth")
        );
        $dishes[] = $dish1;

        $dish2 = new Dish();
        $dish2->id = 1;
        $dish2->name = "Phò / Vegetarian Pho";
        $dish2->description = "Rice noodles, five spiced broth, vegan ham, ginger in broth, assorted tofu, broccoli, lotus root, zucchini, snap peas, enoki mushrooms, carrots, cauliflower";
        $dish2->short_description = "Rice noodles, five specide broth, vegan ham";
        $dish2->price = 10.5;
        $dish2->photos = array(
            "https://cookieandkate.com/images/2017/01/vegetarian-pho-2.jpg",
            "https://cookieandkate.com/images/2017/01/vegetarian-pho-2.jpg");
        $dish2->rating = 5;
        $dish2->average_time = "00:15";
        $dish2->tags = array(
            new Tag(1, "Vegetarian", false),
            new Tag(1, "Soup", true),
        );
        $dish2->ingredients = array(
            new Ingredient(1, "Rice noodles"),
            new Ingredient(2, "vegan ham"), 
            new Ingredient(3, "ginger in broth")
        );
        $dishes[] = $dish2;


        return $dishes;
    }
}
?>