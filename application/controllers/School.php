<?php
class School extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('school_model');        		
    } 

    /*
     * Listing of school
     */
    function index()
    {
        $data['school'] = $this->school_model->get_all_school();        
        $this->load->template('school/index',$data);        
    }

    /*
     * Adding a new school
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('School_Name','School Name','required');
		$this->form_validation->set_rules('Description','Description','required');
		$this->form_validation->set_rules('Address1','Address 1','required');
		$this->form_validation->set_rules('Address2','Address 2','required');
        $this->form_validation->set_rules('Contact','Contact Number','required|numeric|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('State','State','required');
		$this->form_validation->set_rules('Pin','Pin','required|numeric');
		$this->form_validation->set_rules('No_Of_Students','No Of Students','numeric');
		$this->form_validation->set_rules('No_Of_Machines','No Of Machines','numeric');
		$this->form_validation->set_rules('Event_Active','Event Active','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'School_Name' => $this->input->post('School_Name'),
				'Description' => $this->input->post('Description'),
				'Address1' => $this->input->post('Address1'),
				'Address2' => $this->input->post('Address2'),
                'Contact'  => $this->input->post('Contact'),
				'State' => $this->input->post('State'),
				'Pin' => $this->input->post('Pin'),
				'No_Of_Students' => $this->input->post('No_Of_Students'),
				'No_Of_Machines' => $this->input->post('No_Of_Machines'),
				'Event_Active' => $this->input->post('Event_Active'),
            );
            
            $school_id = $this->school_model->add_school($params);
            redirect('school/index');
        }
        else
        {
            
            $this->load->template('school/add');
            
        }
    }  

    /*
     * Editing a school
     */
    function edit($ID)
    {   
        // check if the school exists before trying to edit it
        $school = $this->school_model->get_school($ID);
        
        if(isset($school['ID']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('School_Name','School Name','required');
			$this->form_validation->set_rules('Description','Description','required');
			$this->form_validation->set_rules('Address1','Address1','required');
			$this->form_validation->set_rules('Address2','Address2','required');
            $this->form_validation->set_rules('Contact','Contact Number','required|numeric|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('State','State','required');
			$this->form_validation->set_rules('Pin','Pin','numeric');
			$this->form_validation->set_rules('No_Of_Students','No Of Students','numeric');
			$this->form_validation->set_rules('No_Of_Machines','No Of Machines','numeric');
			$this->form_validation->set_rules('Event_Active','Event Active','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'School_Name' => $this->input->post('School_Name'),
					'Description' => $this->input->post('Description'),
					'Address1' => $this->input->post('Address1'),
					'Address2' => $this->input->post('Address2'),
                    'Contact'  => $this->input->post('Contact'),
					'State' => $this->input->post('State'),
					'Pin' => $this->input->post('Pin'),
					'No_Of_Students' => $this->input->post('No_Of_Students'),
					'No_Of_Machines' => $this->input->post('No_Of_Machines'),
					'Event_Active' => $this->input->post('Event_Active'),
                );

                $this->school_model->update_school($ID,$params);            
                redirect('school/index');
            }
            else
            {   
                $data['school'] = $this->school_model->get_school($ID);
    
                
                $this->load->template('school/edit',$data);
                
            }
        }
        else
            show_error('The school you are trying to edit does not exist.');
    } 

    /*
     * Deleting school
     */
    function remove($ID)
    {
        $school = $this->school_model->get_school($ID);

        // check if the school exists before trying to delete it
        if(isset($school['ID']))
        {
            $this->school_model->delete_school($ID);
            redirect('school/index');
        }
        else
            show_error('The school you are trying to delete does not exist.');
    }
    
}
