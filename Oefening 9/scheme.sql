-- Create table
CREATE TABLE store;

-- Use table
USE store;

-- Create table for adresses
CREATE TABLE addresses (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user INT(11) NOT NULL,
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
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user INT(11) NOT NULL,
    products TEXT NOT NULL,
    status INT(11) NOT NULL,
    pdf BLOB NOT NULL
    date_added DATETIME NOT NULL
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
    images TEXT NOT NULL
);

-- Create table for users
CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    email TEXT NOT NULL,
    password VARCHAR(60) NOT NULL,
    cart TEXT NOT NULL,
    admin TINYINT(1) NOT NULL
);