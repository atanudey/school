<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class User extends MY_Controller {

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
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[login.User_ID]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('mob1','Mobile','trim|required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[login.Email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length['. $this->config->item('password_min_length') .']');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');				
		$this->form_validation->set_rules('zipcode','Zip','trim|required|integer');	
		
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
			$data['all_school'] = $this->school_model->get_all_school();
			$data['all_user_type'] = $this->user_type_model->get_all_user_type('');
			
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
				
				send_email($email_params);

			} else {				
				// user creation failed, this should never happen
				$data["error"] = 'There was a problem creating your new account. Please try again.';
				
				// send error to the view				
				$this->load->template('user/register/register', $data);								
			}			
		}		
	}

	/**
	* Update profile section
	* 
	* @access public
	* @return void	
	*/
	function profile() {

		$data = array();

		// Storing session data to variables
		$sess_user = $this->session->userdata("user");
		$sess_user->school = $this->session->userdata("school");

		$data["user"] = $sess_user;
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');

		//Loading a custom helper for sending template based emails
		$this->load->helper('email_template');
		
		// set validation rules	
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|edit_unique[login.User_ID.'.$sess_user->ID.']');			
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('mob1','Mobile','trim|required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|edit_unique[login.Email.'.$sess_user->ID.']');						
		$this->form_validation->set_rules('zipcode','Zip','trim|required|integer');			
		
		if ($this->form_validation->run() === true) {
			
			// set variables from the form
			if(isset($_POST) && count($_POST) > 0)     
			{   
				$params = array(
					'User_ID' => $this->input->post('username'),
					'Name' => $this->input->post('name'),
					'Email' => $this->input->post('email'),
					'Mob1' => $this->input->post('mob1'),
					'Address' => $this->input->post('address'),
					'City' => $this->input->post('city'),
					'State' => $this->input->post('state'),
					'ZipCode' => $this->input->post('zipcode'),					
				);
			}

			$result = $this->user_model->update_user($sess_user->ID, $params);

			if ($result) {	
				// Update session user data
				$user = $this->user_model->get_user(array('login.ID' => $sess_user->ID));
				$this->session->set_userdata("user", $user);

				redirect("user/profile");

			} else {				
				// user update failed, this should never happen
				$data["error"] = 'There was a problem updating your profile. Please try again.';											
			}			
		}

		$this->load->template('user/profile/index', $data);	
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
			
			// validation not ok, send validation errors to the view
			$data['all_user_type'] = $this->user_type_model->get_all_user_type();
			
			// set validation rules
			$this->form_validation->set_rules('user_type_id','User Type','trim|required');
			$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			if ($this->form_validation->run() == true) {								
				// set variables from the form
				$user_type_id = $this->input->post('user_type_id');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				
				if ($this->user_model->resolve_user_login($user_type_id, $username, $password)) {

					$user_id = $this->user_model->get_user_id_from_username($username);
					$user    = $this->user_model->get_user(array('login.ID' => $user_id));

					if (!intval($user->is_active)) {
						$data["error"] = 'The user is not active. For any assistance contact Administrator.';						
					} else {
						//echo $user->School_ID;
						$school  = $this->school_model->get_school($user->School_ID);
						//print_r($school); die;
						// set session user datas
						$this->session->set_userdata(array(
							"user" => $user,
							"user_id" => $user->ID,
							"school" => $school,
							"school_id" => $school['ID'],
							"logged_in" => (bool)true
						));

						redirect("home");				
					}
				} else {					
					// login failed
					$data["error"] = 'Wrong username or password. Try again.';										
				}				
			}

			// send error to the view					
			$this->load->template('user/login/index', $data);
		} else {			
			redirect("home");
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
		redirect('login');		
	}

	public function home() {		
		$template = "admin_staff";
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			switch(intval($_SESSION['user']->User_Type_ID)) {
				case 1: $template = "admin_staff";
						break;
				case 2: $template = "school_guardians";
						break;
				case 3: $template = "school_guardians";
						break;
				case 4: $template = "admin_staff";
						break;				
			}			
			$this->load->template('user/home/'.$template);	
		} else {
			redirect('login');
		}
	}

	public function email() {

		$this->load->helper('email_template_helper');

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

	/**
	 * Forgot password page
	 */
	public function forgot()
	{
		// Redirect to your logged in landing page here
		if($this->session->userdata('logged_in')) $this->load->template('home');
		 
		$this->load->library('form_validation');
		$this->load->helper('form');
		$data['success'] = false;
		 
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_exists');
		
		if($this->form_validation->run()){
			$email = $this->input->post('email');			
			$user = $this->user_model->get_user(array('Email' => $email));
			$slug = md5($user->ID . $user->Email . date('Ymd'));

			$this->load->helper('email_template_helper');

			$email_params = array(			
				"template_path" => 'templates/forgot_email',
				"template_data" => array('name' => $user->Name, 'user_id' => $user->ID, 'slug' => $slug),				
				"to" => $user->Email,
				"to_name" => $user->Name,
				"from" => $this->config->item('from_email'),
				"from_name" => $this->config->item('from_name'),
				"subject" => "Reset your Password",			
			);

			if (!send_email($email_params)) {
				echo "Failed to send email";
			}
			
			$data['success'] = true;
		}
		
		$this->load->template('user/login/forgot_password', $data);
	}

	/**
	 * CI Form Validation callback that checks a given email exists in the db
	 *
	 * @param string $email the submitted email
	 * @return boolean returns false on error
	 */
	public function email_exists($email)
	{
		if($this->user_model->get_user(array('Email' => $email))){
			return true;
		} else {
			$this->form_validation->set_message('email_exists', 'We couldn\'t find that email address in our system.');
			return false;
		}
	}	

	/**
	 * Reset password page
	 */
	public function reset()
	{
		// Redirect to your logged in landing page here
		if($this->session->userdata('logged_in')) redirect('home');
		 
		$this->load->library('form_validation');
		$this->load->helper('form');
		$data['success'] = false;
		 
		$user_id = $this->uri->segment(3);
		if(!$user_id) show_error('Invalid reset code.');
		$hash = $this->uri->segment(4);
		if(!$hash) show_error('Invalid reset code.');
				
		$user = $this->user_model->get_user(array('login.ID' => $user_id));
		if(!$user) show_error('Invalid reset code.');
		$slug = md5($user->ID . $user->Email . date('Ymd'));
		if($hash != $slug) show_error('Invalid reset code.');
	 
		$this->form_validation->set_rules('password', 'Password', 'required|min_length['. $this->config->item('password_min_length') .']');
		$this->form_validation->set_rules('password_conf', 'Confirm Password', 'required|matches[password]');
		
		if($this->form_validation->run()){
			$this->reset_password($user->ID, $this->input->post('password'));
			$data['success'] = true;
		}
		
		$this->load->template('user/login/reset_password', $data);
	}

	public function reset_password($user_id, $new_password)
	{
		$new_password = password_hash($new_password, PASSWORD_BCRYPT);
		$this->user_model->update_user($user_id, array('password' => $new_password));
	}

	function permission(){
		$data = array();
		$this->load->template('user/permission/index', $data);
	}

	function change_password() {
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		$data['success'] = false;

		$sess_user = $this->session->userdata("user");	
		
		$this->form_validation->set_rules('current_password', 'Current Password', 'required|callback_oldpassword_check');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length['. $this->config->item('password_min_length') .']');
		$this->form_validation->set_rules('password_conf', 'Confirm Password', 'required|matches[password]');
		
		if($this->form_validation->run()){
			$this->reset_password($sess_user->ID, $this->input->post('password'));
			$data['success'] = true;
		}

		$this->load->template('user/profile/change_password', $data);
	}

	public function oldpassword_check($old_password) {

		// Storing session data to variables
		$sess_user = $this->session->userdata("user");		
		$old_password_db_hash = $sess_user->Password;

		if(!$this->user_model->verify_password_hash($old_password, $old_password_db_hash))
		{
			$this->form_validation->set_message('oldpassword_check', 'Current password not match');
			return FALSE;
		} 

		return TRUE;
	}
}
