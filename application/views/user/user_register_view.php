<div class="span9">
					
    <h4>Form Registrasi</h4>
    <div class="hero-unit">
    					<font color="#FF0000"  size="-1">apabila anda tidak memiliki email korporat ( user_anda@gapura.co.id ), 
                        <br />silahkan download formulir <a href="<?php echo base_url(); ?>pdf/surat-permohonan-username.pdf">ini</a> untuk diisi dan diserahkan kepada supervisor on duty</font>
    					<br /><br />
        				<?php echo form_open('user/do_register'); ?>
						
                        <table>
                       
                        	<tr>
                            	<td>Nama</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><input type="text" name="nama" value="" size="10" /></td>
                                <font color="#FF0000" size="-1"><?php echo form_error('nama'); ?></font>
                                <td><font color="#FF0000"><b>*</b></font> </td>
                            </tr>
                            <tr>
                            	<td>NIPP</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><input type="text" name="nipp" value="" /></td>
                                <font color="#FF0000" size="-1"><?php echo form_error('nipp'); ?></font>
                                <td><font color="#FF0000"><b>*</b></font></td>
                                
                            </tr>
                            <tr>
                            	<td>No Handphone</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><input type="text" name="hp" value="0" /></td>
                                <font color="#FF0000" size="-1"><?php echo form_error('hp'); ?></font>
                                <td><font color="#FF0000"><b>*</b></font></td>
                            </tr>
                            <tr>
                            	<td>Email</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><input type="text" name="email" 
                                value="" /></td>
                                <font color="#FF0000" size="-1"><?php echo form_error('email'); ?></font>
                                <td><b>@gapura.co.id</b>&nbsp;<font color="#FF0000"><b>*</b></font></td>
                            </tr>
                            <tr>
                            	<td>Cabang</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td width="50">
                                    <select name="cabang" id="cabang_id">
                                        <option value="dps">dps</option>
                                    </select>
                                </td>
                                <td><font color="#FF0000"><b>*</b></font></td>
                            </tr>
                            <tr>
                            	<td>Unit</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td>
                                	<select name="unit" id="unit_id">
                                    
                                    <option value="mi">Internal Service</option>
                                    <option value="mc">Customer Service</option>
                                    <option value="mo" selected="selected">Operation Centre</option>
                                    <option value="mw">Cargo</option>
                                    <option value="mt">Technic</option>
                                    <option value="mf">Finance</option>
                                    <option value="gm">General Manager</option>
                                    </select>
                                </td>
                                <td><font color="#FF0000"><b>*</b></font></td>
                            </tr>
                            <tr>
                            	<td>Jabatan</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td>
                                	<select name="jabatan" id="jabatan">
                                    	
                                    	<option value="gm">General Manager</option>
                                        <option value="mgr">Manager</option>
                                        <option value="assman">Assistant Manager</option>
                                        <option value="supv">Supervisor</option>
                                        <option value="staff" selected="selected">Staff</option>
                                    </select>
                                 </td>
                                <td><font color="#FF0000"><b>*</b></font></td>
                            </tr>
                        	<tr>
                            	<td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><?php echo form_reset('reset','Reset','class = "btn btn-large"'); ?>&nbsp;&nbsp;<?php echo form_submit('submit', 'Register', 'class = "btn btn-primary btn-large"');?></td>
                                <td>&nbsp;</td>
                                
                            </tr>
                        </table>
                        
                        <?php //echo validation_errors(); ?>
                        
						<?php echo form_close(); ?>
</div>
					
</div>
                  