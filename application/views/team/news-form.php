<div class="span9">

<h4>Add News</h4>

<div class="hero-unit">
                        
                        <?php 
						$hidden = array('wc_category' => $wc_category);
						echo form_open_multipart('gp/save_news', '', $hidden); 
						?>
                        
                        <label for="wg_image_name">Select Image :</label>
                        <?php echo form_upload('wg_image_name', '', 'id="submit"'); ?>
                        
                        <br />
                        
                        <label for="wc_lang">Language :</label>
                        <?php
						$wc_lang_option = array(
						  'en'  => 'English',
						  'id'  => 'Indonesia',
						  'gp' =>	'Internal Gapura'
						);
						echo form_dropdown('wc_lang', $wc_lang_option, 'en', 'class="dropdownInput"');
						?>
                        
                        <br />
                        
                        <label for="wc_sub_category">Category :</label>
                        <?php
						if($wc_category == 'general')
						{
							$wc_sub_category_option = array(
							  'update'  => 'Update News / Berita',
							  'announcement'    => 'Announcement / Pengumuman',
							  'event-info'	=> 'Event Info / Kegiatan'
							);
						}
						elseif($wc_category == 'event')
						{
							$wc_sub_category_option = array(
							  'event-info'  => 'Event Info',
							);
						}
						else
						{
							$wc_sub_category_option = array(
							  'job-available'  => 'Job Available',
							);
						}
						
						echo form_dropdown('wc_sub_category', $wc_sub_category_option, $wc_sub_category, 'class="dropdownInput"');
						?>
                        
                        <br />
                        
                        <label for="wc_title">Title :</label>
                        <?php echo form_input('wc_title', '', 'class="nameInput"'); ?>
                        
                        <br />
                        
                        <label for="wc_content">Description :</label>
                        <?php $wc_content = array(
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
                        
                        </div>
                     </div><!-- end blog post 1 -->
                    
                    
                    <div class="clear20"></div>
                    
                   
                    
                   
                    
                 
                                        
                    <div class="pages">
                    	
                        

                    </div>
                </div><!-- end blogpost --> 