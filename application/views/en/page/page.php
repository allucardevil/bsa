<!-- BEGIN CONTENT WRAPPER -->
<div id="content-wrapper">
  <!-- BEGIN MAIN -->
  <div id="main">
    <div id="headlines">
      <div id="main-content">
        <h2 class="heading">Bali Airport News</h2>
		<?php
		if (isset($content)){
		foreach ($content as $row)
			{ 
			if ($row->wg_image_name == NULL)
				{$row->wg_image_name = 'images.jpg';}
			if ($row->wc_upload_by == NULL)
				{$row->wc_upload_by = 'Anonymous';}?>
			<img src="<?php echo base_url()?>images/big/<?php echo $row->wg_image_name?>" alt="<?php echo $row->wc_title ?>" >
			<a href="<?php echo base_url().'index.php/'.$row->wc_lang . '/' . $row->wc_type . '/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . dash($row->wc_title)  . '/',$row->wc_title;?>" ><h1><?php echo $row->wc_title?></h1></a>
			<p class="author"><?php echo $row->wc_upload_by?> | <span><?php echo mdate('%d-%M-%Y',strtotime(substr($row->wc_date,0,10))) ?></span></p>
			<p><?php echo $row->wc_content;?></p>
		<?php } }?>
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
    <h4><a href="#">Lorem ipsum dolor sit amet eget, consectetur adipiscing elit</a></h4>
    <h4><a href="#">Lorem ipsum dolor sit amet eget, consectetur adipiscing elit</a></h4>
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
			echo '<li>'. anchor(''. $row->wc_lang . '/service/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . dash($row->wc_title) . '/', $row->wc_title) .'</li>';
		}}?>
	</div>
  <div id="cartoon">
    <h2 class="heading">Airport Information</h2>
    <ul>
      <?php if (isset($airport_info)){
		foreach ($airport_info as $row) 
		{
			echo '<li>'. anchor(''. $row->wc_lang . '/service/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . dash($row->wc_title) . '/', $row->wc_title) .'</li>';
		}}?>
    </ul> </div>
</div>
<!-- END EXTRAS -->

