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
}