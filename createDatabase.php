<?php
// create connection
$conn = new mysqli("localhost", "root", "root");
// detect connection
if ($conn->connect_error)
{
    die("Failed to connect: " . $conn->connect_error);}
    // create database
    $sql = "CREATE DATABASE book";
        if ($conn->query($sql) === TRUE)
        {
        echo "Successfully created database";
        } else {
        echo "Error creating database: " . $conn->error;
        }

    $sql = "USE book";
    if ($conn->query($sql) === TRUE)
    {
        echo "Successfully used database";
    } else {
        echo "Error using database: " . $conn->error;
    }

    $sql = " CREATE TABLE IF NOT EXISTS `admin` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `username` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
      `password` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ";

    if ($conn->query($sql) === TRUE)
    {
        echo "Successfully created table 'admin'";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $sql = " CREATE TABLE IF NOT EXISTS `tb_books` (
      `id` int(10) NOT NULL AUTO_INCREMENT,
      `name` varchar(20) CHARACTER SET utf8 NOT NULL,
      `price` decimal(4,2) NOT NULL,
      `addeddate` datetime NOT NULL,
      `type` varchar(10) CHARACTER SET utf8 NOT NULL,
      `total` int(50) DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ";

    if ($conn->query($sql) === TRUE)
    {
        echo "Successfully created table 'tb_books'";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $sql = "INSERT INTO `admin` (`username`, `password`) VALUES('admin', '123456')";
    if ($conn->query($sql) === TRUE)
    {
        echo "Successfully added user";
    } else {
        echo "Error adding user: " . $conn->error;
    }

    $conn->close();
?>
