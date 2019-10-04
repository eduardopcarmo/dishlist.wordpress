<?php
class Dish{

    // Properties
    public $id;
    public $name;
    public $short_description;
    public $description;
    public $thumbnail;
    public $rating;
    public $price;
    public $average_time;
    public $tags;
    public $ingredients;
    public $photos;
}

class DishPhoto{
    public $id;
    public $description;
    public $url;
}

class DishIngredient{
    public $id;
    public $name;
}
?>