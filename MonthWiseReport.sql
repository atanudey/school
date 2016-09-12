CREATE DEFINER=`root`@`localhost` PROCEDURE `MonthWiseReport`(IN start_month INT(2), IN end_month INT(2), IN school_id VARCHAR(255), IN class VARCHAR(255), IN section VARCHAR(255))
BEGIN
	DECLARE finished INT;

	DECLARE mnth INT;
	DECLARE sch_days INT;
    DECLARE class_not VARCHAR(3);
    DECLARE section_not VARCHAR(3);
    
    DECLARE curs CURSOR FOR
		SELECT `Month`, (`Month_Days` - (`Month_Off_Days` + `Extra_Leave`)) `total_school_days` FROM `school_days` 
        WHERE School_ID = school_id
        AND `Month` BETWEEN start_month 
        AND end_month;

	DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;
    
	OPEN curs;    
    CREATE TEMPORARY TABLE IF NOT EXISTS `MonthWiseReportTable` (
		`Month` varchar(20) NOT NULL,
        `Information` varchar(255) NOT NULL,
		`Roll` varchar(255) NOT NULL DEFAULT '',
		`Name` varchar(255) NOT NULL DEFAULT '',
		`Address` varchar(255) DEFAULT '',
		`Class` varchar(255) NOT NULL DEFAULT '',
		`Section` varchar(255) NOT NULL DEFAULT '',
		`Present` varchar(255) DEFAULT NULL DEFAULT '',
		`Absent` varchar(255) DEFAULT NULL DEFAULT '',
  		`Type` enum('header','data','summary') NOT NULL DEFAULT 'data'
	) ENGINE=MEMORY;

    CREATE TEMPORARY TABLE IF NOT EXISTS `GroupTable`(
		`Month` varchar(20) NOT NULL,
		`StudentCount` float NOT NULL,
        `TotalPresent` float NOT NULL,
        `TotalAbsent` float NOT NULL
	) ENGINE=MEMORY;

	SET finished = 0;
	REPEAT    
		FETCH curs INTO mnth, sch_days;
        IF NOT finished THEN 
			INSERT INTO `MonthWiseReportTable` (`Month`, `Information`, `Type`)
			SELECT mnth `Month`,
				   CONCAT(MONTHNAME(STR_TO_DATE(mnth, '%m')), ', ', YEAR(NOW())) `Infromation`,			   
				   'header' `Type`;		
			
			IF class = '' AND section = ''
			THEN 
				INSERT INTO `MonthWiseReportTable` (`Month`, `Information`, `Roll`, `Name`, `Address`, `Class`, `Section`, `Present`, `Absent`) 
				SELECT  mnth `Month`,
						'' `Information`,
						`Roll_No`  `Roll` ,  
						`Candidate_Name` Name, 
						CONCAT(  `Address1` ,  `Address2` ) Address,  
						CL.`Name`  `Class` ,
						CL.`Section` `Section`,
						FLOOR(COUNT( A.IN_OUT )/2) Present,
						(sch_days - FLOOR(COUNT( A.IN_OUT )/2)) Absent
				FROM  `sc00001_candidate` C
				JOIN  `sc00001_attendance` A ON C.`Candidate_ID` = A.`Candidate_ID` 
				JOIN  `class` CL ON C.`class_id` = CL.`ID` 
				WHERE `School_ID` = school_id 
				AND MONTH( A.`Date` ) = mnth 
				GROUP BY A.`Candidate_ID`;
				
				INSERT INTO `GroupTable` (`Month`, `StudentCount`, `TotalPresent`, `TotalAbsent`) 
				SELECT  mnth `Month`,
						COUNT(DISTINCT A.`Candidate_ID`) StudentCount,
						FLOOR(COUNT( A.IN_OUT )/2) Present,
						(sch_days - FLOOR(COUNT( A.IN_OUT )/2)) Absent
				FROM `sc00001_candidate` C JOIN  `sc00001_attendance` A
				ON C.`Candidate_ID` =  A.`Candidate_ID`  
				JOIN `class` CL 
				ON C.`class_id` = CL.`ID` 
				WHERE FIND_IN_SET(`School_ID`, school_id) 				
				AND MONTH(A.`Date`) = mnth
				GROUP BY A.`Candidate_ID`;
			ELSEIF class = '' AND section != '' 
			THEN
				INSERT INTO `MonthWiseReportTable` (`Month`, `Information`, `Roll`, `Name`, `Address`, `Class`, `Section`, `Present`, `Absent`) 
				SELECT  mnth `Month`,
						'' `Information`,
						`Roll_No`  `Roll` ,  
						`Candidate_Name` Name, 
						CONCAT(  `Address1` ,  `Address2` ) Address,  
						CL.`Name`  `Class` ,
						CL.`Section` `Section`,
						FLOOR(COUNT( A.IN_OUT )/2) Present,
						(sch_days - FLOOR(COUNT( A.IN_OUT )/2)) Absent
				FROM  `sc00001_candidate` C
				JOIN  `sc00001_attendance` A ON C.`Candidate_ID` = A.`Candidate_ID` 
				JOIN  `class` CL ON C.`class_id` = CL.`ID` 
				WHERE `School_ID` = school_id 
				AND FIND_IN_SET( CL.`Section`, section ) 
				AND MONTH( A.`Date` ) = mnth 
				GROUP BY A.`Candidate_ID`;
				
				INSERT INTO `GroupTable` (`Month`, `StudentCount`, `TotalPresent`, `TotalAbsent`) 
				SELECT  mnth `Month`,
						COUNT(DISTINCT A.`Candidate_ID`) StudentCount,
						FLOOR(COUNT( A.IN_OUT )/2) Present,
						(sch_days - FLOOR(COUNT( A.IN_OUT )/2)) Absent
				FROM `sc00001_candidate` C JOIN  `sc00001_attendance` A
				ON C.`Candidate_ID` =  A.`Candidate_ID`  
				JOIN `class` CL 
				ON C.`class_id` = CL.`ID` 
				WHERE FIND_IN_SET(`School_ID`, school_id)
				AND FIND_IN_SET( CL.`Section`, section ) 
				AND MONTH(A.`Date`) = mnth
				GROUP BY A.`Candidate_ID`;
			ELSEIF class != '' AND section = ''
			THEN
				INSERT INTO `MonthWiseReportTable` (`Month`, `Information`, `Roll`, `Name`, `Address`, `Class`, `Section`, `Present`, `Absent`) 
				SELECT  mnth `Month`,
						'' `Information`,
						`Roll_No`  `Roll` ,  
						`Candidate_Name` Name, 
						CONCAT(  `Address1` ,  `Address2` ) Address,  
						CL.`Name`  `Class` ,
						CL.`Section` `Section`,
						FLOOR(COUNT( A.IN_OUT )/2) Present,
						(sch_days - FLOOR(COUNT( A.IN_OUT )/2)) Absent
				FROM  `sc00001_candidate` C
				JOIN  `sc00001_attendance` A ON C.`Candidate_ID` = A.`Candidate_ID` 
				JOIN  `class` CL ON C.`class_id` = CL.`ID` 
				WHERE `School_ID` = school_id 
				AND FIND_IN_SET( CL.`Name`, class ) 
				AND MONTH( A.`Date` ) = mnth 
				GROUP BY A.`Candidate_ID`;  
				
				INSERT INTO `GroupTable` (`Month`, `StudentCount`, `TotalPresent`, `TotalAbsent`) 
				SELECT  mnth `Month`,
						COUNT(DISTINCT A.`Candidate_ID`) StudentCount,
						FLOOR(COUNT( A.IN_OUT )/2) Present,
						(sch_days - FLOOR(COUNT( A.IN_OUT )/2)) Absent
				FROM `sc00001_candidate` C JOIN  `sc00001_attendance` A
				ON C.`Candidate_ID` =  A.`Candidate_ID`  
				JOIN `class` CL 
				ON C.`class_id` = CL.`ID` 
				WHERE FIND_IN_SET(`School_ID`, school_id)
				AND FIND_IN_SET( CL.`Name`, class )             
				AND MONTH(A.`Date`) = mnth
				GROUP BY A.`Candidate_ID`;
			ELSE
				INSERT INTO `MonthWiseReportTable` (`Month`, `Information`, `Roll`, `Name`, `Address`, `Class`, `Section`, `Present`, `Absent`) 
				SELECT  mnth `Month`,
						'' `Information`,
						`Roll_No`  `Roll` ,  
						`Candidate_Name` Name, 
						CONCAT(  `Address1` ,  `Address2` ) Address,  
						CL.`Name`  `Class` ,
						CL.`Section` `Section`,
						FLOOR(COUNT( A.IN_OUT )/2) Present,
						(sch_days - FLOOR(COUNT( A.IN_OUT )/2)) Absent
				FROM  `sc00001_candidate` C
				JOIN  `sc00001_attendance` A ON C.`Candidate_ID` = A.`Candidate_ID` 
				JOIN  `class` CL ON C.`class_id` = CL.`ID` 
				WHERE `School_ID` = school_id 
				AND FIND_IN_SET( CL.`Name`, class ) 
				AND FIND_IN_SET( CL.`Section`, section ) 
				AND MONTH( A.`Date` ) = mnth 
				GROUP BY A.`Candidate_ID`;	
				
				INSERT INTO `GroupTable` (`Month`, `StudentCount`, `TotalPresent`, `TotalAbsent`) 
				SELECT  mnth `Month`,
						COUNT(DISTINCT A.`Candidate_ID`) StudentCount,
						FLOOR(COUNT( A.IN_OUT )/2) Present,
						(sch_days - FLOOR(COUNT( A.IN_OUT )/2)) Absent
				FROM `sc00001_candidate` C JOIN  `sc00001_attendance` A
				ON C.`Candidate_ID` =  A.`Candidate_ID`  
				JOIN `class` CL 
				ON C.`class_id` = CL.`ID` 
				WHERE FIND_IN_SET(`School_ID`, school_id)
				AND FIND_IN_SET( CL.`Name`, class ) 
				AND FIND_IN_SET( CL.`Section`, section ) 
				AND MONTH(A.`Date`) = mnth
				GROUP BY A.`Candidate_ID`;
			END IF;
			
			INSERT INTO `MonthWiseReportTable` (`Month`, `Information`, `Present`, `Absent`, `Type`)
			SELECT mnth `Month`,
				   CONCAT('Total for ', COUNT(`StudentCount`), ' Students') `Information`,
				   SUM(`TotalPresent`) `Present`,
				   SUM(`TotalAbsent`) `Absent`,
				   'summary' `Type`
			FROM `GroupTable` WHERE `Month` = mnth;
        END IF;
	UNTIL finished END REPEAT;

	CLOSE curs;
END