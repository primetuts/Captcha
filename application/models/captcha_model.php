<?php

class Captcha_model extends CI_Model {
    function create_image (){
        $abc = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9","a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"); 
        $word = '';
        $n = 0;
        While ($n < 5){
            $word .= $abc[mt_rand(0, 35)];
            $n++;
        }
        
        $captcha = array (
            'word'          => strtoupper($word),
            'img_path'      => './captcha/',
            'img_url'       => base_url().'captcha/',
            'font_path'     => './fonts/segoesc.ttf',
            'img_width'     => '230',
            'img_height'    => '70',
            'expiration'    => '60',         
            'time'          =>  time()        
        );
        
        $epxire = $captcha['time'] - $captcha['expiration'];
        
        // delete expired captchas 
        $this->db->where('time < ', $epxire);
        $this->db->delete('captcha');
        
        $value = array (
            'time'      => $captcha['time'],
            'ip_address'=> $this->input->ip_address(),
            'word'      =>$captcha['word']
        );
       
        
        //insert the values in the captcha table
        $this->db->insert('captcha', $value);
        
        $img = create_captcha($captcha);
        return $data['image'] = $img['image'];
        
    }
}
