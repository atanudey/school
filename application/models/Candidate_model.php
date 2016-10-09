<?php
 
class Candidate_model extends CI_Model
{
    private $school_id;

    function __construct()
    {
        parent::__construct();
        $this->school_id = $this->session->userdata('school_id');
    }
    
    /*
     * Get candidate by Candidate_ID
     */
    function get_candidate($Candidate_ID)
    {
        return $this->db->get_where($this->school_id . '_Candidate',array('Candidate_ID'=>$Candidate_ID))->row_array();
    }

    /*
     * Get candidate by Candidate_ID
     */
    function get_candidate_filter($param = array())
    {
        return $this->db->get_where($this->school_id . '_Candidate', $param)->row_array();
    }

    function get_candidate_by_class_section($class, $section) {
        
        $candidate = $this->school_id.'_Candidate';

        $this->db->select('cd.Candidate_Name, cd.Candidate_ID');
        $this->db->from('Class cl');
        $this->db->join($candidate . ' as cd', 'cl.ID = cd.Class_ID');

        if (!empty($class) && !empty($section)) {
            $this->db->where_in('cl.Name', $class);
            $this->db->where_in('cl.Section', $section);
        } else if (!empty($class)) {
            $this->db->where_in('cl.Name', $class);
        } else if (!empty($section)) {
            $this->db->where_in('cl.Section', $section);
        } else {
            return array();
        }

        $result = $this->db->get()->result_array();

        return $result;
    }
    
    /*
     * Get all candidate
     */
    function get_all_candidate()
    {
        return $this->db->get($this->school_id . '_Candidate')->result_array();
    }
    
    /*
     * function to add new candidate
     */
    function add_candidate($params)
    {
        $this->db->insert($this->school_id . '_Candidate',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update candidate
     */
    function update_candidate($Candidate_ID,$params)
    {
        $this->db->where('Candidate_ID',$Candidate_ID);
        $this->db->update($this->school_id . '_Candidate',$params);
    }
    
    /*
     * function to delete candidate
     */
    function delete_candidate($Candidate_ID)
    {
        $this->db->delete($this->school_id . '_Candidate',array('Candidate_ID'=>$Candidate_ID));
    }
}
