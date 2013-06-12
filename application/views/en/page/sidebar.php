<!-- start sidebar -->
				<div class="sidebar last">
                    
                      <div id="rPortofolio">
                        
                    
                  <!--  <div id="categories">
                        <h3>Ground Handling Services</h3>
                        <ul>
                            <li>
                                <p>&nbsp;&nbsp;&nbsp;<a href="#">Schedule Flight</a></p>
                            </li>
                            <li>
                                <p>&nbsp;&nbsp;&nbsp;<a href="#">Non Schedule Flight</a></p>
                            </li>
                            <li>
                                <p>&nbsp;&nbsp;&nbsp;<a href="#">VVIP Flight</a></p>
                            </li>
                            <li>
                                <p>&nbsp;&nbsp;&nbsp;<a href="#">VIP Flight</a></p>
                            </li>
                            <li>
                                <p>&nbsp;&nbsp;&nbsp;<a href="#">Charter Flight</a></p>
                            </li>
                            <li>
                                <p>&nbsp;&nbsp;&nbsp;<a href="#">Private Flight</a></p>
                            </li>
                            <li>
                                <p>&nbsp;&nbsp;&nbsp;<a href="#">Medivac Flight</a></p>
                            </li>
                        </ul>
                    </div>
                    
                    <div id="categories">
                        <h3>Ground Non Handling Services</h3>
                        <ul>
                            <li>
                                <p>&nbsp;&nbsp;&nbsp;<a href="#">Fast Track</a></p>
                            </li>
                            <li>
                                <p>&nbsp;&nbsp;&nbsp;<a href="#">Trucking</a></p>
                            </li>
                            <li>
                                <p>&nbsp;&nbsp;&nbsp;<a href="#">Learning Centre</a></p>
                            </li>
                           
                        </ul>
                    </div>
                    
                  
                    <h3>Gallery</h3>
                        <div class="slides_container">
                            <div>
                                <ul>
                                    <li><img src="<?php //echo base_url(); ?>wp-content/themes/gapura-angkasa/images/rPortofolio.jpg" alt=""></li>
                                    <li><p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper 
                                    suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p></li>
                                </ul>
                            </div>
                            
                            
                           
                            
                        </div>
                        <div class="clear"></div>
                        <div class="page">
                            <a href="#" class="prev"><img src="<?php //echo base_url(); ?>wp-content/themes/gapura-angkasa/images/bArrowLeft.png" alt=""></a>
                            <a href="#" class="next"><img src="<?php //echo base_url(); ?>wp-content/themes/gapura-angkasa/images/bArrowRight.png" alt=""></a>
                        </div>
                    </div>-->
                 
                    
                    <div id="popularPost">
                        <h3>News</h3>
                        <ul>
                        		<?php 
								$i = 0;
								foreach ($query_splash_news as $splash_news) :
								
								if($i < 5) 
								{
								?>
                				<li>
                                	<img src="<?php echo base_url(); ?>images/small/<?php echo $splash_news->wg_image_name; ?>" alt="" width="100">
                                	<p><?php echo anchor('' . $splash_news->wc_lang . '/news/' . $splash_news->wc_sub_category . '/' . $splash_news->wc_id, 						$splash_news->wc_title); ?></p>
                                    <span><?php echo $splash_news->wc_date; ?></span>
                                </li>
                				<?php
								}
								
								$i += 1;
								endforeach;
								?>
                        
                        
                         
                        </ul>
                    </div>
                    
                    
            	</div><!-- end sidebar -->
            </div><!-- end main blog -->

        </div><!-- end main wrap-->
    </div><!-- end main-->
    
    <div class="clear20"></div>
