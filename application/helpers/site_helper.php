<?php defined('BASEPATH') OR exit('No direct script access allowed.');

if(!function_exists('convert_to_mysql_date'))
{
    //convert date from dd/mm/yyyy to yyyy-mm-dd
    function convert_to_mysql_date($value)
    {
        return implode("-", array_reverse(explode("/", $value))); 
    }
}

if(!function_exists('convert_to_default_date'))
{
    //convert date from dd/mm/yyyy to yyyy-mm-dd
    function convert_to_default_date($value)
    {
        return implode("/", array_reverse(explode("-", $value))); 
    }
}

if(!function_exists('upload_file'))
{
    //upload a file
    function upload_file($params)
    {
        if (!empty($params["files"]["event_file"]["name"])) {
            $config['upload_path']   = $params['path'];

            if ($params["upload_for"] == "candidate") {
                $config['allowed_types'] = $params['allowed_types'];

                /*$config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;*/

                $config['file_name'] = str_replace(" ", "_", $params['prefix']) . "." . pathinfo($params["files"][$params["input_name"]]['name'], PATHINFO_EXTENSION);
            } else {
                $config['allowed_types'] = $params['allowed_types'];
                $config['file_name'] = str_replace(" ", "_", $params['prefix']). "_" . time(). "." . pathinfo($params["files"][$params["input_name"]]['name'], PATHINFO_EXTENSION);
            }

            create_path_if_not_exists($params['path']);

            $CI =& get_instance();
            $CI->load->library('upload', $config);

            $check_file = $params['path'] . $config['file_name'];
            if ($params["upload_for"] == "candidate" && file_exists($check_file)){
                unlink($check_file);
            }

            if (!$CI->upload->do_upload($params["input_name"]))
            {
                $data = array('error' => $CI->upload->display_errors());              
            }
            else
            {
                $data = array('upload_data' => $CI->upload->data());                
            }

            $data["file_name"] = $config['file_name'];

            return $data;
        }
    }
}

if(!function_exists('create_path_if_not_exists'))
{
    function create_path_if_not_exists($path) {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
    }
}

if(!function_exists('get_image_path'))
{
    function get_image_path($name, $type) {
        $CI =& get_instance();
        $school_id = $CI->session->userdata('school_id');
        if (!empty($school_id) && !empty($name)) {
            return base_url("assets/sitedata/".$school_id."/" . $type . "/".$name); 
        } else {
            return base_url("assets/sitedata/no_image.png");
        }
    }
}