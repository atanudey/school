<?php
require_once(APPPATH . "../assets/reportico44/reportico.php"); 
$q = new reportico();		
$q->embedded_report = true;
$q->forward_url_get_parameters = "execute_mode=EXECUTE&project=educare&project_password=guitar&xmlin=student_attendance_report.xml&target_format=HTML";
$q->execute();