<!DOCTYPE html>

<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en"><!--<![endif]--> 

<!--[if IEMobile 7]><html class="no-js iem7 oldie"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js ie7 oldie" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js ie8 oldie" lang="en"><![endif]-->
<!--[if (IE 9)&!(IEMobile)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|(gt IEMobile 7)]><!--><html class="no-js" lang="en"><!--<![endif]-->

<html lang="en"><!--<![endif]--> 
	<head>
		<meta charset="utf-8">
		<title>PT Gapura Angkasa - Online Document System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="<?php echo base_url(); ?>wp-content/themes/gapura-angkasa/css/global.css" rel="stylesheet">
		<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <!--<script type="text/javascript" src="<?php //echo base_url(); ?>wp-content/themes/gapura-angkasa/js/jquery.fileDownload.js"></script>-->
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js" type="text/javascript"></script>-->
        <script src="<?php //echo base_url(); ?>wp-content/themes/gapura-angkasa/js/jquery.min.js"></script>
		<script src="<?php //echo base_url(); ?>wp-content/themes/gapura-angkasa/js/bootstrap.min.js"></script>
		<script src="<?php //echo base_url(); ?>wp-content/themes/gapura-angkasa/js/site.js"></script>
		<script src="<?php //echo base_url(); ?>wp-content/themes/gapura-angkasa/js/jquery.prettyPhoto.js"></script>
       <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
       
<script>
    $(document).ready(function(){
        $("#cabang_id").change(function(){
            var cabang_id = $("#cabang_id").val();
            $.ajax({
               type : "POST",
               url  : "<?php echo base_url();?>index.php/user/select_unit/",
               data : "cabang_id=" + cabang_id,
               success: function(data){$("#unit_id").html(data);}
            });
        });
    });
	
	$(document).ready(function(){
        $('.delete').click(function(){
            var answer = confirm('Delete '+jQuery(this).attr('title'));
                        // jQuery(this).attr('title') gets anchor title attribute
            return answer; // answer is a boolean
            }); 
    }); 
</script>
	</head>
    
	<body>
    
