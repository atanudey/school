<?php

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
        //$this->db->where('Is_Deleted', '0');
        return $this->db->get_where('User_Type',array('ID'=>$ID))->row_array();
    }
    
    /*
     * Get all user_type
     */
    function get_all_user_type($mode="all")
    {   
        //$this->db->where('Is_Deleted', '0');
		if (!empty($mode) && $mode == "all"){
			return $this->db->select('*')->get('User_Type')->result_array();
		}else{
			return $this->db->select('*')->where('Type_Name != ','Admin')->get('User_Type')->result_array();
		}		
    }
    
    /*
     * function to add new user_type
     */
    function add_user_type($params)
    {
        $this->db->insert('User_Type',$params);
        $ID = $this->db->insert_id();

        //$this->save_audit_info($this->_table, 'insert', $ID);
        return $ID;
    }
    
    /*
     * function to update user_type
     */
    function update_user_type($ID,$params)
    {
        $this->db->where('ID',$ID);
        $this->db->update('User_Type',$params);

        //$this->save_audit_info($this->_table, 'update', $ID);
    }
    
    /*
     * function to delete user_type
     */
    function delete_user_type($ID)
    {
        $this->db->delete('User_Type',array('ID'=>$ID));
        //$this->save_audit_info($this->_table, 'delete', $ID);
    }
}
