<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_model extends CI_Model{
   
    protected $res = "";
    protected $stat = "";

    public function __construct() {
        parent::__construct();
    }
    
    public function select_data() {
		$this->db->where('employees.status', 1);
        $this->db->join('user_accounts','employee_id = id', 'lef outer');
        $query = $this->db->get('employees');
        if ($query->num_rows() > 0)
        {
            return $query->result();
        } else {
            return false;
        }

    }
    
    public function set_data() {
        $id = $this->input->post('id');
        $this->db->where('employees.id', $id);
        $this->db->join('user_accounts','employee_id = id', 'lef outer');
        $query = $this->db->get('employees');
        
        foreach ($query->result_array() as $row)
        {
            $res=array(
                'id' => $row['id'],
                'first_name' => $row['first_name'],           
                'last_name' => $row['last_name'],           
                'gender' => $row['gender'],           
                'user_name' => $row['user_name']              
            );
        }
        return json_encode($res); 
    }

    public function getdataitem($id){
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('id',$id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function submit() {
        try {
               
                $id=$this->input->post('id');
                $stat=$this->input->post('stat');
                $data = array( 
                    'first_name'=> $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'gender' => $this->input->post('gender')       
                ); 
				$genpass = $this->generate_pass($this->input->post('password'));				

                if(empty($id)){
                    $resl = $this->db->insert('employees', $data);
                    $insert_id = $this->db->insert_id();
                    if( ! $resl){
                        $err = $this->db->error();
                        $this->res = "<i class=\"fa fa-fw fa-warning\"></i> Error : ". $this->apps->err_code($err['message']);
                        $this->stat = "0";
                    }else{
						$dataacc = array( 
                            'employee_id' => $insert_id,
                            'user_name'=> $this->input->post('user_name'),
                            'password' => $genpass['pass'],
                            'salt' => $genpass['salt']                                 
                        );						
                        $usrc = $this->db->insert('user_accounts', $dataacc);
                        $this->res = "<label class=\"label label-success\">Employee Inserted Successfully</label>";
                        $this->stat = "1";
                    }
                    
                }
                elseif(!empty($id) && empty($stat))
                {

                    $this->db->where('id', $id);
                    $resl = $this->db->update('employees', $data);
                    if( ! $resl){
                        $err = $this->db->error();
                        $this->res = "<i class=\"fa fa-fw fa-warning\"></i> Error : ". $this->apps->err_code($err['message']);
                        $this->stat = "0";
                    }else{
						$dataacc = array( 
                            'user_name'=> $this->input->post('user_name'),
                            'password' => $genpass['pass'],
                            'salt' => $genpass['salt']                                 
                        );	
						$this->db->where('employee_id', $id);
                        $usrc = $this->db->update('user_accounts', $dataacc);
                        $this->res = "<label class=\"label label-success\">Employee Info Updated</label>";
                        $this->stat = "1";
                    }

                }elseif(!empty($id) && !empty($stat)){
                    $this->db->where('id', $id);
                    $resl = $this->db->update('employees',array('status'=>0));
					$this->db->where('employee_id', $id);
                    $resl = $this->db->update('user_accounts',array('status'=>0));

                    if( ! $resl){
                        $err = $this->db->error();
                        $this->res = "Error : ". $this->apps->err_code($err['message']);
                        $this->stat = "0";
                    }else{
                        $this->res = "Data deleted!";
                        $this->stat = "1";
                    }
                    
                }else{
                    $this->res = "<label class=\"label label-danger\">Failed</label>";
                    $this->stat = "0";
                }

        }
        catch (Exception $e) {            
            $this->res = "<label class=\"label label-danger\">".$e->getMessage()."</label>";
            $this->stat = "0";
        }
        
        $arr = array(
            'stat' => $this->stat, 
            'msg' => $this->res,
            );
        
        return  json_encode($arr);
    }
    public function generate_pass($pass)
    {
        $password = $pass;
        $salt = substr(md5(uniqid(rand(), true)), 0, 5);
        $data = array('pass' => sha1($password . $salt)
                     ,'salt' => $salt);
        return $data;
    }
}
