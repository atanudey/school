<?php
defined('BASEPATH') OR exit('No direct script access allowed');	

class ReporticoLib {
	
	function __construct() {	
		require_once APPPATH . "../assets/reportico44/reportico.php";
	}

	function generate() {
		$a = new reportico();
        $a->embedded_report = true;
        $a->forward_url_get_parameters = "execute_mode=EXECUTE&project=educare&xmlin=test.xml&target_format=PDF"; 
        $a->execute();
	}
}
?>