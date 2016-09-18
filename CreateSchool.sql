CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateSchool`(IN parameters VARCHAR(65535), IN school_id VARCHAR(7))
BEGIN
	DECLARE school VARCHAR(2000);
	DECLARE candidate VARCHAR(2000);
	DECLARE attendance VARCHAR(2000);
    
    SET school = CONCAT('INSERT INTO `school` 
                        (`ID`, 
                        `School_ID`, 
                        `School_Name`, 
                        `Description`, 
                        `Address1`, 
                        `Address2`, 
                        `State`, 
                        `Pin`, 
                        `No_Of_Students`, 
                        `No_Of_Machines`, 
                        `Event_Active`, 
                        `Added_On`, 
                        `Updated_On`, 
                        `Updated_By`, 
                        `Is_Deleted`) VALUES(', parameters , ')');

    INSERT INTO log SET log = school;
    
    PREPARE stmt FROM @school;
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
    
    SET candidate = CONCAT('CREATE TABLE IF NOT EXISTS `', school_id, '_candidate` (
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
		`Is_Admin` tinyint(4) DEFAULT \'0\',
		`IN_OUT` varchar(3) DEFAULT NULL COMMENT \'IN/OUT\',
		`School_ID` varchar(7) NOT NULL,
		`Class_ID` int(11) NOT NULL,
		`Candidate_Type_ID` int(11) NOT NULL,
		`Image_Name` varchar(20) DEFAULT NULL COMMENT \'Candidate Passport Image Name\',
		`Added_On` timestamp NULL DEFAULT NULL,
		`Updated_On` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
		`Updated_By` int(11) DEFAULT NULL,
		`Is_Deleted` int(11) DEFAULT \'0\' COMMENT \'0 = No\\n1 = Yes\',
		PRIMARY KEY (`Candidate_ID`),
		KEY `fk_', school_id, '_Candidate_School1_idx` (`School_ID`),
		KEY `fk_', school_id, '_Candidate_Class1_idx` (`Class_ID`),
		KEY `fk_', school_id, '_Candidate_Candidate_Type1_idx` (`Candidate_Type_ID`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1;');
    
    PREPARE stmt FROM @candidate;
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
    
    SET attendance = CONCAT('CREATE TABLE IF NOT EXISTS `', school_id, '_attendance` (
		`ID` int(11) NOT NULL AUTO_INCREMENT,
		`Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		`Time` time NOT NULL,
		`IN_OUT` varchar(3) DEFAULT NULL COMMENT \'IN/OUT\',
		`Candidate_ID` int(11) NOT NULL,
		PRIMARY KEY (`ID`),
		KEY `fk_',school_id,'_Attendance_', school_id, '_Candidate1_idx` (`Candidate_ID`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1;');
    
    PREPARE stmt FROM @attendance;
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
    
END