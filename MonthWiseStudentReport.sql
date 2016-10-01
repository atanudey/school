CREATE DEFINER=`root`@`localhost` PROCEDURE `MonthWiseStudentReport`(IN start_month INT(2), IN end_month INT(2), IN school_id VARCHAR(255), IN student_id_list VARCHAR(255))
BEGIN
DECLARE finished INT;
DECLARE query_attendance VARCHAR(2000);
DECLARE sid INT;
DECLARE sname VARCHAR(255);
DECLARE sroll INT;
DECLARE sclass VARCHAR(255);
DECLARE ssection VARCHAR(255);
DECLARE sguardian VARCHAR(255);
DECLARE sphone VARCHAR(20);
DECLARE saddress TEXT;
DECLARE out_for_update VARCHAR(20);

DECLARE curs CURSOR FOR
	SELECT C.`Candidate_ID`, C.`Candidate_Name`, C.`Roll_No`, CL.`Name`, CL.`Section`, C.`Guardian_Name`, C.`Mob1`, CONCAT(C.`Address1`, " ", C.`Address2`) FROM SC00001_Candidate C JOIN Class CL ON C.Class_ID = CL.ID WHERE FIND_IN_SET(`Candidate_ID`, student_id_list);
		
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;
    
    CREATE TEMPORARY TABLE IF NOT EXISTS `StudentReport`(
		`Name` VARCHAR(255),
        `Class` VARCHAR(30),
		`Date` VARCHAR(20) DEFAULT '',		
        `Guardian` VARCHAR(255) DEFAULT '',
        `Phone` VARCHAR(20) DEFAULT '',
        `Address` VARCHAR(255) DEFAULT '',
        `IN` VARCHAR(8) DEFAULT '',
        `OUT` VARCHAR(8) DEFAULT '',
        `Type` CHAR(4) DEFAULT 'data'
	) ENGINE=MEMORY;    
    
	OPEN curs;
    
    SET finished = 0;
	REPEAT    
		FETCH curs INTO sid, sname, sroll, sclass, ssection, sguardian, sphone, saddress;
        IF NOT finished THEN 
			SET @query_attendance = CONCAT("INSERT INTO StudentReport (`Name`, `Class`, `Type`) 
            SELECT 'Name: ", sname, " ( ", sroll ," )', '", sclass," ( ", ssection, " )','info'");
            
            INSERT INTO `log` SET `log` = @query_attendance;
			
			PREPARE stmt FROM @query_attendance;
			EXECUTE stmt;
			DEALLOCATE PREPARE stmt;
        
			SET @query_attendance = CONCAT("INSERT INTO StudentReport (`Date`, `Guardian`, `Phone`, `Address`, `IN`, `OUT`)  
			SELECT DATE_FORMAT(A1.`Date`, '%d/%m/%Y') `Date`, '", sguardian,"', '", sphone,"' Phone, '", saddress ,"' Address, DATE_FORMAT(A1.`Date`, '%l:%i %p') `IN`, DATE_FORMAT(A2.`Date`, '%l:%i %p') `OUT` FROM `SC00001_Attendance` A1 JOIN `SC00001_Attendance` A2 ON A1.`Candidate_ID` = A2.`Candidate_ID` WHERE DATE_FORMAT(A1.`Date`, '%Y%m%d') = DATE_FORMAT(A2.`Date`, '%Y%m%d') AND A1.`Candidate_ID` = ", sid);
            
            INSERT INTO `log` SET `log` = @query_attendance;
			
			PREPARE stmt FROM @query_attendance;
			EXECUTE stmt;
			DEALLOCATE PREPARE stmt;
            
		END IF;
			
	UNTIL finished END REPEAT;
    
    SELECT * FROM `StudentReport`;
    
	CLOSE curs;
END