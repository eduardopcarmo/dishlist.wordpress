# DishList.Wordpress

DTO and Endpoint's documentation and reference.

---

#### User

User: DTO + Endpoints

- DTO:

  - **User:** /dto/User/user.json

- Endpoints:

  - **Create a new user:** api/user/create.php => POST: user.json => Return: user.json
  - **Get an existent user:** api/user/read.php?id=[VALUE] => GET => Return: user.json

---

#### Restaurant, Menu and Dish

Restaurant, Menu and Dish: DTO's + Endpoints

- DTO:

  - **Menu**: /dto/Restaurant/menu.json
  - **Restaurant:** /dto/Restaurant/restaurant.json
  - **Dish:** /dto/Restaurant/restaurant.json

- Endpoints:

  - **Search Restaurant by Name:** /api/restaurant/read.php?name=[VALUE] => GET => Return: Array of restaurant.json
  - **Get Restaurant Menu by Restaurant Id:** /api/menu/read.php?id=[VALUE] => GET => Return: menu.json
  - **Get Dish by Dish Id:** /api/dish/read.php?id=[VALUE] => GET => Return: dish.json

---

#### Review

Review: DTO's + Endpoints

- DTO:

  - **Review**: /dto/Restaurant/review.json
  - **Review List**: /dto/Restaurant/reviewList.json

- Endpoints:

  - **Add new Review:** /api/review/create.php?id=[DISH_ID] => POST => Return: Review.json
  - **Get Reviews by Dish Id:** /api/review/read.php?id=[DISH_ID]&page=[PAGE_NUMBER] => GET => Return: ReviewList.json
