-- Create table
CREATE TABLE store;

-- Use table
USE store;

-- Create table for categories
CREATE TABLE categories (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name TEXT NOT NULL
);

-- Create table for platforms
CREATE TABLE platforms (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name TEXT NOT NULL
);

-- Create table for products
CREATE TABLE products (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    category INT(11) NOT NULL,
    name TEXT NOT NULL,
    platform INT(11) NOT NULL,
    price DOUBLE(11, 2) NOT NULL,
    images TEXT NOT NULL
);

-- Create table for users
CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    email TEXT NOT NULL,
    password VARCHAR(60) NOT NULL,
    admin TINYINT(1) NOT NULL
);