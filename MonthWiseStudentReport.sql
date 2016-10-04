CREATE DEFINER=`root`@`localhost` PROCEDURE `MonthWiseStudentReport`(IN start_date CHAR(10), IN end_date CHAR(10), IN school_id VARCHAR(255), IN student_id_list VARCHAR(255))
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

DECLARE diffMonth INT;
DECLARE diffIter INT;
DECLARE begin_date CHAR(10);
DECLARE final_date CHAR(10);

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
        `Type` CHAR(5) DEFAULT 'data'
	) ENGINE=MEMORY;    
    
	OPEN curs;
    
    SET finished = 0;
	REPEAT    
		FETCH curs INTO sid, sname, sroll, sclass, ssection, sguardian, sphone, saddress;
        IF NOT finished THEN 
			SET @diffMonth = (SELECT PERIOD_DIFF(REPLACE(SUBSTRING(end_date, 1, CHAR_LENGTH(end_date) - 2), '-', ''), REPLACE(SUBSTRING(start_date, 1, CHAR_LENGTH(start_date) - 2), '-', '')) AS `diffMonth`);
            SET @diffMonth = @diffMonth + 1;
            
            INSERT INTO `log` SET `log` = start_date;
			INSERT INTO `log` SET `log` = end_date;
            
            INSERT INTO `log` SET `log` = @diffMonth;
			
            SET @diffIter = 1;
            WHILE (@diffIter <= @diffMonth) DO		
				IF @diffIter = 1 THEN
					SET @begin_date = start_date;
                    SET @final_date = (SELECT LAST_DAY(start_date) AS `final_day`);
				ELSEIF @diffIter = @diffMonth THEN					
					SET @begin_date = (SELECT DATE_ADD(@final_date, INTERVAL 1 DAY) AS `begin_date`);
                    SET @final_date = end_date;
                ELSE					
					SET @begin_date = (SELECT DATE_ADD(@final_date, INTERVAL 1 DAY) AS `begin_date`);
                    SET @final_date = (SELECT LAST_DAY(@begin_date) AS `final_day`);
				END IF;
                
				SET @query_attendance = CONCAT("INSERT INTO StudentReport (`Name`, `Class`, `Type`) 
				SELECT 'Name: ", sname, " ( ", sroll ," )', '", sclass," ( ", ssection, " )','header'");
				
				INSERT INTO `log` SET `log` = @query_attendance;
				
				PREPARE stmt FROM @query_attendance;
				EXECUTE stmt;
				DEALLOCATE PREPARE stmt;
			
				SET @query_attendance = CONCAT("INSERT INTO StudentReport (`Date`, `Guardian`, `Phone`, `Address`, `IN`, `OUT`)  			
				SELECT DATE_FORMAT(`Date_Attendance`, '%d/%m/%Y'), '", sguardian,"', '", sphone,"', '", saddress ,"', 
                DATE_FORMAT(`IN_Time`, '%l:%i %p') `IN`, DATE_FORMAT(`OUT_Time`, '%l:%i %p') `OUT` 
                FROM `SC00001_Attendance` WHERE `Candidate_ID` = ", sid, " AND 
                Date_Attendance BETWEEN '", @begin_date,"' AND '", @final_date,"' ORDER BY Date_Attendance");
				
				INSERT INTO `log` SET `log` = @query_attendance;
				
				PREPARE stmt FROM @query_attendance;
				EXECUTE stmt;
				DEALLOCATE PREPARE stmt;
                
                SET @diffIter = @diffIter + 1;
                
            END WHILE;            
		END IF;
			
	UNTIL finished END REPEAT;
	CLOSE curs;
END