<?php

class Poc_model extends MY_Model
{
    public $_table = 'School_PointOfContact';
    public $primary_key = 'ID';

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
        $this->db->where('Is_Deleted', '0');
        return $this->db->get_where('School_PointOfContact',array('ID'=>$ID))->row_array();
    }
    
    /*
     * Get all poc
     */
    function get_all_poc()
    {
        $this->db->where('Is_Deleted', '0');
        $this->db->where('School_ID', $this->school_id);
        return $this->db->get('School_PointOfContact')->result_array();
    }
    
    /*
     * function to add new poc
     */
    function add_poc($params)
    {
        $this->db->insert('School_PointOfContact',$params);
        $ID = $this->db->insert_id();

        $this->save_audit_info($this->_table, 'insert', $ID);
        return $ID;
    }
    
    /*
     * function to update poc
     */
    function update_poc($ID,$params)
    {
        //$this->db->where('ID',$ID);
        //$response = $this->db->update('School_PointOfContact',$params);
        $response = $this->save_audit_info($this->_table, 'update', $ID);

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
        //$response = $this->db->delete('School_PointOfContact',array('ID'=>$ID));
        $response = $this->save_audit_info($this->_table, 'delete', $ID);

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
