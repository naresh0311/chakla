<link href="<?php echo HOST_ADDRESS; ?>css/new-york.css" rel="stylesheet" type="text/css" media="all" />
<h2><?php echo $pageContent[0]['Article']['article_name']; ?></h2>
<?php echo $pageContent[0]['Article']['content']; ?>


<div class="clear"></div>
<?php
if($pageContent[0]['Article']['article_type_id']==2)
{
?>
<p class="go-back-to-all-news"><a href="<?php echo HOST_ADDRESS; ?>/articles/news">Go back to all news</a></p>
<div class="clear"></div>
<?php
}
?>
<div class="mattersofnote-freeevaluation-actions">
<div class="action-left"></div>
<div class="action-right"><a href="<?php echo HOST_ADDRESS; ?>contactus"><img src="<?php echo HOST_ADDRESS; ?>images/free-evaluation-button.jpg" alt="Evaluation of your case" border="0" /></a></div>
</div>