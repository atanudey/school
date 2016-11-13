<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Report_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();		
	}

	public function get_attendance($params) {
		//print_r($params); die;

		if ($params['type'] != "student") {
			$sp_name = "MonthwiseReport";
			$table_name = "MonthWiseReportTable";
		} else {
			$sp_name = "MonthwiseStudentReport";
			$table_name = "StudentReport";
		}

		unset($params['type']);

		//echo "CALL " . $sp_name . "('".implode("','", $params)."')"; die;

		$query = $this->db->query("CALL " . $sp_name . "('".implode("','", $params)."')");
		//$query = $this->db->query("SELECT * FROM ". $table_name);	
		$this->db->freeDBResource($this->db->conn_id);
		return $query->result_array();
	}

	public function get_missing($date, $school_id) {

		if (!empty($school_id)) {
			//$candidate_table = $school_id."_Candidate";
			//$attendance_table = $school_id."_Attendance";

			/*$SQL = "SELECT C.`Roll_No`, C.`RFID_NO`, C.`Candidate_Name`, CONCAT(CL.`Name`, ' - ', CL.`Section`) ClassSection, C.`Guardian_Name`, C.`Mob1`, CONCAT(C.`Address1`, ' ', C.`Address2`) Address, A.IN_Time 
					FROM ".$candidate_table." C 
					JOIN Class CL ON C.Class_ID = CL.ID 
					JOIN ".$attendance_table." A ON C.Candidate_ID = A.Candidate_ID 
					WHERE Date_Attendance = '" . $date . "' AND OUT_Time IS NULL";*/

			$SQL = "CALL MissingStudents('".$school_id."', '".$date."')";
			$query = $this->db->query($SQL);	
			$this->db->freeDBResource($this->db->conn_id);
			return $query->result_array();
			
		} else {
			return array();
		}
	}

	public function get_adjustment($params) {
		$result = array();
		//print_r($params); die;
		if (!empty($params['school_id']) && count($params) == 5) {
			//$SQL = "CALL SP_AbsentListForSection('".$school_id."', '".$class_id."', '".$correction_date."')";
			$SQL = "CALL SP_AbsentListForSection('".implode("','", $params)."')";
			
			$query = $this->db->query($SQL);	
			$this->db->freeDBResource($this->db->conn_id);			

			$result = $query->result_array();
		}
		
		return $result;
	}

	public function do_adjustment($params) {
		$result = array();
		$params['correction_date'] = convert_to_mysql_date($this->input->post('correction_date'));
		if (!empty($params['school_id']) && count($params) == 4) {			
			$SQL = "CALL SP_CorrectionAttendance('".implode("','", $params)."', @response)";
			$query = $this->db->query($SQL);	

			$this->db->freeDBResource($this->db->conn_id);	

			$SQL = "SELECT @response";
			$query = $this->db->query($SQL);		

			$result = $query->result_array();
		}
		
		return $result;
	}
}