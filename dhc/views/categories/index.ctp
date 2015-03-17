<h2><?php echo $categoryVals[0]['Category']['category_name']; ?></h2>
<div class="clear"></div>

<div id="content-right">
<?php echo $categoryVals[0]['Category']['content']; ?>
</div>

<div id="left-sidebar">
<div class="related-persons">

<?php
	if($categoryVals[0]['Category']['category_name']=="Government Relations")
	{
?>
<div id="personProfessionals">
<?php
	} else {
?>
<div id="personInThisArea">
<?php
	}
?>
</div>

</div>
</div>
<div class="clear"></div>