<?php
/* 
 * Generated by CRUDigniter v2.3 Beta 
 * www.crudigniter.com
 */
 
class Customer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model');
		
		// Load helpers and library
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
    } 

    /*
     * Listing of customers
     */
    function index()
    {
        $data['customers'] = $this->customer_model->get_all_customers();
		$this->load->view('header');
        $this->load->view('customer/index',$data);
		$this->load->view('footer');
    }

    /*
     * Adding a new customer
     */
    function add()
    {   		        
		$this->form_validation->set_rules('customerName','CustomerName','required|alpha');
		$this->form_validation->set_rules('contactLastName','ContactLastName','required|alpha');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'customerName' => $this->input->post('customerName'),
				'contactLastName' => $this->input->post('contactLastName'),
				'contactFirstName' => $this->input->post('contactFirstName'),
				'phone' => $this->input->post('phone'),
				'addressLine1' => $this->input->post('addressLine1'),
				'addressLine2' => $this->input->post('addressLine2'),
				'city' => $this->input->post('city'),
				'state' => $this->input->post('state'),
				'postalCode' => $this->input->post('postalCode'),
				'country' => $this->input->post('country'),
				'salesRepEmployeeNumber' => $this->input->post('salesRepEmployeeNumber'),
				'creditLimit' => $this->input->post('creditLimit'),
            );
            
            $customer_id = $this->customer_model->add_customer($params);
            redirect('customer/index');
        }
        else
        {
			$this->load->view('header');
			$this->load->view('customer/add');
			$this->load->view('footer');            
        }
    }  

    /*
     * Editing a customer
     */
    function edit($customerNumber)
    {   
        // check if the customer exists before trying to edit it
        $customer = $this->customer_model->get_customer($customerNumber);
        
        if(isset($customer['customerNumber']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('customerName','CustomerName','required|alpha');
			$this->form_validation->set_rules('contactLastName','ContactLastName','required|alpha');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'customerName' => $this->input->post('customerName'),
					'contactLastName' => $this->input->post('contactLastName'),
					'contactFirstName' => $this->input->post('contactFirstName'),
					'phone' => $this->input->post('phone'),
					'addressLine1' => $this->input->post('addressLine1'),
					'addressLine2' => $this->input->post('addressLine2'),
					'city' => $this->input->post('city'),
					'state' => $this->input->post('state'),
					'postalCode' => $this->input->post('postalCode'),
					'country' => $this->input->post('country'),
					'salesRepEmployeeNumber' => $this->input->post('salesRepEmployeeNumber'),
					'creditLimit' => $this->input->post('creditLimit'),
                );

                $this->customer_model->update_customer($customerNumber,$params);            
                redirect('customer/index');
            }
            else
            {   
                $data['customer'] = $this->customer_model->get_customer($customerNumber);
				
				$this->load->view('header');
                $this->load->view('customer/edit',$data);
				$this->load->view('footer');
            }
        }
        else
            show_error('The customer you are trying to edit does not exist.');
    } 

    /*
     * Deleting customer
     */
    function remove($customerNumber)
    {
        $customer = $this->customer_model->get_customer($customerNumber);

        // check if the customer exists before trying to delete it
        if(isset($customer['customerNumber']))
        {
            $this->customer_model->delete_customer($customerNumber);
            redirect('customer/index');
        }
        else
            show_error('The customer you are trying to delete does not exist.');
    }
    
}
