CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;

CREATE TABLE IF NOT EXISTS users (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  surname VARCHAR(40) NOT NULL,
  password VARCHAR(240) NOT NULL,
  PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS products (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    description VARCHAR(20) NOT NULL,
    price int NOT NULL,
    PRIMARY KEY (ID)
    );

INSERT INTO users (name, surname, password)
VALUES ('admin', 'administratorov','{SHA}0DPiKuNIrrVmD8IUCuw1hQxNqZc=');

INSERT INTO users (name, surname, password)
VALUES ('anotherAdmin', 'administratorov','{SHA}d033e22ae348aeb5660fc2140aec35850c4da997');

INSERT INTO users (name, surname, password)
VALUES ('admin3', 'adminov','{SHA}QV77lL0gK8qvC/dLp1ugXj3Peg=');

INSERT INTO users (name, surname, password)
VALUES ('kakoyto', 'samozvnec','neadminpassword');


INSERT INTO products(description, price)
VALUES ('Hummer', 400);

INSERT INTO products(description, price)
VALUES ('Axe', 720);

INSERT INTO products(description, price)
VALUES ('Paint', 1000);

INSERT INTO products(description, price)
VALUES ('Nails', 30);