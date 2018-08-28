<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crop extends CI_Controller {
 
    //variable for storing error message
    private $error;
    //variable for storing success message
    private $success;
 
    function __construct() {
        parent::__construct();
        //load this to validate the inputs in upload form
        $this->load->library('form_validation');
    }
 
    //appends all error messages
    private function handle_error($err) {
        $this->error .= $err . "rn";
    }
 
    //appends all success messages
    private function handle_success($succ) {
        $this->success .= $succ . "rn";
    }

    public function index() {
        $this->load->view('Crop');
    }
 
    public function upload($id) {
        //if ($this->input->post('image_upload')) {
            //set preferences
            //file upload destination
            $upload_path = 'upload/';
            $config['upload_path'] = $upload_path;
            //allowed file types. * means all types
            $config['allowed_types'] = 'jpg|png|gif';
            //allowed max file size. 0 means unlimited file size
            $config['max_size'] = '0';
            //max file name size
            $config['max_filename'] = '255';
            //whether file name should be encrypted or not
            //$config['encrypt_name'] = TRUE;
            $config['file_name']            = $id;
            //store image info once uploaded
            $image_data = array();
            //check for errors
            //$is_file_error = FALSE;
            //check if file was selected for upload
            //if (!$_FILES) {
                //$is_file_error = TRUE;
                //$this->handle_error('Select an image file.');
            //}
            //if file was selected then proceed to upload
            //if (!$is_file_error) {
                //load the preferences
                $this->load->library('upload', $config);
                //check file successfully uploaded. 'image_name' is the name of the input
                if ($this->upload->do_upload('image_name')) {
                    //if file upload failed then catch the errors
                    //$this->handle_error($this->upload->display_errors());
                    //$is_file_error = TRUE;
                //} 
                //else {
                    //store the file info
                    $image_data = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = TRUE;
                    $config['width'] = 150;
                    $config['height'] = 100;
                    $this->load->library('image_lib', $config);
                    if (!$this->image_lib->resize()) {
                        $this->handle_error($this->image_lib->display_errors());
                    }
                }
            //}
            // There were errors, we have to delete the uploaded image
            //if ($is_file_error) {
                //if ($image_data) {
                    $file = $upload_path . $image_data['file_name'];
                    // if (file_exists($file)) {
                    //     unlink($file);
                    // }
                //}
            //} 
            //else {
                $data['resize_img'] = $upload_path . $image_data['file_name'];
                $this->handle_success('Image was successfully uploaded to direcoty <strong>' . $upload_path . '</strong> and resized.');
            //}
        //}
 
        //load the error and success messages
        $data['errors'] = $this->error;
        $data['success'] = $this->success;
        //load the view along with data
        //$this->load->view('Crop', $data);
        echo json_encode(array("status"=>$data));
    }
 
}