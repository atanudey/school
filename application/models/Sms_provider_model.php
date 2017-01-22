<?php
class Sms_provider_model extends MY_Model
{
    public $_table = 'SMS_Provider';
    public $primary_key = 'ID';

    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get SMS_Provider by ID
     */
    function get_sms_provider($ID)
    {
        $this->db->where('Is_Deleted', '0');
        return $this->db->get_where('SMS_Provider',array('ID'=>$ID))->row_array();
    }

    /*
    * Already saved provider list
    */
    function Predefined_SMS_Provider() {
        $SQL = "SELECT ID,  `Provider_Name` ,  `SMS_Type` 
                FROM  `SMS_Provider` 
                GROUP BY  `Provider_Name` ,  `SMS_Type` ";

        $query = $this->db->query($SQL);
        $result = $query->result_array();

        return $result;
    }

    function SMS_Provider_Info() {
        
    }
    
    /*
     * Get all SMS_Provider
     */
    function get_all_sms_provider($params = array())
    {      
        $this->db->where('Is_Deleted', '0'); 
        $this->db->where('School_ID', $this->school_id); 
        $result = $this->db->get_where('SMS_Provider', $params)->result_array();     

        return $result;
    }
    
    /*
     * function to add new SMS_Provider
     */
    function add_sms_provider($params)
    {
        $this->db->insert('SMS_Provider',$params);
        $ID = $this->db->insert_id();

        $this->save_audit_info($this->_table, 'insert', $ID);
        return $ID;
    }
    
    /*
     * function to update SMS_Provider
     */
    function update_sms_provider($ID,$params)
    {
        $this->db->where('ID',$ID);
        $response = $this->db->update('SMS_Provider',$params);

        $this->save_audit_info($this->_table, 'update', $ID);

        if($response)
        {
            return "sms provider updated successfully";
        }
        else
        {
            return "Error occuring while updating sms provider";
        }
    }
    
    /*
     * function to delete SMS_Provider
     */
    function delete_sms_provider($ID)
    {
        //$response = $this->db->delete('SMS_Provider',array('ID'=>$ID));
        $response = $this->save_audit_info($this->_table, 'delete', $ID);

        if($response)
        {
            return "sms provider deleted successfully";
        }
        else
        {
            return "Error occuring while deleting sms provider";
        }
    }
}
