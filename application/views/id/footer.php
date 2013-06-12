                             <div class="client_container">
                               <ul id="scroller">
                               <?php foreach ($logo as $key => $value)
								{
							   ?>
                               
                                 <li><a href=""><img src="<?php echo base_url(); ?>images/logo/<?php echo $value; ?>" width="120" height="40"></a></li>
                                   
                                <?php
								}
								?>
                                
                                </ul>
                            </div>
      	</div><!-- end main -->
    </div>
    
   <!-- <div class="clear20"></div>-->
         
	<!-- start testimonial -->
	<div class="testimonial-wrap">
		<div class="testimonial">
        	<ul>
            	<?php foreach ($query_splash_news as $splash_news)
				{
					
				?>
                <li><p><b>Update News : "<?php echo anchor('' . $splash_news->wc_lang . '/news/' . $splash_news->wc_sub_category . '/' . $splash_news->wc_id, $splash_news->wc_title); ?>"</b></p></li>
                <?php
				}
				?>
            </ul>
		</div>
	</div><!-- end testimonial -->
 <!-- start footer -->
    <div id="footer" class="boxed">
    	
		<div class="clear"></div>
        
        <!-- start post footer -->
        <div class="post-footer">
            <div class="post-footer-wrap">
            <p class="fl">Copyright 2012 PT Gapura Angkasa. All Right Reserved</p>
            <p class="fr">
                <a href="http://webmail.gapura.co.id">Webmail </a>
                
                <?php echo anchor('gp','Staff Access'); ?>
             </p>
            </div>
        </div><!-- end post footer -->
    </div><!-- end footer -->
    
</div>
<div class="clear"></div>
<div id="footerShadow" class="boxed"><div class="shadowHolderflat"><img src="images/big-shadow.png" alt=""></div></div>
</body>

</html>