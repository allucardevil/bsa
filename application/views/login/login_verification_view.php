<div class="span9">
					
    <div class="hero-unit">
        <h3>
        Verification
        </h3>
        <p>
                      
        				<?php echo form_open('user/verification_pin'); ?>
						<?PHP echo form_hidden('ads_code', $ads_code); ?>
                        <table align="center">
                       		<tr>
                            	<td colspan="3"><?php echo $success_message; ?></td>
                            </tr>
                        	<tr>
                            	<td>Kode Verifikasi</td>
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
        </p>
        
    </div>
					
</div>
