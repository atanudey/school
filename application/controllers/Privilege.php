<?php

class Privilege extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_privilege_model');
    } 

    /*
     * Listing of privilege
     */
    function index()
    {
        $data['privilege'] = $this->User_privilege_model->get_all_privilege();

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
    
    public function combpk($str, $ID)
    {
        $Screen_Master_ID = $this->input->post('Screen_Master_ID');
        $User_Type_ID = $this->input->post('User_Type_ID');
        //$ID = $this->input->post('User_Type_ID');
        
        $this->db->where('Screen_Master_ID', $Screen_Master_ID);
        $this->db->where('User_Type_ID', $User_Type_ID);
        $result = $this->db->get('User_Privilege');
        
        $data = $result->row_array();
 
        if($result->num_rows() > 0 && $data['ID'] != $ID)
        {
           $this->form_validation->set_message('combpk','A privilege already given for the type of the screen to the the type of the user.'); // set your message
           return false;
        }
        else{ return true;}

    }

    /*
     * Adding or Editing a privilege
     */

     function addedit($mode = 'add', $ID = 0) {

        $this->load->library('form_validation');

	$this->form_validation->set_rules('Is_Active','Is Active','required');
        $this->form_validation->set_rules('Screen_Master_ID','Screen Master ID','required');
        $this->form_validation->set_rules('User_Type_ID','User Type ID','required');
        
        $this->form_validation->set_rules('Screen_Master_ID', 'User_Type_ID', 'callback_combpk['.$ID.']');
    
        $params = array(
            'Is_Active' => $this->input->post('Is_Active'),
            'Remarks' => $this->input->post('Remarks'),
            'Screen_Master_ID' => $this->input->post('Screen_Master_ID'),
            'User_Type_ID' => $this->input->post('User_Type_ID'),
            'ID' => $ID,
        );

        if($this->form_validation->run())     
        {
            if ($mode == 'add') {
                $result = $this->User_privilege_model->add_privilege($params);    
                
                if ($result) {
                    $this->session->set_flashdata('flashInfo', 'Privilege added sucessfully.');
                } else {
                    $this->session->set_flashdata('flashError', 'Failed to add Privilege!');
                }
            } else if ($mode == 'edit') {
                $result = $this->User_privilege_model->update_privilege($ID,$params); 
                
                if ($result) {
                    $this->session->set_flashdata('flashInfo', 'Privilege modified sucessfully.');
                } else {
                    $this->session->set_flashdata('flashError', 'Failed to modify Privilege!');
                }
            }

            redirect('privilege/index');

        } else {   

            $this->load->model('Screen_model');
            $data['all_screen_master'] = $this->Screen_model->get_all_screen();

            $this->load->model('User_type_model');
            $data['all_user_type'] = $this->User_type_model->get_all_user_type();

            // check if the privilege exists before trying to edit it
            $data['privilege'] = $this->User_privilege_model->get_privilege($ID);
            $data['privilege']['Screen_Name'] = $data['all_screen_master'];
    
            if (empty($data['privilege']) && $mode == 'edit') {
                $this->session->set_flashdata('flashError', 'The privilege you are trying to edit does not exist.');
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
        $privilege = $this->User_privilege_model->get_privilege($ID);

        // check if the privilege exists before trying to delete it
        if(isset($privilege['ID']))
        {
            $this->User_privilege_model->delete_privilege($ID);
            $this->session->set_flashdata('flashInfo','The privilege deleted successfully.');           
        } else {
            $this->session->set_flashdata('flashError','The privilege you are trying to delete does not exist.');
        }    
        
        redirect('privilege/index');        
    }
    
}
