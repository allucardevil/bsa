<div class="span3">
	<div class="well" style="padding: 8px 0;">
		<ul class="nav nav-list">
        
        	<li <?php if(isset($view_dashboard)){ echo $view_dashboard; } ?>>
                <a href="<?php echo site_url('gp'); ?>"><i class="icon-home"></i> Gapura Angkasa Staff Area</a>
            </li>
            
            <li class="divider"></li>   
              						
			        
        
        	<?php if ($this->session->userdata('logged_in'))
    		{
			?> 
            
            <?php 
										$session_data = $this->session->userdata('logged_in'); 


										echo 'login user :  ' . anchor('user/user_profile',$session_data['ui_nama']);
									
										$data = $this->input->ip_address();
										echo '<br />ip  : ' . $data;
									?>    
            
            
            <li class="divider"></li>  
        
	    	 <li class="nav-header">News & Event Info
             	<ul>
                	<li><a href="<?php echo base_url(); ?>gp/news_list/general/update/" title="Berita"><i class="icon-folder-open"></i> Berita</a></li>
                    <li><a href="<?php echo base_url(); ?>gp/news_list/general/announcement/" title="Berita"><i class="icon-folder-open"></i> Pengumuman</a></li>
                    <li><a href="<?php echo base_url(); ?>gp/news_list/general/event-info/" title="Berita"><i class="icon-folder-open"></i> Kegiatan</a></li>
              	</ul>
          	</li>
            
             <?php
			}
			?>
            
            <li class="divider"></li>  	
            	       
             <li class="nav-header">Internal Application
             	<ul>
                	<li><a href="http://www.gapura.co.id" target="_blank" title="Website resmi PT Gapura Angkasa"><i class="icon-folder-open"></i> Corporate Website</a></li>
                    <li><a href="http://dps.gapura.co.id" target="_blank" title="Website resmi PT Gapura Angkasa Cabang Denpasar"><i class="icon-folder-open"></i> Denpasar Website</a></li>
                    <li><a href="http://docs.gapura.co.id" target="_blank"><i class="icon-folder-open"></i> Online Sharing</a></li>
                    <li><a href="http://calendar.gapura.co.id" target="_blank"><i class="icon-folder-open"></i> Online Calendar</a></li>
                    <li><a href="http://webmail.gapura.co.id" target="_blank"><i class="icon-folder-open"></i> Webmail</a></li>
                    <li><a href="http://gfis.gapura.co.id" target="_blank" title="General Flight Information System"><i class="icon-folder-open"></i> GFIS</a></li>
               	</ul>
             </li>
             
             <?php if ($this->session->userdata('logged_in'))
    		{
			?> 
             
              <li class="divider"></li>
              
              <li class="nav-header">Restricted Application
             	<ul> 
             		
                    <li> Cargo
                    	<ul>
                        	<li><a href="http://192.168.20.90" target="_blank" title="Warehouse Man System Domestic"><i class="icon-folder-open"></i> WMS DOM</a></li>
                            <li><a href="http://192.168.20.92" target="_blank" title="Warehouse Man System International"><i class="icon-folder-open"></i> WMS INT</a></li>	
                        </ul>
                    </li>
                    
                    <li> Customer Service
                    	<ul>
                        	<li><a href="http://odscs.gapura.co.id" target="_blank" title="Online Docs System CS Dept"><i class="icon-folder-open"></i> ODS CS</a></li>	
                        </ul>
                    </li>
                    
                    
                    <li> Internal Service
                    	<ul>
                        	<li><a href="http://ems.gapura.co.id" title="Employee Management System"><i class="icon-folder-open"></i> EMS</a></li>
                            <li><a href="http://rfm.gapura.co.id" title="Request For Maintenance"><i class="icon-folder-open"></i> RFM</a></li>
                            <li><a href="http://ams.gapura.co.id" title="Administration Management System"><i class="icon-folder-open"></i> AMS</a></li>	
                        </ul>
                    </li>
                    
                    
                    <li> Finance
                    </li>
                    
                    
                     <li> Operation
                    </li>
                    
                    
                    <li> Safety, Security & Quality Ctrl
                    	<ul>
                        	<li><a href="http://192.168.20.152" target="_blank"><i class="icon-folder-open"></i> ISO</a></li>	
                        </ul>
                    </li>
                    
                     <li> Technic
                    </li>
                    
             		
             	</ul>
             </li>
             
            <?php
			}
			?>
           
           <!--- Team Area -->
            <?php 
			$session_data = $this->session->userdata('logged_in');
			if( $session_data['ui_app_level'] == 'admin')
        	
			{ 
		   ?>
                      
            <li class="divider"></li>        
           
            <li class="nav-header">Team Area
            	<ul>
                	<li><a href="<?php echo site_url('gp/page_management'); ?>" ><i class="icon-folder-open"></i> Page Manager</a></li>
                    <li><a href="<?php echo site_url('gp/news_management'); ?>" ><i class="icon-list-alt"></i> News Manager</a></li>
                    <li><a href="<?php echo site_url('gp/slideshow_display'); ?>" ><i class="icon-picture"></i> Slideshow Manager</a></li>
                    <li><a href="<?php echo site_url('gp/client_display'); ?>" ><i class="icon-picture"></i> Client Logo Manager</a></li>
					<li><a href="<?php echo site_url('user/get_user'); ?>" ><i class="icon-picture"></i> List User</a></li>
                </ul>
            </li>
            
            <?php
			}
			?>
            <!--- Team Area -->
            
            <li class="divider"></li>
            
            </ul>
	</div>
</div>