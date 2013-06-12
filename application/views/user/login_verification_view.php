<div class="span9">
	
    <h4>Verification</h4>				
    <div class="hero-unit">
        
      
                      
        				<?php echo form_open('user/verification_pin'); ?>
						<?PHP echo form_hidden('ads_code', $ads_code); ?>
                        <table>
                       		<tr>
                            	<td colspan="3"><?php echo $success_message; ?></td>
                            </tr>
                            <tr>
                            	<td colspan="3">&nbsp;</td>
                            </tr>
                            <tr>
                            	<td>Email</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><input type="email" name="email" value="<?php echo $email; ?>"  /></td>
                                <font color="#FF0000" size="-1"><?php echo form_error('kode'); ?></font>
                                <td><font color="#FF0000"></font> </td>
                            </tr>
                        	<tr>
                            	<td>PIN</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><input type="text" name="kode" value="" /></td>
                                <font color="#FF0000" size="-1"><?php echo form_error('kode'); ?></font>
                                <td><font color="#FF0000"></font> </td>
                            </tr>
                            
                        	<tr>
                            	<td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;&nbsp;<?php echo form_submit('submit', 'Verifiy', 'class = "btn btn-primary btn-large"');?></td>
                                <td>&nbsp;</td>
                                
                            </tr>
                        </table>
						<?php echo form_close(); ?>
     
        
    </div>
					
</div>
