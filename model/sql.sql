DROP DATABASE bearburger;

CREATE DATABASE bearburger;

CREATE TABLE bearburger.users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE,
    username VARCHAR (30) NOT NULL UNIQUE,
    email VARCHAR (30) NOT NULL UNIQUE,
    pass VARCHAR (30) NOT NULL,
    phone VARCHAR (15) NOT NULL,
    gender VARCHAR (6) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON
    UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE bearburger.foods (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE,
    catagory VARCHAR (30) NOT NULL,
    title VARCHAR (30) NOT NULL UNIQUE,
    description TEXT NOT NULL,
    price INT(10) NOT NULL
);

INSERT INTO bearburger.users (username, email, pass, phone, gender)
VALUES
    (
        "Raofin",
        "hello@raofin.net",
        "1234",
        "+880123456789",
        "male"
    );

SELECT * FROM bearburger.users
WHERE (username = 'raofin' OR email = 'hello@raofin.net')
AND pass LIKE binary 'asdF';

UPDATE bearburger.users
SET username=$_POST['username'], email=$_POST['email'], email=$_POST['password'], email=$_POST['phone']
WHERE email=$_SESSION['email'];

INSERT INTO `foods` (`id`, `catagory`, `title`, `description`, `price`) VALUES (NULL, 'Burger', 'Cheese Burger', 'Prepared with beef patty, cheese, burger sauce, pickles & onion', '650');
INSERT INTO `foods` (`id`, `catagory`, `title`, `description`, `price`) VALUES (NULL, 'Burger', 'Bacon Cheese Burger', 'Prepared with beef patty, 2 slices cheese, bacon & burger sauce', '500');
INSERT INTO `foods` (`id`, `catagory`, `title`, `description`, `price`) VALUES (NULL, 'Burger', 'Double Cheese Burger', 'Prepared with 2 beef patties, double cheese, burger sauce, pickles & onion', '640');
INSERT INTO `foods` (`id`, `catagory`, `title`, `description`, `price`) VALUES (NULL, 'Burger', 'Lil Smoke', 'Prepared with beef patty, cheese, bbq sauce, burger sauce, pickles & onion', '160');
INSERT INTO `foods` (`id`, `catagory`, `title`, `description`, `price`) VALUES (NULL, 'Burger', 'Big Smoke', 'Prepared with 2 beef patties, 2 slices cheese, bbq sauce, burger sauce & onion', '280');
INSERT INTO `foods` (`id`, `catagory`, `title`, `description`, `price`) VALUES (NULL, 'Burger', 'juicy Burger', 'Prepared with potato juice, beef patties, double cheese & burger sauce', '960');
                                                                                
INSERT INTO `foods` (`id`, `catagory`, `title`, `description`, `price`) VALUES (NULL, 'Pizza', 'Chicken Chunky Fire Pizza', 'Topped with black olive, tomato, capsicum & green chili', '510');
INSERT INTO `foods` (`id`, `catagory`, `title`, `description`, `price`) VALUES (NULL, 'Pizza', 'BBQ Chicken Pizza', 'Topped with grilled chicken, bbq sauce & mozzarella cheese', '240');
INSERT INTO `foods` (`id`, `catagory`, `title`, `description`, `price`) VALUES (NULL, 'Pizza', 'Chicken Meatball Pizza', 'Topped with chicken meatball, tomato sauce & mozzarella cheese', '960');
INSERT INTO `foods` (`id`, `catagory`, `title`, `description`, `price`) VALUES (NULL, 'Pizza', 'Chicken Tikka Pizza', 'Topped with chicken tikka, tomato sauce & mozzarella cheese', '350');
INSERT INTO `foods` (`id`, `catagory`, `title`, `description`, `price`) VALUES (NULL, 'Pizza', 'Beef Meatball Pizza', 'Prepared with frank sausage, bacon, scallion, bbq sauce & cheddar cheese', '560');
INSERT INTO `foods` (`id`, `catagory`, `title`, `description`, `price`) VALUES (NULL, 'Pizza', 'Vegetable Pizza', 'Topped with capsicum, mushroom, sweet corn, onion & black olive', '480');

-- pasta catagory
INSERT INTO foods (catagory, title, description, price) VALUES ('Pasta', 'Ovenbaked Pasta', 'Topped with black olive, chicken ,capsicum & green chili', '450');
INSERT INTO foods (catagory, title, description, price) VALUES ('Pasta', 'BBQ Grill Chicken Pasta', 'Topped with grilled chicken, bbq sauce & mozzarella cheese', '340');
INSERT INTO foods (catagory, title, description, price) VALUES ('Pasta', 'Lasagnia', 'Topped with chicken & spices', '460');
INSERT INTO foods (catagory, title, description, price) VALUES ('Pasta', 'Seafood Pasta', 'Topped with seafood & mushroom', '350');
INSERT INTO foods (catagory, title, description, price) VALUES ('Pasta', 'American Mac & cheese', 'Topped with macarony & mozzarella cheese', '560');


-- salad catagory
INSERT INTO foods (catagory, title, description, price) VALUES ('Salad', 'Cashewnut salad', 'Topped with cashew nout and veggies', '310');
INSERT INTO foods (catagory, title, description, price) VALUES ('Salad', 'Seafood salad', 'Topped with seafood and lots of veggies and virgin olive oil', '360');
INSERT INTO foods (catagory, title, description, price) VALUES ('Salad', 'Grilled Chicken salad', 'Topped with chicken and secret spice ', '310');
INSERT INTO foods (catagory, title, description, price) VALUES ('Salad', 'Russian Salad', 'Authentic russian taste with lots of vegies and secret sauce', '370');
INSERT INTO foods (catagory, title, description, price) VALUES ('Salad', 'Korean Beef salad', 'Made with beed in korean spice and sauce', '560');

-- drinks catagory
INSERT INTO foods (catagory, title, description, price) VALUES ('Drinks', 'Lemonade', 'taste of fresh lemon and freshness', '110');
INSERT INTO foods (catagory, title, description, price) VALUES ('Drinks', 'Mango Smoothie', 'Tate of mangoes infused with cream and milk', '270');
INSERT INTO foods (catagory, title, description, price) VALUES ('Drinks', 'Iced lemon tea', 'Lemon tea but with chilled ice', '200');
INSERT INTO foods (catagory, title, description, price) VALUES ('Drinks', 'Lemon lassi', 'Taste of lassi with tanginess of lemon', '170');
INSERT INTO foods (catagory, title, description, price) VALUES ('Drinks', 'Milk shake', 'Taste of heavy cream and milk', '140');

-- coffee catagory
INSERT INTO foods (catagory, title, description, price) VALUES ('Coffee', 'Espresso', 'Shots of pure coffe', '120');
INSERT INTO foods (catagory, title, description, price) VALUES ('Coffee', 'Cappuccino', 'Shots of pure coffe induced milk', '260');
INSERT INTO foods (catagory, title, description, price) VALUES ('Coffee', 'Americano', 'SHots of pure Coffee in American style ', '310');
INSERT INTO foods (catagory, title, description, price) VALUES ('Coffee', 'Latte', '30% coffe with heavy milk ', '370');

-- desert catagory
INSERT INTO foods (catagory, title, description, price) VALUES ('Desert', 'Brownie', 'Mix of chocolate and magic', '130');
INSERT INTO foods (catagory, title, description, price) VALUES ('Desert', 'Red velvet', 'Magic of bakery in red color', '260');
INSERT INTO foods (catagory, title, description, price) VALUES ('Desert', 'Choco fudge', 'Chocolate cheese and creaminess ', '190');
INSERT INTO foods (catagory, title, description, price) VALUES ('Desert', 'Oreo and cheese', 'Crunchy oreo crust and cremy cheese filling', '190');
INSERT INTO foods (catagory, title, description, price) VALUES ('Desert', 'Blueberry Cheese Dip', 'Mix of bluberry cheesy filling', '170');

-- sides catagory
INSERT INTO foods (catagory, title, description, price) VALUES ('Sides', 'Medium French Fry', 'Delicious french fry in medium', '90');
INSERT INTO foods (catagory, title, description, price) VALUES ('Sides', 'Large French Fry', 'Delicious french fry in large', '110');
INSERT INTO foods (catagory, title, description, price) VALUES ('Sides', 'Chicken Fingers', 'Chicken fried in finger sized', '130');
INSERT INTO foods (catagory, title, description, price) VALUES ('Sides', 'Naga Drumsticks', 'You like it HOT!! Its for you', '120');