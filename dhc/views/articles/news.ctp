<?php
//echo "<pre>";print_r($pageContent);exit;
//print_r($categoryArticles);exit;
function get_paging($count, $limit, $page, $section)
{
	if($count>$limit)
	{
		$pagex=$page-1;
		$pagen=$page+1;
		$total_pages=ceil($count/$limit);
		if($page>1)
		{
			?><a href="<?php echo HOST_ADDRESS."articles/news/".$section."/".$pagex; ?>#listings">< Previous</a> | <?php
		}
		for($ix=1;$ix<=$total_pages;$ix++)
		{
			if($ix==$page)
			{
				?><b><?php echo $ix ?></b> | <?php
			}
			else
			{
				?><a href="<?php echo HOST_ADDRESS."articles/news/".$section."/".$ix; ?>#listings"><?php echo $ix ?></a> | <?php
			}
		}
		if($pagen<=$total_pages)
		{
			?><a href="<?php echo HOST_ADDRESS."articles/news/".$section."/".$pagen; ?>#listings">Next ></a><?php
		}
	}
	else
	{
		return false;	
	}
}
?>
<script src="<?php echo HOST_ADDRESS; ?>js/p7tpscripts.js" type="text/javascript"></script>
<link href="<?php echo HOST_ADDRESS; ?>js/p7PMMv01.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo HOST_ADDRESS; ?>css/p7tp/p7tp_10.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo HOST_ADDRESS; ?>css/new-york.css" rel="stylesheet" type="text/css" media="all" />

<style type="text/css" media="screen">
<!--
.p7TP_tabs {
    display: block;
}
#content h3 {
font-weight: bold !important;
}
/*
.media-contact-text {
    margin-right: 1px !important;
    width: 320px !important;
}
.media-contact {
    width: 510px !important;
}
.media {
    width: 165px !important;
}
.investors {
    width: 165px !important;
}
*/
-->
</style>
<script>
function show_div(div_val)
{
	div_val2=div_val.replace("p7tpb1_", "p7tpc1_");
    $('.down').removeClass('down')
	$('#'+div_val).addClass('down')
	
	$('.tab_content').fadeOut('slow');
	$('#'+div_val2).fadeIn('slow');
}
</script>
<div>

<div>
<h2>The Latest and Breaking News</h2>
<p>If it's important, it's on our new site!</p>
<div id="p7TP1" class="p7TPpanel">
<div class="p7TPwrapper">
<div class="p7TP_tabs">


<div id="p7tpb1_1" <?php if($param=="all") { echo "class=\"down\"";} ?>><a class="down" href="javascript:;" onclick="show_div('p7tpb1_1');">All</a></div>
<div id="p7tpb1_2" <?php if($param=="news") { echo "class=\"down\"";} ?>><a href="javascript:;" onclick="show_div('p7tpb1_2');">Breaking News</a></div>
<div id="p7tpb1_3" <?php if($param=="press_release") { echo "class=\"down\"";} ?>><a href="javascript:;" onclick="show_div('p7tpb1_3');">Press Releases</a></div>
<br class="p7TPclear" />
</div>
<div class="p7TPcontent">
<div id="p7tpc1_1" class="tab_content" <?php if($param=="all") { echo "style=\"display:block\"";} else { echo "style=\"display:none\"";} ?>>
<?php 
//echo "<pre>";print_r($news);
//print_r($press_release);
?>
<div class="latest-news-block">
<div class="latest-press-release">
<h2>Press Release</h2>
<p class="published-date"><?php echo date("F d, Y", strtotime($press_release[0]['Article']['created'])); ?></p>
<h3><a href="<?php echo HOST_ADDRESS."index/".urlencode($press_release[0]['Article']['url']);  ?>"><?php echo $press_release[0]['Article']['article_name']; ?></a></h3>
<p align="center"></p>
<?php echo $press_release[0]['Article']['content']; ?>
<p class="read-more"><a href="<?php echo HOST_ADDRESS."index/".urlencode($press_release[0]['Article']['url']);  ?>">Read More</a></p>
</div>

<div class="latest-news">
<h2>News</h2>

<p class="published-date"><?php echo date("F d, Y", strtotime($news[0]['Article']['created'])); ?></p>
<h3><a href="<?php echo HOST_ADDRESS."index/".urlencode($news[0]['Article']['url']);  ?>"><?php echo $news[0]['Article']['article_name']; ?></a></h3><?php 
echo $news[0]['Article']['content'];
?>
<p class="read-more"><a href="<?php echo HOST_ADDRESS."index/".urlencode($news[0]['Article']['url']);  ?>">Read More</a></p>
</div>
<div class="clear"></div>
</div>
<div class="clear"></div>







</div>

<div id="p7tpc1_2"  class="tab_content" <?php if($param=="news") { echo "style=\"display:block\"";} else { echo "style=\"display:none\"";} ?>>

<h3>News</h3>

<div class="archives-block">
Archives: 
<a href="javascript:void(0);">2012</a> | 
</div>

<?php
foreach($news as $news_unit)
{
	?><div class="news-press-grid">
	<p class="published-date"><?php echo date("F d, Y", strtotime($news_unit['Article']['created'])); ?></p>
	<h3><a href="<?php echo HOST_ADDRESS."index/".urlencode($news_unit['Article']['url']);  ?>"><?php echo $news_unit['Article']['article_name']; ?></a></h3>
	<p align="center"></p>
	<?php echo $news_unit['Article']['content']; ?>
	<p class="read-more"><a href="<?php echo HOST_ADDRESS."index/".urlencode($news_unit['Article']['url']);  ?>">Read More</a></p>
	</div>
	<div class="clear"></div><?php
}
?>

<div class="paginator-block"><?php echo get_paging($news_count, 10, $pagec, "news"); ?></div>
<div class="clear"></div>
<div class="searchResultItem"></div>
<div class="clear"></div>
<div class="searchResultItem"></div>




</div>

<div id="p7tpc1_3"  class="tab_content" <?php if($param=="press_release") { echo "style=\"display:block\"";} else { echo "style=\"display:none\"";} ?>>
<h3>Press Releases</h3>

<div class="archives-block">
Archives: 
<a href="javascript:void(0);">2012</a> | 
</div>

<?php
foreach($press_release as $news_unit)
{
	?><div class="news-press-grid">
	<p class="published-date"><?php echo date("F d, Y", strtotime($news_unit['Article']['created'])); ?></p>
	<h3><a href="<?php echo HOST_ADDRESS."index/".urlencode($news_unit['Article']['url']);  ?>"><?php echo $news_unit['Article']['article_name']; ?></a></h3>
	<p align="center"></p>
	<?php echo $news_unit['Article']['content']; ?>
	<p class="read-more"><a href="<?php echo HOST_ADDRESS."index/".urlencode($news_unit['Article']['url']);  ?>">Read More</a></p>
	</div>
	<div class="clear"></div><?php
}
?>

<div class="paginator-block"><?php echo get_paging($press_release_count, 10, $pagec,"press_release"); ?></div>
<div class="clear"></div>


<div class="searchResultItem"></div>
<div class="clear"></div>
<div class="searchResultItem"></div>
<div class="clear"></div>

</div>


</div>
</div>
<!--[if lte IE 6]>
<style type="text/css">.p7TPpanel div,.p7TPpanel a{zoom:100%;}.p7TP_tabs a{white-space:nowrap;}</style>
<![endif]-->
<!--[if IE 7]>
<style>.p7TPpanel div{zoom:100%;}</style>
<![endif]-->
</div>
<div class="clear"></div>

</div>


<div class="clear"></div>
</div>



<div class="clear"></div>
</div>
  
