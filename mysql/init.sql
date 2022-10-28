CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'admin'@'%' IDENTIFIED BY 'admin';
GRANT SELECT,UPDATE,INSERT ON appDB.* TO 'admin'@'%';
FLUSH PRIVILEGES;

USE appDB;
CREATE TABLE IF NOT EXISTS contacts (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    contact VARCHAR(100) NOT NULL,
    type VARCHAR(50) NOT NULL,
    PRIMARY KEY (ID)
    );

INSERT INTO contacts (contact, type)
VALUES
    ('88005553535', 'Phone'),
    ('Tverskaya-Yamskaya str', 'Address'),
    ('109505', 'Index');

CREATE TABLE IF NOT EXISTS workers (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    surname VARCHAR(200) NOT NULL,
    prof VARCHAR(100) NOT NULL,
    PRIMARY KEY (ID)
);

INSERT INTO workers (name, surname, prof)
VALUES
    ('Leon', 'Leonov', 'Pekar-vodolaz'),
    ('Ivan', 'Ivanov', 'Secretar-talisman'),
    ('Tatyana', 'Tatyanova', 'Kassir'),
    ('oleg', 'olegov', 'Director'),
    ('Nicolay', 'Nicolaev', 'Manager');


CREATE TABLE IF NOT EXISTS users (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    login VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL,
    PRIMARY KEY(ID)
);

INSERT INTO users (login, password)
VALUES ('admin', '{SHA}0DPiKuNIrrVmD8IUCuw1hQxNqZc=');

CREATE TABLE IF NOT EXISTS tools (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    product_name TEXT NOT NULL,
    product_desc TEXT NOT NULL,
    product_price INT(11) NOT NULL,
    PRIMARY KEY (ID)
);

INSERT INTO tools (`product_name`, `product_desc`, `product_price`)
SELECT * FROM (SELECT 'Hammer', 'Really good with nails', 70) AS tmp
WHERE NOT EXISTS (
        SELECT product_name FROM tools WHERE product_name = 'Hammer'
    ) LIMIT 1;

INSERT INTO tools (`product_name`, `product_desc`, `product_price`)
SELECT * FROM (SELECT 'Wood Chisels', 'For wood-cutters, Eco-friendly', 100) AS tmp
WHERE NOT EXISTS (
        SELECT product_name FROM tools WHERE product_name = 'Wood chisels'
    ) LIMIT 1;

INSERT INTO tools (`product_name`, `product_desc`, `product_price`)
SELECT * FROM (SELECT 'Utility knife', 'Not for crimes', 1000) AS tmp
WHERE NOT EXISTS (
        SELECT product_name FROM tools WHERE product_name = 'Utility knife'
    ) LIMIT 1;

INSERT INTO tools (`product_name`, `product_desc`, `product_price`)
SELECT * FROM (SELECT 'Saw', 'For best trillers', 100) AS tmp
WHERE NOT EXISTS (
        SELECT product_name FROM tools WHERE product_name = 'Saw'
    ) LIMIT 1;

INSERT INTO tools (`product_name`, `product_desc`, `product_price`)
SELECT * FROM (SELECT 'Sanding block', '.........----......', 100) AS tmp
WHERE NOT EXISTS (
        SELECT product_name FROM tools WHERE product_name = 'Sanding block'
    ) LIMIT 1;

INSERT INTO tools (`product_name`, `product_desc`, `product_price`)
SELECT * FROM (SELECT 'Try Square', '90 degrees - ok!', 1000) AS tmp
WHERE NOT EXISTS (
        SELECT product_name FROM tools WHERE product_name = 'Try square'
    ) LIMIT 1;

INSERT INTO tools (`product_name`, `product_desc`, `product_price`)
SELECT * FROM (SELECT 'Compass', 'For captain Jack Sparrow', 100) AS tmp
WHERE NOT EXISTS (
        SELECT product_name FROM tools WHERE product_name = 'Compass'
    ) LIMIT 1;

INSERT INTO tools (`product_name`, `product_desc`, `product_price`)
SELECT * FROM (SELECT 'Twist bits', 'For Twister game', 100) AS tmp
WHERE NOT EXISTS (
        SELECT product_name FROM tools WHERE product_name = 'Twist bits'
    ) LIMIT 1;


