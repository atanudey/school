-- MySQL Script generated by MySQL Workbench
-- 08/24/16 18:50:03
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema educare_db
-- -----------------------------------------------------
-- Students Security System

-- -----------------------------------------------------
-- Schema educare_db
--
-- Students Security System
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `educare_db` ;
USE `educare_db` ;

-- -----------------------------------------------------
-- Table `educare_db`.`School`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `educare_db`.`School` ;

CREATE TABLE IF NOT EXISTS `educare_db`.`School` (
  `ID` VARCHAR(7) NOT NULL COMMENT 'Like: \'SC00001\'',
  `School_Name` VARCHAR(60) NOT NULL,
  `Description` NVARCHAR(1000) NULL,
  `Address1` VARCHAR(45) NULL,
  `Address2` VARCHAR(45) NULL,
  `State` VARCHAR(30) NULL,
  `Pin` VARCHAR(7) NULL,
  `No_Of_Students` INT(11) NULL,
  `No_Of_Machines` INT(11) NULL,
  `Event_Active` TINYINT(4) NULL DEFAULT 0 COMMENT '1 or 0',
  `Added_On` DATETIME NULL,
  `Updated_On` DATETIME NULL,
  `Updated_By` INT(11) NULL,
  `Is_Deleted` INT NULL DEFAULT 0 COMMENT '0 = No\n1 = Yes',
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `educare_db`.`User_Type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `educare_db`.`User_Type` ;

CREATE TABLE IF NOT EXISTS `educare_db`.`User_Type` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Type_Name` VARCHAR(20) NULL COMMENT '1. School\n2. Gurdian\n3. Agent\n4. Admin\n5. Company',
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `educare_db`.`Login`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `educare_db`.`Login` ;

CREATE TABLE IF NOT EXISTS `educare_db`.`Login` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(60) NULL,
  `User_ID` VARCHAR(20) NOT NULL,
  `Password` VARCHAR(16) NOT NULL,
  `Is_Admin` TINYINT(4) NULL DEFAULT 0,
  `Email` VARCHAR(60) NULL,
  `Mob1` VARCHAR(13) NULL,
  `Address` VARCHAR(60) NULL,
  `City` VARCHAR(45) NULL,
  `State` VARCHAR(45) NULL,
  `ZipCode` BIGINT(20) NULL,
  `School_ID` VARCHAR(7) NULL COMMENT 'School_ID field will be blank or \'0\', if the user type is not school.',
  `User_Type_ID` INT NOT NULL,
  `Added_On` DATETIME NULL,
  `Updated_On` DATETIME NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_Login_User_Type1_idx` (`User_Type_ID` ASC),
  CONSTRAINT `fk_Login_User_Type1`
    FOREIGN KEY (`User_Type_ID`)
    REFERENCES `educare_db`.`User_Type` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `educare_db`.`Event`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `educare_db`.`Event` ;

CREATE TABLE IF NOT EXISTS `educare_db`.`Event` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(60) NOT NULL,
  `Description` VARCHAR(600) NULL,
  `Message` VARCHAR(160) NULL,
  `Date` DATE NULL,
  `School_ID` VARCHAR(7) NOT NULL,
  `Added_On` DATETIME NULL,
  `Updated_On` DATETIME NULL,
  `Updated_By` INT(11) NULL,
  `Is_Deleted` INT NULL DEFAULT 0 COMMENT '0 = No\n1 = Yes',
  PRIMARY KEY (`ID`),
  INDEX `fk_Event_School1_idx` (`School_ID` ASC),
  CONSTRAINT `fk_Event_School1`
    FOREIGN KEY (`School_ID`)
    REFERENCES `educare_db`.`School` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `educare_db`.`Class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `educare_db`.`Class` ;

CREATE TABLE IF NOT EXISTS `educare_db`.`Class` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(20) NOT NULL,
  `Section` VARCHAR(20) NOT NULL,
  `School_ID` VARCHAR(7) NOT NULL,
  `Added_On` DATETIME NULL,
  `Updated_On` DATETIME NULL,
  `Updated_By` INT(11) NULL,
  `Is_Deleted` INT NULL DEFAULT 0 COMMENT '0 = No\n1 = Yes',
  PRIMARY KEY (`ID`),
  INDEX `fk_Class_School1_idx` (`School_ID` ASC),
  CONSTRAINT `fk_Class_School1`
    FOREIGN KEY (`School_ID`)
    REFERENCES `educare_db`.`School` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `educare_db`.`School_Timing`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `educare_db`.`School_Timing` ;

CREATE TABLE IF NOT EXISTS `educare_db`.`School_Timing` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `IN_OUT` VARCHAR(3) NOT NULL COMMENT 'IN/OUT',
  `Cut_Off_Time` TIME NOT NULL,
  `GressTime_To_InOut` VARCHAR(8) NULL,
  `Class_ID` INT NOT NULL,
  `School_ID` VARCHAR(7) NOT NULL,
  `Added_On` DATETIME NULL,
  `Updated_On` DATETIME NULL,
  `Updated_By` INT(11) NULL,
  `Is_Deleted` INT NULL DEFAULT 0 COMMENT '0 = No\n1 = Yes',
  PRIMARY KEY (`ID`),
  INDEX `fk_School_Timing_Class1_idx` (`Class_ID` ASC),
  INDEX `fk_School_Timing_School1_idx` (`School_ID` ASC),
  CONSTRAINT `fk_School_Timing_Class1`
    FOREIGN KEY (`Class_ID`)
    REFERENCES `educare_db`.`Class` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_School_Timing_School1`
    FOREIGN KEY (`School_ID`)
    REFERENCES `educare_db`.`School` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `educare_db`.`Candidate_Type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `educare_db`.`Candidate_Type` ;

CREATE TABLE IF NOT EXISTS `educare_db`.`Candidate_Type` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Type_Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `educare_db`.`SC00001_Candidate`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `educare_db`.`SC00001_Candidate` ;

CREATE TABLE IF NOT EXISTS `educare_db`.`SC00001_Candidate` (
  `Candidate_ID` INT(11) NOT NULL,
  `RFID_NO` VARCHAR(20) NOT NULL,
  `Roll_No` INT(11) NOT NULL,
  `Candidate_Name` VARCHAR(45) NOT NULL,
  `Address1` VARCHAR(60) NULL,
  `Address2` VARCHAR(60) NULL,
  `State` VARCHAR(30) NULL,
  `Pin` VARCHAR(7) NULL,
  `Gurdian_Name` VARCHAR(45) NOT NULL,
  `Email_ID` VARCHAR(60) NULL,
  `Image_Name` VARCHAR(20) NULL COMMENT 'Candidate Passport Image Name',
  `Mob1` VARCHAR(15) NOT NULL,
  `Mob2` VARCHAR(15) NULL,
  `Blood_Group` VARCHAR(10) NULL,
  `Gender` VARCHAR(6) NULL,
  `Age` SMALLINT(6) NULL,
  `Is_Admin` TINYINT(4) NULL DEFAULT 0,
  `IN_OUT` VARCHAR(3) NULL COMMENT 'IN/OUT',
  `School_ID` VARCHAR(7) NOT NULL,
  `Class_ID` INT(11) NOT NULL,
  `Candidate_Type_ID` INT(11) NOT NULL,
  `Added_On` DATETIME NULL,
  `Updated_On` DATETIME NULL,
  `Updated_By` INT(11) NULL,
  `Is_Deleted` INT NULL DEFAULT 0 COMMENT '0 = No\n1 = Yes',
  PRIMARY KEY (`Candidate_ID`),
  INDEX `fk_SC0001_Candidate_School1_idx` (`School_ID` ASC),
  INDEX `fk_SC0001_Candidate_Class1_idx` (`Class_ID` ASC),
  INDEX `fk_SC0001_Candidate_Candidate_Type1_idx` (`Candidate_Type_ID` ASC),
  CONSTRAINT `fk_SC0001_Candidate_School1`
    FOREIGN KEY (`School_ID`)
    REFERENCES `educare_db`.`School` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SC0001_Candidate_Class1`
    FOREIGN KEY (`Class_ID`)
    REFERENCES `educare_db`.`Class` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SC0001_Candidate_Candidate_Type1`
    FOREIGN KEY (`Candidate_Type_ID`)
    REFERENCES `educare_db`.`Candidate_Type` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `educare_db`.`SC00001_Attendance`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `educare_db`.`SC00001_Attendance` ;

CREATE TABLE IF NOT EXISTS `educare_db`.`SC00001_Attendance` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Date` DATE NOT NULL,
  `Time` TIME NOT NULL,
  `IN_OUT` VARCHAR(3) NULL COMMENT 'IN/OUT',
  `SC0001_Candidate_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_SC0001_Attendance_SC0001_Candidate1_idx` (`SC0001_Candidate_ID` ASC),
  CONSTRAINT `fk_SC0001_Attendance_SC0001_Candidate1`
    FOREIGN KEY (`SC0001_Candidate_ID`)
    REFERENCES `educare_db`.`SC00001_Candidate` (`Candidate_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `educare_db`.`Screen_Master`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `educare_db`.`Screen_Master` ;

CREATE TABLE IF NOT EXISTS `educare_db`.`Screen_Master` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Screen_Name` VARCHAR(40) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `educare_db`.`User_Privilege`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `educare_db`.`User_Privilege` ;

CREATE TABLE IF NOT EXISTS `educare_db`.`User_Privilege` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Is_Active` TINYINT(4) NULL DEFAULT 0,
  `Remarks` VARCHAR(45) NULL,
  `Screen_Master_ID` INT(11) NOT NULL,
  `User_Type_ID` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_User_Privilege_Screen_Master1_idx` (`Screen_Master_ID` ASC),
  INDEX `fk_User_Privilege_User_Type1_idx` (`User_Type_ID` ASC),
  CONSTRAINT `fk_User_Privilege_Screen_Master1`
    FOREIGN KEY (`Screen_Master_ID`)
    REFERENCES `educare_db`.`Screen_Master` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_Privilege_User_Type1`
    FOREIGN KEY (`User_Type_ID`)
    REFERENCES `educare_db`.`User_Type` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `educare_db`.`School_Days`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `educare_db`.`School_Days` ;

CREATE TABLE IF NOT EXISTS `educare_db`.`School_Days` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Month` VARCHAR(10) NOT NULL,
  `Month_Days` INT NULL,
  `Month_Off_Days` INT NULL,
  `Extra_Leave` INT NULL,
  `Remarks` VARCHAR(100) NULL,
  `School_ID` VARCHAR(7) NOT NULL,
  `Added_On` DATETIME NULL,
  `Updated_On` DATETIME NULL,
  `Updated_By` INT(11) NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_School_Days_School1_idx` (`School_ID` ASC),
  CONSTRAINT `fk_School_Days_School1`
    FOREIGN KEY (`School_ID`)
    REFERENCES `educare_db`.`School` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `educare_db`.`School_Notice`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `educare_db`.`School_Notice` ;

CREATE TABLE IF NOT EXISTS `educare_db`.`School_Notice` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Title` VARCHAR(25) NULL,
  `Description` VARCHAR(100) NULL,
  `Upload_File_Name` VARCHAR(45) NULL,
  `School_ID` VARCHAR(7) NOT NULL,
  `Added_On` DATETIME NULL,
  `Updated_On` DATETIME NULL,
  `Updated_By` INT(11) NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_School_Notice_School1_idx` (`School_ID` ASC),
  CONSTRAINT `fk_School_Notice_School1`
    FOREIGN KEY (`School_ID`)
    REFERENCES `educare_db`.`School` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `educare_db`.`School_PointOfContact`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `educare_db`.`School_PointOfContact` ;

CREATE TABLE IF NOT EXISTS `educare_db`.`School_PointOfContact` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `PointOfContact_Name` VARCHAR(60) NOT NULL,
  `Address` VARCHAR(60) NULL,
  `Mob1` VARCHAR(15) NULL,
  `Mob2` VARCHAR(15) NULL,
  `Email_ID` VARCHAR(60) NULL,
  `School_ID` VARCHAR(7) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_School_PointOfContact_School1_idx` (`School_ID` ASC),
  CONSTRAINT `fk_School_PointOfContact_School1`
    FOREIGN KEY (`School_ID`)
    REFERENCES `educare_db`.`School` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
