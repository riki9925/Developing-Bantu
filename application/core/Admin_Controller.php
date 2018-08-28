<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {
    //put your code here
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if($this->session->userdata('nik') == null){
            redirect("access");
        }
        
       
    }    
    

}
