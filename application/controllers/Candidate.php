<?php
 
class Candidate extends MY_Controller
{
    private $school_id;

    function __construct()
    {
        parent::__construct();
        $this->load->model('candidate_model');

		$this->load->library('session');
		$this->school_id = $this->session->userdata('school_id');
    } 

    /*
     * Listing of candidate
     */
    function index()
    {
		$data = array();
		if (!empty($this->school_id))
        	$data['candidate'] = $this->candidate_model->get_all_candidate();

        $this->load->template('candidate/index',$data);
    }

	function ajax_list() {

		if (!empty($this->school_id)) {
			$list = $this->candidate_model->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $candidate) {
				$no++;
				$row = array();
				$row[] = $candidate->RFID_NO;
				$row[] = $candidate->Roll_No;
				$row[] = $candidate->Candidate_Name;			
				$row[] = $candidate->Address1;
				$row[] = $candidate->Address2;
				$row[] = $candidate->Guardian_Name;
				$row[] = $candidate->Mob1;
				//$row[] = ($candidate->Gender == "M") ? "Male":"Female";
				$row[] = $candidate->Gender;
				$row[] = $candidate->Age;

				//add html for action
				$row[] = '<a class="btn btn-info" href="'.site_url('candidate/addedit/edit/'.$candidate->Candidate_ID).'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					<a class="btn btn-danger" href="'.site_url('candidate/remove/'.$candidate->Candidate_ID).'" title="Delete"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			
				$data[] = $row;
			}

			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->candidate_model->count_all(),
							"recordsFiltered" => $this->candidate_model->count_filtered(),
							"data" => $data,
					);
			
		} else {
			$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => 0,
					"recordsFiltered" => 0,
					"data" => array(),
			);			
		}

		//output to json format
		echo json_encode($output);
	}

    /*
     * Adding a new candidate
     */
    function addedit($mode = 'add', $Candidate_ID = 0)
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('RFID_NO','RFID #','required|numeric');
		$this->form_validation->set_rules('Roll_No','Roll #','required|numeric');
		$this->form_validation->set_rules('Candidate_Name','Candidate Name','required');
		$this->form_validation->set_rules('Address1','Address1','required');
		$this->form_validation->set_rules('Pin','Pin','required|numeric');
		$this->form_validation->set_rules('Guardian_Name','Guardian Name','required');
		$this->form_validation->set_rules('Email_ID','Email ID','required|valid_email');
		$this->form_validation->set_rules('Mob1','Mobile 1','required|numeric|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('Mob2','Mobile 2','numeric|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('School_ID','School ID','required', array('required' => 'Please select a school before add/edit a candidate.'));
		$this->form_validation->set_rules('Class_ID','Class & Section','required');
		$this->form_validation->set_rules('Candidate_Type_ID','Candidate Type','required');
		$this->form_validation->set_rules('Gender','Gender','required');
		$this->form_validation->set_rules('Age','Age','required|less_than[60]');
		
		if (!empty($mode) && $mode == "edit") {
			// check if the candidate exists before trying to edit it
        	$candidate = $this->candidate_model->get_candidate($Candidate_ID);

			if(empty($candidate['Candidate_ID']))
        	{
				$this->session->set_flashdata('flashError','The candidate you are trying to edit does not exist.');
			}
		}

		$params = array(
			'RFID_NO' => $this->input->post('RFID_NO'),
			'Roll_No' => $this->input->post('Roll_No'),
			'Candidate_Name' => $this->input->post('Candidate_Name'),
			'Address1' => $this->input->post('Address1'),
			'Address2' => $this->input->post('Address2'),
			'State' => $this->input->post('State'),
			'Pin' => $this->input->post('Pin'),
			'Guardian_Name' => $this->input->post('Guardian_Name'),
			'Email_ID' => $this->input->post('Email_ID'),
			'Mob1' => $this->input->post('Mob1'),
			'Mob2' => $this->input->post('Mob2'),
			'Blood_Group' => $this->input->post('Blood_Group'),
			'Gender' => $this->input->post('Gender'),
			'Age' => $this->input->post('Age'),
			'Is_Admin' => $this->input->post('Is_Admin'),
			'IN_OUT' => $this->input->post('IN_OUT'),
			'School_ID' => $this->input->post('School_ID'),
			'Class_ID' => $this->input->post('Class_ID'),
			'Candidate_Type_ID' => $this->input->post('Candidate_Type_ID'),
		);
		
		if($this->form_validation->run())     
        {      
			$upload_params = array(
				"path" => "./assets/sitedata/". $this->school_id . "/candidate/",
				"files" => $_FILES,
				"prefix" => $params["RFID_NO"],
				"input_name" => "Image_Name",
				"upload_for" => "candidate",
            	"allowed_types" => CANDIDATE_MEDIA_TYPES
			);

			$upload_info = upload_file($upload_params);
			$params["Image_Name"] = $upload_info["file_name"];

			if (!empty($mode) && $mode == "edit") {				
				$result = $this->candidate_model->update_candidate($Candidate_ID, $params);
				if ($result)
					$this->session->set_flashdata('flashInfo', 'Candidate modified sucessfully.');   
				else
					$this->session->set_flashdata('flashError', 'Some error ocurred! Please try later.');            
			} else {    
            	$candidate_id = $this->candidate_model->add_candidate($params);	
				if ($candidate_id)
					$this->session->set_flashdata('flashInfo', 'Candidate added sucessfully.');	
				else
					$this->session->set_flashdata('flashError', 'Some error ocurred! Please try later.');		            	
			}

			redirect('candidate/index');	
        }
        else
        {
			/*$this->load->model('School_model');
			$data['all_school'] = $this->School_model->get_all_school();*/

			$this->load->model('Edu_class_model');
			$data['all_educlasses'] = $this->Edu_class_model->get_all_educlasses();

			$this->load->model('Candidate_type_model');
			$data['all_candidate_type'] = $this->Candidate_type_model->get_all_candidate_type();	
        }

		if (!empty($mode) && $mode == "edit" && !empty($Candidate_ID) && intval($Candidate_ID) > 0)
			$data['candidate'] = $this->candidate_model->get_candidate($Candidate_ID);
		else
			$data["candidate"] = $params;

		$this->load->template('candidate/addedit', $data);
    }

    /*
     * Deleting candidate
     */
    function remove($Candidate_ID)
    {
        $candidate = $this->candidate_model->get_candidate($Candidate_ID);
        
        // check if the candidate exists before trying to delete it
        if(!empty($candidate['Candidate_ID']))
        {
            $this->candidate_model->delete_candidate($Candidate_ID);
            $this->session->set_flashdata('flashInfo','The candidate deleted successfully.');            
        }
        else {
            $this->session->set_flashdata('flashError','The candidate you are trying to delete does not exist.');
        }
        
        redirect('candidate/index');
    }
    
}
