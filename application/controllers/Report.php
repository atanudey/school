<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	function __construct() {		
		parent::__construct();
		$this->load->helper(array('url'));
	}
	
	function index() {		
		$this->reporticolib->generate();		
	}
}
?>