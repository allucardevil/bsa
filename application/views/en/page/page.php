<!-- BEGIN CONTENT WRAPPER -->
<div id="content-wrapper">
  <!-- BEGIN MAIN -->
  <div id="main">
    <div id="headlines">
      <div id="main-content">
		<?php
		if (isset($content)){
		$i = 0;
		foreach ($content as $row)
			{ $i++;}
		foreach ($content as $row)
			{ 
			if ($row->wc_upload_by == NULL)
				{$row->wc_upload_by = 'Publisher';}
				if ($i > 1)
				{
				if ($row->wc_category == 'general')
					{$row->wc_category = 'news';}
					echo anchor(''. $row->wc_lang . '/'.$row->wc_category.'/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . preg_replace('/[^\w]+/', '-', (dash($row->wc_title))) . '/', '<h1>'.$row->wc_title.'</h1>');
				}else if ($i = 1){ ?>
				<h2 class="heading"><?php echo $row->wc_title?></h2> 
				<?php if ($row->wg_image_name != NULL)
				{ ?> 
					<img src="<?php echo base_url()?>images/big/<?php echo $row->wg_image_name?>" alt="<?php echo $row->wc_title ?>" > <?php } ?><?php } ?>
				
			<p class="author"><?php echo $row->wc_upload_by?> | <span><?php echo mdate('%d-%M-%Y',strtotime(substr($row->wc_date,0,10))) ?></span></p>
			<?php if ($i > 1)
				{ ?>
				<p><?php echo word_limiter($row->wc_content,25);?></p>
		<?php 	} else {
				?> <p><?php echo $row->wc_content;?></p> <?php
			} } }?>
        <!-- <img src="<?php echo base_url(); ?>images/blank.jpg" alt="" />
        <h1><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h1>
        <p class="author">Name Here | <span>09.18.09</span></p>
        <p>Ut sed arcu nulla. In eget lectus vitae purus volutpat consectetur suscipit ut justo.</p>
        <p><a href="#">Full story &raquo;</a></p> -->
      </div>
    </div>
  </div>
  <!-- END MAIN -->
  <!-- BEGIN SIDEBARS -->
  <div id="sidebars">
    <!-- BEGIN ADS -->
    <a href="#"><img src="<?php echo base_url(); ?>images/ads/bali-airport-vip-service.jpg" alt="" class="ad" / width="120"></a> <a href="#"><img src="<?php echo base_url(); ?>images/ads/bali-airport-vip-service.jpg" alt="" class="ad-right" / width="120"></a> <a href="#"><img src="<?php echo base_url(); ?>images/ads/bali-airport-vip-service.jpg" alt="" class="ad" width="120" /></a> <a href="#"><img src="<?php echo base_url(); ?>images/ads/bali-airport-vip-service.jpg" alt="" class="ad-right" width="120" /></a>
    <!-- END ADS -->
    <h2 class="heading-blue">Flight Information</h2>
    <iframe src="http://gfis.gapura.co.id/dps" width="250" height="250"></iframe>
    
     <h2 class="heading">Career</h2>
    <h4><a href="#">Click here for more news about company career</a></h4>
  </div>
  <!-- END SIDEBARS -->
</div>
<!-- END CONTENT WRAPPER-->
<!-- BEGIN EXTRAS -->
<div id="extras">
  <div id="recommended">
    <h2 class="heading">Service Available</h2>
    <ul>
      <?php
				$i = 0;
 				
				foreach ($serv as $row) : 
					
					if($i < 2) 
					{
						
						
						echo '<li>' . anchor(''. $row->wc_lang . '/'.$row->wc_category.'/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . dash($row->wc_title) . '/', $row->wc_title) . '</li>'; 
						
					}
					else
					{
						
						echo '<li>' . anchor(''. $row->wc_lang . '/'.$row->wc_category.'/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . dash($row->wc_title) . '/', $row->wc_title) . '</li>'; 
						
					}
			
			$i += 1;
								 endforeach;
			
			?>
    </ul>
  </div>
  <div id="programs">
    <h2 class="heading">Travelling</h2>
     <?php if (isset($pax_info)){
		foreach ($pax_info as $row) 
		{
			echo '<li>'. anchor(''. $row->wc_lang . '/'.$row->wc_category.'/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . dash($row->wc_title) . '/', $row->wc_title) .'</li>';
		}}?>
	</div>
  <div id="cartoon">
    <h2 class="heading">Airport Information</h2>
    <ul>
      <?php if (isset($airport_info)){
		foreach ($airport_info as $row) 
		{
			echo '<li>'. anchor(''. $row->wc_lang . '/'.$row->wc_category.'/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . dash($row->wc_title) . '/', $row->wc_title) .'</li>';
		}}?>
    </ul> </div>
</div>
<!-- END EXTRAS -->

