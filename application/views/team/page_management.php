<div class="span9">
	
     <h4>Page Manager</h4>				
    
       
        
       
        
        
     
        <table class="table table-bordered table-striped">     
						
                        <thead>
                        <tr>
                        	<?php echo form_open('gp/page_management'); ?>
                            	<th colspan="2" align="center">
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
										  'about-us'  => 'About Us',
										  'network' => 'Network',
										  'achievement' => 'Achievement',
										  'ground-handling' => 'Service GH',
										  'non-ground-handling' => 'Service Non GH',
										);
										echo form_dropdown('wc_sub_category', $wc_sub_category_option, $wc_sub_category, 'class="dropdownInput"');
									?>
                                </th>
                                <th>
                                	<?php echo form_submit('submit','view','class = "btn btn-primary btn-block"'); ?>
                                </th>
                            <?php echo form_close(); ?>
                            <?php echo form_open('gp/add_content/page/corporate'); ?>
                                <th>
                                    <?php echo form_submit('new_post','add','class = "btn btn-block"'); ?>
                                </th>
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
								#	echo anchor('' . $row->wc_lang . '/corporate/' . $row->wc_sub_category . '/' . $row->wc_id . '/',$row->wc_title);
								#}
								#elseif(($row->wc_type == 'news'))
								#{
								#	echo anchor('' . $row->wc_lang . '/news/' . $row->wc_sub_category . '/' . $row->wc_id . '/',$row->wc_title);
								#}
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
										echo anchor('' . $row->wc_lang . '/' . $row->wc_category . '/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . dash($row->wc_title)  . '/','view  '); 
										echo anchor('gp/delete/' . $row->wc_id . '/page','delete'); 
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