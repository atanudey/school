<?php

class Sms_provider extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sms_provider_model');

        $this->load->library('session');
		$this->school_id = $this->session->userdata('school_id');        
    } 

    /*
     * Listing of sms_provider
     */
    function index()
    {
        $data['sms_provider'] = $this->Sms_provider_model->get_all_sms_provider();
        $this->load->template('sms_provider/index',$data);      
    }

    /*
     * Adding or Editing SMS Providers
     */
    function addedit($mode = 'add', $ID = 0) {

        $this->load->library('form_validation');        
		$this->form_validation->set_rules('Provider_Name','Provider Name','required');
        $this->form_validation->set_rules('SMS_Type','SMS Type','required');
        $this->form_validation->set_rules('SMS_Count','SMS Count','required|numeric');
        $this->form_validation->set_rules('API_Key','API Key','required');
        $this->form_validation->set_rules('Route','Route','required');
        $this->form_validation->set_rules('Recharge_Date','Recharge Date','required');
        //$this->form_validation->set_rules('Provider_Password','Provider Password','required');

        $params = array(
            'School_ID' => $this->school_id,
            'Provider_Name' => $this->input->post('Provider_Name'),
            'SMS_Type' => $this->input->post('SMS_Type'),
            'SMS_Count' => $this->input->post('SMS_Count'),
            'API_Key' => $this->input->post('API_Key'),
            'Route' => $this->input->post('Route'),
            'Recharge_Date' => convert_to_mysql_date($this->input->post('Recharge_Date')),
            'Provider_Password' => $this->input->post('Provider_Password'),
            'Is_Active' => $this->input->post('Is_Active'),            
        );

        if($this->form_validation->run())     
        {
            if ($mode == 'add') {
                $sms_provider_id = $this->Sms_provider_model->add_sms_provider($params);
            } else if ($mode == 'edit') {
                $this->Sms_provider_model->update_sms_provider($ID,$params);
            }

            redirect('sms_provider/index');

        } else {   
            // check if the sms_provider exists before trying to edit it
            $data['sms_provider'] = $this->Sms_provider_model->get_sms_provider($ID);

            //print_r($data); die;
    
            if (empty($data['sms_provider']) && $mode == 'edit') {
                show_error('The sms provider you are trying to edit does not exist.');
            } else if ($mode == 'add') {
                $data['sms_provider'] = $params;
            }

            $providers = $this->Sms_provider_model->Predefined_SMS_Provider();

            foreach($providers as $provider) {
                $data['predefined_sms_provider'][$provider["ID"]] = $provider["Provider_Name"] . " (" . $provider["SMS_Type"] . ")";
            }

            $this->load->template('sms_provider/addedit', $data);
        }
    }    

    function get_provider_info() {

        $ID = $this->input->post("ID");
        echo json_encode($this->Sms_provider_model->get_sms_provider($ID));        
    }

    /*
     * Deleting sms_provider
     */
    function remove($ID)
    {
        $sms_provider = $this->Sms_provider_model->get_sms_provider($ID);

        // check if the sms_provider exists before trying to delete it
        if(isset($sms_provider['ID']))
        {
            $this->Sms_provider_model->delete_sms_provider($ID);
            redirect('sms_provider/index');
        }
        else
            show_error('The sms_provider you are trying to delete does not exist.');
    }
    
}
