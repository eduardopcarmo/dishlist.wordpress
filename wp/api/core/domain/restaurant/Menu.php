<?php
class Menu{
    // Properties
    public $place;
    public $featured;
    public $categories;
 }

class MenuFeatured{
    // Properties
    public $id;
    public $name;
    public $thumbnail;
}

class MenuCategory{
    // Properties
    public $id;
    public $name;
    public $items;
}

class MenuCategoryItem{
    // Properties
    public $id;
    public $name;
    public $short_description;
    public $thumbnail;
    public $rating;
    public $price;
    public $average_time;
    public $people;
    public $tags;
}

class MenuCategoryItemTag{
    // Properties
    public $id;
    public $name;
    public $color;
}
?>