<div class="span9">
					
    <div class="hero-unit">
        <h3>
        Dashboard
        </h3>
        <p>
            Selamat datang di internal site PT Gapura Angkasa Denpasar
        </p>
        <p>
         <?php if ( ! $this->session->userdata('logged_in'))
			{
			?> 
			
		   
			Silahkan <a href="<?php echo site_url('user/login'); ?>">login</a> untuk melanjutkan.
			
			
		   <?php
			}
			else
			{
			?>
			
		  
			Anda sudah melakukan login, klik <a href="<?php echo site_url('user/logout'); ?>">logout</a> bila anda ingin keluar.
			
			
			<?php
			}
		?>
        </p>
    </div>
					
</div>
			