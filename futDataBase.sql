-- Creation of the data base
CREATE DATABASE futDB;

-- Creation of the club table
USE futDB;
CREATE TABLE club(
    clubID INT PRIMARY KEY AUTO_INCREMENT,
    clubName VARCHAR(100) NOT NULL,
    clubLogo VARCHAR(255) NOT NULL
);

-- Creation of the nationality table
USE futDB;
CREATE TABLE nationality(
    nationalityID INT PRIMARY KEY AUTO_INCREMENT,
    nationalityName VARCHAR(100) NOT NULL,
    nationalityLogo VARCHAR(255) NOT NULL
);