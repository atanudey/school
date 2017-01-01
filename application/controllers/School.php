<?php
class School extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('school_model'); 

        $this->load->library('session');       		
    } 

    /*
     * Listing of school
     */
    function index()
    {
        $data['school'] = $this->school_model->get_all_school();        
        $this->load->template('school/index',$data);        
    } 

    function choose_school_ajax() {
        $schid = $this->input->post("school_id");
		if (!empty($schid)) {
			$this->session->set_userdata('school_id', $schid);
            $this->session->set_userdata('school', $this->school_model->get_school($schid));                   		
		} else {
            unset($_SESSION['school_id']);
            unset($_SESSION['school']);
            //echo json_encode(array("error" => true, "message" => "School id missing"));
        }

        echo json_encode(array("success" => true));     
    }

    /*
     * Adding or Editing a school
     */

    function addedit($mode = 'add', $ID = 0)
    {   
        $this->load->library('form_validation');

        $this->form_validation->set_rules('School_Name','School Name','required');
        //$this->form_validation->set_rules('Description','Description','required');
        $this->form_validation->set_rules('Address1','Address1','required');
        //$this->form_validation->set_rules('Address2','Address2','required');
        $this->form_validation->set_rules('Contact','Contact Number','required|numeric|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('State','State','required');
        $this->form_validation->set_rules('Pin','Pin','numeric');
        //$this->form_validation->set_rules('No_Of_Students','No Of Students','numeric');
        //$this->form_validation->set_rules('No_Of_Machines','No Of Machines','numeric');
        //$this->form_validation->set_rules('Event_Active','Event Active','required');

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
        }        

        if ($mode == 'edit' && !empty($ID)) {
            // check if the school exists before trying to edit it
            if(!empty($params))
            {
                $result = $this->school_model->update_school($ID, $params); 
                if ($result) {
                    $this->session->set_flashdata('flashInfo', 'School modified sucessfully.');
                } else {
                    $this->session->set_flashdata('flashError', 'Failed to modify school!');
                }
                
                redirect('school/index');
            }
            else
            { 
                $school = $this->school_model->get_school($ID);  
                if (!empty($school)) {
                    $data['school'] = $school;
                } else {
                    $this->session->set_flashdata('flashError', 'The school you are trying to edit does not exist.');                          
                    redirect('school/index');
                }
            }
        } else if ($mode == 'add') { 
            if (!empty($params)) {
                $school_id = $this->school_model->add_school($params);

                if ($school_id) {
                    $this->session->set_flashdata('flashInfo', 'School added sucessfully.');
                } else {
                    $this->session->set_flashdata('flashError', 'Failed to add school!');
                }
                redirect('school/index');
            } else {
                 $params = array(
                    'School_Name' => "",
                    'Description' => "",
                    'Address1' => "",
                    'Address2' => "",
                    'Contact'  => "",
                    'State' => "",
                    'Pin' => "",
                    'No_Of_Students' => "",
                    'No_Of_Machines' => "",
                    'Event_Active' => "",
                );

                $data["school"] = $params;
            }            
        }

        $this->load->template('school/addedit',$data); 
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
            $this->session->set_flashdata('flashInfo','The school deleted successfully.');
        }
        else {
            $this->session->set_flashdata('flashError', 'The school you are trying to delete does not exist.');
        }
        
        redirect('school/index');
    }
    
}
