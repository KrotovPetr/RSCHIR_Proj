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

CREATE TABLE IF NOT EXISTS catalog (
                                       ID INT(11) NOT NULL AUTO_INCREMENT,
                                       product_name TEXT NOT NULL,
                                       product_desc TEXT NOT NULL,
                                       product_price INT(11) NOT NULL,
                                       PRIMARY KEY (ID)
);

INSERT INTO catalog (`product_name`, `product_desc`, `product_price`)
SELECT * FROM (SELECT 'Веник', 'Связка прутьев или веток, используемая для подметания помещений, но иногда и уличных территорий. Прежде употреблялся также для чистки одежды, для опрыскивания водой белья или цветов.', 70) AS tmp
WHERE NOT EXISTS (
        SELECT product_name FROM catalog WHERE product_name = 'Веник'
    ) LIMIT 1;

INSERT INTO catalog (`product_name`, `product_desc`, `product_price`)
SELECT * FROM (SELECT 'Корзина', 'Корзина для мусора', 100) AS tmp
WHERE NOT EXISTS (
        SELECT product_name FROM catalog WHERE product_name = 'Корзина'
    ) LIMIT 1;

INSERT INTO catalog (`product_name`, `product_desc`, `product_price`)
SELECT * FROM (SELECT 'Дрель', 'Ручной, пневматический или электрический инструмент, предназначенный для придачи вращательного движения сверлу или другому режущему инструменту для сверления отверстий в различных материалах при проведении строительных, отделочных, столярных, слесарных и других работ.', 5600) AS tmp
WHERE NOT EXISTS (
        SELECT product_name FROM catalog WHERE product_name = 'Дрель'
    ) LIMIT 1;

INSERT INTO catalog (`product_name`, `product_desc`, `product_price`)
SELECT * FROM (SELECT 'Краска', 'Краска для стен', 500) AS tmp
WHERE NOT EXISTS (
        SELECT product_name FROM catalog WHERE product_name = 'Краска'
    ) LIMIT 1;

INSERT INTO catalog (`product_name`, `product_desc`, `product_price`)
SELECT * FROM (SELECT 'Шпатель', 'Шпатель для штукатурки', 100) AS tmp
WHERE NOT EXISTS (
        SELECT product_name FROM catalog WHERE product_name = 'Шпатель'
    ) LIMIT 1;

INSERT INTO catalog (`product_name`, `product_desc`, `product_price`)
SELECT * FROM (SELECT 'Шуруповерт', 'Шуруповерт для болтов', 3000) AS tmp
WHERE NOT EXISTS (
        SELECT product_name FROM catalog WHERE product_name = 'Шуруповерт'
    ) LIMIT 1;

INSERT INTO catalog (`product_name`, `product_desc`, `product_price`)
SELECT * FROM (SELECT 'Шпатлевка', 'Шпатлевка для стен', 200) AS tmp
WHERE NOT EXISTS (
        SELECT product_name FROM catalog WHERE product_name = 'Шпатлевка'
    ) LIMIT 1;

INSERT INTO catalog (`product_name`, `product_desc`, `product_price`)
SELECT * FROM (SELECT 'Шуруп', 'Шуруп для болтов', 10) AS tmp
WHERE NOT EXISTS (
        SELECT product_name FROM catalog WHERE product_name = 'Шуруп'
    ) LIMIT 1;

INSERT INTO catalog (`product_name`, `product_desc`, `product_price`)
SELECT * FROM (SELECT 'Болт', 'Болт для шуруповерта', 20) AS tmp
WHERE NOT EXISTS (
        SELECT product_name FROM catalog WHERE product_name = 'Болт'
    ) LIMIT 1;
