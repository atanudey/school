<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MY_Controller class. A base contoller for all controllers
 * 
 * @extends CI_Controller
 */

class MY_Controller extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('logged_in'))
        {			
            $allowed = array('login');
            if ( ! in_array($this->router->fetch_method(), $allowed)) {
                redirect('login');
            }
        }

        $this->site_data = array('session_user' => $this->session->userdata());
    }
}