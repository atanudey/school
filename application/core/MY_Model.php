<?php

include_once "CI_Base_Model.php";

class MY_Model extends CI_Base_Model
{
    protected function get_current_user()
    {
        return $this->session->userdata('user_id');
    }
    
    protected function save_audit_info($table, $mode, $ID) {
        $audit_info = $this->session->userdata('audit_info');

        switch($mode) {
            case "insert": break;
            case "update":
                unset($audit_info['Added_On']);
                break;
            case "delete":
                unset($audit_info['Added_On']);
                $audit_info['Is_Deleted'] = 1;
                break;
        }

        $this->db->where('ID',$ID);
        $this->db->update($table, $audit_info);                
    }    
}