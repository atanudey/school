<?php
/* 
 * Generated by CRUDigniter v2.3 Beta 
 * www.crudigniter.com
 */
 
class Sc00001_candidate extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sc00001_candidate_model');
    } 

    /*
     * Listing of sc00001_candidate
     */
    function index()
    {
        $data['sc00001_candidate'] = $this->Sc00001_candidate_model->get_all_sc00001_candidate();

        $this->load->template('sc00001_candidate/index',$data);
    }

    /*
     * Adding a new sc00001_candidate
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('CARD_NO','CARD NO','required');
		$this->form_validation->set_rules('Roll_No','Roll No','required');
		$this->form_validation->set_rules('Candidate_Name','Candidate Name','required');
		$this->form_validation->set_rules('Address1','Address1','required');
		$this->form_validation->set_rules('Pin','Pin','required|numeric');
		$this->form_validation->set_rules('Guardian_Name','Guardian Name','required');
		$this->form_validation->set_rules('Email_ID','Email ID','required|valid_email');
		$this->form_validation->set_rules('Mob1','Mob1','required|numeric');
		$this->form_validation->set_rules('School_ID','School ID','required');
		$this->form_validation->set_rules('Class_ID','Class ID','required');
		$this->form_validation->set_rules('Candidate_Type_ID','Candidate Type ID','required');
		$this->form_validation->set_rules('Gender','Gender','required');
		$this->form_validation->set_rules('Age','Age','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'CARD_NO' => $this->input->post('CARD_NO'),
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
            
            $sc00001_candidate_id = $this->Sc00001_candidate_model->add_sc00001_candidate($params);
            redirect('sc00001_candidate/index');
        }
        else
        {

			$this->load->model('School_model');
			$data['all_school'] = $this->School_model->get_all_school();

			$this->load->model('Edu_class_model');
			$data['all_educlasses'] = $this->Edu_class_model->get_all_educlasses();

			$this->load->model('Candidate_type_model');
			$data['all_candidate_type'] = $this->Candidate_type_model->get_all_candidate_type();
                
            $this->load->template('sc00001_candidate/add',$data);
        }
    }  

    /*
     * Editing a sc00001_candidate
     */
    function edit($Candidate_ID)
    {   
        // check if the sc00001_candidate exists before trying to edit it
        $sc00001_candidate = $this->Sc00001_candidate_model->get_sc00001_candidate($Candidate_ID);
        
        if(isset($sc00001_candidate['Candidate_ID']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('CARD_NO','CARD NO','required');
			$this->form_validation->set_rules('Roll_No','Roll No','required');
			$this->form_validation->set_rules('Candidate_Name','Candidate Name','required');
			$this->form_validation->set_rules('Address1','Address1','required');
			$this->form_validation->set_rules('Pin','Pin','required|numeric');
			$this->form_validation->set_rules('Guardian_Name','Guardian Name','required');
			$this->form_validation->set_rules('Email_ID','Email ID','required|valid_email');
			$this->form_validation->set_rules('Mob1','Mob1','required|numeric');
			$this->form_validation->set_rules('School_ID','School ID','required');
			$this->form_validation->set_rules('Class_ID','Class ID','required');
			$this->form_validation->set_rules('Candidate_Type_ID','Candidate Type ID','required');
			$this->form_validation->set_rules('Gender','Gender','required');
			$this->form_validation->set_rules('Age','Age','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'CARD_NO' => $this->input->post('CARD_NO'),
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

                $this->Sc00001_candidate_model->update_sc00001_candidate($Candidate_ID,$params);            
                redirect('sc00001_candidate/index');
            }
            else
            {   
                $data['sc00001_candidate'] = $this->Sc00001_candidate_model->get_sc00001_candidate($Candidate_ID);
    
				$this->load->model('School_model');
				$data['all_school'] = $this->School_model->get_all_school();

				$this->load->model('Edu_class_model');
				$data['all_educlasses'] = $this->Edu_class_model->get_all_educlasses();

				$this->load->model('Candidate_type_model');
				$data['all_candidate_type'] = $this->Candidate_type_model->get_all_candidate_type();

                $this->load->template('sc00001_candidate/edit',$data);
            }
        }
        else
            show_error('The sc00001_candidate you are trying to edit does not exist.');
    } 

    /*
     * Deleting sc00001_candidate
     */
    function remove($Candidate_ID)
    {
        $sc00001_candidate = $this->Sc00001_candidate_model->get_sc00001_candidate($Candidate_ID);

        // check if the sc00001_candidate exists before trying to delete it
        if(isset($sc00001_candidate['Candidate_ID']))
        {
            $this->Sc00001_candidate_model->delete_sc00001_candidate($Candidate_ID);
            redirect('sc00001_candidate/index');
        }
        else
            show_error('The sc00001_candidate you are trying to delete does not exist.');
    }
    
}