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
<script src="<?php echo HOST_ADDRESS; ?>js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo HOST_ADDRESS; ?>js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo HOST_ADDRESS; ?>js/Franklin_Gothic_Medium_400.font.js"></script>
<script type="text/javascript" src="<?php echo HOST_ADDRESS; ?>js/LiberationSans.font.js"></script>
<script type="text/javascript" src="<?php echo HOST_ADDRESS; ?>/js/pluginpage.js"></script>
<script type="text/javascript" src="<?php echo HOST_ADDRESS; ?>/js/jquery.pngFix.js"></script>
<link href="<?php echo HOST_ADDRESS; ?>p7pmm/p7PMMh01.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo HOST_ADDRESS; ?>p7pmm/p7PMMh02.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo HOST_ADDRESS; ?>p7pmm/p7PMMscripts.js"></script>
<link href="<?php echo HOST_ADDRESS; ?>p7irm/p7IRM01.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo HOST_ADDRESS; ?>p7irm/p7IRMscripts.js"></script>
<link rel="stylesheet" href="<?php echo HOST_ADDRESS; ?>fancybox/jquery.fancybox.css?v=2.0.4" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo HOST_ADDRESS; ?>fancybox/jquery.fancybox.pack.js?v=2.0.4"></script>
<script type="text/javascript" src="<?php echo HOST_ADDRESS; ?>js/scripts.js"></script>
</head>
<body>
<div id="header-block">
<div class="header">
<div id="menu">
<div id="p7PMM_1" class="p7PMMh01">
<ul class="p7PMM">
<li><a href="<?php echo HOST_ADDRESS;?>">Home</a></li>
<li><a href="<?php echo HOST_ADDRESS; ?>index/About-Us">About Us</a></li>
<li><a href="#">News Areas</a>
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
<!--<li><a href="<?php echo HOST_ADDRESS;?>index/Resources">Resources</a></li>-->
<li><a href="<?php echo HOST_ADDRESS;?>articles/news">Breaking News</a></li>
<li><a href="<?php echo HOST_ADDRESS;?>contactus">Connect with Us</a></li>
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

<div class="logo"><a href="<?php echo HOST_ADDRESS;?>"><img src="<?php echo HOST_ADDRESS; ?>images/cms-logo.jpg" alt="CMS Control" border="0" /></a></div>
<div class="news-punchline"></div>
<div class="call-to-action"></div>
</div>
</div>

<div id="you-are-here">
<div class="location">
You are here: <h1><?php 
if(isset($pageContent[0]['Article']['article_name']))
{
	echo $pageContent[0]['Article']['article_name']; 
}
elseif(isset($categoryVals[0]['Category']['category_name']))
{
	echo $categoryVals[0]['Category']['category_name']; 
}
elseif($this->params['controller']=="articles" &&  $this->params['action']=="news")
{
	echo "In The News";
}
?></h1>
<?php 
if($pageContent[0]['Article']['id']!=80)
{?><div class="contactus"><a href="<?php echo HOST_ADDRESS;?>contactus">Contact Us</a></div><?php } ?>
</div>
</div>

<div id="main-body">
<div id="content">
<?php echo $content_for_layout; ?>

<div class="clear"></div>
</div>
</div>

<div id="footer-block">
<div id="footer">

<div class="footer-menu">
<div id="p7PMM_2" class="p7PMMh02">
<ul class="p7PMM">
<li><a href="<?php echo HOST_ADDRESS;?>">Home</a></li>
<li><a href="<?php echo HOST_ADDRESS; ?>index/About-Us">About Us</a></li>
<!--<li><a href="<?php echo HOST_ADDRESS;?>index/Resources">Resources</a></li>-->
<li><a href="<?php echo HOST_ADDRESS;?>/articles/news">Breaking News</a></li>
<li><a href="<?php echo HOST_ADDRESS;?>contactus">Connect with Us</a></li>

</ul>
<div class="p7pmmclearfloat">&nbsp;</div>
<!--[if lte IE 6]>
<style>.p7PMMh09 ul ul li {float:left; clear: both; width: 100%;}.p7PMMh09 {text-align: left;}.p7PMMh09, .p7PMMh09 ul ul a {zoom: 1;}</style>
<![endif]-->
<!--[if IE 5]>
<style>.p7PMMh09, .p7PMMh09 ul ul a {height: 1%; overflow: visible !important;} .p7PMMh09 {width: 100%;}</style>
<![endif]-->
<!--[if IE 7]>
<style>.p7PMMh09, .p7PMMh09 a{zoom:1;}.p7PMMh09 ul ul li{float:left;clear:both;width:100%;}</style>
<![endif]-->
<script type="text/javascript">
<!--
P7_PMMop('p7PMM_2',1,2,0,0,0,0,0,1,0,3,1,1,0,0);
//-->
</script>
</div>
</div>
<div class="copyright-info">
<p>&copy; 2015 <a href="<?php echo HOST_ADDRESS;?>">All rights reserved by the proprietors of this website.</a></p>

</div>
</div>
</div>

<div id="banner-block">
<div class="banner-content">

<div class="strategic-offices"><p><img src="<?php echo HOST_ADDRESS ?>images/call-to-action-default.png" width="960" height="40" /></p>
</div>
<div id="practice-area-tab"><a href="#"><img src="<?php echo HOST_ADDRESS ?>images/practice-areas.png" border="0" /></a></div>
<div id="in-the-news-tab"><a href="<?php echo HOST_ADDRESS;?>articles/news"><img src="<?php echo HOST_ADDRESS ?>images/in-the-news.png" border="0" /></a></div>
<div id="contact-tab"><a href="<?php echo HOST_ADDRESS;?>contactus"><img src="<?php echo HOST_ADDRESS ?>images/contact-us.png" border="0" /></a></div>
</div>

<div id="p7IRM_1" class="p7IRM01">
<div id="p7IRMow_1" class="p7IRMowrapper"> 
<div id="p7IRMw_1" class="p7IRMwrapper"> 
<?php $altValue=explode("-", $categoryImages[0]['CategoryImages']['image']);?>
<div id="p7IRMdv_1" class="p7IRMdv"><a class="p7IRMlink" id="p7IRMlk_1" title=""><img class="p7IRMimage" src="<?php echo HOST_ADDRESS ?>img/products_images/<?php echo $categoryImages[0]['CategoryImages']['image']; ?>" alt="<?php echo  substr($altValue[1], 0, count($altValue[1])-5); ?>" name="p7IRMim_1" width="1400" height="450" id="p7IRMim_1" /></a></div>
<div id="p7IRMdsw_1" class="p7IRMdesc_wrapper"> 
<div class="p7IRMdesc_close"><a id="p7IRMdsclose_1" href="javascript:;" title="Hide Description"><em>Hide</em></a></div>
<div id="p7IRMds_1" class="p7IRMdesc"> </div>
</div>
<div id="p7IRMdsopw_1" class="p7IRMdesc_open_wrapper"> 
<div id="p7IRMdsop_1" class="p7IRMdesc_open"><a id="p7IRMdsopen_1" href="javascript:;" title="Show Description"><em>Show</em></a></div>
</div>
</div>
</div>
<ul id="p7IRMlist_1" class="p7IRMlist">
<?php
foreach($categoryImages as $images)
{
$altValue=explode("-", $images['CategoryImages']['image']);
?><li><a href="<?php echo HOST_ADDRESS ?>img/products_images/<?php echo $images['CategoryImages']['image']; ?>"><?php echo  substr($altValue[1], 0, count($altValue[1])-5); ?></a></li><?php
}
?>
</ul>
<!--[if IE 5.000]>
<style>.p7IRMdesc_wrapper {position:static !important;visibility:visible !important;}.p7IRMdesc_open_wrapper, .p7IRMdesc_close {display: none;}.p7IRMpaginator {position: static !important;height: 3em;}.p7IRMpaginator li, .p7IRMpaginator a {float: left !important;}.p7IRMpaginator a {float: left !important;overflow: visible !important;}</style>
<![endif]-->
<!--[if lte IE 6]>
<style>.p7IRMpaginator a {width: auto !important;}</style>
<![endif]-->
<!--[if lte IE 7]>
<style>.p7IRMpaginator li {display: inline !important;margin-right: 3px !important;}.p7IRMpaginator {zoom: 1;}</style>
<![endif]-->
<script type="text/javascript">P7_opIRM('p7IRM_1',1,1,1,8000,5000,1,0,1,0,1500,0,0);</script>
</div>
</div>

<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=8626923; 
var sc_invisible=1; 
var sc_security="20e7604c"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="hits counter"
href="http://statcounter.com/free-hit-counter/"
target="_blank"><img class="statcounter"
src="http://c.statcounter.com/8626923/0/20e7604c/1/"
alt="hits counter"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->

</body>
</html>