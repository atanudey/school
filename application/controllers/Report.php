<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	function __construct() {		
		parent::__construct();	
	}
	
	function index() {				
		$this->load->template('report/index');
	}

	function generate() {

		$str = "";
		for ($i=1; $i <= 12; $i++) {
			//for  ($j=1; $j < 11; $j++) {
				//$str .= "INSERT INTO `educare_db`.`sc00001_attendance` (`ID`, `Date`, `Time`, `IN_OUT`, `SC00001_Candidate_ID`) VALUES (NULL, '2016-08-".str_pad($j, 2, "0", STR_PAD_LEFT)."', '', 'IN', '".$i."');" . "\n";
				$str .= "INSERT INTO `educare_db`.`school_days` (`School_ID`, `Month`, `Year`, `school_days`) VALUES ('SC00001', ". $i .", '2016', " . rand(18, 25) ."); \n";
			//}
		}

		/*for ($i=1; $i < 40; $i++) {
			$str .= "UPDATE  `educare_db`.`sc00001_attendance` SET  `IN_OUT` =  'OUT' WHERE  `sc00001_attendance`.`ID` = " . rand(1, 159) . "; \n";
		}*/

		echo $str;

		die;

		/*if(isset($_POST) && count($_POST) > 0)     
		{   
			$params = array(
				'class' => $this->input->post('class')				
			);
		}
				
		$session_user = $this->session->userdata('user');

		$SQL = "CREATE OR REPLACE VIEW attendance_view AS
			SELECT 
				'" . $session_user->ID . "' as Session_User_ID,
				Roll_No Roll, 
				Candidate_Name Name, 
				CONCAT( `Address1` , ', ', `Address2` ) Address, 
				`Class_ID` Class, 
				SUM( CASE WHEN a.IN_OUT = 'IN' THEN 1 ELSE 0 END ) Present, 
				(COUNT( A.IN_OUT ) - SUM(CASE WHEN a.IN_OUT = 'IN' THEN 1 ELSE 0 END )) Absent
			FROM `sc00001_candidate` C, `sc00001_attendance` A
			WHERE `Candidate_ID` = `SC00001_Candidate_ID` 
			AND `School_ID` = '" . $session_user->School_ID . "'
			AND `Class_ID` = 1
			GROUP BY SC00001_Candidate_ID";

		$result = $this->db->query($SQL);	

		$this->load->template('report/output');	*/		
	}
}
?>