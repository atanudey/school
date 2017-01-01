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
        return $this->db->get_where('Candidate_Type',array('ID'=>$ID))->row_array();
    }
    
    /*
     * Get all candidate_type
     */
    function get_all_candidate_type()
    {
        return $this->db->get('Candidate_Type')->result_array();
    }
    
    /*
     * function to add new candidate_type
     */
    function add_candidate_type($params)
    {
        $this->db->insert('Candidate_Type',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update candidate_type
     */
    function update_candidate_type($ID,$params)
    {
        $this->db->where('ID',$ID);
        $this->db->update('Candidate_Type',$params);
    }
    
    /*
     * function to delete candidate_type
     */
    function delete_candidate_type($ID)
    {
        $this->db->delete('Candidate_Type',array('ID'=>$ID));
    }
}
