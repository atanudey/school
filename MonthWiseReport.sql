CREATE DEFINER=`root`@`localhost` PROCEDURE `MonthWiseReport`(IN start_month INT(2), IN end_month INT(2), IN year_val INT(4), 
	IN school_id VARCHAR(7), IN class_id INT(10), IN user_id INT(10))
BEGIN

	DECLARE notFound INT;

	DECLARE mnth INT;
	DECLARE yr INT;
	DECLARE sch_days INT;
	
    DECLARE curs CURSOR FOR
		SELECT `Month`, `Year`, `school_days` FROM school_days 
        WHERE School_ID = school_id
        AND `Month` BETWEEN start_month 
        AND end_month AND `Year` = year_val;
        
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET notFound = 1;
    
	OPEN curs;

	SET notFound = 0;
	REPEAT
    
		FETCH curs INTO mnth, yr, sch_days;
        
        INSERT INTO MonthWiseReport(`Roll`, `Name`, `Address`, `Class`, `Present`, `Absent`, `User_ID`) 
		SELECT  `Roll_No`  `Roll` ,  
				`Candidate_Name` Name, 
				CONCAT(  `Address1` ,  `Address2` ) Address,  
				`Class_ID`  `Class` , 
				COUNT( A.IN_OUT ) Present,
				(sch_days - COUNT( A.IN_OUT )) Absent,
                user_id User_ID
		FROM  `sc00001_candidate` C,  `sc00001_attendance` A
		WHERE  C.`Candidate_ID` =  A.`SC00001_Candidate_ID` 
		AND  `School_ID` =  school_id
		AND  `Class_ID` = class_id
		AND  MONTH(A.`Date`) = mnth
		AND  YEAR(A.`Date`) = yr
		GROUP BY SC00001_Candidate_ID;
        
	UNTIL notFound END REPEAT;

	CLOSE curs;
END