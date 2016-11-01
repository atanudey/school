<?php

class Event_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get event by ID
     */
    function get_event($ID)
    {
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
        return $this->db->get_where('Event', $params)->result_array();
    }
    
    /*
     * function to add new event
     */
    function add_event($params)
    {
        $this->db->insert('Event',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update event
     */
    function update_event($ID,$params)
    {
        $this->db->where('ID',$ID);
        $result = $this->db->update('Event',$params);

        return $result;
    }
    
    /*
     * function to delete event
     */
    function delete_event($ID)
    {
        $this->db->delete('Event', array('ID'=>$ID));
    }
}
