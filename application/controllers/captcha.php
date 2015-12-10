<?php
class Captcha extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this -> load -> helper('captcha');
        $this -> load -> model('captcha_model');
    }

    function index() {
        
        $this-> form_validation->set_rules('name','name','trim|strip_tags|xss_clean|required');
        $this-> form_validation->set_rules('email','email','trim|strip_tags|xss_clean|required|valid_email');
        $this-> form_validation->set_rules('comment','comment','trim|strip_tags|xss_clean|required|max_length[255]');
        $this-> form_validation->set_rules('captcha','captcha','trim|strip_tags|xss_clean|callback_captcha_check|match_captcha[captcha.word]');
        
        if ($this-> form_validation->run() === false){
            
            $this -> load -> view('header_view');
            $data['image'] = $this -> captcha_model -> create_image();
            $this -> load -> view('main_view', $data);
                
        }else {
            if ($this->input->post('comment')){
                $email = $this->input->post('email');
                $comment = $this->input->post('comment');
                
                $this->db->insert('comments',array('email'=>$email,'comments'=>$comment));
                $this->load->view('success');
            }
            
        }
        
        
        
    }
    
    function captcha_check($value){
        if ($value ==''){
            $this->form_validation->set_message('captcha_check','Please enter the text from the image and submit your comment');
            return false;
        }else {
            return true;
        }
        
        
    }
    
        
        
    

}
