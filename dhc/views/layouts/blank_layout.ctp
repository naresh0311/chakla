<?php
//echo "<pre>";print_r($categoryImages);exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php 
if(!isset($page_title))
{
	$page_title="Home - Davidoff Malito &amp; Hutcher";
}
echo $page_title;
?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo HOST_ADDRESS; ?>css/style_front_end.css" rel="stylesheet" type="text/css" media="all" />
<!-- Menus -->
<link href="<?php echo HOST_ADDRESS; ?>js/p7pmm/p7PMMh01.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo HOST_ADDRESS; ?>js/p7pmm/p7PMMh03.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo HOST_ADDRESS; ?>js/p7pmm/p7PMMscripts.js"></script>

<!-- Banner Image Rotator -->
<link href="<?php echo HOST_ADDRESS; ?>js/p7irm/p7IRM01.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo HOST_ADDRESS; ?>js/p7irm/p7IRMscripts.js"></script>

<!-- jQuery Framework -->
<script type="text/javascript" src="<?php echo HOST_ADDRESS; ?>js/jquery-1.7.min.js"></script>

<!-- Font Replacement -->
<script type="text/javascript" src="<?php echo HOST_ADDRESS; ?>js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo HOST_ADDRESS; ?>js/LiberationSans.font.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo HOST_ADDRESS; ?>js/cufon-config.js"></script>

<!--[if gte IE 9]> <script type="text/javascript"> Cufon.set('engine', 'canvas'); </script> <![endif]-->

<!-- Mousewheel plugin (optional) -->
<script type="text/javascript" src="<?php echo HOST_ADDRESS; ?>js/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- FancyBox -->
<link rel="stylesheet" href="<?php echo HOST_ADDRESS; ?>js/fancybox/jquery.fancybox.css?v=2.0.4" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo HOST_ADDRESS; ?>js/fancybox/jquery.fancybox.pack.js?v=2.0.4"></script>
<script type="text/javascript" src="<?php echo HOST_ADDRESS; ?>js/scripts.js"></script>

<!-- PNG Fix -->
<script type="text/javascript" language="javascript" src="<?php echo HOST_ADDRESS; ?>js/pluginpage.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo HOST_ADDRESS; ?>js/jquery.pngFix.js"></script>
</head>
<body>
<div id="wrapper"> 
    
  
  
 <?php echo $content_for_layout; ?> 
  
  
  
  
  
  
</div>
</body>
</html>