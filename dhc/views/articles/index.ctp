<?php
if($pageContent[0]['Article']['article_type_id']==2)
{
	?>
	<link href="<?php echo HOST_ADDRESS; ?>css/new-york.css" rel="stylesheet" type="text/css" media="all" />
	<div class="clear"><h2 style="line-height: 45px !important;"><?php if($pageContent[0]['Article']['news_type_id']==1){ echo "News"; } else { echo "Press Release"; } ?></h2></div>
	<div class="clear"><h3 style="line-height: 30px !important;font-weight: bold !important;font-size:28px;"><?php echo $pageContent[0]['Article']['article_name']; ?></h3></div>
	<?php echo $pageContent[0]['Article']['content']; ?>
	
	<p class="go-back-to-all-news"><a href="<?php echo HOST_ADDRESS; ?>articles/news">Go back to all news</a></p>
	<div class="clear"></div>
	<?php
}
else
{
	?><div class="clear"></div>
	<h2 style="line-height: 45px !important;"><?php echo $pageContent[0]['Article']['article_name']; ?></h2><?php
	echo $pageContent[0]['Article']['content']; 
}
?>