<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public $layout_view = 'layout/login';

	function __construct() {
      parent::__construct(); 
      if ($this->session->userdata('loggedin'))
       { 
          redirect('home');
       }       
      $this->layout->title('Login');
   	}

	public function index()
	{
		$this->layout->view('content/login/index');	
	}
   	public function verify()
   	{
   		$this->load->model('login_model');
	   	if($this->login_model->login($this->input->post('username'), $this->input->post('password')) || isset($this->session->userdata['logged_in']))
	      {

	      		$name = $this->session->userdata['loggedin']['first_name']." ".$this->session->userdata['loggedin']['last_name'];
	      		$this->session->set_flashdata('success', "Welcome $name! ");	      		
				redirect(base_url());
	      }
	      else 
	      {
	      	$this->session->set_flashdata('failed', 'Invalid username or password !');
	        redirect('login');	      	
	      }
   }
}
