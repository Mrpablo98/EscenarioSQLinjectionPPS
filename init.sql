-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS ecommerce_db;
USE ecommerce_db;

-- Crear la tabla de usuarios
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50)
);

-- Insertar usuarios de ejemplo
INSERT INTO users (username, password) VALUES ('user1', 'password1');
INSERT INTO users (username, password) VALUES ('user2', 'password2');

-- Crear la tabla de productos
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    description TEXT,
    price DECIMAL(10, 2)
);

-- Insertar productos de ejemplo
INSERT INTO products (name, description, price) VALUES ('Product 1', 'Description of Product 1', 10.99);
INSERT INTO products (name, description, price) VALUES ('Product 2', 'Description of Product 2', 19.99);
INSERT INTO products (name, description, price) VALUES ('Laptop HP Pavilion', '15.6-inch, Intel Core i5, 8GB RAM, 256GB SSD', 799.99);
INSERT INTO products (name, description, price) VALUES ('Samsung Galaxy S22', '6.5-inch display, 128GB storage, 5G capable', 999.00);
INSERT INTO products (name, description, price) VALUES ('Nike Air Zoom Pegasus 38', 'Men\'s running shoes, breathable mesh, cushioned support', 129.99);
INSERT INTO products (name, description, price) VALUES ('Apple iPad Pro', '11-inch, 256GB, Wi-Fi, Space Gray', 899.00);
INSERT INTO products (name, description, price) VALUES ('Sony WH-1000XM4', 'Wireless noise-canceling headphones, 30-hour battery life', 349.99);