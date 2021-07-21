<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller{
    
    public $layout_view = 'layout/default';

    function __construct() {
        parent::__construct();
		if (!$this->session->userdata('loggedin'))
        { 
          redirect('login');
        }
        $this->load->helper('form');
        $this->load->library('table');
        $this->load->model('product_model');
        $this->layout->title('Products');
    }
  
    public function index() {        
        $data['table'] = $this->product_model->select_data();
        $this->layout->view('content/product/index',$data);
    }
    
    public function submit() { 
		$this->load->library('form_validation');			
        $this->form_validation->set_rules('item_name', 'Item Name', 'required'); 
        $this->form_validation->set_rules('rate', 'Price', 'required'); 
        $this->form_validation->set_rules('tax', 'Tax', 'required'); 
		if ($this->form_validation->run() == FALSE && $this->input->post('stat') != 'delete')
		{
			$res = array(
            'stat' => 0, 
            'msg' => 'All fields are required',
            );
			echo json_encode($res);
		}
		else{
			$res = $this->product_model->submit();
			echo $res;
		}
    }
    
    public function set_data() {
        $res = $this->product_model->set_data();
        echo $res;
    }

    public function autocomplete()
    {
        $item_name=$this->input->post('name');        
        $dataitem = $this->product_model->getdataitem($item_name);
        $name       =  array();
        foreach ($dataitem as $d) {
        $json_array             = array();
        $json_array['value']    = $d->item_name;
        $json_array['label']    = $d->item_name;
        $name[]             = $json_array;
        }
        echo json_encode($name);
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
