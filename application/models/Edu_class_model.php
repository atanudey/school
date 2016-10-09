<?php

class Edu_class_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get educlass by ID
     */
    function get_educlass($ID)
    {
        return $this->db->get_where('Class',array('ID'=>$ID))->row_array();
    }
    
    /*
     * Get all educlasses
     */
    function get_all_educlasses()
    {
        return $this->db->get('Class')->result_array();
    }
    
    /*
     * function to add new educlass
     */
    function add_educlass($params)
    {
        $this->db->insert('Class',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update educlass
     */
    function update_educlass($ID,$params)
    {
        $this->db->where('ID',$ID);
        $this->db->update('Class',$params);
    }
    
    /*
     * function to delete educlass
     */
    function delete_educlass($ID)
    {
        $this->db->delete('Class',array('ID'=>$ID));
    }
}
