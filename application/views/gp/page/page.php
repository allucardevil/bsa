<div class="span9">
					
    	<?php
		foreach($query as $row)
		{
			if($row->wc_sub_category == 'update')
			{ 
				echo '<h4>Berita</h4>';
			}
			elseif($row->wc_sub_category == 'announcement')
			{ 
				echo '<h4>Pengumuman</h4>';
			}
			elseif($row->wc_sub_category == 'event-info')
			{ 
				echo '<h4>Kegiatan</h4>';
			}
		}
		?>
    
   
        <table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Foto</th>
								<th width="100">Judul</th>
								<th>Isi</th>
								<th width="100">Tanggal</th>
								<th>Reporter</th>
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
                                    <?php echo mdate('%d-%m-%Y',strtotime($row->wc_date)); ?>
                                    <br />
                                    <?php echo mdate('%H:%i',strtotime($row->wc_date)); ?>
								</td>
                                <td>
									<?php echo  $row->wc_upload_by; ?>
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