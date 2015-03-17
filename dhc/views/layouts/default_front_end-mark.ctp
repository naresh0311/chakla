<?php
//echo "<pre>";print_r($categoryImages);exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
if(!isset($page_title))
{
	$page_title="Home - Davidoff Malito &amp; Hutcher";
}
if(is_array($page_title))
{
	?><title><?php echo $page_title[0]; ?></title>
	<meta name="description" content="<?php echo $page_title[2]; ?>" />
	<meta name="keywords" content="<?php echo $page_title[1]; ?>" /><?php
}
else
{
	?><title><?php echo $page_title; ?></title><?php
}
?>

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
  
  
  <div id="menuWrapper"> 
    <div id="menu">
<div id="p7PMM_1" class="p7PMMh01">
<ul class="p7PMM">
<li><a href="<?php echo HOST_ADDRESS; ?>index/About-Us">About Us</a></li>
<li><a href="<?php echo HOST_ADDRESS; ?>who-we-are">Who We Are</a></li>
<div>
<ul>
<?php
foreach($categories as $category)
{
	?><li><a href="<?php echo HOST_ADDRESS."news-areas/".$category['Category']['url']; ?>" title="<?php echo $category['Category']['link_title']; ?>"><?php echo $category['Category']['category_name']; ?></a><?php
	if(count($category['Category']['pages'])>0)
	{
		?><div><ul><?php
		foreach($category['Category']['pages'] as $page)
		{
			?><li><a href="<?php echo HOST_ADDRESS."pages/".$category['Category']['url']."/".$page['Article']['url']; ?>" title="<?php echo $page['Article']['link_title']; ?>"><?php echo $page['Article']['article_name']; ?></a></li><?php
		}
		?></ul></div><?php
	}
	?></li><?php
}
?>
</ul>
</div>
</li>
<li><a href="<?php echo HOST_ADDRESS;?>index/Resources">Resources</a></li>
<li><a href="<?php echo HOST_ADDRESS;?>contactus">Contact Us</a></li>
<li><a href="<?php echo HOST_ADDRESS;?>">Home</a></li>
</ul>
<div class="p7pmmclearfloat">&nbsp;</div>
<!--[if lte IE 6]>
<style>.p7PMMh01 ul ul li {float:left; clear: both; width: 100%;}.p7PMMh01 {text-align: left;}.p7PMMh01, .p7PMMh01 ul ul a {zoom: 1;}</style>
<![endif]-->
<!--[if IE 5]>
<style>.p7PMMh01, .p7PMMh01 ul ul a {height: 1%; overflow: visible !important;} .p7PMMh01 {width: 100%;}</style>
<![endif]-->
<!--[if IE 7]>
<style>.p7PMMh01, .p7PMMh01 a{zoom:1;}.p7PMMh01 ul ul li{float:left;clear:both;width:100%;}</style>
<![endif]-->
<script type="text/javascript">
<!--
P7_PMMop('p7PMM_1',1,2,0,0,0,0,0,1,0,3,1,1,0,1);
//-->
</script>
</div>
</div>
  </div>
  <div id="footer-block"> 
    <div class="locations"> 
      <div class="location"> 
        <h3>New York</h3>
        605 Third Avenue<br />
        New York, N.Y. 10158<br />
        T 212.557.7200<br />
        F 212.286.1884 </div>
      <div class="location"> 
        <h3>Washington, D.C.</h3>
        444 North Capitol Street, N.W.<br />
        Washington, D.C. 20001<br />
        T 202.347.1117<br />
        F 202.638.6784 </div>
      <div class="location"> 
        <h3>Albany</h3>
        150 State Street<br />
        Albany, N.Y. 12207<br />
        T 518.465.8230<br />
        F 518.465.8650 </div>
      <div class="location"> 
        <h3>Long Island</h3>
        200 Garden City Plaza, Suite 315<br />
        Garden City, N.Y. 11530<br />
        T 516.248.6400<br />
        F 516.248.6422 </div>
    </div>
    </div>
  
  <div id="header-block"> 
    <div class="header"> 
      <div class="logo"><a href="<?php echo HOST_ADDRESS;?>"><img src="<?php echo HOST_ADDRESS; ?>images/logoMain.png" width="442" height="55" alt="CMS" border="0" /></a></div>
      <div class="topright-menu"><span>212.557.7200</span></div>
    </div>
  </div>
</div>
</body>
</html>