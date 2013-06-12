<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>PT Gapura Angkasa | Staff Area</title>
<link href="<?php echo base_url(); ?>wp-content/themes/team/css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>wp-content/themes/team/css/team.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>wp-content/themes/team/css/team-responsive.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="<?php echo base_url(); ?>wp-content/themes/team/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>wp-content/themes/team/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>wp-content/themes/team/js/site.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>wp-content/themes/team/js/nicEdit.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>wp-content/themes/team/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript">
//<![CDATA[
  bkLib.onDomLoaded(function() {
	  	new nicEditor({iconsPath : '<?php echo base_url(); ?>wp-content/themes/gapura-angkasa/images/nicEditorIcons.gif'}).panelInstance('wc_content');
        //new nicEditor({fullPanel : true}).panelInstance('area2');
  });
  //]]>
  </script>


</head>
	<body>
		<div class="container">
        
        	<img src="<?php echo base_url(); ?>wp-content/themes/gapura-angkasa/images/logo-small.png" alt="PT Gapura Angkasa">
            <br /><br />
        
			<?php $this->load->view('gp/navbar'); ?>
            
			<div class="row">
				
                <?php $this->load->view('gp/sidebar'); ?>
