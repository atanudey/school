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

            $screens = $this->user_privilege_model->get_allowed_screens($sess_user["user"]->User_Type_ID);

            //print_r($screens);

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

        $this->school_id = $this->session->userdata('school_id');

        $deny_school_dropdown = array('user', 'edu_class', 'school', 'privilege');
        $school_dropdown_view = true;
        if (in_array($this->router->fetch_class(), $deny_school_dropdown)) {
            $school_dropdown_view = false;
        }

        $this->load->vars( array(
                'school_list' => $this->school_model->get_all_school(),
                'session_user' => $this->session->userdata(),
                'school_dropdown_view' => $school_dropdown_view
            )
        );        
    }

    /*function list_controller() {
		$this->load->library('controllerlist'); // Load the library
		$this->config->set_item('controller_methods', $this->controllerlist->getControllers());
	}*/

    function get_candidate_ajax() {
		$classes = array();
		$sections = array();

		$class_input = $this->input->get('classes');
		$section_input = $this->input->get('sections');

		if (!empty($class_input))
			$classes = explode(",", $class_input);
		if (!empty($section_input))
			$sections = explode(",", $section_input);

		$this->load->model("candidate_model");
		$data = $this->candidate_model->get_candidate_by_class_section($classes, $sections);

		echo json_encode($data);
	}
}