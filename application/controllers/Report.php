<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_Controller {

	function __construct() {		
		parent::__construct();
		$this->load->model('report_model');	
		
		// Load Third Party PDF Library MPDF
		$this->load->library('mpdf60/mpdf');

		// Load Template parsing library
		$this->load->library('parser');
		$this->load->library('session');
	}
	
	function index() {				
		$this->load->template('report/index');
	}

	function populate_data() {

		/*require_once(APPPATH . "../assets/reportico44/reportico.php"); 
		$q = new reportico();		
		$q->embedded_report = true;
		$q->forward_url_get_parameters = "execute_mode=EXECUTE&project=educare&project_password=guitar&xmlin=student_attendance_report.xml&target_format=HTML";
		$q->execute();*/

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

		//echo $str; die;

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

		/*
		if ($this->input->post('student_report_type') == "all") {
			$class = "1=1";
			$section = "1=1";
		} else if ($this->input->post('student_report_type') == "class") {
			if (!empty($_REQUEST['class'])) {
				$class = "FIND_IN_SET( CL.`Name` ,  " . implode(",", $this->input->post('class')) . " )";
				//$class = "CL.`Name` IN (\'" . implode("\',\'", $this->input->post('class')) . "\')";			
			} else {
				$class = "1=1";
			}
			if (!empty($_REQUEST['section'])) {
				$section = "FIND_IN_SET( CL.`Name` ,  " . implode(",", $this->input->post('section')) . " )";	
			} else {
				$section = "1=1";
			}
		} else {
			$class = "FIND_IN_SET( CL.`Name` ,  " . implode(",", $this->input->post('class')) . " )";
			$section = "FIND_IN_SET( CL.`Name` ,  " . implode(",", $this->input->post('section')) . " )";
		}
		*/

		$start_date = explode("/",$this->input->post('start_date'));
		$end_date = explode("/",$this->input->post('end_date'));

		if ($this->input->post('student_report_type') == "all") {
			$class = "";
			$section = "";
		} else if ($this->input->post('student_report_type') == "class") {
			if (!empty($_REQUEST['class'])) {
				$class = implode(",", $this->input->post('class'));			
			} else {
				$class = "";
			}
			if (!empty($_REQUEST['section'])) {
				$section = implode(",", $this->input->post('section'));	
			} else {
				$section = "";
			}
		} else {
			$class = implode(",", $this->input->post('class'));
			$section = implode(",", $this->input->post('section'));
		}

		$params = array(
			'start_month' => intval($start_date[0]),
			'end_month' => intval($end_date[0]),
			'school_id' => 'SC00001',
			'classes' => $class,
			'sections' => $section,				
		);

		$data['report'] = $this->report_model->get_attendance($params);
		$this->session->set_userdata('report', $data['report']);

		$this->load->template('report/output',$data);
	}

	function prnt() {

	}

	function pdf() {		
		$data['report'] = $this->session->userdata('report');	
		$style = "<style>".$this->parser->parse('report/save_style', $data, true)."</style>";	
		$content = $this->parser->parse('report/save', $data, true);

		//echo $style.$content;

		$this->getReport($content, $data);
	}

	function getReport($content, $data, $output = 'download')
	{
	    $this->mpdf->SetDisplayMode('fullpage');

	    $this->mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

	    // LOAD a stylesheet
	    $stylesheet = $this->parser->parse('report/save_style', $data, true);
	    $this->mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

        // If download requested
	    if ($output == 'download'){
	       $this->mpdf->WriteHTML($content,2);
	       $this->mpdf->Output('report.pdf','I');
	    } elseif ($output == 'mail') { //if  mail requested
	       $this->mpdf->WriteHTML(utf8_encode($content));
	       return $customer;
	    }
	}
}
?>