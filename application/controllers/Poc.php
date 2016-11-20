<?php

class Poc extends MY_Controller
{
    private $school_id;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Poc_model');

        $this->load->library('session');
		$this->school_id = $this->session->userdata('school_id');
    } 

    /*
     * Listing of poc
     */
    function index()
    {
        $data['poc'] = $this->Poc_model->get_all_poc();
        $this->load->template('poc/index',$data);
    }

    /*
     * Adding a new poc
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('PointOfContact_Name','PointOfContact Name','required');
		$this->form_validation->set_rules('Mob1','Mob1','required|max_length[10]|numeric');
		$this->form_validation->set_rules('Mob2','Mob2','max_length[10]|numeric');
		$this->form_validation->set_rules('Email_ID','Email ID','valid_email');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'PointOfContact_Name' => $this->input->post('PointOfContact_Name'),
				'Address' => $this->input->post('Address'),
				'Mob1' => $this->input->post('Mob1'),
				'Mob2' => $this->input->post('Mob2'),
				'Email_ID' => $this->input->post('Email_ID'),
				'School_ID' => $this->input->post('School_ID'),
				'Added_On' => $this->input->post('Added_On'),
				'Updated_On' => $this->input->post('Updated_On'),
				'Updated_By' => $this->input->post('Updated_By'),
				'Is_Deleted' => $this->input->post('Is_Deleted'),
            );
            
            $poc_id = $this->Poc_model->add_poc($params);
            redirect('poc/index');
        }
        else
        {

			$this->load->model('School_model');
			$data['all_school'] = $this->School_model->get_all_school();
                
            $this->load->view('poc/add',$data);
        }
    }  

    /*
     * Editing a poc
     */
    function addedit($mode = 'add', $ID = 0)
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('PointOfContact_Name','Name','required');
        $this->form_validation->set_rules('Mob1','Mob1','required|max_length[10]|numeric');
        $this->form_validation->set_rules('Mob2','Mob2','max_length[10]|numeric');
        $this->form_validation->set_rules('Email_ID','Email ID','valid_email');

        $params = array(
            'PointOfContact_Name' => $this->input->post('PointOfContact_Name'),
            'Address' => $this->input->post('Address'),
            'Mob1' => $this->input->post('Mob1'),
            'Mob2' => $this->input->post('Mob2'),
            'Email_ID' => $this->input->post('Email_ID'),
            'School_ID' => $this->input->post('School_ID'),
        );

        if($this->form_validation->run())     
        {
            if ($mode == 'add') {
                $poc_id = $this->Poc_model->add_poc($params);                                            
            } else if ($mode == 'edit') {
                $this->Poc_model->update_poc($ID,$params);
            }

            redirect('poc/index');

        } else {   

            $this->load->model('School_model');
            $data['all_school'] = $this->School_model->get_all_school();

            $data['poc'] = $this->Poc_model->get_poc($ID);
    
            if (empty($data['poc']) && $mode == 'edit') {
                show_error('The poc you are trying to edit does not exist.');
            } else if ($mode == 'add') {
                $data['poc'] = $params;
            }

            $this->load->template('poc/addedit', $data);
        }
    } 

    /*
     * Deleting poc
     */
    function remove($ID)
    {
        $poc = $this->Poc_model->get_poc($ID);

        // check if the poc exists before trying to delete it
        if(isset($poc['ID']))
        {
            $this->Poc_model->delete_poc($ID);
            redirect('poc/index');
        }
        else
            show_error('The poc you are trying to delete does not exist.');
    }
    
}
