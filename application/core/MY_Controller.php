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
        //print_r($this->config->item('controller_methods'));

        if ( ! $this->session->userdata('logged_in'))
        {			
            $allowed = array('login', 'register', 'forgot', 'reset');
            if ( ! in_array($this->router->fetch_method(), $allowed)) {
                redirect('login');
            }
        } else {
            $sess_user = $this->session->userdata();

            //Fetch permission list from User_Privilege table
            $this->load->model('user_privilege_model');
        
            $allowed = $this->user_privilege_model->get_allowed_controllers_methods($sess_user["user"]->User_Type_ID);

            //Allowing login method because it will check
            $allowed[]['method'] = 'login';
            $allowed[]['method'] = 'home';

            $allowed[]['controller'] = 'user';
            $allowed[]['method'] = 'permission';

            //if ( ! in_array($this->router->fetch_method(), $allowed)) {
            /*if ( ! in_array($this->router->fetch_class(), $allowed)) {
                redirect('user/permission');
            }*/

            //print_r($allowed); die;

            $found = 0;
            foreach($allowed as $valid_controller) {
                if (!empty($valid_controller['controller']) && !empty($valid_controller['method'])) {
                    if ($this->router->fetch_class() == $valid_controller['controller'] && $this->router->fetch_method() == $valid_controller['method'])
                        $found = 1;
                } else if (!empty($valid_controller['controller'])) {
                    if ($this->router->fetch_class() == $valid_controller['controller'])
                        $found = 1;
                } else if (!empty($valid_controller['method'])) {
                    if ($this->router->fetch_method() == $valid_controller['method'])
                        $found = 1;
                }
            }

            //echo $found; die;

            if (!$found) redirect('user/permission');
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

        $this->load->vars( array(
                'school_list' => $this->school_model->get_all_school(),
                'session_user' => $this->session->userdata()
            )
        );        
    }

    /*function list_controller() {
		$this->load->library('controllerlist'); // Load the library
		$this->config->set_item('controller_methods', $this->controllerlist->getControllers());
	}*/
}