<?php

class Edu_class_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
    * Get all Class by school
    */
    function get_all_class_by_school($School_ID) {
        
        $candidate = $School_ID.'_Candidate';

        $this->db->select('cl.Name, cl.Section');
        $this->db->from('Class cl');
        $this->db->join($candidate . ' as cd', 'cl.ID = cd.Class_ID');
        $this->db->where('cd.School_ID', $School_ID);

        $result = $this->db->get()->result_array();
        return $result;
    }

    /*
     * Get all Class
     */
    function get_all_class($params = array())
    {
        return $this->db->get_where('Class', $params)->result_array();
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
        $result = $this->db->update('Class',$params);

        return $result;
    }
    
    /*
     * function to delete educlass
     */
    function delete_educlass($ID)
    {
        $this->db->delete('Class',array('ID'=>$ID));
    }
}
