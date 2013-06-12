 <!-- start main -->
    <div id="main">
    	<!-- start main wrap -->
        <div class="main-wrap">
        	<!-- start main blog-->
        	<div id="blog">
            
            	
            
            	<!-- start blog post -->
            	<div class="blog-post">
                    
                    <?php
						foreach($query as $row) 
						{
					?>
                    <!-- blog post 1 -->
                	<div class="post">
                        <div class="imageBlogclassic">
                        	<span class="imageWrap">
                        		<a href="<?php echo base_url() . 'images/big/' . $row->wg_image_name; ?>" data-rel="prettyPhoto" >
                            		<img src="<?php echo base_url() . 'images/big/' . $row->wg_image_name; ?>" alt="PT Gapura Angkasa | <?php echo undash($row->wc_sub_category); ?> |  <?php echo $row->wc_title; ?>">
                            		<span><span></span></span>
                        		</a>           
                  			</span>
							<span class="shadowHolder"><img src="<?php echo base_url(); ?>wp-content/themes/gapura-angkasa/images/big-shadow.png" alt="" /></span>
                        </div>
                        <div class="textBlogclassic">
                            <h3>
                                <?php
								if ($row->wc_category == 'service')
								{ 
									echo anchor('' . $row->wc_lang . '/service/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . $row->wc_title . '/',$row->wc_title);
								}
								elseif(($row->wc_category == 'corporate'))
								{
									echo anchor('' . $row->wc_lang . '/corporate/' . $row->wc_sub_category . '/' . $row->wc_id . '/',$row->wc_title);
								}
								elseif(($row->wc_type == 'news'))
								{
									echo anchor('' . $row->wc_lang . '/news/' . $row->wc_sub_category . '/' . $row->wc_id . '/',$row->wc_title);
								}
								?>
                            </h3>
                            
                        	<div class="clear"></div>
                            <p><?php echo  word_limiter($row->wc_content, 50); ?></p>
                            <p>
								<?php 
								if ($row->wc_category == 'service')
								{ 
									echo anchor('' . $row->wc_lang . '/service/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . dash($row->wc_title) . '/', 'Read More', array('class' => 'buttonPro')); 
								}
								elseif(($row->wc_category == 'corporate'))
								{
									echo anchor('' . $row->wc_lang . '/corporate/' . $row->wc_sub_category . '/' . $row->wc_id . '/', 'Read More', array('class' => 'buttonPro'));
								}
								elseif(($row->wc_type == 'news'))
								{
									echo anchor('' . $row->wc_lang . '/news/' . $row->wc_sub_category . '/' . $row->wc_id . '/', 'Read More', array('class' => 'buttonPro'));
								}
								?>
                            </p>
                            <p></p>	
                        </div>
                     </div><!-- end blog post 1 -->
                    
                    <?php 
					}
					?>
                    
                    <div class="clear20"></div>
                    
                    <div class="pages"><?php echo $link; ?></div>
                </div><!-- end blogpost --> 