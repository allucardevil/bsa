<div class="span3">
	<div class="well" style="padding: 8px 0;">
		<ul class="nav nav-list">
        
        	<li <?php if(isset($view_dashboard)){ echo $view_dashboard; } ?>>
                <a href="<?php echo site_url('team/index'); ?>"><i class="icon-home"></i> Dashboard</a>
            </li>
            
            <li class="divider"></li>        
        
			 <li class="nav-header">
                Gapura Angkasa Staff Area
            </li>
             
             <li>
             	<a href="http://webmail.gapura.co.id" target="_blank"><i class="icon-folder-open"></i> Webmail</a>
             </li>
             
             <li>
             	<a href="http://192.168.20.80" target="_blank"><i class="icon-folder-open"></i> EMS</a>
             </li>
             
             <li>
             	<a href="http://192.168.20.152" target="_blank"><i class="icon-folder-open"></i> ISO</a>
             </li>
             
           
            <?php 
			$session_data = $this->session->userdata('logged_in');
			if( $session_data['ui_app_level'] == 'admin')
        	
			{ 
		   ?>
           <!--- Team Area -->
           
            <li class="divider"></li>        
           
            <li class="nav-header">Gapura Angkasa Team Area</li>
            
            <li>
             	<a href="<?php echo site_url('team/page_management'); ?>" ><i class="icon-folder-open"></i> Page Manager</a>
            </li>
            
            <li>
             	<a href="<?php echo site_url('team/news_management'); ?>" ><i class="icon-list-alt"></i> News Manager</a>
            </li>
            
            <li>
             	<a href="<?php echo site_url('team/slideshow_display'); ?>" ><i class="icon-picture"></i> Slideshow Manager</a>
            </li>
            
            <li>
             	<a href="<?php echo site_url('team/client_display'); ?>" ><i class="icon-picture"></i> Client Logo Manager</a>
            </li>
            
            
			
          
            
           
            
            <!--- Team Area -->
            <?php
			}
			?>
            
            <li class="divider"></li>
            
            </ul>
	</div>
</div>