<?php
 
class Machine extends MY_Controller
{
    private $school_id;
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Machine_model');

        $this->load->library('session');
		$this->school_id = $this->session->userdata('school_id');
    } 

    /*
     * Listing of machines
     */
    function index()
    {
        $data['machines'] = $this->Machine_model->get_all_machines();
        $this->load->template('machine/index',$data);
    }  

    /*
     * Adding or Editing a machine
     */
    function addedit($mode = 'add', $ID = 0) {

        $this->load->library('form_validation');
		$this->form_validation->set_rules('SIM_No','SIM No','required|max_length[25]|numeric');

        $params = array(
            'SIM_No' => $this->input->post('SIM_No'),
            'Provider' => $this->input->post('Provider'),
            'Is_Active' => $this->input->post('Is_Active'),
            'School_ID' => $this->input->post('School_ID'),
        );

        if($this->form_validation->run())     
        {
            if ($mode == 'add') {
                $machine_id = $this->Machine_model->add_machine($params);                                            
            } else if ($mode == 'edit') {
                $this->Machine_model->update_machine($ID,$params);
            }

            redirect('machine/index');

        } else {   

            $this->load->model('School_model');
            $data['all_school'] = $this->School_model->get_all_school();

            $data['machine'] = $this->Machine_model->get_machine($ID);
    
            if (empty($data['machine']) && $mode == 'edit') {
                show_error('The poc you are trying to edit does not exist.');
            } else if ($mode == 'add') {
                $data['machine'] = $params;
            }

            $this->load->template('machine/addedit', $data);
        }
    }

    /*
     * Deleting machine
     */
    function remove($ID)
    {
        $machine = $this->Machine_model->get_machine($ID);

        // check if the machine exists before trying to delete it
        if(isset($machine['ID']))
        {
            $this->Machine_model->delete_machine($ID);
            redirect('machine/index');
        }
        else
            show_error('The machine you are trying to delete does not exist.');
    }
    
}
