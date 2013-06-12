<div class="span9">
					
    <h3>Login Area</h3>
    <div class="hero-unit">
  
           <?php echo form_open('login/request_verification'); ?>
           <?php echo validation_errors(); ?>
           <input type="text" name="email" value="username" size="20" width="10px" />@gapura.co.id&nbsp;&nbsp;<?php echo form_submit('submit','Login','class = "btn btn-large"'); ?>
		   <?php echo form_close(); ?>
       
    </div>
					
</div>