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

        $this->db->where('cl.Is_Deleted', '0');
        
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
        $this->db->where('Is_Deleted', '0');
        return $this->db->get_where('Class', $params)->result_array();
    }
    
    /*
     * Get educlass by ID
     */
    function get_educlass($ID)
    {
        $this->db->where('Is_Deleted', '0');
        return $this->db->get_where('Class',array('ID'=>$ID))->row_array();
    }
    
    /*
     * Get all educlasses
     */
    function get_all_educlasses()
    {
        $this->db->where('Is_Deleted', '0');
        return $this->db->get('Class')->result_array();
    }
    
    /*
     * function to add new educlass
     */
    function add_educlass($params)
    {
        $this->db->insert('Class',$params);
        $ID = $this->db->insert_id();

        $this->save_audit_info($this->_table, 'insert', $ID);
        return $ID;
    }
    
    /*
     * function to update educlass
     */
    function update_educlass($ID,$params)
    {
        $this->db->where('ID',$ID);
        $result = $this->db->update('Class',$params);

        $this->save_audit_info($this->_table, 'update', $ID);

        return $result;
    }
    
    /*
     * function to delete educlass
     */
    function delete_educlass($ID)
    {
        //$this->db->delete('Class',array('ID'=>$ID));
        $this->save_audit_info($this->_table, 'delete', $ID);
    }
}
