<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MY_Controller class. A base contoller for all controllers
 * 
 * @extends CI_Controller
 */

class MY_Controller extends CI_Controller {

    private $school_id;

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('logged_in'))
        {			
            $allowed = array('login', 'register', 'forgot', 'reset');
            if ( ! in_array($this->router->fetch_method(), $allowed)) {
                redirect('login');
            }
        } else {
            $allowed = $this->checkPermission();
            
            //Allowing login method because it will check
            //$allowed[] = 'login';
            //$allowed[] = 'home';

            //if ( ! in_array($this->router->fetch_method(), $allowed)) {
            if ( ! in_array($this->router->fetch_class(), $allowed)) {
                redirect('user/permission');
            }
        }

        //Fetching school information for admin user
        $this->load->model('school_model');

        $schid = $this->input->post("school_id");
		if (!empty($schid) && $this->uri->segment(2) == '') {
			$this->session->set_userdata('school_id', $schid);
            $this->session->set_userdata('school', $this->school_model->get_school($schid));
            $this->school_id = intval($schid);			
		} else {
            $this->school_id = intval($this->session->userdata('school_id'));
        }

        $this->load->vars(  array(
                'school_list' => $this->getSchools(),
                'session_user' => $this->session->userdata()
            )
        );        
    }

    function checkPermission() {
        $sess_user = $this->session->userdata();

        //GET List of all controller names
        /*
        $controllers = array();
        
        $this->load->helper('file');

        // Scan files in the /application/controllers directory
        // Set the second param to TRUE or remove it if you 
        // don't have controllers in sub directories
        $files = get_dir_file_info(APPPATH.'controllers', FALSE);

        // Loop through file names removing .php extension
        foreach (array_keys($files) as $file)
        {
            $controllers[] = strtolower(str_replace('.php', '', $file));
        }

        print_r($controllers); // Array with all our controllers
        */

        //Fetch permission list from User_Privilege table
        $this->load->model('user_privilege_model');
        
        $privileges = $this->user_privilege_model->get_allowed_controllers($sess_user["user"]->User_Type_ID);

        return $privileges;
    }

    function getSchools() {	
		return $this->school_model->get_all_school();
	}
}