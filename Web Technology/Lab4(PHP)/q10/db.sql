CREATE DATABASE library;
USE library;

CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    publisher VARCHAR(255),
    author VARCHAR(100),
    edition VARCHAR(50),
    no_of_page INT,
    price DECIMAL(10, 2),
    publish_date DATE,
    isbn VARCHAR(20)
);