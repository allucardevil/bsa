<div class="sep_lines"></div><!-- separator line -->
            
            <!-- start promo box -->
            <div class="promo-box">
                <p>Selamat datang di <span><strong>PT Gapura Angkasa</strong> </span>cabang Denpasar</p> 
                <p>bandar udara internasional ngurah rai, bali, indonesia</p>
                <br />
                <p><a href="#"><img src="<?php echo base_url(); ?>images/certification/gapura-angkasa-achievement.jpg" height="60" /></a></p>  
            </div>
            <!-- end promo box -->
            
<div class="clear20"></div>

<!-- start three columns-->
            
            <!-- start Portofolios-->
            <?php
				$i = 0;
 				
				foreach ($query as $row) : 
					
					if($i < 2) 
					{
						echo "<div class=\"outerOneThird\">";
						echo '<span class="imageWrap">';
						echo '<a href="' . base_url() . 'images/big/' . $row->wg_image_name . '" data-rel="prettyPhoto" ><img src=" ' . base_url() . 'images/big/' . $row->wg_image_name . '" alt="PT Gapura Angkasa Services | ' . undash($row->wc_sub_category) . ' | ' . $row->wc_title . '"><span><span></span></span></a></span>';
						echo '<span class="shadowHolder"><img src=" ' . base_url() . 'wp-content/themes/gapura-angkasa/images/small-shadow.png" alt=""></span>';
						echo '<h3>' . anchor('en/service/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . $row->wc_title . '/', $row->wc_title) . '</h3><br>'; 
						echo '<p>' . word_limiter($row->wc_content, 25) . '</p><br>';
						echo anchor('en/services/' . $row->wc_sub_category . '/', 'Learn More this Services', array('class' => 'buttonPro')); 
						echo "</div>";
					}
					else
					{
						echo "<div class=\"outerOneThird last\">"; 
						echo '<span class="imageWrap">';
						echo '<a href="' . base_url() . 'images/big/' . $row->wg_image_name . '" data-rel="prettyPhoto" ><img src=" ' . base_url() . 'images/big/' . $row->wg_image_name . '" alt="PT Gapura Angkasa Services | ' . undash($row->wc_sub_category) . ' | ' . $row->wc_title . '"><span><span></span></span></a></span>';
						echo '<span class="shadowHolder"><img src=" ' . base_url() . 'wp-content/themes/gapura-angkasa/images/small-shadow.png" alt=""></span>';
						echo '<h3>' . anchor('en/service/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . $row->wc_title . '/', $row->wc_title) . '</h3><br>'; 
						echo '<p>' . word_limiter($row->wc_content, 25) . '</p><br>';
						echo anchor('en/services/' . $row->wc_sub_category . '/', 'Learn More this Services', array('class' => 'buttonPro')); 
						echo "</div>";
					}
			
			$i += 1;
								 endforeach;
			
			?>
								
			<div class="clear20"></div>