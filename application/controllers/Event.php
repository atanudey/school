<?php

class Event extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Event_type_model');
        $this->load->model('Event_model');
        $this->load->model('Sms_provider_model');

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
            $event_type = $this->Event_type_model->get_event_type($event['Event_Type_ID']);
            $data['event'][$i]['Event_Type'] = $event_type['Type_Name'];
            $i++;
        }

        $this->load->template('event/index', $data);
    }

    /*
     * Adding or Editing a class
     */
    function addedit($mode = 'add', $ID = 0)
    {  
        $this->load->library('form_validation');

        $this->form_validation->set_rules('Event_Type_ID','Event Type','required');
		$this->form_validation->set_rules('Title','Title','required');
		//$this->form_validation->set_rules('Description','Description','required');
		$this->form_validation->set_rules('Date','Date','required');
		$this->form_validation->set_rules('School_ID','School','required');

        $params = array(
            'Title' => $this->input->post('Title'),
            'Description' => $this->input->post('Description'),
            'Message' => $this->input->post('Message'),
            'Date' => convert_to_mysql_date($this->input->post('Date')),
            'School_ID' => $this->input->post('School_ID'),
            'Event_Type_ID' => $this->input->post('Event_Type_ID'),
        );

        $upload_params = array(
            "path" => "./assets/sitedata/". $this->school_id . "/events/",
            "files" => $_FILES,
            "prefix" => $params["Title"],
            "input_name" => "event_file",
            "upload_for" => "event",
            "allowed_types" => "pdf|doc|docx|ppt|pptx|xls|xlsx"
        );

        $params["File_Name"] = "";
        if (!empty($_FILES)) {
            $upload_info = upload_file($upload_params);
            $params["File_Name"] = $upload_info["file_name"];
        }
        
        if ($mode == 'add') {
            if($this->form_validation->run())     
            {
                $result = $this->Event_model->add_event($params);

                if ($result) {
                    $this->session->set_flashdata('flashInfo', 'Event added sucessfully.');                    
                } else {
                    $this->session->set_flashdata('flashError', 'Failed to add event!');                    
                }
                
                redirect('event/index');
            }
        } else if (!empty($params["Title"])) {   
            if($this->form_validation->run())     
            {                 
                // check if the event exists before trying to edit it
                $event = $this->Event_model->get_event($ID);

                if(!isset($event['ID'])) {
                    $this->session->set_flashdata('flashInfo','The event you are trying to edit does not exist.');
                } else {                    
                    $result = $this->Event_model->update_event($ID, $params);
                    if ($result) {
                        $this->session->set_flashdata('flashInfo', 'Eevnt modified sucessfully.');	
                    } else {
                        $this->session->set_flashdata('flashError', 'Failed to modify event!');                    
                    }
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
        if(!empty($event['ID']))
        {
            $this->Event_model->delete_event($ID);

            $path = "./assets/sitedata/". $this->school_id . "/events/";

            $check_file = $path . $event['File_Name'];
            if (!empty($event['File_Name']) && file_exists($check_file)){
                unlink($check_file);
            }

            $this->session->set_flashdata('flashInfo', 'Event deleted successfully.');            
        }
        else {
            $this->session->set_flashdata('flashError','The event you are trying to delete does not exist.');
        }
        redirect('event/index');
    }

    function notify($Event_ID) {

        $data["event"] = $this->Event_model->get_event($Event_ID);

        $this->load->model('report_model');	
		$this->load->model('school_model');
		$this->load->model('edu_class_model');

		if (!empty($this->school_id)) {
			$classes = $this->edu_class_model->get_all_class_by_school($this->school_id);
		}

		$data['classes'] = array();
		$data['sections'] = array();
		if (!empty($classes)) {
			foreach($classes as $class) {
				if (!in_array($class['Name'], $data['classes'])) {
					$data['classes'][] = $class['Name'];
				}	
			}

			foreach($classes as $class) {
				if (!in_array($class['Section'], $data['sections'])) {
					$data['sections'][] = $class['Section'];
				}	
			}
		}

        $data['Event_ID'] = $Event_ID;

        $this->load->template('event/notify', $data);
    }

    function do_notify_ajax() {
        $this->load->model('candidate_model');
        $students = array();
        
        switch ($this->input->post('type')) {
            case "all":
                $students = $this->candidate_model->get_all_candidate();
                break;

            case "class":
                $classes = explode(",", $this->input->post('classes'));
                $sections = explode(",", $this->input->post('sections'));
                $students = $this->candidate_model->get_candidate_by_class_section($classes, $sections);
                break;

            case "student":
                $students_param = explode(",", $this->input->post('students'));
                $students = $this->candidate_model->get_candidate_multiple($students_param);
                break;
        }

        //print_r($students);

        $formdata = explode("&", $this->input->post('formdata'));
        foreach ($formdata as $data) {
            list($key, $val) = explode("=", $data);
            $notify_param[$key] = preg_replace('/<[^<]+?>/', ' ', urldecode($val));
        }

        $params = array(
            "Message" => $notify_param["Message"],
            "Message_Type" => $notify_param["notification_type"]
        );

        $params["No_Message_Sent"] = count($students);
        $this->Event_model->update_event($notify_param['Event_ID'], $params);

        //print_r($params); die;

        switch($notify_param["notification_type"]) {
            case "email":
                if ($this->send_email_notification($students, $notify_param))
                    echo json_encode(array("success" => true));

                break;

            case "sms":
                $response = json_decode($this->send_sms_notification($students, $notify_param));
                
                if (!empty($response) && $response->status != "failure")
                    echo json_encode(array("success" => true));
                else
                    echo json_encode($response);

                break;
        }
    }

    function send_email_notification($students, $notify_param) {
        $event = $this->Event_model->get_event($notify_param['Event_ID']);

        /*$to_emails = implode(', ', array_map(function ($entry) {
            return $entry['Email_ID'];
        }, $students));*/
        
        foreach ($students as $student) {

            $SITE_EMAIL = $this->config->item('site_email');
            $SITE_EMAIL_NAME = $this->config->item('site_email_name');            
            
            $data = array_merge($student, $notify_param);

            $school = $this->session->userdata('school');
            $data["School_Name"] = $school["School_Name"];
            
            $email_params = array(			
                "template_path" => 'templates/event_notify_email',
                "template_data" => $data,
                "from" => $SITE_EMAIL,
                "from_name" => $SITE_EMAIL_NAME,
                "to" => $data['Email_ID'],
                "to_name" => $data['Guardian_Name'],
                "subject" => $data["Title"],
                "attachment" => "./assets/sitedata/". $this->school_id . "/events/" . $event['File_Name'],			
            );
            
            send_email($email_params);
        }

        return true;
    }

    function send_sms_notification($students, $notify_param) {
        
        $sms_provider = $this->Sms_provider_model->get_all_sms_provider(array('SMS_Type' => 'Promotion'));

        //foreach ($students as $student) {
        
        $provider_name = $sms_provider[0]["Provider_Name"];

        $username = $sms_provider[0]["Provider_Username"];            
        $hash = $sms_provider[0]["API_Key"];

        // Message details
        $numbers = implode(', ', array_map(function ($entry) {
            return $entry['Mob1'];
        }, $students));

        $sender_id = urlencode($sms_provider[0]["Sender_ID"]);
        $message = rawurlencode($notify_param["Message"]);

        // Prepare data for POST request
        $data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender_id, "message" => $message);
        
        //Send SMS helper called
        $response = send_sms($provider_name, $data);
        
        return $response;
    }
}