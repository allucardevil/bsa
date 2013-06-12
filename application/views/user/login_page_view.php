<div class="span9">
					
    <h4>Staff Login Area</h4>
    <div class="hero-unit">
  
           <?php echo form_open('user/request_verification'); ?>
           <?php echo form_error('email'); ?>
           Email<br />
           <input type="text" name="email" value="" size="5" width="10 px" />&nbsp;&nbsp;<?php echo form_submit('submit','Login','class = "btn btn-large"'); ?>
		   <?php echo form_close(); ?>
       
    </div>
					
</div>