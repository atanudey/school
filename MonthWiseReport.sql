CREATE DEFINER=`root`@`localhost` PROCEDURE `MonthWiseReport`(IN start_month INT(2), IN end_month INT(2), IN school_id VARCHAR(255), IN class VARCHAR(255), IN section VARCHAR(255)
BEGIN
	DECLARE notFound INT;

	DECLARE mnth INT;
	DECLARE sch_days INT;

    DECLARE curs CURSOR FOR
		SELECT `Month`, (`Month_Days` - (`Month_Off_Days` + `Extra_Leave`)) `total_school_days` FROM `school_days` 
        WHERE School_ID = school_id
        AND `Month` BETWEEN start_month 
        AND end_month;

	DECLARE CONTINUE HANDLER FOR NOT FOUND SET notFound = 1;
    
	OPEN curs;
    
    CREATE TEMPORARY TABLE IF NOT EXISTS `MonthWiseReportTable` (
		`Month` varchar(20) NOT NULL,
		`Roll` int(11) NOT NULL,
		`Name` varchar(255) NOT NULL,
		`Address` varchar(255) DEFAULT NULL,
		`Class` varchar(255) NOT NULL,
		`Section` varchar(255) NOT NULL,
		`Present` smallint(4) DEFAULT NULL,
		`Absent` smallint(4) DEFAULT NULL,
  		`Type` enum('header','data','summary') NOT NULL DEFAULT 'data'
	) ENGINE=MEMORY;

	SET notFound = 0;
	REPEAT
    
		FETCH curs INTO mnth, sch_days;

		INSERT INTO `MonthWiseReportTable` (`Month`, `Class`, `Type`)
		SELECT CONCAT(MONTHNAME(STR_TO_DATE(mnth, '%m')), ', ', YEAR(NOW())) `Month`,
			   class `Class`,
			   'header' `Type`;		
        
        INSERT INTO `MonthWiseReportTable` (`Month`, `Roll`, `Name`, `Address`, `Class`, `Section`, `Present`, `Absent`) 
        SELECT  mnth `Month`,
				`Roll_No`  `Roll` ,  
			    `Candidate_Name` Name, 
				CONCAT(  `Address1` ,  `Address2` ) Address,  
				CL.`Name`  `Class` ,
				CL.`Section` `Section`,
				FLOOR(COUNT( A.IN_OUT )/2) Present,
				(sch_days - FLOOR(COUNT( A.IN_OUT )/2)) Absent
		FROM `sc00001_candidate` C,  `sc00001_attendance` A, `class` CL
		WHERE C.`Candidate_ID` =  A.`SC00001_Candidate_ID` 
		AND C.`class_id` = CL.`ID` 
		AND FIND_IN_SET(`School_ID`, school_id)
		AND FIND_IN_SET(CL.`Name`, class)
		AND FIND_IN_SET(CL.`Section`, section)
		AND MONTH(A.`DateTime`) = mnth
		GROUP BY SC00001_Candidate_ID;

		-- INSERT INTO `MonthWiseReportTable` (`Month`, `Present`, `Absent`, `Type`)
		-- SELECT CONCAT('Total for ', COUNT(*), ' Students') `Month`,
		-- 	   SUM(`Present`) `Present`,
		-- 	   SUM(`Absent`) `Absent`,
		-- 	   'summary' `Type` 
		-- FROM `MonthWiseReportTable`
		-- WHERE `Month` = mnth;
        
	UNTIL notFound END REPEAT;

	CLOSE curs;
END