<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Lupa_password extends CI_Controller {
    
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
        $this->load->view('Lupa_password');
    }

    public function email(){
        $this->load->library('email');
      $email1 = $this->input->post('email');

        $mesg = 'asdafa';
                $fromemail="trimindisend@gmail.com";
                $toemail = $email1;
                $subject = "[HaloKick] Pembayaran diterima - ";
                
                $config=array(
                    'charset'=>'utf-8',
                    'wordwrap'=> TRUE,
                    'mailtype' => 'html'
                );

                $this->email->initialize($config);
                $this->email->to($toemail);
                $this->email->from($fromemail, "HalloKick.com");
                $this->email->subject($subject);
                $this->email->message($mesg);
                //$this->email->attach('http://101.50.1.227/telkomsel/pdf/'.$trx.'-formulir.pdf');
                $mail = $this->email->send();
                    
                echo $this->email->print_debugger();

    }

}
