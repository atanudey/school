<?php
/* 
 * Generated by CRUDigniter v2.3 Beta 
 * www.crudigniter.com
 */
 
class Sc00001_candidate_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get sc00001_candidate by Candidate_ID
     */
    function get_sc00001_candidate($Candidate_ID)
    {
        return $this->db->get_where('sc00001_candidate',array('Candidate_ID'=>$Candidate_ID))->row_array();
    }
    
    /*
     * Get all sc00001_candidate
     */
    function get_all_sc00001_candidate()
    {
        return $this->db->get('sc00001_candidate')->result_array();
    }
    
    /*
     * function to add new sc00001_candidate
     */
    function add_sc00001_candidate($params)
    {
        $this->db->insert('sc00001_candidate',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update sc00001_candidate
     */
    function update_sc00001_candidate($Candidate_ID,$params)
    {
        $this->db->where('Candidate_ID',$Candidate_ID);
        $this->db->update('sc00001_candidate',$params);
    }
    
    /*
     * function to delete sc00001_candidate
     */
    function delete_sc00001_candidate($Candidate_ID)
    {
        $this->db->delete('sc00001_candidate',array('Candidate_ID'=>$Candidate_ID));
    }
}
