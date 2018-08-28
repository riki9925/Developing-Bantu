<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrasi extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');


        //Setting language in session on first load
        if(!$this->session->userdata('site_lang')){ 
          $this->load->library('session');
          $newdata = array(
            'site_lang'  => $this->config->item('language')
          );
          $this->session->set_userdata($newdata);
        }
              //Loading language from session variable
        $this->language = $this->session->userdata['site_lang']; 
        $this->lang->load('messages',$this->language);
    }    
    
    public function index() {
        $this->load->view('Registrasi');
    }

}
