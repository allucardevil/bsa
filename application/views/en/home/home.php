<!-- BEGIN CONTENT WRAPPER -->
<div id="content-wrapper">
  <!-- BEGIN MAIN -->
  <div id="main">
    <div id="headlines">
      <div id="main-headline">
        <h2 class="heading">Bali Airport News</h2>
        <img src="<?php echo base_url(); ?>images/blank.jpg" alt="" />
        <h1><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h1>
        <p class="author">Name Here | <span>09.18.09</span></p>
        <p>Ut sed arcu nulla. In eget lectus vitae purus volutpat consectetur suscipit ut justo.</p>
        <p><a href="#">Full story &raquo;</a></p>
        
        <h2 class="heading">Bali Airport Video</h2>
        <object width="400" height="300">
          <param name="movie" value="http://www.youtube.com/v/B0jhJA1Hjxk&amp;hl=en_US&amp;fs=1&" />
          <param name="allowFullScreen" value="true" />
          <param name="allowscriptaccess" value="never" />
          <embed src="http://www.youtube.com/v/B0jhJA1Hjxk&amp;hl=en_US&fs=1&amp;" type="application/x-shockwave-flash" allowscriptaccess="never" allowfullscreen="true" width="400" height="300"></embed>
        </object>
        <h2><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h2>
        <p class="author"><span>09.18.09</span></p>
        <p><a href="#">More video &raquo;</a></p>
      </div>
      
      
      
      <div id="more-headlines">
        
        <h2 class="heading">Recommended Services</h2>
		
		<?php
				$i = 0;
 				
				foreach ($query as $row) : 
					
					if($i < 2) 
					{
						
						
						echo '<h3>' . anchor(''. $row->wc_lang . '/service/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . dash($row->wc_title) . '/', $row->wc_title) . '</h3>'; 
						echo '<p>' . word_limiter($row->wc_content, 25) . '</p>';
						echo '<p>' . anchor(''. $row->wc_lang . '/services/' . $row->wc_sub_category . '/', 'read more'). '</p>'; 
						
					}
					else
					{
						
						echo '<h3>' . anchor(''. $row->wc_lang . '/service/' . $row->wc_sub_category . '/' . $row->wc_id . '/' . dash($row->wc_title) . '/', $row->wc_title) . '</h3>'; 
						echo '<p>' . word_limiter($row->wc_content, 25) . '</p>';
						echo '<p>' . anchor(''. $row->wc_lang . '/services/' . $row->wc_sub_category . '/', 'read more'). '</p>'; 
						
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
    <h2 class="heading-blue">Flight Schedule</h2>
    <iframe src="http://gfis.gapura.co.id/dps" width="250" height="250" frameborder="0" style="-webkit-transform:scale(1);-moz-transform-scale(1);></iframe>
    
    <h2 class="heading">Celebrity Sightings</h2>
    <img src="<?php echo base_url(); ?>images/casey.jpg" alt="" class="ad" /> <img src="<?php echo base_url(); ?>images/hobo.jpg" alt="" class="ad-right" />
    <h2 class="heading">In the Community</h2>
    <h4><a href="#">Lorem ipsum dolor sit amet eget, consectetur adipiscing elit</a></h4>
    <h4><a href="#">Lorem ipsum dolor sit amet eget, consectetur adipiscing elit</a></h4>
  </div>
  <!-- END SIDEBARS -->
</div>
<!-- END CONTENT WRAPPER-->
<!-- BEGIN EXTRAS -->
<div id="extras">
  <div id="recommended">
    <h2 class="heading">Recommended Stories</h2>
    <ul>
      <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit &raquo;</a></li>
      <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit &raquo;</a></li>
      <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit &raquo;</a></li>
      <li class="last"><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit &raquo;</a></li>
    </ul>
  </div>
  <div id="programs">
    <h2 class="heading">What's On Tonight</h2>
    <img src="<?php echo base_url(); ?>images/rick.jpg" alt="" /> <img src="<?php echo base_url(); ?>images/cbc.png" alt="" /> </div>
  <div id="cartoon">
    <h2 class="heading">Humour</h2>
    <img src="<?php echo base_url(); ?>images/cartoon.jpg" alt="" /> </div>
</div>
<!-- END EXTRAS -->

