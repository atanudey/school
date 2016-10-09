<?php

class Class_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get Class by ID
     */
    function get_class($ID)
    {
        return $this->db->get_where('Class',array('ID'=>$ID))->row_array();
    }
    
    /*
     * Get all Class
     */
    function get_all_class($params = array())
    {
        return $this->db->get_where('Class', $params)->result_array();
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
     * function to add new Class
     */
    function add_class($params)
    {
        $this->db->insert('Class',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update Class
     */
    function update_class($ID,$params)
    {
        $this->db->where('ID',$ID);
        $this->db->update('Class',$params);
    }
    
    /*
     * function to delete Class
     */
    function delete_class($ID)
    {
        $this->db->delete('Class',array('ID'=>$ID));
    }
}
