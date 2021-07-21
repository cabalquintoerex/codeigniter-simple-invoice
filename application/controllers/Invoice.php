<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends MY_Controller{

    public $layout_view = 'layout/default';

    function __construct() {
      parent::__construct(); 
      if (!$this->session->userdata('loggedin'))
       { 
          redirect('login');
       }
       $this->load->model('invoice_model');
       $this->layout->title('Invoice');
    }
   
    public function index() {

        $this->layout->view('content/invoice/index');
    }

    public function insert_invoice()
    {    	
    	$result=$this->invoice_model->insert_invoice();
    	if($result)
    	{
    		$this->session->set_flashdata('msg','Invoice Added Successfully');
    		redirect('invoice');
    	}
    	else
    	{
    		$this->session->set_flashdata('Msg','Invoice Adding Failed ');
    		redirect('invoice');
    	}
    }
    public function invoice_reports()
    {
        $this->load->helper('form');
        $date_from = $this->input->post('date_from'); 
        $date_to = $this->input->post('date_to');
    	$data['invoice']=$this->invoice_model->invoice_reports($date_from, $date_to);;
        $this->layout->view('content/invoice/invoice_reports', $data);
    }
    public function delete_invoice()
    {
    	$this->db->where('id',$this->input->post('id'));
    	$this->db->update('invoice_details',array('status'=>0));
    	$result=($this->db->affected_rows()!=1)?false:true;
    	if($result)
    	{
    		$this->session->set_flashdata('msg1','Invoice deleted Successfully');
    		redirect('invoice/invoice_reports');
    	}
    	else
    	{
    		$this->session->set_flashdata('Msg1','Invoice delete Failed ');
    		redirect('invoice/invoice_reports');
    	}
    }
}

