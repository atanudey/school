<?php
 
class Candidate_model extends CI_Model
{
    private $school_id;
    private $column_order = array('RFID_NO','Roll_No','Candidate_Name','Address1','Address2','Guardian_Name','Mob1','Gender','Age','IN_OUT',null); //set column field database for datatable orderable
    private $column_search = array('RFID_NO','Roll_No','Candidate_Name','Address1','Address2','Guardian_Name','Mob1','Gender','Age','IN_OUT'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    private $order = array('Candidate_ID' => 'DESC'); // default order 

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
        return $this->db->get_where($this->school_id . '_Candidate', array('Candidate_ID'=>$Candidate_ID))->row_array();
    }

    /*
     * Get candidate by multiple conditions given in parameter
     */
    function get_candidate_filter($param = array())
    {
        return $this->db->get_where($this->school_id . '_Candidate', $param)->row_array();
    }

    /*
     * Get candidate by multiple candidate ids
     */
    function get_candidate_multiple($candidate_ids)
    {
        $this->db->where_in('Candidate_ID', $candidate_ids);
        $result = $this->db->get_where($this->school_id . '_Candidate')->result_array();
        return $result;
    }

    function get_candidate_by_class_section($class, $section, $candidate_type = 1) {
        
        $candidate = $this->school_id.'_Candidate';

        $this->db->select('cd.*');
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

        $this->db->where('Candidate_Type_ID', $candidate_type);
        $result = $this->db->get()->result_array();

        return $result;
    }
    
    /*
     * Get all candidate
     */
    function get_all_candidate($candidate_type = 1)
    {
        $this->db->where('Candidate_Type_ID', $candidate_type);
        $result = $this->db->get($this->school_id . '_Candidate')->result_array();

        return $result;
    }
    
    /*
     * function to add new candidate
     */
    function add_candidate($params)
    {
        $this->db->insert($this->school_id . '_Candidate', $params);
        $ID = $this->db->insert_id();

        //$this->save_audit_info($this->_table, 'insert', $ID);
        return $ID;
    }
    
    /*
     * function to update candidate
     */
    function update_candidate($Candidate_ID,$params)
    {
        $this->db->where('Candidate_ID',$Candidate_ID);
        $result = $this->db->update($this->school_id . '_Candidate', $params);

        //$this->save_audit_info($this->_table, 'update', $ID);

        return $result;
    }
    
    /*
     * function to delete candidate
     */
    function delete_candidate($Candidate_ID)
    {
        $this->db->delete($this->school_id . '_Candidate',array('Candidate_ID'=>$Candidate_ID));
    }

    private function _get_datatables_query()
	{	
		$this->db->from($this->school_id.'_Candidate');
		$i = 0;
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value'], 'after');                    
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value'], 'after');                    
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}

        //file_put_contents("queries.txt", $this->db->last_query() . "\n\n", FILE_APPEND);
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		
        if($_POST['length'] != -1)
		    $this->db->limit($_POST['length'], $_POST['start']);
		
        $query = $this->db->get();
        //file_put_contents("queries.txt", $this->db->last_query() . "\n\n", FILE_APPEND);
		return $query->result();
	}

    function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->school_id.'_Candidate');
		return $this->db->count_all_results();
	}
}
