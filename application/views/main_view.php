<div id="content">
    <div id="form">
        
        <?php
        
        echo form_open();
        echo form_label('Name :');
        $data = array(
            'id'        =>'name',
            'name'      =>'name',
            'value'     =>set_value('name'),
            'style'     =>'width:98%',
        );
        echo form_input($data);
        
        echo form_error('name');
        
        echo form_label('Email :');
        $data = array(
            'id'        =>'email',
            'name'      =>'email',
            'value'     =>set_value('email'),
            'style'     =>'width:98%',
        );
        echo form_input($data);
        echo form_error('email');
        
         echo form_label('Your comment :');
        $data = array(
            'id'        =>'comment',
            'name'      =>'comment',
            'value'     =>set_value('comment'),
            'style'     =>'width:98%;resize:none',
        );
        echo form_textarea($data);
        echo form_error('comment');
        
        echo '<div id="captcha_div">';
        echo $image.br();
        
        
           
      if ( form_error('captcha')){
          echo form_error(('captcha'));
      }else {
            echo form_label('Enter the text from the image above.');
      }
              
        
        
        
        $data = array(
            'id'        =>'captcha',
            'name'      =>'captcha',
            'value'     =>'',
            'style'     =>'width:98%',
        );
        echo form_input($data);
         
        echo '</div>';
        
        
        $data = array(
            'id'        =>'submit',
            'name'      =>'submit',
            'value'     =>'Submit your comment',
            'style'     =>'width:38%;padding:10px;',
        );
        echo form_submit($data);
        
    
        

        ?>
    </div>
</div>


