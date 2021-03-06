<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('send_email'))
{
    function send_email($params) {     

        //print_r($params); 

        $ci =& get_instance();
        $ci->load->library('email');

        $message = $ci->load->view($params["template_path"], $params["template_data"], TRUE);        
        
        $ci->email->to($params["to"], $params["to_name"]);        
        $ci->email->from($params["from"], $params["from_name"]);
        $ci->email->subject($params["subject"]);
        $ci->email->message($message);

        if (!empty($params['attachment'])) {
            $ci->email->attach($params['attachment']);
        }

        //print_r($ci->email); die;

        $result = $ci->email->send();
        
        //Clear attachments
        if (!empty($params['attachment'])) {
            $ci->email->clear(true);
        }

        return $result;
    }
}