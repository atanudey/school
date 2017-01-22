<?php

class Event_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->school_id = $this->session->userdata('school_id');
    }

    /*
     * Get event by ID
     */
    function get_event($ID)
    {
        $this->db->where('Is_Deleted', '0');
        return $this->db->get_where('Event',array('ID'=>$ID))->row_array();
    }

    /*
    * Get all Event by school
    */
    function get_all_event_by_school($School_ID) {
        
    }

    /*
     * Get all Event
     */
    function get_all_event($params = array())
    {
        $this->db->where('Is_Deleted', '0');

        $this->db->order_by("Date", "DESC");
        $this->db->where('School_ID', $this->school_id);
        return $this->db->get_where('Event', $params)->result_array();
    }
    
    /*
     * function to add new event
     */
    function add_event($params)
    {
        $this->db->insert('Event',$params);
        $ID = $this->db->insert_id();

        $this->save_audit_info($this->_table, 'insert', $ID);
        return $ID;
    }
    
    /*
     * function to update event
     */
    function update_event($ID, $params)
    {
        $this->db->where('ID',$ID);        
        $result = $this->db->update('Event',$params);

        $this->save_audit_info($this->_table, 'update', $ID);

        return $result;
    }
    
    /*
     * function to delete event
     */
    function delete_event($ID)
    {
        //$this->db->delete('Event', array('ID'=>$ID));
        $this->save_audit_info($this->_table, 'delete', $ID);
    }
}
