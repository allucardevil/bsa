 <!-- start main -->
    <div id="main">
    	<!-- start main wrap -->
        <div class="main-wrap">
        	<!-- start main blog-->
        	<div id="blog">
            	<!-- start blog post -->
            	<div class="blog-post">
                	
                    
                    <!-- blog post 1 -->
                	<div class="post">
                    <div id="respon">
                        <h3>Add New <?php //echo undash($wc_sub_category) ;?> Service</h3><br />
                        <?php echo form_open_multipart('team/save_service'); ?>
                        
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
						$wc_sub_category_option = array(
						  'ground-handling'  => 'Ground Handling',
						  'non-ground-handling'    => 'Non Ground Handling',
						);
						echo form_dropdown('wc_sub_category', $wc_sub_category_option, $wc_sub_category, 'class="dropdownInput"');
						?>
                        
                        <br />
                        
                        <label for="wc_title">Title :</label>
                        <?php echo form_input('wc_title', '', 'class="nameInput"'); ?>
                        
                        <br />
                        
                        <label for="wc_content">Description :</label>
                        <textarea name="wc_content" id="wc_content" class="messageInput"></textarea>   
                        
                        <br />
                        
                        <?php echo form_submit('submit', 'Submit', 'id="submit"'); ?>
                        
                        
                        <?php echo form_close(); ?>
                        
                        </div>
                     </div><!-- end blog post 1 -->
                    
                    
                    <div class="clear20"></div>
                    
                   
                    
                   
                    
                 
                                        
                    <div class="pages">
                    	
                        

                    </div>
                </div><!-- end blogpost --> 