 <!-- start main -->
<div class="span9">
<div class="hero-unit">
                        
                        <?php  foreach($query as $row) :  ?>
                        
                        <h3>EDIT <?php echo undash($row->wc_title) ;?> Page</h3><br />
                        <?php echo form_open_multipart('team/update'); ?>
                        
                        <p><img src="<?php echo base_url() . 'images/big/' . $row->wg_image_name; ?>" /></p>
                        
                        <?php echo form_hidden('wc_id', $row->wc_id); ?>
                        <?php echo form_hidden('wc_type', $row->wc_type); ?>
                        <?php echo form_hidden('wc_category', $row->wc_category); ?>
                        
                        <label for="wg_image_name">Select Image to change image :</label>
                        <?php echo form_upload('wg_image_name', '', 'id="submit"'); ?>
                        
                        <br />
                        
                        <label for="wc_lang">Language :</label>
                        <?php
						$wc_lang = array(
						  'en'  => 'English',
						  'id'  => 'Indonesia',
						  'gp'	=> 'Internal Gapura',
						);
						echo form_dropdown('wc_lang', $wc_lang, $row->wc_lang, 'class="dropdownInput"');
						
						?>
                        
                        <br />
                        
                        <label for="wc_sub_category">Category :</label>
                        <?php
						if ($this->uri->segment(4) == 'news')
						{
							$wc_sub_category_option = array(
							  'update'  => 'Update News',
							  'announcement'    => 'Announcement',
							);
						}elseif ($this->uri->segment(4) == 'page')
						{
							$wc_sub_category_option = array(
							  'about-us'  => 'About Us',
							  'network' => 'Network',
							  'achievement' => 'Achievement',
							  'ground-handling' => 'Service GH',
							  'non-ground-handling' => 'Service Non GH',
							);
						}
						echo form_dropdown('wc_sub_category', $wc_sub_category_option, $row->wc_sub_category, 'class="dropdownInput"');
						?>
                        
                        <br />
                        
                        <label for="wc_title">Title :</label>
                        <?php echo form_input('wc_title', $row->wc_title, 'class="nameInput"'); ?>
                        
                        <br />
                        
                        <label for="wc_content">Description :</label>
                        <textarea  name="wc_content" id="wc_content" class="messageInput"><?php echo $row->wc_content; ?></textarea>   
                     
                      
                        
                        <br />
                        
                        <?php echo form_submit('submit', 'Submit', 'id="submit"'); ?>
                        
                        
                        <?php echo form_close(); ?>
                        
                        <?php  endforeach;  ?>
                        
                        </div>
                     </div><!-- end blog post 1 -->
                    
                    
                    <div class="clear20"></div>
                    
                   
                    
                   
                    
                 
                                        
                    <div class="pages">
                    	
                        

                    </div>
                </div><!-- end blogpost --> 