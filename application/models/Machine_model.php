<?php
 
class Machine_model extends MY_Model
{
    public $_table = 'School_Machines';
    public $primary_key = 'ID';

    function __construct()
    {
        parent::__construct();
        $this->school_id = $this->session->userdata('school_id');
    }    
    
    /*
     * Get machine by ID
     */
    function get_machine($ID)
    {
        return $this->db->get_where('School_Machines',array('ID'=>$ID))->row_array();
    }
    
    /*
     * Get all machines
     */
    function get_all_machines()
    {
        $this->db->where('Is_Deleted', '0');
        $this->db->where('School_ID', $this->school_id);
        return $this->db->get('School_Machines')->result_array();
    }
    
    /*
     * function to add new machine
     */
    function add_machine($params)
    {
        $this->db->insert('School_Machines',$params);
        $ID = $this->db->insert_id();

        $this->save_audit_info($this->_table, 'insert', $ID);

        return $ID;
    }
    
    /*
     * function to update machine
     */
    function update_machine($ID, $params)
    {
        $this->db->where('ID', $ID);
        $response = $this->db->update('School_Machines', $params);

        $this->save_audit_info($this->_table, 'update', $ID);

        if($response)
        {
            return "Machine updated successfully";
        }
        else
        {
            return "Error occuring while updating machine";
        }
    }
    
    /*
     * function to delete machine
     */
    function delete_machine($ID)
    {
        //$response = $this->db->delete('School_Machines', array('ID'=>$ID));
        $response = $this->save_audit_info($this->_table, 'delete', $ID);

        if($response)
        {
            return "Machine deleted successfully";
        }
        else
        {
            return "Error occuring while deleting machine";
        }
    }
}
