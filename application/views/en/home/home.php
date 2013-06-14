<!-- BEGIN CONTENT WRAPPER -->
<div id="content-wrapper">
  <!-- BEGIN MAIN -->
  <div id="main">
    <div id="headlines">
      <div id="main-headline">
        <h2 class="heading">Bali Airport News</h2>
		<?php
		if (isset($query_splash_news)){
		foreach ($query_splash_news as $row)
			{ 
			if ($row->wg_image_name == NULL)
				{$row->wg_image_name = 'images.jpg';}
			if ($row->wc_upload_by == NULL)
				{$row->wc_upload_by = 'Publisher';}?>
			<img src="<?php echo base_url()?>images/big/<?php echo $row->wg_image_name?>" alt="<?php echo $row->wc_title ?>" width="370px">
			<a href="<?php echo base_url().'index.php/'.$row->wc_lang . '/' . $row->wc_type . '/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . preg_replace('/[^\w]+/', '-',dash($row->wc_title))  . '/'?>" ><h1><?php echo $row->wc_title?></h1></a>
			<p class="author"><?php echo $row->wc_upload_by?> | <span><?php echo mdate('%d-%M-%Y',strtotime(substr($row->wc_date,0,10))) ?></span></p>
			<p><?php echo substr($row->wc_content,0,60).' ....';?></p>
        <p><a href="<?php echo base_url()?>en/news_list">More news &raquo;</a></p>
		<?php } }?>
        <!-- <img src="<?php echo base_url(); ?>images/blank.jpg" alt="" />
        <h1><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h1>
        <p class="author">Name Here | <span>09.18.09</span></p>
        <p>Ut sed arcu nulla. In eget lectus vitae purus volutpat consectetur suscipit ut justo.</p>
        <p><a href="#">Full story &raquo;</a></p> -->
        
        <h2 class="heading">Bali Airport Video</h2>
        <object width="400" height="300">
          <param name="movie" value="http://www.youtube.com/v/B0jhJA1Hjxk&amp;hl=en_US&amp;fs=1&" />
          <param name="allowFullScreen" value="true" />
          <param name="allowscriptaccess" value="never" />
		  <iframe width="400" height="300" src="http://www.youtube.com/embed/gej6O0xW3Rs" frameborder="0" allowfullscreen></iframe>
        </object>
        <h2><a href="#">Ngurah Rai Bali International Airport</a></h2>
        <p class="author">Publisher  <span></span></p>
      </div>
      <div id="more-headlines">
        
        <h2 class="heading">Recommended Services</h2>
		
		<?php
				$i = 0;
 				
				foreach ($query as $row) : 
					
					if($i < 2) 
					{
						
						
						echo '<h3>' . anchor(''. $row->wc_lang . '/'.$row->wc_category.'/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . preg_replace('/[^\w]+/', '-',dash($row->wc_title)) . '/', $row->wc_title) . '</h3>'; 
						echo '<p>' . word_limiter($row->wc_content, 25) . '</p>';
						echo '<p>' . anchor(''. $row->wc_lang . '/'.$row->wc_category.'/' . $row->wc_sub_category . '/', 'read more'). '</p>'; 
						
					}
					else
					{
						
						echo '<h3>' . anchor(''. $row->wc_lang . '/'.$row->wc_category.'/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . preg_replace('/[^\w]+/', '-',dash($row->wc_title)) . '/', $row->wc_title) . '</h3>'; 
						echo '<p>' . word_limiter($row->wc_content, 25) . '</p>';
						echo '<p>' . anchor(''. $row->wc_lang . '/'.$row->wc_category.'/' . $row->wc_sub_category . '/', 'read more'). '</p>'; 
						
					}
			
			$i += 1;
								 endforeach;
			
			?>
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
    <h2 class="heading">Restaurants and Cafes</h2>
       <?php if (isset($ead_info)){
		foreach ($ead_info as $row) 
		{
			echo '<li>'. anchor(''. $row->wc_lang . '/'.$row->wc_category.'/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . preg_replace('/[^\w]+/', '-',dash($row->wc_title)) . '/', $row->wc_title) .'</li>';
		}}?>
  </div>
  <div id="programs">
    <h2 class="heading">Travelling</h2>
    <?php if (isset($pax_info)){
		foreach ($pax_info as $row) 
		{
			echo '<li>'. anchor(''. $row->wc_lang . '/'.$row->wc_category.'/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . preg_replace('/[^\w]+/', '-',dash($row->wc_title)) . '/', $row->wc_title) .'</li>';
		}}?>
  </div>
  <div id="cartoon">
    <h2 class="heading">Airport Information</h2>
      <?php if (isset($airport_info)){
		foreach ($airport_info as $row) 
		{
			echo '<li>'. anchor(''. $row->wc_lang . '/'.$row->wc_category.'/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . preg_replace('/[^\w]+/', '-',dash($row->wc_title)) . '/', $row->wc_title) .'</li>';
		}}?></div>
</div>
<!-- END EXTRAS -->

