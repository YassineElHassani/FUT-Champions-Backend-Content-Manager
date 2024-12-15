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

-- Creation of the position table
USE futDB;
CREATE TABLE position(
    positionID INT PRIMARY KEY AUTO_INCREMENT,
    positionName VARCHAR(3) NOT NULL UNIQUE
);

-- Creation of the player table
USE futDB;
CREATE TABLE player(
	playerID INT PRIMARY KEY AUTO_INCREMENT,
    playerName VARCHAR(100) NOT NULL UNIQUE,
    positionID INT NOT NULL,
    nationalityID INT NOT NULL,
    clubID INT NOT NULL,
    playerPace INT NOT NULL,
    playerShooting INT NOT NULL,
    playerPassing INT NOT NULL,
    playerDribbling INT NOT NULL,
    playerDefending INT NOT NULL,
    playerPhysical INT NOT NULL,
    playerDiving INT NOT NULL,
    playerHandling INT NOT NULL,
    playerKicking INT NOT NULL,
    playerReflexes INT NOT NULL,
    playerSpeed INT NOT NULL,
    playerPositioning INT NOT NULL
);


-- FOREIGN KEY positionID
ALTER TABLE `player`
ADD CONSTRAINT `fk_position` FOREIGN KEY (`positionID`) REFERENCES `position`(`positionID`);

-- FOREIGN KEY nationalityID
ALTER TABLE `player`
ADD CONSTRAINT `fk_nationalityID` FOREIGN KEY (`nationalityID`) REFERENCES `nationality`(`nationalityID`);

-- FOREIGN KEY clubID
ALTER TABLE `player`
ADD CONSTRAINT `fk_clubID` FOREIGN KEY (`clubID`) REFERENCES `club`(`clubID`);
