<?php 
$conn = mysqli_connect("localhost", "root", "123456");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

$db = mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS rush00");
echo "Successfully db created \n";

$conn = mysqli_connect("localhost", "root", "123456", "rush00");

$tableItems = mysqli_query($conn, "CREATE TABLE IF NOT EXISTS items(
    `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `type` varchar (100) NOT NULL,
    `model` varchar (100) NOT NULL, 
    `description` varchar (300) NOT NULL,
    `price`int (100) NOT NULL, 
    `img` varchar(500) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8");

$tableUsers = mysqli_query($conn, "CREATE TABLE IF NOT EXISTS `users`(
  `id` int (10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar (50) NOT NULL,
  `login` varchar (50) not null,
  `email` varchar (50) not null,
  `password` varchar (100) default null,
  primary key (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8");



?>