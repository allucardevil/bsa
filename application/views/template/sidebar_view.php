
			<div class="row">
				<div class="span3">
					<div class="well" style="padding: 8px 0;">
						<ul class="nav nav-list">
							<li class="nav-header">
								Online Document System
							</li>
							<li class="active">
								<a href="<?php echo site_url('dashboard'); ?>"><i class="icon-white icon-home"></i> Dashboard</a>
							</li>
                            
                            <li>
								<a href="<?php echo site_url('docs/access_level'); ?>"><i class="icon-cog"></i> Access Level</a>
							</li>
                            
                            <li>
								<a href="<?php echo site_url('docs/owner'); ?>"><i class="icon-user"></i> File Owner</a>
							</li>
                            
                           <li>
								<a href="<?php echo site_url('docs/category'); ?>"><i class="icon-list-alt"></i> File Category</a>
							</li>
                            
                            <li>
								<a href="<?php echo site_url('docs/upload_form'); ?>"><i class="icon-upload"></i> File Upload</a>
							</li>
                            
                            <li>
								<a href="<?php echo site_url('docs/search'); ?>"><i class="icon-search"></i> File Search</a>
							</li>
                            
                           
							
                            
						<!--	
							<li class="nav-header">
								Your Account
							</li>
							<li>
								<a href="<?php //echo site_url('user/profile'); ?>"><i class="icon-user"></i> Profile</a>
							</li>
							<li>
								<a href="settings.htm"><i class="icon-cog"></i> Settings</a>
							</li>
							<li class="divider">
							</li>
							<li>
								<a href="help.htm"><i class="icon-info-sign"></i> Help</a>
							</li> -->
                            
                            <?php 
								    $session_data = $this->session->userdata('logged_in');
									if($session_data['ui_app_level'] == 'admin')
	    							{
										
							    ?>
							<li class="nav-header">
								Admin Area
							</li>
							
							<li>
								<a href="<?php echo site_url('admin'); ?>"><i class="icon-user"></i> User</a>
							</li>
                            <?php } ?>
						</ul>
					</div>
				</div>