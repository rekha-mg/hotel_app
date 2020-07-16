### Food Ordering Project
- This project is about ordering food using this app.
- The user has to register by giving his details - Name ,Phone number  and  Location. These are stored inside database in "users" table.
- The  Food items are stored in table "Food". It has food_id,food_name and price fields.
- The Orders user placed are stored in "orders" table. Ih has the order_id,user_name,food_name,quantity,price and amount fields.

### Model of user,orders and food.
- $ php artisan make:model user

- $ php artisan make:model orders

- $ php artisan make:model food

- All controllers has crud.

- User Controller 
### To display all users details
-get http://127.0.0.1:8000/Users
### To display any one user deatils - pass user_id in url
-get http://127.0.0.1:8000/Users/2
### 
-post http://127.0.0.1:8000/Users 
      user_name    geeta
      Phone        9908767621
      location     kr street mysore


