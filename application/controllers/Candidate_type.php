<?php
/* 
 * Generated by CRUDigniter v2.3 Beta 
 * www.crudigniter.com
 */
 
class Candidate_type extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('candidate_type_model');
    } 

    /*
     * Listing of candidate_type
     */
    function index()
    {
        $data['candidate_type'] = $this->candidate_type_model->get_all_candidate_type();

        $this->load->template('candidate_type/index',$data);
    }

    /*
     * Adding a new candidate_type
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'Type_Name' => $this->input->post('Type_Name'),
            );
            
            $candidate_type_id = $this->candidate_type_model->add_candidate_type($params);
            redirect('candidate_type/index');
        }
        else
        {
            $this->load->template('candidate_type/add');
        }
    }  

    /*
     * Editing a candidate_type
     */
    function edit($ID)
    {   
        // check if the candidate_type exists before trying to edit it
        $candidate_type = $this->candidate_type_model->get_candidate_type($ID);
        
        if(isset($candidate_type['ID']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'Type_Name' => $this->input->post('Type_Name'),
                );

                $this->candidate_type_model->update_candidate_type($ID,$params);            
                redirect('candidate_type/index');
            }
            else
            {   
                $data['candidate_type'] = $this->candidate_type_model->get_candidate_type($ID);
    
                $this->load->template('candidate_type/edit',$data);
            }
        }
        else
            show_error('The candidate_type you are trying to edit does not exist.');
    } 

    /*
     * Deleting candidate_type
     */
    function remove($ID)
    {
        $candidate_type = $this->candidate_type_model->get_candidate_type($ID);

        // check if the candidate_type exists before trying to delete it
        if(isset($candidate_type['ID']))
        {
            $this->candidate_type_model->delete_candidate_type($ID);
            redirect('candidate_type/index');
        }
        else
            show_error('The candidate_type you are trying to delete does not exist.');
    }
    
}