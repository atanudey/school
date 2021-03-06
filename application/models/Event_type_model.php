<?php
 
class Event_type_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get event_type by ID
     */
    function get_event_type($ID)
    {
        //$this->db->where('Is_Deleted', '0');
        return $this->db->get_where('Event_Type',array('ID'=>$ID))->row_array();
    }
    
    /*
     * Get all event_type
     */
    function get_all_event_type()
    {
        //$this->db->where('Is_Deleted', '0');
        return $this->db->get('Event_Type')->result_array();
    }
    
    /*
     * function to add new event_type
     */
    function add_event_type($params)
    {
        $this->db->insert('Event_Type',$params);
        $ID = $this->db->insert_id();

        //$this->save_audit_info($this->_table, 'insert', $ID);
        return $ID;
    }
    
    /*
     * function to update event_type
     */
    function update_event_type($ID,$params)
    {
        $this->db->where('ID',$ID);
        $response = $this->db->update('Event_Type',$params);

        //$this->save_audit_info($this->_table, 'update', $ID);

        if($response)
        {
            return "event_type updated successfully";
        }
        else
        {
            return "Error occuring while updating event_type";
        }
    }
    
    /*
     * function to delete event_type
     */
    function delete_event_type($ID)
    {
        $response = $this->db->delete('Event_Type',array('ID'=>$ID));
        //$response = $this->save_audit_info($this->_table, 'delete', $ID);

        if($response)
        {
            return "event_type deleted successfully";
        }
        else
        {
            return "Error occuring while deleting event_type";
        }
    }
}