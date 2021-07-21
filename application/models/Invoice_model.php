<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice_model extends CI_Model{

	Public function insert_invoice()
	{
		$item_name=implode(',',$this->input->post('item'));
    	$rate=implode(',',$this->input->post('rate'));
    	$quantity=implode(',',$this->input->post('quantity'));
    	$tax=implode(',',$this->input->post('tax'));
    	$amount=implode(',',$this->input->post('amount'));

    	$data=array(
    		'customer_name'=>'General Customer',
            'date'=>date('Y-m-d'),
    		'name'=>$item_name,
    		'rate'=>$rate,
    		'quantity'=>$quantity,
    		'tax'=>$tax,
    		'amount'=>$amount,
    		'sub_total'=>$this->input->post('sub_total'),
    		'o_tax'=>$this->input->post('o_tax'),
    		'grand_total'=>$this->input->post('grand_total'),
			'employee_id'=>$this->session->userdata('loggedin')['employee_id'],
    		'status'=>1
    		);

    	$this->db->insert('invoice_details',$data);
    	return($this->db->affected_rows()!=1)?false:true;

	}
    public function invoice_reports($date_from = false, $date_to = false)
    {
        if($date_from && $date_to)
        {
            $this->db->where("date >= '$date_from'",NULL,FALSE);
            $this->db->where("date <= '$date_to'",NULL,FALSE);
        }
        $this->db->where('status',1);
        return $this->db->get('invoice_details')->result();
    }
}