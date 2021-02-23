DROP DATABASE IF EXISTS MVC_Pattern_Basics;
CREATE DATABASE IF NOT EXISTS MVC_Pattern_Basics;

USE MVC_Pattern_Basics;

SELECT 'CREATING DATABASE STRUCTURE' as 'INFO';



DROP TABLE IF EXISTS employees,
                    products,
                    sales;

/*!50503 set default_storage_engine = InnoDB */;
/*!50503 select CONCAT('storage engine: ', @@default_storage_engine) as INFO */;

CREATE TABLE employees (
    emp_no      INT             NOT NULL AUTO_INCREMENT,
    first_name  VARCHAR(14)     NOT NULL,
    last_name   VARCHAR(16)     NOT NULL,
    gender      ENUM ('M','F')  NOT NULL,
    PRIMARY KEY (emp_no)
);

CREATE TABLE products (
    prod_no      INT             NOT NULL AUTO_INCREMENT,
    prod_name    VARCHAR(40)     NOT NULL UNIQUE,
    sell_price   INT             NOT NULL,
    PRIMARY KEY (prod_no)
);

CREATE TABLE sales(
    sale_no     INT             NOT NULL AUTO_INCREMENT,
    emp_no      INT             NOT NULL,
    prod_no     INT             NOT NULL,
    quantity    INT             NOT NULL,
    FOREIGN KEY (emp_no) REFERENCES employees (emp_no),
    FOREIGN KEY (prod_no) REFERENCES products (prod_no),
    PRIMARY KEY (sale_no, emp_no, prod_no)
)


INSERT INTO employees (first_name, last_name, gender) VALUES
('Mary', 'Rich', 'F'),
('Adam', 'Anthony', 'M'),
('Laith', 'Perry', 'F'),
('Malcolm', 'Weeks', 'M'),
('Jerome', 'Lewis', 'M'),
('Reuben', 'Montgomery', 'M'),
('Bruce', 'Salas', 'M'),
('Jesse', 'Clay', 'F'),
('Stewart', 'Tate', 'M'),
('Ezra', 'Figueroa', 'F'),
('Mary', 'Adams', 'F'),
('William', 'Young', 'M'),
('Dora', 'Flowers', 'F'),
('Richard', 'Jacobs', 'M'),
('Kyle', 'Hull', 'F'),
('Adam', 'Tailor', 'F');

INSERT INTO products (prod_name, sell_price) VALUES
('Food truck', 2000),
('Clownfish', 5),
('Laptop Hacendado', 500),
('Racehorse', 10000),
('Management Software',  800);

INSERT INTO sales (emp_no, prod_no, quantity) VALUES
(2, 2, 1),
(3, 3, 4),
(6, 1, 2),
(8, 4, 1),
(8, 2, 10);