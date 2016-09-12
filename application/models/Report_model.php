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

		/*echo $SQL = "SELECT  8 `Month`,
						'' `Information`,
						`Roll_No`  `Roll` ,  
						`Candidate_Name` Name, 
						CONCAT(  `Address1` ,  `Address2` ) Address,  
						CL.`Name`  `Class` ,
						CL.`Section` `Section`,
						FLOOR(COUNT( A.IN_OUT )/2) Present,
						(25 - FLOOR(COUNT( A.IN_OUT )/2)) Absent
				FROM  `sc00001_candidate` C
				JOIN  `sc00001_attendance` A ON C.`Candidate_ID` = A.`Candidate_ID` 
				JOIN  `class` CL ON C.`class_id` = CL.`ID` 
				WHERE FIND_IN_SET(`School_ID`, 'SC00001')
				AND FIND_IN_SET(CL.`Name`, ".$params['classes'].")
				AND NOT FIND_IN_SET(CL.`Section`,".$params['sections'].")
				AND MONTH( A.`Date` ) = 8 
				GROUP BY A.`Candidate_ID`";*/

		//echo "<br>CALL MonthwiseReport('".implode("','", $params)."'); SELECT * FROM MonthWiseReportTable"; die;
		$this->db->query("CALL MonthwiseReport('".implode("','", $params)."')");
		$query = $this->db->query("SELECT * FROM `MonthWiseReportTable`");		
		return $query->result_array();
	}
}