# DishList.Wordpress

DTO and Endpoint's inicial documentation and reference.

---

#### User

User DTO and Endpoints

- DTO:

  - **User:** /dto/User/user.json

- Endpoints:

  - **Create a new user:** api/user/add => POST: User => Return: User.json
  - **Update a existent user:** api/user/update => PUT: User => Return: HTTP STATUS 200
  - **Get a existent user:** api/user/get?id=User.Id => GET => Return: User.json
  - **Inactive a existent user:** api/user/delete?id=User.Id => DELETE => Return: HTTP STATUS 200

---

#### Generic

Generic DTO's and Endpoints

- DTO:

  - **Address:** /dto/Generic/address.json
  - **City:** /dto/Generic/city.json
  - **Day of the Week:** /dto/Generic/dayOfTheWeek.json
  - **Open hour:** /dto/Generic/openHour.json
  - **Province:** /dto/Generic/province.json
  - **Tag:** /dto/Generic/tag.json

- Endpoints:

  - **Get the list of `Days of the Week`:** api/generic/daysoftheweek/get_all => GET => Return: Array of Days of the Week

---

#### Restaurant, Dish

Restaurant and Dish DTO's and Endpoints

- DTO:

  - **Dish:** /dto/Restaurant/dish.json
  - **Ingredient**: /dto/Restaurant/ingredient.json
  - **Restaurant:** /dto/Restaurant/restaurant.json

- Endpoints:

  - **Search Restaurant by Name:** api/restaurant/search_by_name => POST => Return: Array of Restaurant.json
  - **Get Restaurant by Id:** api/restaurant/get?id=Restaurant.Id => GET => Return: Restaurant.json
  - **Get Restaurant by QRCode (Restaurant.Id):** api/restaurant/get?id=QRCode => GET => Return: Restaurant.json
  - **Get Dishes from a Restaurant:** api/restaurant/get_dishes?id=Restaurant.Id => GET => Return: Array of Dish.json

---

#### Review

Review DTO's and Endpoints

- DTO:

  - **Review:** /dto/DishReview/review.json

- Endpoints:

  - **Get Reviews from a dish:** api/review/get?id=Dish.Id&Page=1 => Get => Return: Array of review.json
  - **Create a new review:** api/review/add => POST: review.json => Return: review.json
  - **Add Phtos to a existent review:** api/review/add_photo?id=Review.Id => POST: PHOTO??? => Return: string with photo URL
