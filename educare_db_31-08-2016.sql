-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 30, 2016 at 08:51 PM
-- Server version: 5.5.49-cll-lve
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `educare_db`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `sp_InsertStudentAttendance`$$
CREATE DEFINER=`mydevloper`@`localhost` PROCEDURE `sp_InsertStudentAttendance`(IN `schoolid` VARCHAR(7), IN `RFIdNo` VARCHAR(20), OUT `successmessage` VARCHAR(225))
    NO SQL
BEGIN

DECLARE isSuccess INT1 DEFAULT 0;
DECLARE server_time TIME DEFAULT CURTIME();
DECLARE gress_in_time TIME;
DECLARE current_IN_OUT VARCHAR(3);
DECLARE school_candidate_tblname VARCHAR(18) DEFAULT CONCAT(schoolid, '_Candidate');
DECLARE school_attendance_tblname VARCHAR(18) DEFAULT CONCAT(schoolid, '_Attendance');
DECLARE messageText VARCHAR(160);
DECLARE schoolid_for_where VARCHAR(15);
 
DECLARE Candidate_ID INT;
DECLARE Candidate_Name VARCHAR(45);
DECLARE Guardian_Name VARCHAR(45);
DECLARE Mob1 VARCHAR(15);
DECLARE Gender VARCHAR(6);
DECLARE IN_OUT VARCHAR(3);
DECLARE School_Name VARCHAR(60);
DECLARE Class_ID INT;
DECLARE Cut_Off_Time TIME;
DECLARE GressTime_To_InOut VARCHAR(8);
DECLARE Candidate_Type_Name VARCHAR(10);
DECLARE API_Key VARCHAR(50);
DECLARE Route VARCHAR(20);

DECLARE done INT DEFAULT FALSE;
DECLARE cur_candidate CURSOR FOR SELECT * FROM candidate_vw;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

SET successmessage = '0';
SET schoolid_for_where = CONCAT('''', UPPER(schoolid), '''');
SET @sql_statement = CONCAT('CREATE VIEW candidate_vw AS SELECT sc.Candidate_ID, sc.Candidate_Name, sc.Guardian_Name, sc.Mob1, sc.Gender, sc.IN_OUT, s.School_Name, sc.Class_ID, st.Cut_Off_Time, st.GressTime_To_InOut, ct.Type_Name, sp.API_Key, sp.Route FROM School s JOIN ', school_candidate_tblname, ' sc ON s.ID = sc.School_ID JOIN School_Timing st ON sc.School_ID = st.School_ID AND sc.Class_ID = st.Class_ID AND sc.IN_OUT != st.IN_OUT JOIN Candidate_Type ct ON sc.Candidate_Type_ID = ct.ID JOIN SMS_Provider sp WHERE sp.SMS_Type = ''Transaction'' AND sc.RFID_NO=', RFIdNo, ' AND s.ID=', schoolid_for_where);
-- SET @sql_statement = CONCAT('CREATE VIEW candidate_vw AS SELECT sc.Candidate_ID, sc.Candidate_Name, sc.Gurdian_Name, sc.Mob1, sc.Gender, sc.IN_OUT, s.School_Name, sc.Class_ID, st.Cut_Off_Time, st.GressTime_To_InOut, ct.Type_Name FROM School s JOIN ', school_candidate_tblname, ' sc ON s.ID = sc.School_ID JOIN School_Timing st ON sc.School_ID = st.School_ID AND sc.Class_ID = st.Class_ID AND sc.IN_OUT != st.IN_OUT JOIN Candidate_Type ct ON sc.Candidate_Type_ID = ct.ID WHERE sc.RFID_NO=', RFIdNo, ' AND s.ID=', schoolid_for_where);
PREPARE stmt FROM @sql_statement;	
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

OPEN cur_candidate;

read_loop: LOOP
	FETCH cur_candidate INTO Candidate_ID, Candidate_Name, Guardian_Name, Mob1, Gender, IN_OUT, School_Name, Class_ID, Cut_Off_Time, GressTime_To_InOut, Candidate_Type_Name, API_Key, Route;
	IF done THEN
		LEAVE read_loop;		
    END IF;    
     
	IF(Candidate_ID IS NOT NULL) THEN    
		IF (IN_OUT = 'IN') THEN
			SET current_IN_OUT = 'OUT';
            SET gress_in_time = ADDTIME(Cut_Off_Time, GressTime_To_InOut);  -- Adding Gress Time'00:30:00' with Cut_Off_Time
             
            IF (server_time >= Cut_Off_Time AND server_time <= gress_in_time) THEN
				SET isSuccess = 1;
                
                SET messageText = CONCAT('Your ', if(Gender = '''M''', 'son ', 'daughter '), Candidate_Name, ' has left the school at ', server_time, '.');
			ELSE
				SET isSuccess = 0;
            END IF;
            
		ELSE
			SET current_IN_OUT = 'IN';            
            SET gress_in_time = SUBTIME(Cut_Off_Time, GressTime_To_InOut);  -- Subtracting Gress Time'00:30:00' from Cut_Off_Time
                        
            IF (server_time >= gress_in_time AND server_time <= Cut_Off_Time) THEN
				SET isSuccess = 1;
                SET messageText = CONCAT('Your ', if(Gender = '''M''', 'son ', 'daughter '), Candidate_Name, ' has entered into the school at ', server_time, '.');
			ELSE
				SET isSuccess = 0;
            END IF;            
            
		END IF;        	
            
		IF (isSuccess = 1) THEN            
			# --Update Candidate table for IN_OUT
			SET @sql_statement = CONCAT('UPDATE ', school_candidate_tblname, ' SET IN_OUT=''', current_IN_OUT, ''' WHERE Candidate_ID=', Candidate_ID);            
			PREPARE stmt1 FROM @sql_statement;
			EXECUTE stmt1;
			DEALLOCATE PREPARE stmt1;
                        
			# --Insert record in Attendance table			
            SET @sql_statement = CONCAT('INSERT INTO ', school_attendance_tblname, ' (Candidate_ID, Date, Time, IN_OUT) VALUES (', Candidate_ID, ',''', NOW(), ''', ''', server_time, ''',''', current_IN_OUT,''')');
			PREPARE stmt1 FROM @sql_statement;
			EXECUTE stmt1;
			DEALLOCATE PREPARE stmt1;
            
			IF (Candidate_Type_Name = 'Student') THEN                
                SET successmessage = CONCAT('1|', Mob1, '|', messageText, '|', API_Key, '|', Route);
                -- SET successmessage = CONCAT('1|', Mob1, '|', messageText);				            
            ELSE
				SET successmessage = '1|0';
            END IF;            
                        
		ELSE
            SET successmessage = '0';
		END IF;                    
    ELSE
		SET successmessage = '0';
    END IF;

END LOOP;
Insert into log_sp_execution_test(execution_date, sp_message) values(NOW( ), successmessage);
CLOSE cur_candidate;
-- SELECT successmessage;
DROP VIEW candidate_vw;

END$$

DROP PROCEDURE IF EXISTS `sp_TestOutResult`$$
CREATE DEFINER=`mydevloper`@`localhost` PROCEDURE `sp_TestOutResult`(IN `schoolid` VARCHAR(7), IN `rfidno` VARCHAR(20), INOUT `successmessage` VARCHAR(200))
    NO SQL
BEGIN

SET successmessage = '1|917890801439|Titli has entered into the school on time.';
Insert into log_sp_execution_test(execution_date, sp_message) values(NOW( ), successmessage);
-- SELECT successmessage;

END$$

DROP PROCEDURE IF EXISTS `TESTPROC`$$
CREATE DEFINER=`mydevloper`@`localhost` PROCEDURE `TESTPROC`()
    NO SQL
BEGIN
	INSERT INTO test SET `field1` = NOW(), `field2` = NOW();
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Candidate_Type`
--

DROP TABLE IF EXISTS `Candidate_Type`;
CREATE TABLE IF NOT EXISTS `Candidate_Type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type_Name` varchar(45) NOT NULL COMMENT 'Student/Staff',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Candidate_Type`
--

INSERT INTO `Candidate_Type` (`ID`, `Type_Name`) VALUES
(1, 'Student'),
(2, 'Teacher'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('09110799398f4eb21082fce9ff0049e7be38e90b', '106.76.128.100', 1471417389, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437313431373136333b),
('0c812f18fc369caf994b791c457b7f018ef00597', '45.64.226.238', 1471334855, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437313333343835353b),
('17b2933b68aaba997615031091158235a20264df', '70.213.1.129', 1471478758, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437313437383639333b),
('40064766f9e9bf880996225a03e5146f593e43b0', '45.249.165.38', 1472483451, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323438333435303b),
('50f491408a77a0f89607b310c627737b67112020', '45.64.226.226', 1471783041, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437313738333034303b),
('6e2e305ae680efb7bb999cde2f2d1349323efe68', '144.48.226.7', 1472549425, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323534393432343b),
('6e599576a509ad2b4e84d27a3b876400eab68bc1', '45.64.226.229', 1471416863, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437313431363836333b),
('70f9256a379449d469a097ad6c251c0d2c7dcadf', '115.187.59.229', 1472377693, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323337373639333b),
('866fabbf197a1fd8df2719f3d559b81a0aab5418', '106.76.149.38', 1471418495, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437313431383438323b),
('88f93d672aed434b027fd9a351bbdcf3587f5775', '106.76.153.26', 1471415978, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437313431353937383b),
('8f176d3c8e804be279111c959be38ae9eddeb942', '45.249.165.38', 1472484077, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323438343037373b),
('9db163ba2515245282826caa5e2a65f5f53ad6ce', '106.76.153.26', 1471416117, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437313431363036383b),
('a810dd5386a1828e7f56b68d20e147022f4eab20', '106.78.56.139', 1471780835, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437313738303833353b),
('bb8a75464a4f4c70590756106d59265805b4d5b8', '70.213.1.129', 1471485176, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437313438353137363b),
('c854805a953f07cc5fc7e70c12402dcf6dd0d2bf', '106.76.149.38', 1471418501, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437313431383530313b),
('c937f03da7a8729ff08b0e10d0b19e8824f51ae3', '45.64.226.229', 1471417848, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437313431373537333b),
('d5f6b06c4d01da2118ef2a99a80c527c4f8ed786', '45.64.226.238', 1471328492, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437313332383438383b),
('e72917a585c133bd2fa684f6472e7dd84a7c8b06', '45.64.226.229', 1471418379, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437313431383239373b),
('fa056cd8cfb5b4e3c1eea45a41474aa7712d0986', '45.64.226.229', 1471410621, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437313431303632313b);

-- --------------------------------------------------------

--
-- Table structure for table `Class`
--

DROP TABLE IF EXISTS `Class`;
CREATE TABLE IF NOT EXISTS `Class` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  `Section` varchar(20) NOT NULL,
  `Added_On` timestamp NULL DEFAULT NULL,
  `Updated_On` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Updated_By` int(11) DEFAULT NULL,
  `Is_Deleted` int(11) DEFAULT '0' COMMENT '0 = No\\n1 = Yes',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `Class`
--

INSERT INTO `Class` (`ID`, `Name`, `Section`, `Added_On`, `Updated_On`, `Updated_By`, `Is_Deleted`) VALUES
(1, 'Class 1', 'A', NULL, NULL, NULL, 0),
(2, 'Class 1', 'B', NULL, NULL, NULL, 0),
(3, 'Class 2', 'A', NULL, NULL, NULL, 0),
(4, 'Class 2', 'B', NULL, NULL, NULL, 0),
(5, 'Class 3', 'A', NULL, NULL, NULL, 0),
(6, 'Class 3', 'B', NULL, NULL, NULL, 0),
(7, 'Class 4', 'A', NULL, NULL, NULL, 0),
(8, 'Class 4', 'B', NULL, NULL, NULL, 0),
(9, 'Class 5', 'A', NULL, NULL, NULL, 0),
(10, 'Class 5', 'B', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Event`
--

DROP TABLE IF EXISTS `Event`;
CREATE TABLE IF NOT EXISTS `Event` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(60) NOT NULL,
  `Description` varchar(600) DEFAULT NULL,
  `Message` varchar(160) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `School_ID` varchar(7) NOT NULL,
  `Added_On` timestamp NULL DEFAULT NULL,
  `Updated_On` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Updated_By` int(11) DEFAULT NULL,
  `Is_Deleted` int(11) DEFAULT '0' COMMENT '0 = No\\n1 = Yes',
  PRIMARY KEY (`ID`),
  KEY `fk_Event_School1_idx` (`School_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
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
  `Added_On` timestamp NULL DEFAULT NULL,
  `Updated_On` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `fk_Login_User_Type1_idx` (`User_Type_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `Name`, `User_ID`, `Password`, `Is_Admin`, `Email`, `Mob1`, `Address`, `City`, `State`, `ZipCode`, `School_ID`, `User_Type_ID`, `Added_On`, `Updated_On`, `is_active`, `is_deleted`) VALUES
(1, 'Atanu Dey', 'atanu', 'guitar', NULL, 'mratanudey@gmail.com', '9007559769', '17/A Durga Bari Road', 'Kolkata', 'West Bengal', 700028, '1', 2, '2016-08-09 04:17:47', '2016-08-09 04:17:47', 0, 0),
(2, 'Atanu Dey', 'sentu', 'guitar', NULL, 'mratanudey@gmail.com', '8820610094', '17/A Durga Bari Road', 'Kolkata', 'West Bengal', 700028, '1', 2, '2016-08-27 16:36:12', '2016-08-27 16:36:12', 0, 0),
(3, 'Debojyti Ash', 'debojyoti', 'debojyoti', NULL, 'debojyoti@gmail.com', '9000000000', 'Baranagar', 'Kolkata', 'West Bengal', 700036, '1', 2, '2016-08-13 02:40:20', '2016-08-13 02:40:20', 0, 0),
(4, 'Tester', 'Testing1', 'kokoko', NULL, 'tester@test.com', '999', '', '', 'West Bengal', 33, '1', 2, '2016-08-16 12:35:43', '2016-08-16 12:35:43', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `log_sp_execution_test`
--

DROP TABLE IF EXISTS `log_sp_execution_test`;
CREATE TABLE IF NOT EXISTS `log_sp_execution_test` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `execution_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sp_message` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `log_sp_execution_test`
--

INSERT INTO `log_sp_execution_test` (`ID`, `execution_date`, `sp_message`) VALUES
(46, '2016-08-30 16:13:59', '1|919051733137|Your daughter Rusha has entered into the school at 21:43:59.|dfe9d88e60ed4314b3c138189368f79d2bef9671|107.200.10.02'),
(47, '2016-08-30 16:54:07', '1|919051733137|Your daughter Rusha has entered into the school at 22:24:07.|dfe9d88e60ed4314b3c138189368f79d2bef9671|107.200.10.02'),
(48, '2016-08-30 16:58:30', '1|919051733137|Your daughter Rusha has entered into the school at 22:28:30.|dfe9d88e60ed4314b3c138189368f79d2bef9671|107.200.10.02');

-- --------------------------------------------------------

--
-- Table structure for table `SC00001_Attendance`
--

DROP TABLE IF EXISTS `SC00001_Attendance`;
CREATE TABLE IF NOT EXISTS `SC00001_Attendance` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Time` time NOT NULL,
  `IN_OUT` varchar(3) DEFAULT NULL COMMENT 'IN/OUT',
  `Candidate_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_SC0001_Attendance_SC0001_Candidate1_idx` (`Candidate_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `SC00001_Attendance`
--

INSERT INTO `SC00001_Attendance` (`ID`, `Date`, `Time`, `IN_OUT`, `Candidate_ID`) VALUES
(14, '2016-08-30 16:13:59', '21:43:59', 'IN', 2),
(15, '2016-08-30 16:54:07', '22:24:07', 'IN', 2),
(16, '2016-08-30 16:58:30', '22:28:30', 'IN', 2);

-- --------------------------------------------------------

--
-- Table structure for table `SC00001_Candidate`
--

DROP TABLE IF EXISTS `SC00001_Candidate`;
CREATE TABLE IF NOT EXISTS `SC00001_Candidate` (
  `Candidate_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RFID_NO` varchar(20) NOT NULL,
  `Roll_No` int(11) NOT NULL,
  `Candidate_Name` varchar(45) NOT NULL,
  `Address1` varchar(60) DEFAULT NULL,
  `Address2` varchar(60) DEFAULT NULL,
  `State` varchar(30) DEFAULT NULL,
  `Pin` varchar(7) DEFAULT NULL,
  `Guardian_Name` varchar(45) NOT NULL,
  `Email_ID` varchar(60) DEFAULT NULL,
  `Mob1` varchar(15) NOT NULL,
  `Mob2` varchar(15) DEFAULT NULL,
  `Blood_Group` varchar(10) DEFAULT NULL,
  `Gender` varchar(1) DEFAULT NULL,
  `Age` smallint(6) DEFAULT NULL,
  `Is_Admin` tinyint(4) DEFAULT '0',
  `IN_OUT` varchar(3) DEFAULT NULL COMMENT 'IN/OUT',
  `School_ID` varchar(7) NOT NULL,
  `Class_ID` int(11) NOT NULL,
  `Candidate_Type_ID` int(11) NOT NULL,
  `Image_Name` varchar(20) DEFAULT NULL COMMENT 'Candidate Passport Image Name',
  `Added_On` timestamp NULL DEFAULT NULL,
  `Updated_On` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Updated_By` int(11) DEFAULT NULL,
  `Is_Deleted` int(11) DEFAULT '0' COMMENT '0 = No\\n1 = Yes',
  PRIMARY KEY (`Candidate_ID`),
  KEY `fk_SC00001_Candidate_School1_idx` (`School_ID`),
  KEY `fk_SC00001_Candidate_Class1_idx` (`Class_ID`),
  KEY `fk_SC00001_Candidate_Candidate_Type1_idx` (`Candidate_Type_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `SC00001_Candidate`
--

INSERT INTO `SC00001_Candidate` (`Candidate_ID`, `RFID_NO`, `Roll_No`, `Candidate_Name`, `Address1`, `Address2`, `State`, `Pin`, `Guardian_Name`, `Email_ID`, `Mob1`, `Mob2`, `Blood_Group`, `Gender`, `Age`, `Is_Admin`, `IN_OUT`, `School_ID`, `Class_ID`, `Candidate_Type_ID`, `Image_Name`, `Added_On`, `Updated_On`, `Updated_By`, `Is_Deleted`) VALUES
(1, '866512335', 1, 'Prahan', 'Add1', 'Add2', NULL, NULL, 'Partha', 'prana_chak@hotmail.com', '919051733137', '', 'O +ve', 'M', 22, 0, 'OUT', 'SC00001', 1, 1, NULL, NULL, '2016-08-30 15:39:24', NULL, 0),
(2, '1425241197', 2, 'Rusha', 'Add1', 'Add2', NULL, NULL, 'Rahul', 'r.majum@gmail.com', '919051733137', '', 'AB +ve', 'F', 36, 0, 'IN', 'SC00001', 3, 1, NULL, NULL, '2016-08-30 16:58:30', NULL, 0),
(3, '16213812237', 10, 'Titli', 'Add1', 'Add2', NULL, NULL, 'Shiladitya', 's.chatterjee@gmail.com', '919051733137', '', 'AB +ve', 'F', 48, 0, 'OUT', 'SC00001', 7, 1, NULL, NULL, '2016-08-30 13:12:03', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `School`
--

DROP TABLE IF EXISTS `School`;
CREATE TABLE IF NOT EXISTS `School` (
  `ID` varchar(7) NOT NULL COMMENT 'Like: ''SC00001''',
  `School_Name` varchar(60) NOT NULL,
  `Description` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Address1` varchar(45) DEFAULT NULL,
  `Address2` varchar(45) DEFAULT NULL,
  `State` varchar(30) DEFAULT NULL,
  `Pin` varchar(7) DEFAULT NULL,
  `No_Of_Students` int(11) DEFAULT NULL,
  `No_Of_Machines` int(11) DEFAULT NULL,
  `Event_Active` tinyint(4) DEFAULT '0' COMMENT '1 or 0',
  `Added_On` timestamp NULL DEFAULT NULL,
  `Updated_On` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Updated_By` int(11) DEFAULT NULL,
  `Is_Deleted` int(11) DEFAULT '0' COMMENT '0 = No\\n1 = Yes',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `School`
--

INSERT INTO `School` (`ID`, `School_Name`, `Description`, `Address1`, `Address2`, `State`, `Pin`, `No_Of_Students`, `No_Of_Machines`, `Event_Active`, `Added_On`, `Updated_On`, `Updated_By`, `Is_Deleted`) VALUES
('SC00001', 'DPS', NULL, 'Kol1', 'WB', NULL, NULL, 1500, 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `School_Days`
--

DROP TABLE IF EXISTS `School_Days`;
CREATE TABLE IF NOT EXISTS `School_Days` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Month` varchar(10) NOT NULL,
  `Month_Days` int(11) DEFAULT NULL,
  `Month_Off_Days` int(11) DEFAULT NULL,
  `Extra_Leave` int(11) DEFAULT NULL,
  `Remarks` varchar(100) DEFAULT NULL,
  `School_ID` varchar(7) NOT NULL,
  `Added_On` timestamp NULL DEFAULT NULL,
  `Updated_On` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_School_Days_School1_idx` (`School_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `School_Machines`
--

DROP TABLE IF EXISTS `School_Machines`;
CREATE TABLE IF NOT EXISTS `School_Machines` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SIM_No` varchar(13) DEFAULT NULL,
  `Provider` varchar(25) DEFAULT NULL,
  `Is_Active` tinyint(4) DEFAULT NULL,
  `School_ID` varchar(7) NOT NULL,
  `Added_On` timestamp NULL DEFAULT NULL,
  `Updated_On` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Updated_By` int(11) DEFAULT NULL,
  `Is_Deleted` int(11) DEFAULT '0' COMMENT '0 = No\n1 = Yes',
  PRIMARY KEY (`ID`),
  KEY `fk_School_Machines_School1_idx` (`School_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `School_Notice`
--

DROP TABLE IF EXISTS `School_Notice`;
CREATE TABLE IF NOT EXISTS `School_Notice` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(25) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Upload_File_Name` varchar(45) DEFAULT NULL,
  `School_ID` varchar(7) NOT NULL,
  `Added_On` timestamp NULL DEFAULT NULL,
  `Updated_On` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_School_Notice_School1_idx` (`School_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `School_Timing`
--

DROP TABLE IF EXISTS `School_Timing`;
CREATE TABLE IF NOT EXISTS `School_Timing` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IN_OUT` varchar(3) NOT NULL COMMENT 'IN/OUT',
  `Cut_Off_Time` time NOT NULL,
  `GressTime_To_InOut` varchar(8) DEFAULT NULL,
  `Class_ID` int(11) NOT NULL,
  `School_ID` varchar(7) NOT NULL,
  `Added_On` timestamp NULL DEFAULT NULL,
  `Updated_On` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Updated_By` int(11) DEFAULT NULL,
  `Is_Deleted` int(11) DEFAULT '0' COMMENT '0 = No\n1 = Yes',
  PRIMARY KEY (`ID`),
  KEY `fk_School_Timing_Class1_idx` (`Class_ID`),
  KEY `fk_School_Timing_School1_idx` (`School_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `School_Timing`
--

INSERT INTO `School_Timing` (`ID`, `IN_OUT`, `Cut_Off_Time`, `GressTime_To_InOut`, `Class_ID`, `School_ID`, `Added_On`, `Updated_On`, `Updated_By`, `Is_Deleted`) VALUES
(1, 'IN', '23:20:00', '01:00:00', 3, 'SC00001', NULL, NULL, NULL, 0),
(2, 'OUT', '03:30:00', '01:00:00', 3, 'SC00001', NULL, NULL, NULL, 0),
(3, 'IN', '23:20:00', '01:00:00', 7, 'SC00001', NULL, NULL, NULL, 0),
(4, 'OUT', '04:00:00', '00:30:00', 7, 'SC00001', NULL, NULL, NULL, 0),
(5, 'IN', '23:20:00', '01:00:00', 1, 'SC00001', NULL, NULL, NULL, 0),
(6, 'OUT', '03:30:00', '01:00:00', 1, 'SC00001', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Screen_Master`
--

DROP TABLE IF EXISTS `Screen_Master`;
CREATE TABLE IF NOT EXISTS `Screen_Master` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Screen_Name` varchar(40) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `SMS_Provider`
--

DROP TABLE IF EXISTS `SMS_Provider`;
CREATE TABLE IF NOT EXISTS `SMS_Provider` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Provider_Name` varchar(60) DEFAULT NULL,
  `SMS_Type` varchar(20) DEFAULT NULL COMMENT 'Transaction or Promotion',
  `SMS_Count` float DEFAULT NULL,
  `API_Key` varchar(60) DEFAULT NULL,
  `Route` varchar(45) DEFAULT NULL,
  `Recharge_Date` timestamp NULL DEFAULT NULL,
  `Is_Active` int(11) NOT NULL DEFAULT '0' COMMENT '0 or 1',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `SMS_Provider`
--

INSERT INTO `SMS_Provider` (`ID`, `Provider_Name`, `SMS_Type`, `SMS_Count`, `API_Key`, `Route`, `Recharge_Date`, `Is_Active`) VALUES
(1, 'Text Local', 'Transaction', 10, 'dfe9d88e60ed4314b3c138189368f79d2bef9671', '107.200.10.02', '2016-07-26 07:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field1` datetime NOT NULL,
  `field2` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `field1`, `field2`) VALUES
(1, '2016-08-27 10:09:06', '2016-08-27 17:09:06'),
(2, '2016-08-27 22:41:29', '2016-08-27 17:11:29');

-- --------------------------------------------------------

--
-- Table structure for table `User_Privilege`
--

DROP TABLE IF EXISTS `User_Privilege`;
CREATE TABLE IF NOT EXISTS `User_Privilege` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Is_Active` tinyint(4) DEFAULT '0',
  `Remarks` varchar(45) DEFAULT NULL,
  `Screen_Master_ID` int(11) NOT NULL,
  `User_Type_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_User_Privilege_Screen_Master1_idx` (`Screen_Master_ID`),
  KEY `fk_User_Privilege_User_Type1_idx` (`User_Type_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `User_Type`
--

DROP TABLE IF EXISTS `User_Type`;
CREATE TABLE IF NOT EXISTS `User_Type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type_Name` varchar(20) DEFAULT NULL COMMENT '1. School\n2. Gurdian\n3. Agent\n4. Admin\n5. Company',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `User_Type`
--

INSERT INTO `User_Type` (`ID`, `Type_Name`) VALUES
(1, 'Admin'),
(2, 'School'),
(3, 'Gurdian'),
(4, 'Agent'),
(5, 'Company');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Event`
--
ALTER TABLE `Event`
  ADD CONSTRAINT `fk_Event_School1` FOREIGN KEY (`School_ID`) REFERENCES `School` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_Login_User_Type1` FOREIGN KEY (`User_Type_ID`) REFERENCES `User_Type` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `SC00001_Attendance`
--
ALTER TABLE `SC00001_Attendance`
  ADD CONSTRAINT `fk_SC0001_Attendance_SC0001_Candidate1` FOREIGN KEY (`Candidate_ID`) REFERENCES `SC00001_Candidate` (`Candidate_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `SC00001_Candidate`
--
ALTER TABLE `SC00001_Candidate`
  ADD CONSTRAINT `fk_SC00001_Candidate_Candidate_Type1` FOREIGN KEY (`Candidate_Type_ID`) REFERENCES `Candidate_Type` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SC00001_Candidate_Class1` FOREIGN KEY (`Class_ID`) REFERENCES `Class` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SC00001_Candidate_School1` FOREIGN KEY (`School_ID`) REFERENCES `School` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `School_Days`
--
ALTER TABLE `School_Days`
  ADD CONSTRAINT `fk_School_Days_School1` FOREIGN KEY (`School_ID`) REFERENCES `School` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `School_Machines`
--
ALTER TABLE `School_Machines`
  ADD CONSTRAINT `fk_School_Machines_School1` FOREIGN KEY (`School_ID`) REFERENCES `School` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `School_Notice`
--
ALTER TABLE `School_Notice`
  ADD CONSTRAINT `fk_School_Notice_School1` FOREIGN KEY (`School_ID`) REFERENCES `School` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `School_Timing`
--
ALTER TABLE `School_Timing`
  ADD CONSTRAINT `fk_School_Timing_Class1` FOREIGN KEY (`Class_ID`) REFERENCES `Class` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_School_Timing_School1` FOREIGN KEY (`School_ID`) REFERENCES `School` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `User_Privilege`
--
ALTER TABLE `User_Privilege`
  ADD CONSTRAINT `fk_User_Privilege_Screen_Master1` FOREIGN KEY (`Screen_Master_ID`) REFERENCES `Screen_Master` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_Privilege_User_Type1` FOREIGN KEY (`User_Type_ID`) REFERENCES `User_Type` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
