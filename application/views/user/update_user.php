<?php 
$this->load->view('gp/header');?>
<div class="span9">	
	
	<form action="<?php echo base_url();?>user/update_user/<?php echo $this->uri->segment(3);?>" method="post" accept-charset="utf-8">						
                        <table>
                       <?php foreach($show_user as $rows){?>
                        	<tr>
                            	<td>Nama</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><input type="text" name="nama" value="<?php echo ucfirst($rows->ui_nama);?>" size="10" /></td>
                                <font color="#FF0000" size="-1"></font>
                                <td><font color="#FF0000"><b>*</b></font> </td>
                            </tr>
                            <tr>
                            	<td>NIPP</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><input type="text" name="nipp" value="<?php echo $rows->ui_nipp;?>" /></td>
                                <font color="#FF0000" size="-1"></font>
                                <td><font color="#FF0000"><b>*</b></font></td>
                                
                            </tr>
                            <tr>
                            	<td>No Handphone</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><input type="text" name="hp" value="<?php echo $rows->ui_hp;?>" /></td>
                                <font color="#FF0000" size="-1"></font>
                                <td><font color="#FF0000"><b>*</b></font></td>
                            </tr>
                            <tr>
                            	<td>Email</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><input type="text"  name="email" 
                                value="<?php echo $rows->ui_email;?>" /></td>
                                <font color="#FF0000" size="-1"></font>
                                <td><font color="#FF0000"><b>*</b></font></td>
                            </tr>
                            <tr>
                            	<td>Cabang</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td width="50">
                                    <select name="cabang" id="cabang">
                                        <option value="dps">dps</option>
                                    </select>
                                </td>
                                <td><font color="#FF0000"><b>*</b></font></td>
                            </tr>
                            <tr>
                            	<td>Unit</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td>
                                	<select name="unit" id="unit">
                                    <option value="<?php echo $rows->ui_unit;?>" selected="selected">
                                    <?php
									if($rows->ui_unit == 'mi')
									{
										echo 'Internal Service';
									}
									elseif($rows->ui_unit == 'mc')
									{
										echo 'Customer Service';
									}
									elseif($rows->ui_unit == 'mo')
									{
										echo 'Operation Centre';
									}
									elseif($rows->ui_unit == 'mw')
									{
										echo 'Cargo';
									}
									elseif($rows->ui_unit == 'mt')
									{
										echo 'Technic';
									}
									elseif($rows->ui_unit == 'mf')
									{
										echo 'Finance';
									}
									elseif($rows->ui_unit == 'mq')
									{
										echo 'SSQ';
									}
									elseif($rows->ui_unit == 'gm')
									{
										echo 'GM';
									}
									?>
                                    </option>
                                    <option value="mi">Internal Service</option>
                                    <option value="mc">Customer Service</option>
                                    <option value="mo">Operation Centre</option>
                                    <option value="mw">Cargo</option>
                                    <option value="mt">Technic</option>
                                    <option value="mf">Finance</option>
                                    <option value="mq">SSQ</option>
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
                                    	<option value="<?php echo $rows->ui_jabatan;?>" selected="selected">
                                        <?php
										if($rows->ui_jabatan == 'gm')
										{
											echo 'General Manager';
										}
										elseif($rows->ui_jabatan == 'mgr')
										{
											echo 'Manager';
										}
										elseif($rows->ui_jabatan == 'assman')
										{
											echo 'Assistant Manager';
										}
										elseif($rows->ui_jabatan == 'supv')
										{
											echo 'Supervisor';
										}
										elseif($rows->ui_jabatan == 'staff')
										{
											echo 'Staff';
										}
										
										?>
                                        </option>
                                    	<option value="gm">General Manager</option>
                                        <option value="mgr">Manager</option>
                                        <option value="assman">Assistant Manager</option>
                                        <option value="supv">Supervisor</option>
                                        <option value="staff">Staff</option>
                                    </select>
                                 </td>
                                <td><font color="#FF0000"><b>*</b></font></td>
                            </tr>
							 </tr>
							 <tr>
                            	<td>User Level</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td>
                                	<select name="level" id="level">
                                    	<option value="<?php echo $rows->ui_app_level;?>" selected="selected">
                                        <?php
										if($rows->ui_app_level == 'user')
										{
											echo 'User';
										}
										elseif($rows->ui_app_level == 'team')
										{
											echo 'Team';
										}
										elseif($rows->ui_app_level == 'admin')
										{
											echo 'Admin';
										}
										?>
                                    	
                                        <option value="user">User</option>
                                        <option value="team">Team</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                 </td>
                                <td><font color="#FF0000"><b>*</b></font></td>
                            </tr>
                        	<tr>
                            	<td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><input type="reset" name="reset" value="Reset" class = "btn btn-large" />&nbsp;&nbsp;<input type="submit" name="submit" value="Update" class = "btn btn-primary btn-large" /></td>
                                <td>&nbsp;</td>
						<?}?>
                        </table>
                        
                                                
						</form>
	

</div>