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


CREATE TABLE IF NOT EXISTS auth (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    login VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL,
    PRIMARY KEY(ID)
);

INSERT INTO auth (login, password)
VALUES ('admin', '{SHA}0DPiKuNIrrVmD8IUCuw1hQxNqZc=');




-- INSERT INTO users (name, surname)
-- SELECT * FROM (SELECT 'Alex', 'Rover') AS tmp
-- WHERE NOT EXISTS (
--         SELECT name FROM users WHERE name = 'Alex' AND surname = 'Rover'
--     ) LIMIT 1;
--
-- INSERT INTO users (name, surname)
-- SELECT * FROM (SELECT 'Bob', 'Marley') AS tmp
-- WHERE NOT EXISTS (
--         SELECT name FROM users WHERE name = 'Bob' AND surname = 'Marley'
--     ) LIMIT 1;
--
-- INSERT INTO users (name, surname)
-- SELECT * FROM (SELECT 'Alex', 'Rover') AS tmp
-- WHERE NOT EXISTS (
--         SELECT name FROM users WHERE name = 'Alex' AND surname = 'Rover'
--     ) LIMIT 1;
--
-- INSERT INTO users (name, surname)
-- SELECT * FROM (SELECT 'Kate', 'Yandson') AS tmp
-- WHERE NOT EXISTS (
--         SELECT name FROM users WHERE name = 'Kate' AND surname = 'Yandson'
--     ) LIMIT 1;
--
-- INSERT INTO users (name, surname)
-- SELECT * FROM (SELECT 'Lilo', 'Black') AS tmp
-- WHERE NOT EXISTS (
--         SELECT name FROM users WHERE name = 'Lilo' AND surname = 'Black'
--     ) LIMIT 1;