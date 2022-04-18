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