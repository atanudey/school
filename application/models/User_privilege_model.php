<?php

Class User_privilege_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_user_privileges($user_type_id) {        
        $this->db->select('*');
        $this->db->from('Screen_Master S');
        $this->db->join('User_Privilege P', 'S.ID = P.Screen_Master_ID');
        $this->db->where('P.User_Type_ID', $user_type_id);
        $this->db->where('P.Is_Active', '1');

        $result = $this->db->get()->result_array();
        return $result;
    }

    function get_allowed_controllers($user_type_id) {
        $controllers = array();
        $data = $this->get_user_privileges($user_type_id);
        
        foreach($data as $val) {
            $controllers[] = $val['Screen_Name'];
        }

        return $controllers;
    }
}