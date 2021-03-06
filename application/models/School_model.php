<?php
 
class School_model extends MY_Model
{
    public $_table = 'School';
    public $primary_key = 'ID';

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->dbforge();
    }
    
    /*
     * Get school by ID
     */
    function get_school($ID)
    {
        $this->db->where('Is_Deleted', '0');
        return $this->db->get_where('School',array('ID'=>$ID))->row_array();
    }

    /*
    * Get School Name by ID
    */

    function get_school_name($ID)
    {    
        $this->db->where('Is_Deleted', '0');
        return $this->db->select('School_Name')->get_where('School',array('ID'=>$ID))->row()->School_Name;
    }
    
    /*
     * Get all school
     */
    function get_all_school()
    {
        $this->db->where('Is_Deleted', '0');
        return $this->db->get('School')->result_array();
    }
    
    /*
     * function to add new school
     */
    function add_school($params)
    {
        $this->db->select_max('School_ID');
        $result = $this->db->get('School')->row();  
        $school_id = intval($result->School_ID);

        $school_idx = ++$school_id; 
        $new_school_id = "SC" . str_pad($school_idx, 5, '0', STR_PAD_LEFT);

        foreach($params as $key => $value) {
            $params[$key] = $this->db->escape_str($value);
        }

        $finalParam = array(
            //'ID' => $params['ID'],
            //'School_ID' => $params['School_ID'],
            "School_Name" => $params["School_Name"],
            "Description" => $params["Description"],
            "Address1" => $params["Address1"],
            "Address2" => $params["Address2"],
            //"Contact"  => $params["Contact"],
            "State" => $params["State"],
            "Pin" => $params["Pin"],
            "No_Of_Students" => $params["No_Of_Machines"],
            "No_Of_Machines" => $params["No_Of_Machines"],
            "Event_Active" => $params["Event_Active"],
            "Added_On" => date('Y-m-d H:i:s'),
            "Updated_On" => date('Y-m-d H:i:s'),
            "Updated_By" => 0,
            "Is_Deleted" => 0    
        );

        //$this->db->query("CALL CreateSchool('".implode(",", $finalParam)."','" . $params['ID'] . "')");
        $command = "CALL CreateSchool(\"".implode(",", $finalParam)."\")";
        $result = $this->db->query($command);
        
        //$this->db->insert('School', $params);
        //return $this->db->insert_id();
        if ($result)
            return $new_school_id;
        else 
            return 0;
    }
    
    /*
     * function to update school
     */
    function update_school($ID,$params)
    {
        $this->db->where('ID',$ID);
        $result = $this->db->update('School',$params);

        $this->save_audit_info($this->_table, 'update', $ID);
        
        return $result;  
    }
    
    /*
     * function to delete school
     */
    function delete_school($ID)
    {
        //$this->db->delete('School',array('ID'=>$ID));
        $this->save_audit_info($this->_table, 'delete', $ID);

        //$this->dbforge->drop_table($ID . "_Candidate");
        //$this->dbforge->drop_table($ID . "_Attendance");
    }
}
