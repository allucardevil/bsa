<div class="span9">
	<?php foreach($query as $row) { ?>

		<h4><?php echo $row->wc_title; ?></h4>
    
        <?php echo ucfirst($row->wc_category); ?> | <?php echo undash($row->wc_sub_category); ?> | <?php echo mdate('%d %M %Y %H:%i',strtotime($row->wc_date)); ?> wita | <?php echo $row->wc_upload_by; ?>
        <br /><br />
        <?php
			if($row->wg_image_name == '')
			{
				echo '<img src=' . base_url() . 'images/small/no_image.jpg>';
			}
			else
			{
				echo '<img src=' . base_url() . 'images/big/' . $row->wg_image_name . '>';
			}
		?>
        <br /> 
        <br /> 
        <?php echo $row->wc_content; ?><br />
        
        <?php 
			$session_data = $this->session->userdata('logged_in');
			if( $session_data['ui_app_level'] == 'admin')
        	
			{ 
		   		echo anchor('gp/edit/' . $row->wc_id . '/', 'Edit', array('class' => 'buttonPro')); 
                echo "&nbsp; &nbsp";
				echo anchor('gp/delete/' . $row->wc_id . '/', 'Delete', array('class' => 'buttonPro')); 
			}
		?>
        
 	<?php } ?>
</div>