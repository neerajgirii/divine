-- Create a new database if it doesn't exist
CREATE DATABASE IF NOT EXISTS divineMainDatabase;

-- Use the created database
USE divineMainDatabase;

-- Create the products table
CREATE TABLE IF NOT EXISTS productsNow (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    discount_price DECIMAL(10, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);



-- Insert sample data 
INSERT INTO productsNow (name, image_url, price, discount_price)
VALUES
    ('Ruby Gemstone', 'img/product/p1.jpg', 1500, NULL),
    ('Sapphire Gemstone', 'img/product/p2.jpg', 2500, NULL),
    ('Emerald Gemstone', 'img/product/p3.jpg', 1800, NULL),
    ('Amethyst Gemstone', 'img/product/p4.jpg', 2100, NULL),
    ('Topaz Gemstone', 'img/product/p5.jpg', 3000, NULL),
    ('Opal Gemstone', 'img/product/p6.jpg', 2700, NULL),
    ('Diamond Gemstone', 'img/product/p7.jpg', 50000, NULL),
    ('Pearl Gemstone', 'img/product/p8.jpg', 3500, NULL);
    
-- Create the productsComing table
CREATE TABLE IF NOT EXISTS productsComing (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    price INT NOT NULL,
    discount_price INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert sample data into productsComing
INSERT INTO productsComing (name, image_url, price, discount_price)
VALUES
    ('Ruby Gemstone', 'img/product/p6.jpg', FLOOR(1500 + (RAND() * 48500)), NULL),
    ('Sapphire Gemstone', 'img/product/p8.jpg', FLOOR(1500 + (RAND() * 48500)), NULL),
    ('Emerald Gemstone', 'img/product/p3.jpg', FLOOR(1500 + (RAND() * 48500)), NULL),
    ('Amethyst Gemstone', 'img/product/p5.jpg', FLOOR(1500 + (RAND() * 48500)), NULL),
    ('Topaz Gemstone', 'img/product/p1.jpg', FLOOR(1500 + (RAND() * 48500)), NULL),
    ('Opal Gemstone', 'img/product/p4.jpg', FLOOR(1500 + (RAND() * 48500)), NULL),
    ('Pearl Gemstone', 'img/product/p2.jpg', FLOOR(1500 + (RAND() * 48500)), NULL),
    ('Garnet Gemstone', 'img/product/p7.jpg', FLOOR(1500 + (RAND() * 48500)), NULL);


