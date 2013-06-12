<div class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="#">Internal Site</a>
						<div class="nav-collapse">
							<ul class="nav">
								<li class="active">
									<a href="#">Dashboard</a>
								</li>
									</ul>
								</li>
							</ul>
							<ul class="nav pull-right">
								
                                <?php if ( ! $this->session->userdata('logged_in'))
    							{
								?> 
                                
                                <li>
									<a href="<?php echo site_url('login'); ?>">Login</a>
								</li>
                                
                               <?php
								}
								else
								{
								?>
                                
                                <li>
									<a href="<?php echo site_url('login/log_out'); ?>">Logout</a>
								</li>
                                
                                <?php
								}
								?>
                                
							</ul>
						</div>
					</div>
				</div>
			</div>