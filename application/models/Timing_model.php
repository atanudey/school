<?php
/* 
 * Generated by CRUDigniter v2.3 Beta 
 * www.crudigniter.com
 */
 
class Timing_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get timing by ID
     */
    function get_timing($ID)
    {
        return $this->db->get_where('School_Timing',array('ID'=>$ID))->row_array();
    }
    
    /*
     * Get all timing
     */
    function get_all_timing()
    {
        return $this->db->get('School_Timing')->result_array();
    }
    
    /*
     * function to add new timing
     */
    function add_timing($params)
    {
        $this->db->insert('School_Timing',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update timing
     */
    function update_timing($ID,$params)
    {
        $this->db->where('ID',$ID);
        $response = $this->db->update('School_Timing',$params);
        if($response)
        {
            return "timing updated successfully";
        }
        else
        {
            return "Error occuring while updating timing";
        }
    }
    
    /*
     * function to delete timing
     */
    function delete_timing($ID)
    {
        $response = $this->db->delete('School_Timing',array('ID'=>$ID));
        if($response)
        {
            return "timing deleted successfully";
        }
        else
        {
            return "Error occuring while deleting timing";
        }
    }
}
