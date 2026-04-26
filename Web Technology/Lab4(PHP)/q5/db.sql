CREATE DATABASE project;
USE project;

CREATE TABLE registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255),
    phone VARCHAR(20),
    gender VARCHAR(10),
    faculty VARCHAR(50)
);