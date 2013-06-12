<div class="span9">
		
    <h3>
        Slideshow Manager
        </h3> 
        			
    <div class="hero-unit">
        
		<?php echo form_open('team/add_gallery/slideshow'); ?>
		<table>
			<tr>
			<td><?echo form_submit('new_post', 'Add Slideshow')?></td>
			</tr>
		</table>
		<?php echo form_close(); ?>
        
     </div>
        <table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>
									image
								</th>
								<th>
									tag line 1
								</th>
                                <th>
									tag line 2
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
									<img src="<?php echo base_url() . 'images/small/' . $row->wg_image_name; ?>" />
								</td>
								<td>
									<?php echo  $row->wg_tagline; ?>
								</td>
                                <td>
									<?php echo  $row->wg_tagline_2; ?>
								</td>
								<td>
									<?php echo  $row->wg_date; ?>
								</td>
                                <td>
									<?php echo  $row->wg_upload_by; ?>
								</td>
								<td>
									<?php 
										echo anchor(base_url() . 'images/big/'.$row->wg_image_name,'view  '); 
										echo anchor('team/delete_gallery/' . $row->wg_id . '/slideshow','delete'); 
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