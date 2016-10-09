<?php
 
class User_type extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_type_model');
    } 

    /*
     * Listing of user_type
     */
    function index()
    {
        $data['user_type'] = $this->User_type_model->get_all_user_type();

        $this->load->view('user_type/index',$data);
    }

    /*
     * Adding a new user_type
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('Type_Name','Type Name','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'Type_Name' => $this->input->post('Type_Name'),
            );
            
            $user_type_id = $this->User_type_model->add_user_type($params);
            redirect('user_type/index');
        }
        else
        {
            $this->load->view('user_type/add');
        }
    }  

    /*
     * Editing a user_type
     */
    function edit($ID)
    {   
        // check if the user_type exists before trying to edit it
        $user_type = $this->User_type_model->get_user_type($ID);
        
        if(isset($user_type['ID']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('Type_Name','Type Name','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'Type_Name' => $this->input->post('Type_Name'),
                );

                $this->User_type_model->update_user_type($ID,$params);            
                redirect('user_type/index');
            }
            else
            {   
                $data['user_type'] = $this->User_type_model->get_user_type($ID);
    
                $this->load->view('user_type/edit',$data);
            }
        }
        else
            show_error('The user_type you are trying to edit does not exist.');
    } 

    /*
     * Deleting user_type
     */
    function remove($ID)
    {
        $user_type = $this->User_type_model->get_user_type($ID);

        // check if the user_type exists before trying to delete it
        if(isset($user_type['ID']))
        {
            $this->User_type_model->delete_user_type($ID);
            redirect('user_type/index');
        }
        else
            show_error('The user_type you are trying to delete does not exist.');
    }
    
}
