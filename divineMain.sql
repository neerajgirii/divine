CREATE DATABASE divineMainDatabase;
USE divineMainDatabase;

CREATE TABLE currentProducts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

INSERT INTO currentProducts (product_name, image_url, price)
VALUES ('Opal', 'images/p-1.png', 10000),
       ('Ruby', 'images/i-2.png', 8000),
       ('Topaz', 'images/i-3.png', 6000);
       
INSERT INTO currentProducts (product_name, image_url, price)
VALUES ('Opal', 'images/i-4.png', 2000);
