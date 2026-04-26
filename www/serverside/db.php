<?php
//mysqli object - i = instance
$conn = new mysqli("127.0.0.1", "root", "", "nagarjuna_db");

//Testing- - print_r($conn);
if(!$conn) die("Oops! Database connection failed.");
//else echo "OK";

/*
mysqli method
$conn = mysqli_connect("127.0.0.1", "root", "", "db_nagarjuna");

PHP Data Object
$conn = PDO();
*/