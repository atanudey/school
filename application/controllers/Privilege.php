<?php

class Privilege extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Privilege_model');
    } 

    /*
     * Listing of privilege
     */
    function index()
    {
        $data['privilege'] = $this->Privilege_model->get_all_privilege();

        $i = 0;
        foreach($data['privilege'] as $privilege) {

            $this->load->model('Screen_model');
            $screen = $this->Screen_model->get_screen($privilege['Screen_Master_ID']);
            $data['privilege'][$i]['Screen_Name'] = $screen['Screen_Name'];

            $this->load->model('User_type_model');
            $type = $this->User_type_model->get_user_type($privilege['User_Type_ID']);
            $data['privilege'][$i]['Type_Name'] = $type['Type_Name'];

            $i++;
        }

        $this->load->template('privilege/index',$data);
    }

    /*
     * Adding or Editing a privilege
     */

     function addedit($mode = 'add', $ID = 0) {

        $this->load->library('form_validation');

		$this->form_validation->set_rules('Is_Active','Is Active','required');
        $this->form_validation->set_rules('Screen_Master_ID','Screen Master ID','required');
        $this->form_validation->set_rules('User_Type_ID','User Type ID','required');

        $params = array(
            'Is_Active' => $this->input->post('Is_Active'),
            'Remarks' => $this->input->post('Remarks'),
            'Screen_Master_ID' => $this->input->post('Screen_Master_ID'),
            'User_Type_ID' => $this->input->post('User_Type_ID'),
        );

        if($this->form_validation->run())     
        {
            if ($mode == 'add') {
                $privilege_id = $this->Privilege_model->add_privilege($params);                                           
            } else if ($mode == 'edit') {
                $this->Privilege_model->update_privilege($ID,$params); 
            }

            redirect('privilege/index');

        } else {   

            $this->load->model('Screen_model');
            $data['all_screen_master'] = $this->Screen_model->get_all_screen();

            $this->load->model('User_type_model');
            $data['all_user_type'] = $this->User_type_model->get_all_user_type();

            // check if the privilege exists before trying to edit it
            $data['privilege'] = $this->Privilege_model->get_privilege($ID);
            $data['privilege']['Screen_Name'] = $data['all_screen_master'];
    
            if (empty($data['privilege']) && $mode == 'edit') {
                show_error('The privilege you are trying to edit does not exist.');
            } else if ($mode == 'add') {
                $data['privilege'] = $params;
            }

            $this->load->template('privilege/addedit', $data);
        }
     }

    /*
     * Deleting privilege
     */
    function remove($ID)
    {
        $privilege = $this->Privilege_model->get_privilege($ID);

        // check if the privilege exists before trying to delete it
        if(isset($privilege['ID']))
        {
            $this->Privilege_model->delete_privilege($ID);
            redirect('privilege/index');
        }
        else
            show_error('The privilege you are trying to delete does not exist.');
    }
    
}
