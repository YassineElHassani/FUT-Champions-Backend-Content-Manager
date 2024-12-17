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
    playerImage VARCHAR(255),
    playerRating INT NOT NULL,
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


-- INSERTING DATA INTO position TABLE
INSERT INTO nationality () 

--INSERTING DATA INTO club TABLE
INSERT INTO club (clubName, clubLogo) VALUES
('FC Barcelona', 'https://cdn3.futbin.com/content/fifa25/img/clubs/dark/241.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=2e69666cf40b727b95e8a7d9c6f826c0'),
('Manchester United', 'https://cdn3.futbin.com/content/fifa25/img/clubs/dark/11.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=d634f823d355069c2550a1af0508d0b6'),
('Real Madrid', 'https://cdn3.futbin.com/content/fifa25/img/clubs/dark/243.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=bb98e3479ba0959fdb7031ce0834fc3f'),
('Atlético de Madrid', 'https://cdn3.futbin.com/content/fifa25/img/clubs/dark/240.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=c11cce2f95472cd8029518f50f33b072'),
('Arsenal', 'https://cdn3.futbin.com/content/fifa25/img/clubs/dark/1.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=0f5f1b415788c03a743b0d898ccba3af'),
('Bayern Munich', 'https://cdn3.futbin.com/content/fifa25/img/clubs/dark/21.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=e3b8047ca7192b7dcb2ea63bd0d03ce8'),
('Juventus', 'https://cdn3.futbin.com/content/fifa25/img/clubs/dark/45.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=f1f8808346246870756ad5d8228e986d'),
('Chelsea', 'https://cdn3.futbin.com/content/fifa25/img/clubs/dark/5.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=a95904bd7ea09c4e68243f801a89bf88'),
('PSG', 'https://cdn3.futbin.com/content/fifa25/img/clubs/dark/73.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=0f38a396c70909e8d42f5c5df7106dfc'),
('AC Milan', 'https://cdn3.futbin.com/content/fifa25/img/clubs/dark/47.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=a9067499062a84a811320e43ab18a7ab'),
('Liverpool', 'https://cdn3.futbin.com/content/fifa25/img/clubs/dark/9.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=57ffc54f58dce3d534f1cc8447eb70c6'),
('Manchester City', 'https://cdn3.futbin.com/content/fifa25/img/clubs/dark/10.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=95cbb451617b845465701b79e8fbc3a7'),
('Inter Milan', 'https://cdn3.futbin.com/content/fifa25/img/clubs/dark/112893.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=d485e05543c5221ff56faa5e1ab9c844'),
('Southampton', 'https://cdn3.futbin.com/content/fifa25/img/clubs/dark/17.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=af314b5587c3cc402cd40784e876a447'),
('Borussia Dortmund', 'https://cdn3.futbin.com/content/fifa25/img/clubs/dark/22.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=610202ab57221514d872d7c05d922e1e'),
('RB Leipzig', 'https://cdn3.futbin.com/content/fifa25/img/clubs/dark/112172.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=c02e0780a50292d3f495e7feade1a040'),
('Schalke 04', 'https://cdn3.futbin.com/content/fifa25/img/clubs/dark/34.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=56cd24df37579679f62b698ac3ae43a6'),
('AS Roma', 'https://cdn3.futbin.com/content/fifa25/img/clubs/dark/52.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=2064ddd0b6eb32fdae1b1b4f4338abdc')


-- INSERTING DATA INTO nationality TABLE
INSERT INTO nationality (nationalityName, nationalityLogo) VALUES
('Brazil', 'https://upload.wikimedia.org/wikipedia/commons/0/05/Flag_of_Brazil.svg'),
('Argentina', 'https://upload.wikimedia.org/wikipedia/commons/1/1a/Flag_of_Argentina.svg'),
('Germany', 'https://upload.wikimedia.org/wikipedia/commons/b/ba/Flag_of_Germany.svg'),
('Spain', 'https://upload.wikimedia.org/wikipedia/commons/9/9a/Flag_of_Spain.svg'),
('France', 'https://upload.wikimedia.org/wikipedia/commons/c/c3/Flag_of_France.svg'),
('Italy', 'https://upload.wikimedia.org/wikipedia/commons/0/03/Flag_of_Italy.svg'),
('Morocco', 'https://upload.wikimedia.org/wikipedia/commons/2/2c/Flag_of_Morocco.svg'),
('England', 'https://cdn3.futbin.com/content/fifa25/img/nation/14.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=fd61715cd36adf0e87e417376744e767'),
('Portugal', 'https://cdn3.futbin.com/content/fifa25/img/nation/38.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=f9463fd3973965923de9e8945e9ca0fe'),
('Switzerland', 'https://cdn3.futbin.com/content/fifa25/img/nation/47.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=42fcb74d34c4bb16d05691a577fce8b7'),
('Belgium', 'https://cdn3.futbin.com/content/fifa25/img/nation/7.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=d637d192ddd27cedb47b9fe38b6ff092'),
('United States', 'https://cdn3.futbin.com/content/fifa25/img/nation/95.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=0b702fb25c991ab4f69369531d597a86'),
('Croatia', 'https://cdn3.futbin.com/content/fifa25/img/nation/10.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=e9e638ef1ccc508be6ac23d7accd7d51'),
('Sweden', 'https://cdn3.futbin.com/content/fifa25/img/nation/46.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=598da3c78c1c9d271fba1dd450958a42'),
('Colombia', 'https://cdn3.futbin.com/content/fifa25/img/nation/56.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=27a700cd51ff8951cdbafbcddae33711'),
('Mexico', 'https://cdn3.futbin.com/content/fifa25/img/nation/83.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=c79296acc36d91c1e27b0b470c3de354'),
('Uruguay', 'https://cdn3.futbin.com/content/fifa25/img/nation/60.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=cce947ae4eba3db3eb30df2232bdc3aa'),
('Chile', 'https://cdn3.futbin.com/content/fifa25/img/nation/55.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=5dc0c902ead8f292527e616605cdcbdf'),
('Denmark', 'https://cdn3.futbin.com/content/fifa25/img/nation/13.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=8cbde4f0113f7c7388cf72224126d00b'),
('Japan', 'https://cdn3.futbin.com/content/fifa25/img/nation/163.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=bfa014f8ed2b28e2d96c3345021a153f');

-- INSERTING DATA INTO player TABLE
INSERT INTO player (playerName, positionID, nationalityID, clubID, playerPace, playerShooting, playerPassing, playerDribbling, playerDefending, playerPhysical, playerImage, playerRating, playerDiving, playerHandling, playerKicking, playerReflexes, playerSpeed, playerPositioning)
VALUES 
('Lionel Messi', 10, 2, 1, 90, 94, 89, 95, 82, 92, 'https://cdn.sofifa.net/players/158/023/25_120.png', 97, 0, 0, 0, 0, 0, 0),
('Cristiano Ronaldo', 10, 9, 3, 88, 93, 92, 86, 90, 95, 'https://cdn.sofifa.net/players/020/801/25_120.png', 96, 0, 0, 0, 0, 0, 0),
('Kylian Mbappé', 9, 5, 9, 76, 84, 90, 82, 79, 87, 'https://cdn.sofifa.net/players/231/747/25_120.png', 84, 0, 0, 0, 0, 0, 0);

-- Query for displaying data in dashboard
SELECT playerName, playerImage, playerPace, playerShooting, playerPassing, playerDribbling, playerDefending, playerPhysical, playerRating, clubLogo, clubName, nationalityName, nationalityLogo, positionName
FROM player 
JOIN club ON player.clubID = club.clubID
JOIN nationality ON player.nationalityID = nationality.nationalityID
JOIN position ON player.playerID = position.positionID;

-- MODIFY COLUMNS
ALTER TABLE player
MODIFY COLUMN playerDiving INT NULL,
MODIFY COLUMN playerHandling INT NULL,
MODIFY COLUMN playerKicking INT NULL,
MODIFY COLUMN playerReflexes INT NULL,
MODIFY COLUMN playerSpeed INT NULL,
MODIFY COLUMN playerPositioning INT NULL,
MODIFY COLUMN playerPace INT NULL,
MODIFY COLUMN playerShooting INT NULL,
MODIFY COLUMN playerPassing INT NULL,
MODIFY COLUMN playerDribbling INT NULL,
MODIFY COLUMN playerDefending INT NULL,
MODIFY COLUMN playerPhysical INT NULL;