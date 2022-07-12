# create database
DROP DATABASE IF EXISTS BearBurger;
CREATE DATABASE BearBurger;

# select the database
USE BearBurger;

# create users table
DROP TABLE IF EXISTS Users;
CREATE TABLE Users
(
    UserID      INT AUTO_INCREMENT PRIMARY KEY,
    Username    VARCHAR(30) NOT NULL UNIQUE,
    Email       VARCHAR(30) NOT NULL UNIQUE,
    Password    VARCHAR(30) NOT NULL,
    PhoneNumber VARCHAR(15) NOT NULL,
    Gender      VARCHAR(6)  NOT NULL,
    Spent       INT,
    RegDate     TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

# insert user data
INSERT INTO Users (Username, Email, Password, PhoneNumber, Gender, Spent)
VALUES ('Raofin', 'hello@raofin.net', 'asdF', '+8801234567890', 'male', 6801),
       ('Bill Gates', 'billgates@outlook.com', 'billgates68457', '+6963343233', 'male', 9960),
       ('Elon Musk', 'elonmusk@yahoo.com', 'elon123', '+9668508170248', 'male', 7856),
       ('Jack Ma', 'jackma@gmail.com', 'jackma144', '+1667698473784', 'male', 4567),
       ('Steve Jobs', 'stevejobs@icloud.com', 'steve1213', '+1527475095845', 'male', 421),
       ('Jeff Bezos', 'jeffbezos@gmail.com', 'jeffbe1334', '+8966295324845', 'male', 2152),
       ('Mark Zuckerberg', 'markzuckerberg@live.com', 'markz131', '+2657146731697', 'male', 3972),
       ('Sundar Pichai', 'sundarpichai@gmail.com', 'sundarp296', '+9815680737969', 'male', 1546);

# create foods table
DROP TABLE IF EXISTS Foods;
CREATE TABLE Foods
(
    FoodID      INT AUTO_INCREMENT PRIMARY KEY,
    Category    VARCHAR(30) NOT NULL,
    Title       VARCHAR(30) NOT NULL,
    Description TEXT        NOT NULL,
    Price       INT         NOT NULL
);

# create users table
DROP TABLE IF EXISTS Comments;
CREATE TABLE Comments
(
    CommentID INT AUTO_INCREMENT PRIMARY KEY,
    ParentID  INT         NOT NULL,
    FoodID    INT         NOT NULL,
    PostedBy  VARCHAR(30) NOT NULL,
    Comment   TEXT        NOT NULL,
    PostDate  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT FoodID_FK FOREIGN KEY (FoodID) REFERENCES foods (FoodID)
);

# insert food data
INSERT INTO Foods (Category, Title, Description, Price)
VALUES ('Burger', 'Cheese Burger', 'Prepared with beef patty, cheese, burger sauce, pickles & onion', 650),
       ('Burger', 'Bacon Cheese Burger', 'Prepared with beef patty, 2 slices cheese, bacon & burger sauce', 500),
       ('Burger', 'Double Cheese Burger', 'Prepared with 2 beef patties, double cheese, burger sauce & onion', 640),
       ('Burger', 'Lil Smoke', 'Prepared with beef patty, cheese, bbq sauce, burger sauce, pickles & onion', 160),
       ('Burger', 'Big Smoke', 'Prepared with 2 beef patties, 2 slices cheese, bbq sauce, burger sauce & onion', 280),
       ('Burger', 'Juicy Burger', 'Prepared with potato juice, beef patties, double cheese & burger sauce', 960),
       ('Pizza', 'Chicken Chunky Fire Pizza', 'Topped with black olive, tomato, capsicum & green chili', 510),
       ('Pizza', 'BBQ Chicken Pizza', 'Topped with grilled chicken, bbq sauce & mozzarella cheese', 240),
       ('Pizza', 'Chicken Meatball Pizza', 'Topped with chicken meatball, tomato sauce & mozzarella cheese', 960),
       ('Pizza', 'Chicken Tikka Pizza', 'Topped with chicken tikka, tomato sauce & mozzarella cheese', 350),
       ('Pizza', 'Beef Meatball Pizza', 'Prepared with frank sausage, bacon, scallion, sauce & cheddar cheese', 560),
       ('Pizza', 'Vegetable Pizza', 'Topped with capsicum, mushroom, sweet corn, onion & black olive', 480),
       ('Salad', 'Cashewnut salad', 'Topped with cashew nout and veggies', 310),
       ('Salad', 'Seafood salad', 'Topped with seafood and lots of veggies and virgin olive oil', 360),
       ('Salad', 'Grilled Chicken salad', 'Topped with chicken and secret spice ', 310),
       ('Salad', 'Russian Salad', 'Authentic russian taste with lots of veggies and secret sauce', 370),
       ('Salad', 'Korean Beef salad', 'Made with beed in korean spice and sauce', 560),
       ('Pasta', 'Ovenbaked Pasta', 'Topped with black olive, chicken ,capsicum & green chili', 450),
       ('Pasta', 'BBQ Grill Chicken Pasta', 'Topped with grilled chicken, bbq sauce & mozzarella cheese', 340),
       ('Pasta', 'Lasagnia', 'Topped with chicken & spices', 460),
       ('Pasta', 'Seafood Pasta', 'Topped with seafood & mushroom', 350),
       ('Pasta', 'American Mac & cheese', 'Topped with macarony & mozzarella cheese', 560),
       ('Drinks', 'Lemonade', 'taste of fresh lemon and freshness', 110),
       ('Drinks', 'Mango Smoothie', 'Tate of mangoes infused with cream and milk', 270),
       ('Drinks', 'Iced lemon tea', 'Lemon tea but with chilled ice', 200),
       ('Drinks', 'Lemon lassi', 'Taste of lassi with tanginess of lemon', 170),
       ('Drinks', 'Milk shake', 'Taste of heavy cream and milk', 140),
       ('Coffee', 'Espresso', 'Shots of pure coffee', 120),
       ('Coffee', 'Cappuccino', 'Shots of pure coffee induced milk', 260),
       ('Coffee', 'Americano', 'SHots of pure Coffee in American style ', 310),
       ('Coffee', 'Latte', '30% coffee with heavy milk ', 370),
       ('Desert', 'Brownie', 'Mix of chocolate and magic', 130),
       ('Desert', 'Red velvet', 'Magic of bakery in red color', 260),
       ('Desert', 'Choco fudge', 'Chocolate cheese and creaminess ', 190),
       ('Desert', 'Oreo and cheese', 'Crunchy oreo crust and creamy cheese filling', 190),
       ('Desert', 'Blueberry Cheese Dip', 'Mix of blueberry cheesy filling', 170),
       ('Sides', 'Medium French Fry', 'Delicious french fry in medium', 90),
       ('Sides', 'Large French Fry', 'Delicious french fry in large', 110),
       ('Sides', 'Chicken Fingers', 'Chicken fried in finger sized', 130),
       ('Sides', 'Naga Drumsticks', 'You like it HOT!! Its for you', 120);

# insert comment data
INSERT INTO Comments (ParentID, FoodID, PostedBy, Comment)
VALUES ('0', '2', 'Raofin', 'The potato juice was amazing =)'),
       ('1', '2', 'Bill Gates', 'True'),
       ('0', '6', 'Elon Musk', 'I have to say, I enjoyed every single bite of the meal.');