-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
 
USE olmadb;

DROP TABLE IF EXISTS olmadb.wrongAnswers ;
DROP TABLE IF EXISTS olmadb.quiz;
DROP TABLE IF EXISTS olmadb.selfie;
DROP TABLE IF EXISTS olmadb.user;
DROP TABLE IF EXISTS olmadb.prize;
DROP TABLE IF EXISTS olmadb.admin ;


-- -----------------------------------------------------
-- Table olmadb.user
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS olmadb.user (
  userID INT NOT NULL AUTO_INCREMENT,
  firstName VARCHAR(45) NOT NULL,
  lastName VARCHAR(45) NOT NULL,
  dob DATE NOT NULL,
  eMail VARCHAR(45) NOT NULL,
  phoneNr VARCHAR(45) NOT NULL,
  postcode VARCHAR(45) NOT NULL,
  city varchar(255) NOT NULL,
  address varchar(255) NOT NULL,
  answerCorrect BOOLEAN NOT NULL,
  PRIMARY KEY (userID))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table olmadb.prize
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS olmadb.prize (
  prizeID INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(45) NOT NULL,
  amount INT(11) NOT NULL,
  worth DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (prizeID))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table olmadb.selfie
-- -----------------------------------------------------
-- DROP TABLE IF EXISTS selfie;
CREATE TABLE IF NOT EXISTS olmadb.selfie (
  selfieID INT NOT NULL AUTO_INCREMENT,
  fk_userID INT NOT NULL,
  image BLOB NOT NULL,
PRIMARY KEY (selfieID),
FOREIGN KEY (fk_userID) REFERENCES user(userID))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table olmadb.quiz
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS olmadb.quiz (
  quizID INT NOT NULL AUTO_INCREMENT,
  question VARCHAR(255) NOT NULL,
  correctAnswer VARCHAR(255) NOT NULL,
  PRIMARY KEY (quizID))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table olmadb.wrongAnswers
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS olmadb.wrongAnswers (
  waID INT NOT NULL AUTO_INCREMENT,
  fk_quizID INT NOT NULL,
  wAnswer1 VARCHAR(255) NOT NULL,
  wAnswer2 VARCHAR(255) NOT NULL,
  wAnswer3 VARCHAR(255) NOT NULL,
  PRIMARY KEY (waID),
  FOREIGN KEY (fk_quizID) REFERENCES quiz(quizID))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table olmadb.admin
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS olmadb.admin (
  adminID INT NOT NULL,
  password VARCHAR(45) NOT NULL,
  PRIMARY KEY (adminID))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
