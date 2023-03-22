-- Create database
CREATE DATABASE store;

-- Use database
USE store;

-- Create table for adresses
CREATE TABLE addresses (
    user INT(11) PRIMARY KEY,
    country TEXT NOT NULL,
    state TEXT NOT NULL,
    street TEXT NOT NULL,
    number TEXT NOT NULL
);

-- Create table for categories
CREATE TABLE categories (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name TEXT NOT NULL
);

-- Create table for orders
CREATE TABLE orders (
    id INT(11) PRIMARY KEY,
    user INT(11) NOT NULL,
    products TEXT NOT NULL,
    status INT(11) NOT NULL,
    pdf BLOB NOT NULL,
    date_added DATETIME default CURRENT_TIMESTAMP
)

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
    price INT(11) NOT NULL,
    image TEXT NOT NULL
);

-- Create table for users
CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    email TEXT NOT NULL,
    password VARCHAR(128) NOT NULL,
    cart TEXT NOT NULL,
    admin TINYINT(4) NOT NULL
);