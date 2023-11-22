-- Create a database
CREATE DATABASE UserAuth;

-- Use the created database
USE UserAuth;

-- Table for user credentials (login)
CREATE TABLE UserLogin (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(25) NOT NULL,
    Password VARCHAR(100) NOT NULL
);

-- Table for signup details
CREATE TABLE UserSignup (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(50) NOT NULL,
    Email VARCHAR(100) NOT NULL
);
