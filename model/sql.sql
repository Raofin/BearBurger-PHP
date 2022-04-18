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
        "asdF",
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