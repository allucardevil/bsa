<div class="sep_lines"></div><!-- separator line -->
            
            <!-- start promo box -->
            <div class="promo-box">
                <p>Welcome to <span>PT Gapura Angkasa </span>branch office Denpasar - Bali.
                </p>      
            </div><!-- end promo box -->
            
<div class="clear20"></div>

<!-- start three columns-->
            
            <!-- start Portofolios-->
            <?php
				$i = 0;
 				
				foreach ($query_3_service as $row_3_service) : 
					
					if($i < 2) 
					{
						echo "<div class=\"outerOneThird\">";
						echo '<span class="imageWrap">';
						echo '<a href="' . base_url() . 'images/big/' . $row_3_service->wg_image_name . '" data-rel="prettyPhoto" ><img src=" ' . base_url() . 'images/big/' . $row_3_service->wg_image_name . '" alt="PT Gapura Angkasa Services | ' . undash($row_3_service->wc_sub_category) . ' | ' . $row_3_service->wc_title . '"><span><span></span></span></a></span>';
						echo '<span class="shadowHolder"><img src=" ' . base_url() . 'wp-content/themes/gapura-angkasa/images/small-shadow.png" alt=""></span>';
						echo '<h3>' . anchor('en/service/' . $row_3_service->wc_sub_category . '/' . $row_3_service->wc_id . '/' . $row_3_service->wc_title . '/', $row_3_service->wc_title) . '</h3><br>'; 
						echo '<p>' . word_limiter($row_3_service->wc_content, 25) . '</p><br>';
						echo anchor('en/services/' . $row_3_service->wc_sub_category . '/', 'Learn More this Services', array('class' => 'buttonPro')); 
						echo "</div>";
					}
					else
					{
						echo "<div class=\"outerOneThird last\">"; 
						echo '<span class="imageWrap">';
						echo '<a href="' . base_url() . 'images/big/' . $row_3_service->wg_image_name . '" data-rel="prettyPhoto" ><img src=" ' . base_url() . 'images/big/' . $row_3_service->wg_image_name . '" alt="PT Gapura Angkasa Services | ' . undash($row_3_service->wc_sub_category) . ' | ' . $row_3_service->wc_title . '"><span><span></span></span></a></span>';
						echo '<span class="shadowHolder"><img src=" ' . base_url() . 'wp-content/themes/gapura-angkasa/images/small-shadow.png" alt=""></span>';
						echo '<h3>' . anchor('en/service/' . $row_3_service->wc_sub_category . '/' . $row_3_service->wc_id . '/' . $row_3_service->wc_title . '/', $row_3_service->wc_title) . '</h3><br>'; 
						echo '<p>' . word_limiter($row_3_service->wc_content, 25) . '</p><br>';
						echo anchor('en/services/' . $row_3_service->wc_sub_category . '/', 'Learn More this Services', array('class' => 'buttonPro')); 
						echo "</div>";
					}
			
			$i += 1;
								 endforeach;
			
			?>
								
									
                    				
                        			
                					
                					
                					
                					
			
            
            
			<div class="clear20"></div>