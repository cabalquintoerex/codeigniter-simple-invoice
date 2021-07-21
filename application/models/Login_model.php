<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{
	
	public function login($user_name, $password)
	{
			$this -> db -> select("employee_id, user_name, password, user_type, first_name, last_name");
		   	$this -> db -> from('user_accounts');
		   	$this-> db -> join('employees', ' employees.id = employee_id', 'left outer');
		   	$this -> db -> where('user_name', $user_name);
		   	$this -> db -> where('employees.status', 1);
		   	$this->db-> order_by('user_name', 'ASC');
		   	$this -> db -> limit(1);
		   	$query = $this -> db -> get() -> result();

		   	if($query != null)
			{
			$password = $this->hash_password_db($query[0]->user_name, $password);

			
				if ($password === TRUE)
				{
					$sessionid = $this->salt().md5(strtotime(date('Y-m-d H:i:s')));
					$session_data = array(
						'sessionid' => $sessionid,
					    'user_name' => $query[0]->user_name, 
					    'employee_id' => $query[0]->employee_id,
						'first_name' => $query[0]->first_name,
						'last_name' => $query[0]->last_name,
						'user_type' => $query[0]->user_type,
					);

					$this->session->set_userdata('loggedin',$session_data);
					$this->db->update('user_accounts', array('last_login_date' => date('Y-m-d H:i:s')), array('user_name' => $query[0]->user_name));
				
					return true;
				}
				else 
					return false;
			}
	}
	public function hash_password_db($user_name, $password)
	{
		if (empty($user_name) || empty($password))
		{
			return FALSE;
		}	
		 $query = $this->db->select('password, salt')
		                  ->where('user_name', $user_name)
		                  ->limit(1)
		                  ->order_by('user_name', 'ASC')
		                  ->get('user_accounts')
		                  ->result();

		if ($query == null)
		{
			return FALSE;
		}

			$db_password = sha1($password . $query[0]->salt);
		
		if($db_password == $query[0]->password)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function salt()
	{
		return substr(md5(uniqid(rand(), true)), 0, 5);
	}
	public function hash_password($password,$salt)
	{
		if (empty($password))
		{
			return FALSE;
		}
		else
			return  sha1($password . $salt);
		
	}		 
}
?>