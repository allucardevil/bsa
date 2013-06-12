 <!-- start main -->
 <div class="span9">
	<div class="hero-unit">
                        <h3>Add New Page</h3><br />
                        <?php echo form_open_multipart('team/save_content'); ?>
                        
                        <label for="wg_image_name">Select Image :</label>
                        <?php echo form_upload('wg_image_name', '', 'id="submit"'); ?>
                        
                        <br />
                        
                        <label for="wc_lang">Language :</label>
                        <?php
						$wc_lang = array(
						  'en'  => 'English',
						  'id'  => 'Indonesia',
						  'gp'	=> 'Internal Gapura',
						);
						echo form_dropdown('wc_lang', $wc_lang, 'en', 'class="dropdownInput"');
						?>
                        
                        <br />
                        
                        <label for="wc_sub_category">Category :</label>
                        <?php
						$wc_sub_category_option = array(
						  'about-us'  => 'About Us',
						  'network' => 'Network',
						  'achievement' => 'Achievement',
						  'ground-handling' => 'Service GH',
						  'non-ground-handling' => 'Service Non GH',
						);
						echo form_dropdown('wc_sub_category', $wc_sub_category_option, $wc_sub_category, 'class="dropdownInput"');
						?>
                        
                        <br />
                        
                        <label for="wc_title">Title :</label>
                        <?php echo form_input('wc_title', '', 'class="nameInput" style=width:"70%"'); ?>
                        
                        <br />
                        
                        <label for="wc_content">Description :</label>
						<?php 
						$wc_content = array(
						  'name' => 'wc_content',
						  'id' => 'wc_content',
						  'rows' => '10',
						  'cols' => '20',
						  'class' => 'messageInput'
						);
						echo form_textarea($wc_content);?>
                     
                      
                        
                        <br />
                        
                        <?php echo form_submit('submit', 'Submit', 'id="submit"'); ?>
                        
                        
                        <?php echo form_close(); ?>
                    
                    
                    <div class="clear20"></div>
	</div>
</div>