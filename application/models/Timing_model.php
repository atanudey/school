<?php
class Timing_model extends MY_Model
{
    public $_table = 'School_Timing';
    public $primary_key = 'ID';

    function __construct()
    {
        parent::__construct();
        $this->school_id = $this->session->userdata('school_id');
    }
    
    /*
     * Get timing by ID
     */
    function get_timing($ID)
    {    
        $this->db->where('Is_Deleted', '0');    
        return $this->db->get_where('School_Timing',array('ID'=>$ID))->row_array();
    }
    
    /*
     * Get all timing
     */
    function get_all_timing()
    {
        $this->db->where('Is_Deleted', '0');
        $this->db->where('School_ID', $this->school_id);
        return $this->db->get('School_Timing')->result_array();
    }
    
    /*
     * function to add new timing
     */
    function add_timing($params)
    {
        $this->db->insert('School_Timing',$params);
        $ID = $this->db->insert_id();

        $this->save_audit_info($this->_table, 'insert', $ID);
        return $ID;
    }
    
    /*
     * function to update timing
     */
    function update_timing($ID,$params)
    {
        $this->db->where('ID',$ID);
        $response = $this->db->update('School_Timing',$params);

        $this->save_audit_info($this->_table, 'update', $ID);

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
        //$response = $this->db->delete('School_Timing',array('ID'=>$ID));
        $response = $this->save_audit_info($this->_table, 'delete', $ID);

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
