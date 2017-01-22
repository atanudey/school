<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class User_model extends MY_Model {

	public $_table = 'login';
    public $primary_key = 'ID';

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
	
	/**
	 * create_user function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function create_user($data) {
		if (!empty($data)) {            
			$result = $this->db->insert('login', $data);
			$ID = $this->db->insert_id();
			$this->save_audit_info($this->_table, 'insert', $ID);
		}		
	}
	
	/**
	 * resolve_user_login function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function resolve_user_login($user_type_id, $username, $password) {
		
		$this->db->select('password')
				->from('login')
				->where('user_id', $username)
				->where('user_type_id', $user_type_id);		

		$hash = $this->db->get()->row('password');
		return $this->verify_password_hash($password, $hash);		
	}
	
	/**
	 * get_user_id_from_username function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @return int the user id
	 */
	public function get_user_id_from_username($username) {
		
		$this->db->select('login.id');
		$this->db->from('login');
		$this->db->where('user_id', $username);

		return $this->db->get()->row('id');		
	}
	
	/**
	 * get_user function.
	 * 
	 * @access public
	 * @param mixed array()
	 * @return object the user object
	 */
	public function get_user($params = array()) {
		$this->db->select('login.*');
		$this->db->select('User_Type.Type_Name');		
		$this->db->from('login');
		$this->db->join('User_Type', 'login.User_Type_ID = User_Type.ID'); 
		
		$this->db->where($params);
		$result = $this->db->get()->row();

		return $result;		
	}
	
	/**
	 * hash_password function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @return string|bool could be a string on success, or bool false on failure
	 */
	private function hash_password($password) {		
		return password_hash($password, PASSWORD_BCRYPT);		
	}
	
	/**
	 * verify_password_hash function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @param mixed $hash
	 * @return bool
	 */
	function verify_password_hash($password, $hash) {
		return password_verify($password, $hash);		
	}	

	/*
     * function to update user
     */
    function update_user($ID, $params)
    {
		//$this->save_audit_info($this->_table, 'update', $ID);

        $this->db->where('ID', $ID);
        return $this->db->update('login', $params);
    }

	/**
	* @access private
	* @param int user id
	* @return hashed password
	*/
	private function get_password_hash_by_id() {

	}
}
