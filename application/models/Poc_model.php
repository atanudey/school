<?php

class Poc_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->school_id = $this->session->userdata('school_id');
    }
    
    /*
     * Get poc by ID
     */
    function get_poc($ID)
    {
        return $this->db->get_where('School_PointOfContact',array('ID'=>$ID))->row_array();
    }
    
    /*
     * Get all poc
     */
    function get_all_poc()
    {
        $this->db->where('School_ID', $this->school_id);
        return $this->db->get('School_PointOfContact')->result_array();
    }
    
    /*
     * function to add new poc
     */
    function add_poc($params)
    {
        $this->db->insert('School_PointOfContact',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update poc
     */
    function update_poc($ID,$params)
    {
        $this->db->where('ID',$ID);
        $response = $this->db->update('School_PointOfContact',$params);
        if($response)
        {
            return "poc updated successfully";
        }
        else
        {
            return "Error occuring while updating poc";
        }
    }
    
    /*
     * function to delete poc
     */
    function delete_poc($ID)
    {
        $response = $this->db->delete('School_PointOfContact',array('ID'=>$ID));
        if($response)
        {
            return "poc deleted successfully";
        }
        else
        {
            return "Error occuring while deleting poc";
        }
    }
}
