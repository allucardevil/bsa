
    
	<body>
    
    <!-- navigation -->
    <div class="container">
    		
            <table align="center" width="100%">
	<tr>
    	<td width="30%"><img src="<?php echo base_url(); ?>wp-content/themes/gapura-angkasa/img/logo/logo-original-small.png"></td>
        <td width="30%">&nbsp;</td>
    	<td width="30%" align="right"><img src="<?php echo base_url(); ?>wp-content/themes/gapura-angkasa/img/icon/pdf.png" width="40" />&nbsp;<img src="<?php echo base_url(); ?>wp-content/themes/gapura-angkasa/img/icon/doc.png" width="40" />&nbsp;<img src="<?php echo base_url(); ?>wp-content/themes/gapura-angkasa/img/icon/xls.png" width="40" />&nbsp;<img src="<?php echo base_url(); ?>wp-content/themes/gapura-angkasa/img/icon/pdf.png" width="40" />&nbsp;<img src="<?php echo base_url(); ?>wp-content/themes/gapura-angkasa/img/icon/jpeg.png" width="40" /></td>
       
    </tr>
</table>
            <p></p>
			<div class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="#"></a>
						<div class="nav-collapse">
							<ul class="nav">
								<li class="active">
									<?php echo anchor('dashboard','Dashboard','dashboard');?>
								</li>
								<li>
									<?php echo anchor('docs/access_level','Access Level','access level');?>
								</li>
                                <li>
								    <?php echo anchor('docs/owner', 'File Owner', 'file owner'); ?>
							    </li>
                                <li>
									<?php echo anchor('docs/category', 'File Category', 'File Category'); ?>
							    </li>
                                <li>
                                    <?php echo anchor('docs/upload_form', 'File Upload', 'File Upload'); ?>
                                </li>
								<!--<li>
									<?php //echo anchor('docs/file_list','Help','help');?>
								</li>-->
								
							</ul>
							<form class="navbar-search pull-left" action="">
								<input type="text" class="search-query span2" placeholder="Search" />
							</form>
							<ul class="nav pull-right">
								<?php 
								    $session_data = $this->session->userdata('logged_in');
									if($this->session->userdata('logged_in'))
	    							{
										$nama = $session_data['ui_nama'];
							    ?>
                                <li>
                                     <?php echo anchor('login/user_profile', 'user : ' . $nama, $nama); ?>
								</li>
								<li>
									<?php echo anchor('login/log_out', 'logout', 'logout'); ?>
								</li>
                                <?php 
								    }
	    							else
	    							{
		 								# no session redirect to login page 
		  								echo anchor('login/register_form','Register','register');
	    							}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
    <!-- navigation -->