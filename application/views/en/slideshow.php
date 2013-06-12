</div><!-- end menu wrap -->
        
    </div><!-- end header section -->
    
    <div class="clear"></div>
    
    <div id="main">
        <div class="main-wrap">
        
            
        
        	<!-- start slider -->
            <div id="slider">
            
                     
    			<!-- elastic image slider -->
                <div id="ei-slider" class="ei-slider">
                    <ul class="ei-slider-large">
					<?php foreach($image as $row)
					{
						?>
                        <li>
                            <img src="<?php echo base_url(); ?>images/big/<?php echo $row->wg_image_name;?>" alt="Gapura Angkasa <?php echo $row->wg_tagline.' '.$row->wg_tagline_2;?>" />
                            <div class="ei-title">
                                <h2><?php echo $row->wg_tagline;?></h2>
                                <h3><?php echo $row->wg_tagline_2;?></h3>
                            </div>
                        </li>
                       
                    <?php
                    }
					?>
                    </ul><!-- ei-slider-large -->
                    <ul class="ei-slider-thumbs">
                        <li class="ei-slider-element">Current</li>
						<?php 
						$number = 1;
						foreach($image as $row)
						{?>
                        <li><a href="#">Slide <?php echo $number;?></a><img src="<?php echo base_url(); ?>images/small/<?php echo $row->wg_image_name;?>" alt="Gapura Angkasa <?php echo $row->wg_tagline.' '.$row->wg_tagline_2;?>" /></li>
                        <?php $number++; }?>
                    </ul><!-- ei-slider-thumbs -->
                </div> 
        		<span><img src="<?php echo base_url(); ?>wp-content/themes/gapura-angkasa/images/big-shadow3.png" alt="" /></span>
    		</div><!-- end slider -->

            