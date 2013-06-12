<div class="span9">
	<div class="hero-unit">
                        <h3>Add New <?php echo undash($wg_sub_category) ;?> Gallery</h3><br />
                        <?php echo form_open_multipart('team/save_gallery'); ?>
                        
                        <label for="wc_sub_category">Category :</label>
                        <?php
						$wg_sub_category_option = array(
						  'slideshow'  => 'Slideshow',
						  'image'    => 'Image Gallery',
						  'client-logo'    => 'Client Logo',
						);
						echo form_dropdown('wc_sub_category', $wg_sub_category_option, $wg_sub_category, 'class="dropdownInput"');
						?>
                        
                        <br />
                        
                        <label for="wc_title">Tagline 1 :</label>
                        <?php echo form_input('wc_title_1', '', 'class="nameInput"'); ?>
						
						<label for="wc_title">Tagline 2 :</label>
                        <?php echo form_input('wc_title_2', '', 'class="nameInput"'); ?>
						
						<label for="wg_image_name">Select Image :</label>
                        <?php echo form_upload('wg_image_name', '', 'id="submit"'); ?>
                        <br />
                        
                        <?php echo form_submit('submit', 'Submit', 'id="submit"'); ?>
                        
                        
                        <?php echo form_close(); ?>
                        
                        </div>
                     </div><!-- end blog post 1 -->
                    
                    
                    <div class="clear20"></div>
</div>
</div>