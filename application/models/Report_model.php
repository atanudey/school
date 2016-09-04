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

		//echo "CALL MonthwiseReport('".implode("','", $params)."')"; die;
		$this->db->query("CALL MonthwiseReport('".implode("','", $params)."')");
		$query = $this->db->query("SELECT * FROM `MonthWiseReportTable`");		
		return $query->result_array();
	}
}