<?php defined('BASEPATH') OR exit('No direct script access allowed.');

if(!function_exists('convert_to_mysql_date'))
{
    //convert date from dd/mm/yyyy to yyyy-mm-dd
    function convert_to_mysql_date($value)
    {
        return implode("-", array_reverse(explode("/", $value))); 
    }
}