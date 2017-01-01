<?php
 
class Privilege_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get privilege by ID
     */
    function get_privilege($ID)
    {
        return $this->db->get_where('user_privilege',array('ID'=>$ID))->row_array();
    }
    
    /*
     * Get all privilege
     */
    function get_all_privilege()
    {
        return $this->db->get('user_privilege')->result_array();
    }
    
    /*
     * function to add new privilege
     */
    function add_privilege($params)
    {
        $this->db->insert('user_privilege',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update privilege
     */
    function update_privilege($ID,$params)
    {
        $this->db->where('ID',$ID);
        $response = $this->db->update('user_privilege',$params);
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
        $response = $this->db->delete('user_privilege',array('ID'=>$ID));
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
