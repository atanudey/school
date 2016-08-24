<?php
/* 
 * Generated by CRUDigniter v2.3 Beta 
 * www.crudigniter.com
 */
 
class User_type_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get user_type by ID
     */
    function get_user_type($ID)
    {
        return $this->db->get_where('user_type',array('ID'=>$ID))->row_array();
    }
    
    /*
     * Get all user_type
     */
    function get_all_user_type()
    {        
        return $this->db->select('*')->where('Type_Name != ','Admin')->get('user_type')->result_array();
    }
    
    /*
     * function to add new user_type
     */
    function add_user_type($params)
    {
        $this->db->insert('user_type',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update user_type
     */
    function update_user_type($ID,$params)
    {
        $this->db->where('ID',$ID);
        $this->db->update('user_type',$params);
    }
    
    /*
     * function to delete user_type
     */
    function delete_user_type($ID)
    {
        $this->db->delete('user_type',array('ID'=>$ID));
    }
}
