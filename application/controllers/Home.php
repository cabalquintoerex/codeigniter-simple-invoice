<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public $layout_view = 'layout/default';

	function __construct() {
      parent::__construct(); 
      if (!$this->session->userdata('loggedin'))
       { 
          redirect('login');
       }

       $this->layout->title('Home');
  }

	public function index()
	{
		$this->layout->view('content/home/index');	
	}
}
