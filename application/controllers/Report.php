<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	function __construct() {		
		parent::__construct();

		if ( ! $this->session->userdata('logged_in'))
		{			
			$allowed = array();
			if ( ! in_array($this->router->fetch_method(), $allowed)) {
				redirect('login');
			}
		}

		$this->load->model('report_model');	
	}
	
	function index() {				
		$this->load->template('report/index');
	}

	function populate_data() {

		require_once(APPPATH . "../assets/reportico44/reportico.php"); 
		$q = new reportico();		
		$q->embedded_report = true;
		$q->forward_url_get_parameters = "execute_mode=EXECUTE&project=educare&project_password=guitar&xmlin=student_attendance_report.xml&target_format=HTML";
		$q->execute();

		$str = "";
		for ($i=1; $i <= 300; $i++) {
			//for  ($j=1; $j < 11; $j++) {
				$date = "2016-".rand(1, 12)."-".rand(1,30);
				$time_in = "00:10:00";
				$time_out = "00:16:00";

				$ci = rand(6,7);

				$str .= "INSERT INTO `educare_db`.`sc00001_attendance` (`ID`, `DateTime`, `IN_OUT`, `SC00001_Candidate_ID`) VALUES (NULL, '".$date." ".$time_in."', 'IN', '".$ci."');" . "\n";
				$str .= "INSERT INTO `educare_db`.`sc00001_attendance` (`ID`, `DateTime`, `IN_OUT`, `SC00001_Candidate_ID`) VALUES (NULL, '".$date." ".$time_out."', 'OUT', '".$ci."');" . "\n";
				//$str .= "INSERT INTO `educare_db`.`school_days` (`School_ID`, `Month`, `Year`, `school_days`) VALUES ('SC00001', ". $i .", '2016', " . rand(18, 25) ."); \n";
			//}

			//$str .= "INSERT INTO `educare_db`.`school_days` (`ID`, `Month`, `Month_Days`, `Month_Off_Days`, `Extra_Leave`, `Remarks`, `School_ID`, `Added_On`, `Updated_On`, `Updated_By`) VALUES (NULL, $i, 30, ". (30 - rand(18, 25)) .", '0', NULL, 'SC00001', '2016-08-28 14:52:46', '2016-08-28 14:52:46', '1');" . "\n";		
		}

		//for ($i=1; $i < 40; $i++) {
		//	$str .= "UPDATE  `educare_db`.`sc00001_attendance` SET  `IN_OUT` =  'OUT' WHERE  `sc00001_attendance`.`ID` = " . rand(1, 159) . "; \n";
		//}

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

	function generate() {
		//print_r($_REQUEST); die;

		$start_date = explode("-",$this->input->post('start_date'));
		$end_date = explode("-",$this->input->post('end_date'));

		$params = array(
				'start_month' => intval($start_date[1]),
				'end_month' => intval($end_date[1]),
				'school_id' => 'SC00001',
				'classes' => implode(",", $this->input->post('class')),
				'sections' => implode(",", $this->input->post('section')),				
            );

		$data['report'] = $this->report_model->get_attendance($params);
		$SESSION = $data;

		$this->load->template('report/output',$data);
	}
}
?>