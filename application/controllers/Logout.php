<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {


   function __construct() {
      parent::__construct();     
   }
 
   public function index() {

      if(isset($this->session->userdata['loggedin']))
      {
         //$this->session->sess_destroy();		 
         $this->session->unset_userdata('loggedin');
         $this->session->set_flashdata('success', 'Successfully logged out!');
         redirect('login');
      }
      else
         redirect('login');

   }
}
?>