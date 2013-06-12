<div class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="<?php echo site_url('gp'); ?>">Internal Site</a>
						<div class="nav-collapse">
								<ul class="nav">
                                        <li class="active">
                                            <a href="<?php echo site_url('gp'); ?>">Dashboard</a>
                                        </li>
                                        <?php if ($this->session->userdata('logged_in'))
    									{
										?> 
                                        <li><a href="<?php echo base_url(); ?>gp/news_list/general/update/" title="Berita">Berita</a></li>
                                        <li><a href="<?php echo base_url(); ?>gp/news_list/general/announcement/" title="Berita">Pengumuman</a></li>
                                        <li><a href="<?php echo base_url(); ?>gp/news_list/general/event-info/" title="Berita">Kegiatan</a></li>
                                        <?php
										}
										?>
                                        
									</ul>
							
							<ul class="nav pull-right">
								
                                <?php if ( ! $this->session->userdata('logged_in'))
    							{
								?> 
                                
                                <li>
									<a href="<?php echo site_url('user/login'); ?>">Login</a>
								</li>
                                
                               <?php
								}
								else
								{
								?>

                                
                                <li>
									<a href="<?php echo site_url('user/logout'); ?>">Logout</a>
								</li>
                                
                                <?php
								}
								?>
                                
							</ul>
						</div>
					</div>
				</div>
			</div>