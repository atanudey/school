<?php

class Event extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Event_type_model');
        $this->load->model('Event_model');

        $this->load->library('session');
		$this->school_id = $this->session->userdata('school_id');
    } 

    /*
     * Listing of event
     */
    function index()
    {        
		$data['event'] = $this->Event_model->get_all_event();
        $i = 0;
        foreach($data['event'] as $event) {
            $data['event'][$i]['Event_Type'] = $this->Event_type_model->get_event_type($event['Event_Type_ID'])['Type_Name'];
            $i++;
        }

        $this->load->template('event/index',$data);
    }

    /*
     * Adding or Editing a class
     */
    function addedit($mode = 'add', $ID = 0)
    {  
        $this->load->library('form_validation');

		$this->form_validation->set_rules('Title','Title','required');
		$this->form_validation->set_rules('Description','Description','required');
		$this->form_validation->set_rules('Date','Date','required');
		$this->form_validation->set_rules('School_ID','School ID','required');

        $params = array(
            'Title' => $this->input->post('Title'),
            'Description' => $this->input->post('Description'),
            'Message' => $this->input->post('Message'),
            'Date' => convert_to_mysql_date($this->input->post('Date')),
            'School_ID' => $this->input->post('School_ID'),
            'Event_Type_ID' => $this->input->post('Event_Type_ID'),
        ); 

        //print_r($_FILES); print_r($params); die;    

        if (!empty($_FILES)) {
            $config['upload_path']   = './assets/sitedata/'. $this->school_id . "/events/";
            $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';

            $config['file_name'] = str_replace(" ", "_", $params['Title']). "_" . time(). "." . pathinfo($_FILES['event_file']['name'], PATHINFO_EXTENSION);

            $params['File_Name'] = $config['file_name'];

            //$config['max_size']             = 100;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('event_file'))
            {
                $error = array('error' => $this->upload->display_errors());              
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());                
            }
        }
        
        if ($mode == 'add') {
            if($this->form_validation->run())     
            {
                $result = $this->Event_model->add_event($params);

                if ($result)
                    $this->session->set_flashdata('flashInfo', 'Event added sucessfully.');  
            }   

            redirect('event/index');

        } else if (!empty($params["Title"])) {   
            if($this->form_validation->run())     
            {                 
                // check if the event exists before trying to edit it
                $event = $this->Event_model->get_event($ID);

                if(!isset($event['ID'])) {
                    $this->session->set_flashdata('flashInfo','The event you are trying to edit does not exist.');
                } else {                    
                    $result = $this->Event_model->update_event($ID, $params);
                    if ($result)
                        $this->session->set_flashdata('flashInfo', 'Eevnt modified sucessfully.');	
                } 

                redirect('event/index');
            }
        }  else if ($mode == 'edit') {            
            $params = $this->Event_model->get_event($ID);            
        }    
        
		$data['all_event_type'] = $this->Event_type_model->get_all_event_type();

        $data['event'] = $params;
        $this->load->template('event/addedit',$data);
    } 

    /*
     * Deleting event
     */
    function remove($ID)
    {
        $event = $this->Event_model->get_event($ID);

        // check if the event exists before trying to delete it
        if(isset($event['ID']))
        {
            $this->Event_model->delete_event($ID);
            $this->session->set_flashdata('flashInfo','Event deleted successfully.');
            redirect('event/index');
        }
        else
            $this->session->set_flashdata('flashInfo','The event you are trying to delete does not exist.');
    }
    
}
