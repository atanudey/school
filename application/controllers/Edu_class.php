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
     * Adding or Editing a class
     */
    function addedit($mode = 'add', $ID = 0)
    {  
        $this->load->library('form_validation');

		$this->form_validation->set_rules('Name','Class','required');
		$this->form_validation->set_rules('Section','Section','required');

        $params = array();
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
                'Name' => $this->input->post('Name'),
                'Section' => $this->input->post('Section'),
            );
        }

        if($this->form_validation->run())     
        {
            if ($mode == 'add') {
                $this->Edu_class_model->add_educlass($params);  
            } else if (!empty($ID) && intval($ID) > 0) {                    
                // check if the educlass exists before trying to edit it
                $educlass = $this->Edu_class_model->get_educlass($ID);

                if(!isset($educlass['ID'])) {
                    show_error('The educlass you are trying to edit does not exist.');
                } else {
                    $this->Edu_class_model->update_educlass($ID, $params);
                }  
            }                                  
            redirect('edu_class/index');
        } else {
            if ($mode == 'add') {
                $params = array(
                    'Name' => "",
                    'Section' => "",
                );
            } else {
                $params = $this->Edu_class_model->get_educlass($ID);
            }                
        }

        $data['educlass'] = $params;
        $this->load->template('edu_class/addedit',$data);
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
