<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class User extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('user_model');		
	}
	
	public function index() {

	}
	
	/**
	 * register function.
	 * 
	 * @access public
	 * @return void
	 */
	public function register() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('user_type_id','User Type','trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[login.user_id]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('mob1','Mobile','trim|required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[login.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');				
		$this->form_validation->set_rules('zipcode','Zip','trim|required|integer');
		
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('header');
			$this->load->view('user/register/register', $data);
			$this->load->view('footer');
			
		} else {
			
			// set variables from the form
			if(isset($_POST) && count($_POST) > 0)     
			{   
				$params = array(
					'Name' => $this->input->post('name'),
					'User_ID' => $this->input->post('username'),
					'Password' => $this->input->post('password'),
					'Is_Admin' => $this->input->post('is_admin'),
					'Email' => $this->input->post('email'),
					'Mob1' => $this->input->post('mob1'),
					'Address' => $this->input->post('address'),
					'City' => $this->input->post('city'),
					'State' => $this->input->post('state'),
					'ZipCode' => $this->input->post('zipcode'),
					'School_ID' => $this->input->post('school_id'),
					'User_Type_ID' => $this->input->post('user_type_id'),
					'created_at' => date('Y-m-j H:i:s'),
					'updated_at' => date('Y-m-j H:i:s'),
				);
			}

			if ($this->user_model->create_user($params)) {
				
				// user creation ok
				$this->load->view('header');
				$this->load->view('user/register/register_success', $data);
				$this->load->view('footer');
				
			} else {
				
				// user creation failed, this should never happen
				$data->error = 'There was a problem creating your new account. Please try again.';
				
				// send error to the view
				$this->load->view('header');
				$this->load->view('user/register/register', $data);
				$this->load->view('footer');				
			}			
		}
		
	}
		
	/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function login() {
		
		if (empty($_SESSION['user'])) {
			// create the data object
			$data = new stdClass();
			
			// load form helper and validation library
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			// set validation rules
			$this->form_validation->set_rules('user_type_id','User Type','trim|required');
			$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			if ($this->form_validation->run() == false) {
				
				// validation not ok, send validation errors to the view
				$this->load->view('header');
				$this->load->view('user/login/login');
				$this->load->view('footer');
				
			} else {
				
				// set variables from the form
				$user_type_id = $this->input->post('user_type_id');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				
				if ($this->user_model->resolve_user_login($user_type_id, $username, $password)) {
					
					$user_id = $this->user_model->get_user_id_from_username($username);
					$user    = $this->user_model->get_user($user_id);

					// set session user datas
					$_SESSION['user']      = $user;
					$_SESSION['logged_in']    = (bool)true;
					
					// user login ok
					$this->load->view('header');
					$this->load->view('user/login/login_success', $data);
					$this->load->view('footer');
					
				} else {
					
					// login failed
					$data->error = 'Wrong username or password.';
					
					// send error to the view
					$this->load->view('header');
					$this->load->view('user/login/login', $data);
					$this->load->view('footer');
					
				}
				
			} 
		} else {

			// user login ok
			$this->load->view('header');
			$this->load->view('user/login/login_success');
			$this->load->view('footer');
		}
		
	}
	
	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function logout() {
		
		// create the data object
		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
		}

		// redirect him to site root
		redirect('/');		
	}
	
}
