<?php

class Edu_class extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Edu_class_model');
    } 

    /*
     * Listing of educlasses
     */
    function index()
    {
        $data['educlasses'] = $this->Edu_class_model->get_all_educlasses();

        $this->load->template('edu_class/index',$data);
    }

    /*
     * Adding a new educlass
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('Name','Class','required');
		$this->form_validation->set_rules('Section','Section','required');

        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'Name' => $this->input->post('Name'),
				'Section' => $this->input->post('Section'),
            );
            
            if($this->form_validation->run())     
            {
                $educlass_id = $this->Edu_class_model->add_educlass($params);
                redirect('edu_class/index');
            }
        }
        
        $this->load->template('edu_class/add');
    }  

    /*
     * Editing a educlass
     */
    function edit($ID)
    {   
        // check if the educlass exists before trying to edit it
        $educlass = $this->Edu_class_model->get_educlass($ID);

        $this->load->library('form_validation');

		$this->form_validation->set_rules('Name','Class','required');
		$this->form_validation->set_rules('Section','Section','required');
        
        if(isset($educlass['ID']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'Name' => $this->input->post('Name'),
					'Section' => $this->input->post('Section'),
                );

                if($this->form_validation->run())     
                {
                    $this->Edu_class_model->update_educlass($ID,$params);            
                    redirect('edu_class/index');
                }
            }
            else
            {   
                $data['educlass'] = $this->Edu_class_model->get_educlass($ID);
                $this->load->template('edu_class/edit',$data);
            }
        }
        else
            show_error('The educlass you are trying to edit does not exist.');
    } 

    /*
     * Deleting educlass
     */
    function remove($ID)
    {
        $educlass = $this->Edu_class_model->get_educlass($ID);

        // check if the educlass exists before trying to delete it
        if(isset($educlass['ID']))
        {
            $this->Edu_class_model->delete_educlass($ID);
            redirect('edu_class/index');
        }
        else
            show_error('The educlass you are trying to delete does not exist.');
    }
    
}
