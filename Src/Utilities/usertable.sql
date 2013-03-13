CREATE TABLE User (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50),
    lname VARCHAR(50),
    email VARCHAR(100),
    salt VARCHAR(5),
    password VARCHAR(20)
);
