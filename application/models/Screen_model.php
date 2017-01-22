<?php

class Screen_model extends MY_Model
{
    public $_table = 'Screen_Master';
    public $primary_key = 'ID';

    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get screen by ID
     */
    function get_screen($ID)
    {
        //$this->db->where('Is_Deleted', '0');
        return $this->db->get_where('Screen_Master',array('ID'=>$ID))->row_array();
    }
    
    /*
     * Get all screen
     */
    function get_all_screen()
    {
        //$this->db->where('Is_Deleted', '0');
        return $this->db->get('Screen_Master')->result_array();
    }
    
    /*
     * function to add new screen
     */
    function add_screen($params)
    {
        $this->db->insert('Screen_Master',$params);
        $ID = $this->db->insert_id();

        //$this->save_audit_info($this->_table, 'insert', $ID);
        return $ID;
    }
    
    /*
     * function to update screen
     */
    function update_screen($ID,$params)
    {
        $this->db->where('ID',$ID);
        $response = $this->db->update('Screen_Master',$params);

        //$this->save_audit_info($this->_table, 'update', $ID);

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
        //$response = $this->save_audit_info($this->_table, 'delete', $ID);

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
