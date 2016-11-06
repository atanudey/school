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

		$this->db->query("CALL " . $sp_name . "('".implode("','", $params)."')");
		$query = $this->db->query("SELECT * FROM ". $table_name);	
			
		return $query->result_array();
	}

	public function get_missing($date, $school_id) {

		if (!empty($school_id)) {
			$candidate_table = $school_id."_Candidate";
			$attendance_table = $school_id."_Attendance";

			$SQL = "SELECT C.`Roll_No`, C.`RFID_NO`, C.`Candidate_Name`, CONCAT(CL.`Name`, ' - ', CL.`Section`) ClassSection, C.`Guardian_Name`, C.`Mob1`, CONCAT(C.`Address1`, ' ', C.`Address2`) Address, A.IN_Time 
					FROM ".$candidate_table." C 
					JOIN Class CL ON C.Class_ID = CL.ID 
					JOIN ".$attendance_table." A ON C.Candidate_ID = A.Candidate_ID 
					WHERE Date_Attendance = '" . $date . "' AND OUT_Time IS NULL";

			$query = $this->db->query($SQL);	
			return $query->result_array();
		} else {
			return array();
		}
	}
}