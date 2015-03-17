<!--Header And content-->
<div class="content-box">
<?php echo $this->Session->flash(); ?>
<div class="content-box-header">
<h3 style="cursor: s-resize;">Site Settings</h3>
<div class="clear"></div>
</div>
			

<div class="content-box-content" style="display: block;">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('site_turn_option');?></th>
			<th><?php echo $this->Paginator->sort('contact_email');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($siteSettings as $siteSetting):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $siteSetting['SiteSetting']['id']; ?></td>
		<td><?php echo $siteSetting['SiteSetting']['site_turn_option']; ?></td>
		<td><?php echo $siteSetting['SiteSetting']['contact_email']; ?></td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
</div>