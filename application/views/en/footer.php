<!-- BEGIN FOOTER -->
<div id="footer">
<a href="#"><img src="<?php echo base_url(); ?>images/certification/gapura-angkasa-achievement.jpg"  width="980"/></a> 
				<?php foreach ($query_splash_news as $splash_news)
				{
				echo anchor('' . $splash_news->wc_lang . '/news/' . $splash_news->wc_sub_category . '/' . $splash_news->wc_id, $splash_news->wc_title);
				}
				?>
							<?php /*foreach ($logo as $key => $value)
								{*/
							   ?>
                               
                                 <!--<a href=""><img src="<?php //echo base_url(); ?>images/logo/<?php //echo $value; ?>" width="120" height="40"></a>-->
                                   
                                <?php
								#}
								?>


  <ul>
    
    <li><a href="#">FAQ</a></li>
    <li>|</li>
    <li><a href="#">Privacy Policy</a></li>
    <li>|</li>
    <li><a href="#">Careers</a></li>
    <li>|</li>
    <li><a href="#">Advertise</a></li>
    <li>|</li>
    <li><a href="#">Sitemap</a></li>
    <li>|</li>
    <li>Copyright 2012 PT Gapura Angkasa. All Right Reserved</li>
  </ul>
</div>
<!-- END FOOTER -->
</body>
</html>




                        