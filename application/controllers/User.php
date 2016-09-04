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
		$this->load->model('user_model');		
		$this->load->model('school_model');
		$this->load->model('user_type_model');
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
				
		$data = array();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');

		//Loading a custom helper for sending template based emails
		$this->load->helper('email_template');
		
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
			$data['all_school'] = $this->school_model->get_all_school();
			$data['all_user_type'] = $this->user_type_model->get_all_user_type();
			
			$this->load->template('user/register/register', $data);
						
		} else {
			
			// set variables from the form
			if(isset($_POST) && count($_POST) > 0)     
			{   
				$params = array(
					'Name' => $this->input->post('name'),
					'User_ID' => $this->input->post('username'),
					'Password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'Is_Admin' => $this->input->post('is_admin'),
					'Email' => $this->input->post('email'),
					'Mob1' => $this->input->post('mob1'),
					'Address' => $this->input->post('address'),
					'City' => $this->input->post('city'),
					'State' => $this->input->post('state'),
					'ZipCode' => $this->input->post('zipcode'),
					'School_ID' => $this->input->post('school_id'),
					'User_Type_ID' => $this->input->post('user_type_id'),
					'Added_On' => date('Y-m-j H:i:s'),
					'Updated_On' => date('Y-m-j H:i:s'),
				);
			}

			if ($this->user_model->create_user($params)) {				
				// user creation ok								
    			$this->load->template('user/register/register_success', $data);

				$SITE_EMAIL = $this->config->item('site_email');
				$SITE_EMAIL_NAME = $this->config->item('site_email_name');

				$email_params = array(			
					"template_path" => 'templates/registration_email',
					"template_data" => array('name' => $params['Name']),
					"from" => $SITE_EMAIL,
					"from_name" => $SITE_EMAIL_NAME,
					"to" => $params['Email'],
					"to_name" => $params['Name'],
					"subject" => "Welcome to Educare",			
				);
				
				$this->email_template->send();

			} else {				
				// user creation failed, this should never happen
				$data["error"] = 'There was a problem creating your new account. Please try again.';
				
				// send error to the view				
				$this->load->template('user/register/register', $data);								
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
			
			$data = array();
			
			// load form helper and validation library
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			// set validation rules
			$this->form_validation->set_rules('user_type_id','User Type','trim|required');
			$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			if ($this->form_validation->run() == false) {				
				// validation not ok, send validation errors to the view
				$data['all_user_type'] = $this->user_type_model->get_all_user_type();												
			} else {				
				// set variables from the form
				$user_type_id = $this->input->post('user_type_id');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				
				if ($this->user_model->resolve_user_login($user_type_id, $username, $password)) {

					$user_id = $this->user_model->get_user_id_from_username($username);
					$user    = $this->user_model->get_user($user_id);

					//echo $user->School_ID;
					$school  = $this->school_model->get_school("SC" . str_pad($user->School_ID, 5, '0', STR_PAD_LEFT));

					// set session user datas
					$_SESSION['user']      = $user;
					$_SESSION['school']    = $school;
					$_SESSION['logged_in'] = (bool)true;				
					
				} else {
					
					// login failed
					$data["error"] = 'Wrong username or password. Try again.';										
				}				
			} 
		} 
		
		$template = "admin_staff";
		if (!empty($_SESSION['user'])) {

			switch(intval($_SESSION['user']->User_Type_ID)) {
				case 1: $template = "admin_staff";
						break;
				case 2: $template = "admin_staff";
						break;
				case 3: $template = "school_guardians";
						break;
				case 4: $template = "school_guardians";
						break;				
			}	

			$this->load->template('user/home/'.$template);	

		} else {			
			// send error to the view					
			$this->load->template('user/login/index', $data);
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

	public function home() {
		$this->load->template('user/home/index');
	}

	public function email() {

		$email_params = array(			
			"template_path" => 'templates/registration_email',
			"template_data" => array(),
			"from" => "mr.atanu.dey.83@gmail.com",
			"from_name" => "Atanu Dey",
			"to" => "mratanudey@gmail.com",
			"to_name" => "Sentu Dey",
			"subject" => "Mail Subject is here",			
		);

		if (!send_email($email_params)) {
			echo "Failed to send email";
		}
	}	
}
