<?php
 
class Privilege_model extends MY_Model
{
    public $_table = 'User_Privilege';
    public $primary_key = 'ID';

    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get privilege by ID
     */
    function get_privilege($ID)
    {
        $this->db->where('Is_Deleted', '0');
        return $this->db->get_where('User_Privilege',array('ID'=>$ID))->row_array();
    }
    
    /*
     * Get all privilege
     */
    function get_all_privilege()
    {
        $this->db->where('Is_Deleted', '0');
        return $this->db->get('User_Privilege')->result_array();
    }
    
    /*
     * function to add new privilege
     */
    function add_privilege($params)
    {
        $this->db->insert('User_Privilege',$params);
        $ID = $this->db->insert_id();

        $this->save_audit_info($this->_table, 'insert', $ID);
        return $ID;
    }
    
    /*
     * function to update privilege
     */
    function update_privilege($ID,$params)
    {
        $this->db->where('ID',$ID);
        $response = $this->db->update('User_Privilege',$params);

        $this->save_audit_info($this->_table, 'update', $ID);

        if($response)
        {
            return "privilege updated successfully";
        }
        else
        {
            return "Error occuring while updating privilege";
        }
    }
    
    /*
     * function to delete privilege
     */
    function delete_privilege($ID)
    {
        //$response = $this->db->delete('User_Privilege',array('ID'=>$ID));
        $response = $this->save_audit_info($this->_table, 'delete', $ID);

        if($response)
        {
            return "privilege deleted successfully";
        }
        else
        {
            return "Error occuring while deleting privilege";
        }
    }
}
