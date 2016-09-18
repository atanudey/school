CREATE DEFINER=`root`@`localhost` PROCEDURE `MonthWiseReport`(IN start_month INT(2), IN end_month INT(2), IN school_id VARCHAR(255), IN class VARCHAR(255), IN section VARCHAR(255), IN month_interval INT(2))
BEGIN
	DECLARE finished INT;

	DECLARE mnth VARCHAR(30);
	DECLARE sch_days INT;
    DECLARE class_not VARCHAR(3);
    DECLARE section_not VARCHAR(3);
    DECLARE diffMonth INT;
    DECLARE lastMonth INT;

    DECLARE query_month VARCHAR(2000);
    DECLARE query_group VARCHAR(2000);
    DECLARE query_agg VARCHAR(2000);
    DECLARE query_sch_days VARCHAR(2000);
    DECLARE curs CURSOR FOR
    SELECT * FROM Month_Days;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;

	CREATE TEMPORARY TABLE IF NOT EXISTS `Month_Days`(
		`Month` VARCHAR(25) NOT NULL,
		`total_school_days` INT
	) ENGINE=MEMORY;
    
    SET @diffMonth = (SELECT PERIOD_DIFF( end_month, start_month) as diffMonth);
    
    IF (@diffMonth >= month_interval) THEN
		SET @query_sch_days = CONCAT("INSERT INTO Month_Days (`Month`, `total_school_days`)
		SELECT GROUP_CONCAT(`Month`), SUM((`Month_Days` - (`Month_Off_Days` + `Extra_Leave`))) `total_school_days` FROM `school_days` 
		WHERE School_ID = '", school_id, "'
		AND `Month` BETWEEN ", start_month ,"
		AND ", end_month);
        
        INSERT INTO `log` SET `log` = @query_sch_days;
        
        PREPARE stmt FROM @query_sch_days;
        EXECUTE stmt;
        DEALLOCATE PREPARE stmt;
		
    ELSE
		WHILE (@diffMonth >= month_interval) DO
			SET @lastMonth = start_month + month_interval - 1;
            
			SET @query_sch_days = CONCAT("INSERT INTO Month_Days (`Month`, `total_school_days`)
			SELECT `Month`, (`Month_Days` - (`Month_Off_Days` + `Extra_Leave`)) `total_school_days` FROM `school_days` 
			WHERE School_ID = '", school_id, "'
			AND `Month` BETWEEN ", start_month ,"
			AND ", @lastMonth);
            
            INSERT INTO `log` SET `log` = @query_sch_days;
        
			PREPARE stmt FROM @query_sch_days;
			EXECUTE stmt;
			DEALLOCATE PREPARE stmt;
				
			SET @diffMonth = @diffMonth - month_interval;
            SET start_month = start_month + month_interval;
		END WHILE;
        
        IF ( @diffMonth > 0 ) THEN
			SET @lastMonth = start_month + @diffMonth;
            
			SET @query_sch_days = CONCAT("INSERT INTO Month_Days (`Month`, `total_school_days`)
			SELECT `Month`, (`Month_Days` - (`Month_Off_Days` + `Extra_Leave`)) `total_school_days` FROM `school_days` 
			WHERE School_ID = '", school_id, "'
			AND `Month` BETWEEN ", start_month ,"
			AND ", @lastMonth);
            
            INSERT INTO `log` SET `log` = @query_sch_days;
			
			PREPARE stmt FROM @query_sch_days;
			EXECUTE stmt;
			DEALLOCATE PREPARE stmt;
            
        END IF;
    END IF;
    
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
			SET @class_not = CONCAT("FIND_IN_SET( CL.`Name`,'", class, "')");
            IF class = ''
            THEN 
                SET @class_not = CONCAT("NOT", " ", "FIND_IN_SET( CL.`Name`,'", class, "')");	
            END IF;
            
            SET @section_not = CONCAT("FIND_IN_SET( CL.`Section`,'", section, "')");
            IF section = ''
            THEN 
                SET @section_not = CONCAT("NOT", " ", "FIND_IN_SET( CL.`Section`,'", section, "')");
            END IF;

            INSERT INTO `MonthWiseReportTable` (`Month`, `Information`, `Type`)
            SELECT mnth `Month`,
                CONCAT(MONTHNAME(STR_TO_DATE(mnth, '%m')), ', ', YEAR(NOW())) `Infromation`,			   
                'header' `Type`;		
            
            SET @query_month = CONCAT("INSERT INTO `MonthWiseReportTable` (`Month`, `Information`, `Roll`, `Name`, `Address`, `Class`, `Section`, `Present`, `Absent`) 
            SELECT  '", mnth, "' `Month`,
                    '' `Information`,
                    `Roll_No`  `Roll` ,  
                    `Candidate_Name` Name, 
                    CONCAT(  `Address1` ,  `Address2` ) Address,  
                    CL.`Name`  `Class` ,
                    CL.`Section` `Section`,
                    FLOOR(COUNT( A.IN_OUT )/2) Present,
                    (", sch_days, " - FLOOR(COUNT( A.IN_OUT )/2)) Absent
            FROM  `", school_id, "_candidate` C
            JOIN  `", school_id, "_attendance` A ON C.`Candidate_ID` = A.`Candidate_ID` 
            JOIN  `class` CL ON C.`class_id` = CL.`ID` 
            WHERE FIND_IN_SET(  `School_ID` , '", school_id ,"') 
            AND ", @class_not, " 
            AND ", @section_not, "
            AND FIND_IN_SET(MONTH(A.`Date`),'", mnth, "')
            GROUP BY A.`Candidate_ID`");
            
            INSERT INTO `log` SET `log` = @query_month;

            PREPARE stmt FROM @query_month;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;

            SET @query_group = CONCAT("INSERT INTO `GroupTable` (`Month`, `StudentCount`, `TotalPresent`, `TotalAbsent`) 
            SELECT  '", mnth , "' `Month`,
                    COUNT(DISTINCT A.`Candidate_ID`) StudentCount,
                    FLOOR(COUNT( A.IN_OUT )/2) Present,
                    (", sch_days, " - FLOOR(COUNT( A.IN_OUT )/2)) Absent
            FROM `", school_id, "_candidate` C JOIN  `", school_id, "_attendance` A
            ON C.`Candidate_ID` =  A.`Candidate_ID`  
            JOIN `class` CL 
            ON C.`class_id` = CL.`ID` 
            WHERE FIND_IN_SET(`School_ID`, '", school_id, "')
            AND ", @class_not, " 
            AND ", @section_not, "
            AND FIND_IN_SET(MONTH(A.`Date`),'", mnth, "')
            GROUP BY A.`Candidate_ID`");
            
            INSERT INTO `log` SET `log` = @query_group;

            PREPARE stmt FROM @query_group;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;
            
            SET @query_agg = CONCAT("INSERT INTO `MonthWiseReportTable` (`Month`, `Information`, `Present`, `Absent`, `Type`)
            SELECT '", mnth ,"' `Month`,
                CONCAT('Total for ', COUNT(`StudentCount`), ' Students') `Information`,
                SUM(`TotalPresent`) `Present`,
                SUM(`TotalAbsent`) `Absent`,
                'summary' `Type`
            FROM `GroupTable` WHERE 
            FIND_IN_SET(`Month`,'", mnth, "')");
            
            INSERT INTO `log` SET `log` = @query_agg;

            PREPARE stmt FROM @query_agg;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;
        END IF;
	UNTIL finished END REPEAT;

	CLOSE curs;
END