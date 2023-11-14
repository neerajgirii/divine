CREATE DATABASE divinemi_divineMainDatabase;
USE divinemi_divineMainDatabase;

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


CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    category VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    comments INT NOT NULL,
    author VARCHAR(100) NOT NULL
);

INSERT INTO articles (title, content, image_url, category, date, comments, author)
VALUES
    ('Simple and useful HTML layout', 'There is a clickable image with beautiful hover effect and active title link for each post item. Left side is a sticky menu bar. Right side is a blog content that will scroll up and down.', 'img/img-01.jpg', 'Travel . Events', '2020-06-24', 36, 'Admin Nat'),
    ('Another Article Title', 'This is another article content. You can add more sample articles by using similar INSERT statements.', 'img/img-02.jpg', 'Technology', '2020-07-15', 20, 'John Doe'),
    ('Sample Article 3', 'This is the content of the third sample article. You can continue to add more sample data as needed.', 'img/img-03.jpg', 'Fashion', '2020-08-02', 15, 'Jane Smith');

INSERT INTO articles (title, content, image_url, category, date, comments, author)
VALUES ('Sample Article 4', 'This is the content of the third sample article. You can continue to add more sample data as needed.', 'img/img-03.jpg', 'Fashion', '2023-10-15', 15, 'Niraj Giri');

INSERT INTO articles (title, content, image_url, category, date, comments, author)
VALUES ('Sample Article 5', 'This is the content of the third sample article. You can continue to add more sample data as needed.', 'img/img-03.jpg', 'Fashion', '2023-10-16', 15, 'Prakash Ghimire');





-- Create a table for roles
CREATE TABLE roles (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL
);

-- Insert roles into the roles table
INSERT INTO roles (role_name) VALUES
    ('Superadmin'),
    ('Admin'),
    ('User');

-- Create a table for users
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    phone_number VARCHAR(15) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id INT NOT NULL,
    FOREIGN KEY (role_id) REFERENCES roles(role_id),
    accept_terms TINYINT(1) NOT NULL DEFAULT 0
);

INSERT INTO users (full_name, phone_number, password, role_id, accept_terms)
VALUES ('Niraj Giri', '9847950672', '$2y$10$TDq0.FrlhjoJm8WSGu/jBuQVYZVs0osCSFu8kbOTcBv2NNYG.JP5O', 1, 1);

INSERT INTO users (full_name, phone_number, password, role_id, accept_terms)
VALUES ('Prakash Ghimire', '9841516171', '$2y$10$kzGB/TnxxDyWsmbKl8KLwu3PvcaMWVfTgCKIslYHzaztSzOD70.Mu', 2, 1);



SELECT * FROM users;