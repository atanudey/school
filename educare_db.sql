-- -----------------------------------------------------
-- Schema educare_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `educare_db` ;
USE `educare_db` ;

-- -----------------------------------------------------
-- Table `educare_db`.`User_Type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `educare_db`.`User_Type` ;

CREATE TABLE IF NOT EXISTS `educare_db`.`User_Type` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Type_Name` VARCHAR(20) NULL COMMENT '1. School\n2. Gurdian\n3. Agent\n4. Admin\n5. Company',
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;

INSERT INTO `user_type` (`ID`, `Type_Name`) VALUES
(1, 'Admin'),
(2, 'School'),
(3, 'Gurdian'),
(4, 'Agent'),
(5, 'Company');

-- -----------------------------------------------------
-- Table `educare_db`.`Login`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `educare_db`.`Login` ;

CREATE TABLE `educare_db`.`login` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(60) DEFAULT NULL,
  `User_ID` varchar(20) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `Is_Admin` tinyint(4) DEFAULT '0',
  `Email` varchar(60) DEFAULT NULL,
  `Mob1` varchar(13) DEFAULT NULL,
  `Address` varchar(60) DEFAULT NULL,
  `City` varchar(45) DEFAULT NULL,
  `State` varchar(45) DEFAULT NULL,
  `ZipCode` bigint(20) DEFAULT NULL,
  `School_ID` varchar(7) DEFAULT NULL COMMENT 'School_ID field will be blank or ''0'', if the user type is not school.',
  `User_Type_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Login_User_Type1_idx` (`User_Type_ID`),
  CONSTRAINT `fk_Login_User_Type1` FOREIGN KEY (`User_Type_ID`) REFERENCES `educare_db`.`user_type` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Alter table for `login`
--

ALTER TABLE  `login` ADD  `created_at` DATETIME NOT NULL AFTER  `User_Type_ID` ,
ADD  `updated_at` DATETIME NOT NULL AFTER  `created_at` ,
ADD  `is_active` TINYINT( 1 ) NOT NULL DEFAULT  '0' AFTER  `updated_at` ,
ADD  `is_deleted` TINYINT( 1 ) NOT NULL DEFAULT  '0' AFTER  `is_active`;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `Name`, `User_ID`, `Password`, `Is_Admin`, `Email`, `Mob1`, `Address`, `City`, `State`, `ZipCode`, `School_ID`, `User_Type_ID`, `created_at`, `updated_at`, `is_active`, `is_deleted`) VALUES
(1, 'Atanu Dey', 'atanu', 'guitar', NULL, 'mratanudey@gmail.com', '9007559769', '17/A Durga Bari Road', 'Kolkata', 'West Bengal', 700028, '1', 2, '2016-08-08 21:17:47', '2016-08-08 21:17:47', 0, 0),
(2, 'Atanu Dey', 'sentu', 'guitar', NULL, 'mratanudey@gmail.com', '8820610094', '17/A Durga Bari Road', 'Kolkata', 'West Bengal', 700028, '1', 2, '2016-08-08 21:20:26', '2016-08-08 21:20:26', 0, 0);

-- --------------------------------------------------------

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
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;

INSERT INTO `school` (`ID`, `School_Name`, `Description`, `Address1`, `Address2`, `State`, `Pin`, `No_Of_Students`, `No_Of_Machines`, `Event_Active`) VALUES ('', 'South Suburban School (Main)', 'Established in 1874. Sir Ashutosh Mukherjee was a student of this school.', 'Bhowanipore', 'Kolkata', 'West Bengal', '700025', '2500', '100', '1');

-- -----------------------------------------------------
-- Table `educare_db`.`Class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `educare_db`.`Class` ;

CREATE TABLE IF NOT EXISTS `educare_db`.`Class` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(20) NOT NULL,
  `Section` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`ID`))
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
  CONSTRAINT `fk_School_PointOfContact_School1`
    FOREIGN KEY (`School_ID`)
    REFERENCES `educare_db`.`School` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_School_PointOfContact_School1_idx` ON `educare_db`.`School_PointOfContact` (`School_ID` ASC);

-- -----------------------------------------------------
-- Table `educare_db`.`Candidate_Type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `educare_db`.`Candidate_Type` ;

CREATE TABLE IF NOT EXISTS `educare_db`.`Candidate_Type` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Type_Name` VARCHAR(45) NOT NULL COMMENT 'Student/Staff' ,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Table `educare_db`.`SC00001_Candidate`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `educare_db`.`SC00001_Candidate` ;

CREATE TABLE IF NOT EXISTS `educare_db`.`SC00001_Candidate` (
  `Candidate_ID` INT(11) NOT NULL,
  `CARD_NO` VARCHAR(20) NOT NULL,
  `Roll_No` INT(11) NOT NULL,
  `Candidate_Name` VARCHAR(45) NOT NULL,
  `Address1` VARCHAR(60) NULL,
  `Address2` VARCHAR(60) NULL,
  `State` VARCHAR(30) NULL,
  `Pin` VARCHAR(7) NULL,
  `Guardian_Name` VARCHAR(45) NOT NULL,
  `Email_ID` VARCHAR(60) NULL,
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
  PRIMARY KEY (`Candidate_ID`),
  INDEX `fk_SC00001_Candidate_School1_idx` (`School_ID` ASC),
  INDEX `fk_SC00001_Candidate_Class1_idx` (`Class_ID` ASC),
  INDEX `fk_SC00001_Candidate_Candidate_Type1_idx` (`Candidate_Type_ID` ASC),
  CONSTRAINT `fk_SC00001_Candidate_School1`
    FOREIGN KEY (`School_ID`)
    REFERENCES `educare_db`.`School` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SC00001_Candidate_Class1`
    FOREIGN KEY (`Class_ID`)
    REFERENCES `educare_db`.`Class` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SC00001_Candidate_Candidate_Type1`
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
  `SC00001_Candidate_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_SC00001_Attendance_SC00001_Candidate1_idx` (`SC00001_Candidate_ID` ASC),
  CONSTRAINT `fk_SC00001_Attendance_SC00001_Candidate1`
    FOREIGN KEY (`SC00001_Candidate_ID`)
    REFERENCES `educare_db`.`SC00001_Candidate` (`Candidate_ID`)
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
  PRIMARY KEY (`ID`),
  INDEX `fk_Event_School1_idx` (`School_ID` ASC),
  CONSTRAINT `fk_Event_School1`
    FOREIGN KEY (`School_ID`)
    REFERENCES `educare_db`.`School` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- CREATE INDEX `fk_Event_School1_idx` ON `educare_db`.`Event` (`School_ID` ASC);

-- -----------------------------------------------------
-- Table `educare_db`.`Screen_Master`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `educare_db`.`Screen_Master` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Screen_Name` VARCHAR(40) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `educare_db`.`User_Privilege`
-- -----------------------------------------------------

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