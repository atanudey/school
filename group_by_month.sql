SELECT MONTH(Date), YEAR(Date) FROM educare_db.sc00001_attendance WHERE SC00001_Candidate_ID = 1 GROUP BY MONTH(Date), YEAR(Date);