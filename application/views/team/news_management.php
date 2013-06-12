<div class="span9">
					
    <h4>News Manager</h4>
    
   
        <table class="table table-bordered table-striped">
						<thead>
							 <tr>
            	<?php echo form_open('gp/news_management'); ?>
                <th colspan="2">
                	<?php
						$wc_lang_option = array(
						  'en'  => 'English',
						  'id'  => 'Indonesia',
						  'gp'	=> 'Internal Gapura',
						);
						echo form_dropdown('wc_lang', $wc_lang_option, $wc_lang, 'class="dropdownInput"');
						?>
                </th>
                
                <th colspan="2">
                	<?php
						$wc_sub_category_option = array(
						  'update'  => 'Update News',
						  'announcement' => 'Announcement',
						  'event-info' => 'Event Info',
						);
						echo form_dropdown('wc_sub_category', $wc_sub_category_option, $wc_sub_category, 'class="dropdownInput"');
						?>
                </th>
                
                <th>
                        <?php echo form_submit('submit','view','class = "btn btn-primary btn-block"'); ?>
                </th>
                <?php echo form_close(); ?>
                <?php echo form_open('gp/add_news/news/general/update'); ?>
                <th><?php echo form_submit('new_post','add','class = "btn btn-block"'); ?></th>
                <?php echo form_close(); ?>
            </tr>
                            
                            <tr>
								<th>
									image
								</th>
								<th>
									title
								</th>
								<th>
									content
								</th>
								<th>
									date
								</th>
								<th>
									publisher
								</th>
                                <th>
									action
								</th>
							</tr>
						</thead>
						<tbody>
							
                             <?php
						foreach($query as $row)
						{
					?>
                            
                            <tr>
								<td>
									<?php
									if($row->wg_image_name == '')
									{
										echo '<img src=' . base_url() . 'images/small/no_image.jpg>';
									}
									else
									{
										echo '<img src=' . base_url() . 'images/small/' . $row->wg_image_name . '>';
									}
									?>
								</td>
								<td>
									<?php
								if ($row->wc_type == 'news')
								{ 
									echo anchor('' . $row->wc_lang . '/' . $row->wc_type . '/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . preg_replace('/[^\w]+/', '_', (dash($row->wc_title)))  . '/',$row->wc_title);
								}
								else
								{
									echo anchor('' . $row->wc_lang . '/' . $row->wc_category . '/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . preg_replace('/[^\w]+/', '_', (dash($row->wc_title)))  . '/',$row->wc_title);
								}
								?>
								</td>
								<td>
									<?php echo  word_limiter($row->wc_content, 50); ?>
								</td>
								<td>
									<?php echo  $row->wc_date; ?>
								</td>
                                <td>
									<?php echo  $row->wc_upload_by; ?>
								</td>
								<td>
									<?php 
										$atts = array(
										  'width'      => '800',
										  'height'     => '600',
										  'scrollbars' => 'yes',
										  'status'     => 'yes',
										  'resizable'  => 'yes',
										  'screenx'    => '\'+((parseInt(screen.width) - 800)/2)+\'',
										  'screeny'    => '\'+((parseInt(screen.height) - 600)/2)+\''
										);
										echo anchor_popup('' . $row->wc_lang . '/' . $row->wc_type . '/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . dash($row->wc_title)  . '/','view  ', $atts); 
										echo anchor('gp/delete/' . $row->wc_id . '/news','delete'); 
									?>
								</td>
							</tr>
						
                        <?php
						}
						?>
                        	
						</tbody>
					</table>
        
    
    <ul class="pager">
						<li class="next">
							
                            <?php echo $link; ?>
						</li>
					</ul>
					
</div>