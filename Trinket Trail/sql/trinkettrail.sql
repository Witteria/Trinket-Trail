-- Create a database
CREATE DATABASE trinket_trail;

-- Use the created database
USE trinket_trail;

-- Create Customers table
CREATE TABLE Customers (
    CustomerID INT PRIMARY KEY,
    FirstName VARCHAR(50),
    LastName VARCHAR(50),
    Username VARCHAR(50) NOT NULL,
    Email VARCHAR(254),
    Phone VARCHAR(20),
    Password VARCHAR(100) NOT NULL
);

-- Create Products table
CREATE TABLE Products (
    ProductID INT PRIMARY KEY,
    ProductName VARCHAR(100),
    Description VARCHAR(3000),
    Price DECIMAL(10, 2)
);

-- Create Orders table
CREATE TABLE Orders (
    OrderID INT PRIMARY KEY,
    CustomerID INT,
    OrderDate DATE,
    FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID)
);

-- Create OrderDetails table
CREATE TABLE OrderDetails (
    OrderDetailID INT PRIMARY KEY,
    OrderID INT,
    ProductID INT,
    Quantity INT,
    Price DECIMAL(10, 2),
    FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID)
);

--- Edit the username and password
CREATE USER 'username'@'localhost' IDENTIFIED BY 'password';
GRANT Alter ON trinket_trail.* TO 'username'@'localhost';
GRANT Create ON trinket_trail.* TO 'username'@'localhost';
GRANT Create view ON trinket_trail.* TO 'username'@'localhost';
GRANT Delete ON trinket_trail.* TO 'username'@'localhost';
GRANT Drop ON trinket_trail.* TO 'username'@'localhost';
GRANT Grant option ON trinket_trail.* TO 'username'@'localhost';
GRANT Index ON trinket_trail.* TO 'username'@'localhost';
GRANT Insert ON trinket_trail.* TO 'username'@'localhost';
GRANT References ON trinket_trail.* TO 'username'@'localhost';
GRANT Select ON trinket_trail.* TO 'username'@'localhost';
GRANT Show view ON trinket_trail.* TO 'username'@'localhost';
GRANT Trigger ON trinket_trail.* TO 'username'@'localhost';
GRANT Update ON trinket_trail.* TO 'username'@'localhost';
