<?php

Class User_privilege_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_user_privileges($params) {
        $this->db->select('S.ID AS SID, Screen_Name, Parent_ID, Uri');
        $this->db->from('Screen_Master S');
        $this->db->join('User_Privilege P', 'S.ID = P.Screen_Master_ID');
        $this->db->where($params);
        $this->db->order_by('S.weight');
        
        $result = $this->db->get()->result_array();
        return $result;
    }

    function get_user_privileges_by_type($user_type_id) {        
        $params['P.User_Type_ID'] = $user_type_id;
        $params['P.Is_Active'] = '1';
        
        return $this->get_user_privileges($params);
    }

    function get_allowed_screens($user_type_id) {
        $screens = array();
        $data = $this->get_user_privileges_by_type($user_type_id);
        
        $i = 0;
        foreach($data as $val) {
            $controllers = array();

            $controllers['ID'] = $val['SID'];
            $controllers['SN'] = $val['Screen_Name'];
            $controllers['URI'] = $val['Uri'];
            $controllers['PID'] = $val['Parent_ID'];

            if (intval($val['Parent_ID']) > 0) {
                $screens[$val['Parent_ID']]['children'][] = $controllers;
            } else if(intval($val['Parent_ID']) == 0) {         
                $screens[$val['SID']] = $controllers;       
                $i++;
            }
        }
        
        return $screens;
    }

    function get_allowed_controllers_methods($user_type_id) {
        $controllers = array();
        $data = $this->get_user_privileges_by_type($user_type_id);
        
        $i = 0;
        foreach($data as $val) {
            $ctlrs = array();

            $uri = explode("/", $val['Uri']);
            if (!empty($uri[0]))
                $ctlrs['controller'] = $uri[0];

            if (!empty($uri[1]))
                $ctlrs['method'] = $uri[1];

            if (!empty($ctlrs['controller'])) {
                $controllers[$i] = $ctlrs;       
                $i++;
            }
        }

        return $controllers;
    }

    /*
     * Get privilege by ID
     */
    function get_privilege($ID)
    {
        return $this->db->get_where('User_Privilege',array('ID'=>$ID))->row_array();
    }
    
    /*
     * Get all privilege
     */
    function get_all_privilege()
    {
        return $this->db->get('User_Privilege')->result_array();
    }
    
    /*
     * function to add new privilege
     */
    function add_privilege($params)
    {
        $this->db->insert('User_Privilege',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update privilege
     */
    function update_privilege($ID,$params)
    {
        $this->db->where('ID',$ID);
        $response = $this->db->update('User_Privilege',$params);
        if($response)
        {
            return "privilege updated successfully";
        }
        else
        {
            return "Error occuring while updating privilege";
        }
    }
    
    /*
     * function to delete privilege
     */
    function delete_privilege($ID)
    {
        $response = $this->db->delete('User_Privilege',array('ID'=>$ID));
        if($response)
        {
            return "privilege deleted successfully";
        }
        else
        {
            return "Error occuring while deleting privilege";
        }
    }
}