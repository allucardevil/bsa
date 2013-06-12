<!-- start main -->
    <div id="main">
    	<!-- start main wrap -->
        <div class="main-wrap">
        
        	<!-- start main blog-->
        	<div id="blog">
            	
                <div class="blog-post">
                
                <?php
								foreach($query as $row) 
								{
					?>
                    
                    <!-- blog post 1 -->
                    <div class="post">
                        <h3><a href="#"><?php echo $row->wc_title; ?></a></h3>
                        
                        <div class="blog-dash-line"></div>
                        <div class="imageBlog">
                            <span class="imageWrap">
                                <a href="<?php echo base_url() . 'images/big/' . $row->wg_image_name; ?>" data-rel="prettyPhoto" >
                                    <img src="<?php echo base_url() . 'images/big/' . $row->wg_image_name; ?>" alt="PT Gapura Angkasa | <?php echo undash($row->wc_sub_category); ?> |  <?php echo $row->wc_title; ?>">
                                    <span><span></span></span>
                                </a>           
                            </span>
                            <span class="shadowHolder"><img src="<?php echo base_url(); ?>wp-content/themes/gapura-angkasa/images/big-shadow.png" alt=""></span>
                        </div>
                        <div class="textBlog">
                            <ul class="tags">
                                <li class="date"><?php echo ucfirst($row->wc_category); ?></li>
                                <li class="category"><?php echo undash($row->wc_sub_category); ?></li>
                                <li class="comments"><?php echo $row->wc_title; ?></li>
                            </ul>
                            <div class="textBlogdetails">
                                <p><?php echo $row->wc_content; ?></p> 
                                
                                <p>
								
                                <?php 
								$session_data = $this->session->userdata('logged_in');
								if( $session_data['ui_app_level'] == 'admin')
								{ 
							   ?>
                                
								<?php echo anchor('team/edit/' . $row->wc_id . '/', 'Edit', array('class' => 'buttonPro')); ?> &nbsp; &nbsp;<?php echo anchor('team/delete/' . $row->wc_id . '/', 'Delete', array('class' => 'buttonPro')); ?>
                                
                                <?php
								}
								?>
                                </p>
                             </div>
                        </div>
                     </div><!-- end blog post 1 -->
                    
                   <div class="frame">
                        <!-- start comments-->
                        <div id="comments">
                   <div id="respon">
                            
                            <p>
                                <span class='st_sharethis' displayText='ShareThis'></span>
<span class='st_facebook' displayText='Facebook'></span>
<span class='st_twitter' displayText='Tweet'></span>
<span class='st_linkedin' displayText='LinkedIn'></span>
<span class='st_pinterest' displayText='Pinterest'></span>
<span class='st_googleplus' displayText='Google +'></span>
<span class='st_email' displayText='Email'></span>
                                </p>
                            
                            <?php 
							if($row->wc_sub_category == 'ground-handling')
							{
								echo '<h3>Get Inquiry for this service </h3>';
								echo '<div class="dash-line"></div>';
								$this->view('team/groundhandling-quotation-form');
							}
							elseif($row->wc_category == 'corporate')
							{
								
								
							}
							elseif($row->wc_type == 'news')
							{
								
								
							}
							else
							{
								$this->view('team/email-contact');
							}
							
							?>
                            
                            
                        </div>
                    </div>
                    </div>
                      <?php 
					}
					?>
                    
                    
                </div>