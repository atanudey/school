<?php
 
class School_model extends CI_Model
{
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
        return $this->db->get_where('School',array('ID'=>$ID))->row_array();
    }

    /*
    * Get School Name by ID
    */

    function get_school_name($ID)
    {    
        return $this->db->select('School_Name')->get_where('School',array('ID'=>$ID))->row()->School_Name;
    }
    
    /*
     * Get all school
     */
    function get_all_school()
    {
        return $this->db->get('School')->result_array();
    }
    
    /*
     * function to add new school
     */
    function add_school($params)
    {
        /*$this->db->select_max('School_ID');
        $result = $this->db->get('School')->row();  
        $school_id = intval($result->School_ID);

        $params['School_ID'] = ++$school_id;
        $params['ID'] = "SC" . str_pad($school_id, 5, '0', STR_PAD_LEFT);*/

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
        $this->db->query($command);
        
        //$this->db->insert('School', $params);
        //return $this->db->insert_id();
    }
    
    /*
     * function to update school
     */
    function update_school($ID,$params)
    {
        $this->db->where('ID',$ID);
        $result = $this->db->update('School',$params);
        
        return $result;  
    }
    
    /*
     * function to delete school
     */
    function delete_school($ID)
    {
        $this->db->delete('School',array('ID'=>$ID));
        //$this->dbforge->drop_table($ID . "_Candidate");
        //$this->dbforge->drop_table($ID . "_Attendance");
    }
}
