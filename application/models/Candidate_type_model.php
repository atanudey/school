<?php
 
class Candidate_type_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get candidate_type by ID
     */
    function get_candidate_type($ID)
    {
        //$this->db->where('Is_Deleted', '0');
        return $this->db->get_where('Candidate_Type',array('ID'=>$ID))->row_array();
    }
    
    /*
     * Get all candidate_type
     */
    function get_all_candidate_type()
    {
        //$this->db->where('Is_Deleted', '0');
        return $this->db->get('Candidate_Type')->result_array();
    }
    
    /*
     * function to add new candidate_type
     */
    function add_candidate_type($params)
    {
        $this->db->insert('Candidate_Type',$params);
        $ID = $this->db->insert_id();

        //$this->save_audit_info($this->_table, 'insert', $ID);
        return $ID;
    }
    
    /*
     * function to update candidate_type
     */
    function update_candidate_type($ID,$params)
    {
        $this->db->where('ID',$ID);
        $this->db->update('Candidate_Type',$params);

        //$this->save_audit_info($this->_table, 'update', $ID);
    }
    
    /*
     * function to delete candidate_type
     */
    function delete_candidate_type($ID)
    {
        $this->db->delete('Candidate_Type',array('ID'=>$ID));
        //$this->save_audit_info($this->_table, 'delete', $ID);
    }
}
