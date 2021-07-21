<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends MY_Controller{
    
    public $layout_view = 'layout/default';

    function __construct() {
        parent::__construct();
		if (!$this->session->userdata('loggedin'))
        { 
          redirect('login');
        }
        $this->load->helper('form');
        $this->load->library('table');
        $this->load->model('employee_model');
        $this->layout->title('Employees');
    }
  
    public function index() {        
        $data['table'] = $this->employee_model->select_data();
        $this->layout->view('content/employee/index',$data);
    }
    
    public function submit() {
        $this->load->library('form_validation');			
        $this->form_validation->set_rules('first_name', 'First Name', 'required'); 
        $this->form_validation->set_rules('last_name', 'Last Name', 'required'); 
        $this->form_validation->set_rules('gender', 'Gender', 'required'); 
        $this->form_validation->set_rules('user_name', 'Username', 'required'); 
        $this->form_validation->set_rules('password', 'Password', 'required'); 
		if ($this->form_validation->run() == FALSE && $this->input->post('stat') != 'delete')
		{
			$res = array(
            'stat' => 0, 
            'msg' => 'All fields are required',
            );
			echo json_encode($res);
		}
		else{
        $res = $this->employee_model->submit();
        echo $res;
		}
    }
    
    public function set_data() {
        $res = $this->employee_model->set_data();
        echo $res;
    }

    public function get_contents()
    {
        
        $item_name=$this->input->post('name');
        
        $this->db->select('*');
        $this->db->from('item_details');
        $this->db->where('item_name',$item_name);
        $this->db->where('status',1);
        $query = $this->db->get();
        $result = $query->result();

        foreach ($result as $d) {
    
        $data['rate']    = $d->rate;
        $data['tax']    = $d->tax;      
        }
        echo json_encode($data);
    }
}
