<?php

class Screen_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get screen by ID
     */
    function get_screen($ID)
    {
        return $this->db->get_where('Screen_Master',array('ID'=>$ID))->row_array();
    }
    
    /*
     * Get all screen
     */
    function get_all_screen()
    {
        return $this->db->get('Screen_Master')->result_array();
    }
    
    /*
     * function to add new screen
     */
    function add_screen($params)
    {
        $this->db->insert('Screen_Master',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update screen
     */
    function update_screen($ID,$params)
    {
        $this->db->where('ID',$ID);
        $response = $this->db->update('Screen_Master',$params);
        if($response)
        {
            return "screen updated successfully";
        }
        else
        {
            return "Error occuring while updating screen";
        }
    }
    
    /*
     * function to delete screen
     */
    function delete_screen($ID)
    {
        $response = $this->db->delete('Screen_Master',array('ID'=>$ID));
        if($response)
        {
            return "screen deleted successfully";
        }
        else
        {
            return "Error occuring while deleting screen";
        }
    }
}
