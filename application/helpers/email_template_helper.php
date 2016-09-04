<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('send_email'))
{
    function send_email($params) {        
        $ci =& get_instance();
        $ci->load->library('email');

        $message = $ci->load->view($params["template_path"], $params["template_data"], TRUE);
        
        $ci->email->to($params["to"], $params["to_name"]);
        $ci->email->reply($params["reply"], $params["reply_name"]);
        $ci->email->from($params["from"], $params["from_name"]);
        $ci->email->subject($params["subject"]);
        $ci->email->message($message);

        $result = $ci->email->send();

        return $result;
    }
}