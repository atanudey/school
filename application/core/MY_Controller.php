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
            $allowed = array('login', 'register');
            if ( ! in_array($this->router->fetch_method(), $allowed)) {
                redirect('login');
            }
        }

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

    function getSchools() {	
		return $this->school_model->get_all_school();
	}
}