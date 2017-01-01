CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_CorrectionAttendance`(IN `schoolid` VARCHAR(7), IN `candidate_ids` VARCHAR(255), IN `inORout` VARCHAR(3), IN `correctionDate` DATE, OUT `successmessage` VARCHAR(100))
    NO SQL
root:BEGIN

DECLARE school_candidate_tblname VARCHAR(18) DEFAULT CONCAT(schoolid, '_Candidate');
DECLARE school_attendance_tblname VARCHAR(18) DEFAULT CONCAT(schoolid, '_Attendance');

DECLARE Cut_Off_Time TIME;
DECLARE GressTime_To_InOut VARCHAR(8);

DECLARE candidateid INT(10);

DECLARE done INT DEFAULT FALSE;
DECLARE cur_schooltime CURSOR FOR SELECT * FROM schooltime_vw;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

WHILE candidate_ids != '' DO

	SET candidateid = SUBSTRING_INDEX(candidate_ids, ',', 1);      

	INSERT INTO log SET log = candidateid;
    INSERT INTO log SET log = inORout;
    
    -- Operation for each candidate id starts here 
    
    SET @RecordCount = 0;
	
	SET @sql_statement = CONCAT('SELECT COUNT(sa.ID) INTO @RecordCount FROM ', school_attendance_tblname, ' sa WHERE Candidate_ID = ', candidateid, ' AND Date_Attendance = "', correctionDate, '"');
	INSERT INTO log SET log = @sql_statement;
	PREPARE stmt FROM @sql_statement;	
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;

	IF inORout = 'IN' THEN
		IF @RecordCount > 0 THEN
			SET successmessage = "Candidate already present or invalid try. Please try with the correct information.";
			Insert into log_sp_execution_test(execution_date, sp_message) values(NOW( ), successmessage);
			LEAVE root;
		END IF;   
	ELSE
		IF @RecordCount = 0 THEN
			SET successmessage = "Candidate is not present for the day. Please create a present record properly.";
			Insert into log_sp_execution_test(execution_date, sp_message) values(NOW( ), successmessage);
			LEAVE root;
		END IF;
	END IF;


	SET @sql_statement = CONCAT('CREATE VIEW schooltime_vw AS SELECT st.Cut_Off_Time, st.GressTime_To_InOut FROM School_Timing st JOIN ', school_candidate_tblname, ' sc ON st.Class_ID = sc.Class_ID WHERE st.School_ID = ''', schoolid, ''' AND st.IN_OUT =''', inORout , ''' AND sc.Candidate_ID = ', candidateid);
    INSERT INTO log SET log = @sql_statement;
	PREPARE stmt FROM @sql_statement;	
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;

	OPEN cur_schooltime;
	read_loop: LOOP
		FETCH cur_schooltime INTO Cut_Off_Time, GressTime_To_InOut;
		IF done THEN			
			LEAVE read_loop;		
		END IF;    
		
		SET @sql_statement = CONCAT('UPDATE ', school_candidate_tblname, ' SET IN_OUT=''', inORout, ''' WHERE Candidate_ID=', candidateid);            
        INSERT INTO log SET log = @sql_statement;
		PREPARE stmt1 FROM @sql_statement;
		EXECUTE stmt1;
		DEALLOCATE PREPARE stmt1;
							
		IF (inORout = 'IN') THEN
			# --Insert record in Attendance table			
			SET @sql_statement = CONCAT('INSERT INTO ', school_attendance_tblname, ' (Candidate_ID, Date_Attendance, IN_Time) VALUES (', candidateid, ',''', correctionDate, ''', ''', Cut_Off_Time, ''')');
            INSERT INTO log SET log = @sql_statement;
			PREPARE stmt1 FROM @sql_statement;
			EXECUTE stmt1;
			DEALLOCATE PREPARE stmt1;            
		ELSE
			SET @sql_statement = CONCAT('UPDATE ', school_attendance_tblname, ' SET OUT_Time=''', Cut_Off_Time, ''' WHERE Candidate_ID=', candidateid, ' AND Date_Attendance="', correctionDate, '"');
            INSERT INTO log SET log = @sql_statement;
			PREPARE stmt1 FROM @sql_statement;
			EXECUTE stmt1;
			DEALLOCATE PREPARE stmt1;            
		END IF;
		SET successmessage = '1';
	END LOOP;
	CLOSE cur_schooltime;
	DROP VIEW schooltime_vw;
    
    -- Operation for each candidate id completes here 

	IF LOCATE(',', candidate_ids) > 0 THEN
	  SET candidate_ids = SUBSTRING(candidate_ids, LOCATE(',', candidate_ids) + 1);
	ELSE
	  SET candidate_ids = '';
	END IF;

END WHILE;

END